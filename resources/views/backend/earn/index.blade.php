@extends('layouts.backend',['page'=>'earn'])

@section('page-title')
Earn
@endsection

@section('content')
    <div class="col-lg-12" onload="aller()">
        <div class="card card-custom">
            <div class="card-header align-items-center mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="font-weight-bolder text-dark"><img alt="Logo" src="{{asset('images/logo/favicon.png')}}" width="32px" /> Earn </span>
                    
                </h3>
                <h3 id="balances" ></h3>
            </div>
            <div class="card-body">
                <div class="row text-center border p-5 shadow-xs border-radius-5">
                    <div class="col-lg-12 text-left">
                        <p>Address : <b id="currentuseraddress"> -</b></p>
                        <p>TRON Balance : </td>  <b id="currenttrxuserbalance"> 0 TRX</b></p>
                        <p>MIRA Balance : <b id="mira_balance"> 0 MIRA</b></p>
                        <p>Remaining Reward : <b id="mira_remining_reward"> 0 MIRA</b></p>
                        <p>Total Reward : <b id="mira_reward"> 0 MIRA</b></p>
                    </div>
                 </div>
            </div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="font-weight-bolder text-dark mb-5"><img alt="Logo" src="{{asset('images/logo/favicon.png')}}" width="32px" /> Staking </h3>
                    <p>Remaining MIRA to subscribe</p>
                    <p>{{number_format($rest,8)}} MIRA / {{number_format($max)}} MIRA</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percent}}%;" aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100">{{$percent}}%</div>
                    </div>
                </div>
                @foreach($data as $value)
                    <div class="row text-center border p-5 mb-3 shadow-xs border-radius-5">
                        <div class="col-lg-2 align-self-center text-left">
                            <h1 class="text-danger">{{$value->annualized_yield * 100}}%</h1>
                            @if($value->duration == 90)
                                <p>Stake 3 month</p>
                            @elseif($value->duration == 180)
                                <p>Stake 6 month</p>
                            @elseif($value->duration == 360)
                                <p>Stake 1 year</p>
                            @endif
                        </div>
                        <div class="col-lg-3 align-self-center">
                            <p>Duration : <b>{{$value->duration}} Days</b></p>
                        </div>
                        <div class="col-lg-3 align-self-center">
                            <p>Min. Deposit : <b>{{$value->min_deposit}} MIRA</b></p>
                        </div>
                        <div class="col-lg-2 align-self-center">
                            <p>Fees : <b>Free</b></p>
                        </div>
                        <div class="col-lg-2 align-self-center">
                            <button type="button" class="btn btn-sm btn-outline-warning buttonStack mb-3" data-toggle="modal" data-target="#tes" data-stack="{{$value->id}}">
                              Staking
                            </button>
                        </div>
                        <div class="col-lg-12 text-left">
                            <p>Your profits will be sent automatically in 10 days.</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tes" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle"><img alt="Logo" src="{{asset('images/logo/favicon.png')}}" width="20px" /> Stake</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <input class="form-control" id="amount" name="amount" type="text" placeholder="Deposit">            <input type="hidden" id="stack_id" name="stack_id">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" id="closeButton" data-dismiss="modal">Close</button>
            <button type="submit" id="stake" class="btn btn-outline-success" value="submit" onclick="send()">Stake</button>
          </div>
          <!-- </form> -->
        </div>
      </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    const contractAddress = "TE7VPZSSy7cdHX7q9w8GWfUAUnsrQFAcBM"
    // "TDTD48fHfHPeS58EjGa5XNgsnGTGEfJW53"; //shasta

    const TokenAddress = "TJ6CjSftX7ifUoBtK2VcvAKzcut9cnfrhq"

    var tronWeb;
    var istronWeb = false;
    var myContract;
    var maxStacke;
    var totalStacke;
    var restStacke;
    var address;
    var saldoMira = 0;
    var base_url;
    var stack_id;
    var resp;
    var dataId;

    window.onload = async function () {
        setTimeout(async function () {
            Swal.fire({
                title: "Loading...",
                text: "Checking Tronlink Connection",
                allowOutsideClick: false,
                showConfirmButton: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                },
                onClose: () => {
                    if (istronWeb == true) {
                        Swal.fire({
                            position: 'middle',
                            icon: 'success',
                            title: 'TronLink is Connected',
                            showConfirmButton: false,
                            timer: 1300
                        });
                    } else if (istronWeb == false) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Please Check TronLink Connection and make sure you are connected to correct network!',
                        });
                    }
                }
            });
            if (contractAddress) {
                tronWeb = window.tronWeb;
                console.log("tronWeb : ", tronWeb);
                console.log("tronweb is successfully fetched from window");

                try {

                    currentaddress = await tronWeb.defaultAddress.base58;
                    console.log("currentaddress-AUTO : ", currentaddress);
                    myContract = await tronWeb.contract().at(contractAddress);
                    TokenContract = await tronWeb.contract().at(TokenAddress);

                    istronWeb = true;
                    Swal.close();
                    console.log('Contract address : ', contractAddress);
                    console.log('Contract address : ', TokenAddress);

                    console.log("Contract is", myContract);
                    console.log("Token Contract is", TokenContract);



                    document.getElementById('currentuseraddress').innerHTML = currentaddress;
                    var balance = await tronWeb.trx.getBalance(currentaddress);
                    balance = balance / (10 ** 6);

                    document.getElementById("currenttrxuserbalance").innerHTML = balance + " TRX";

                    hex_contract_address =   tronWeb.address.toHex(TokenAddress)
                    console.log('hex contract address : ', hex_contract_address)

                    fetch("https://apilist.tronscan.org/api/account?address="+window.tronWeb.defaultAddress.base58)
                    .then((resp) => resp.json())
                    .then(function(data) {
                      console.log(data)
                      data.tokens.forEach(myFunction);
                      saldo = 0;

                      function myFunction(item, saldo) {
                          // console.log(item.tokenId)
                          
                          if (item.tokenId == TokenAddress) {
                            
                            saldo = item.balance / 1000000000000000000;
                            saldoMira = saldo;
                            // console.log("tes", saldo)     
                            document.getElementById("mira_balance").innerHTML = saldo + " MIRA" ;
                            document.getElementById("balances").innerHTML = saldo + " MIRA" ;
                            fetch('api/stack/limit')
                              .then(response => response.json())
                              .then(data => {
                                maxStacke = data.data.max;
                                totalStacke = data.data.total;
                                restStacke = data.data.rest;
                              });

                            fetch('api/stack/earn?address=' + currentaddress)
                              .then(response => response.json())
                              .then(data => {
                                document.getElementById("mira_reward").innerHTML = data.total + " MIRA" ;
                                document.getElementById("mira_remining_reward").innerHTML = data.remining + " MIRA" ;
                              });
                            $('.buttonStack').removeAttr('disabled');
                          }else{
                            
                          }                                     
                      } 
                    
                    })
                    .catch(function(error) {
                      console.log(error);
                    });



                } catch {
                    console.log("Tronweb not defined");
                    istronWeb = false;
                    Swal.close();
                }
            } else {
                Swal.close();
                alert("Contract address not defined");
            }
        }, 1000);
    }//window onload

    input_amount = document.getElementById('amount');
    submit_stake = document.getElementById('stake');

    submit_stake.onclick = async function () {
        var limit = totalStacke + parseFloat(input_amount.value);

        console.log('in button 1 on click '+ limit +' '+ maxStacke)
        if (input_amount.value == 0) {
            Swal.fire({
                icon: 'info',
                title: 'Missing Something ?',
                text: 'Please Enter Some Value'
            });
        } else if (input_amount.value < 10) {
            Swal.fire({
                icon: 'warning',
                title: 'Please Enter more than 10 MIRA',
            });

        } else if (limit > maxStacke) {
            Swal.fire({
                icon: 'warning',
                title: 'Maximum Stake ' + addCommas(restStacke) + ' MIRA',
            });
        } else if (input_amount.value > saldoMira) {
            Swal.fire({
                icon: 'warning',
                title: 'Your balance not enought',
            });
        } else {
            Swal.fire({
                title: 'MIRA Stake',
                text: `You will be stake ${input_amount.value} MIRA`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Stake Now !'
            }).then(async (result) => {
                if (result.value) {

                    Swal.fire({
                        title: "Loading...",
                        text: "Confirming transaction on tronscan..",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // approve and then invest

                    try {
                        var amount = (input_amount.value) * (10 ** 18);
                        
                        // console.log(amount.toString);
                        await TokenContract.methods.transfer(contractAddress, amount.toString()).send().then((result) => {
                            if (result) {
                                console.log("hasil",result)

                                let formData = new FormData();

                                formData.append('address', currentaddress);
                                formData.append('trx_id', result);
                                formData.append('staking_id', stack_id);
                                formData.append('amount', amount.toString());


                                fetch('api/send/stack',{
                                            method : 'POST',
                                            body : formData         
                                }).then(res => res.text())
                                .then(teks => console.log(teks))
                                .catch(err => console.log(err));

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success !',
                                    text: 'Your transaction is Confirmed on Tronscan',
                                }).then(() => {
                                    $('#tes').modal('hide');
                                    // $.post("api/send/stack",
                                    // {
                                    //   address: currentaddress,
                                    //   trx_id: resp,
                                    //   staking_id: stack_id,
                                    //   amount: amount.toString()

                                    // },
                                    // function(data,status){
                                    //   console.log(data, status)
                                        
                                    // });
                                })
                                
                                console.log('Transaction of ' + input_amount.value + ' is confirmed');
                                
                            }

                        }).catch((err) => {
                            if (err) {
                                console.log(err);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'error',
                                    text: `${err}`
                                });
                            }
                        })


                    } catch (err) {
                        console.log("err : ", err);
                        swal.close();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Error?',
                            text: `${err}`
                        });
                    }


                    


                    // try {
                    //     console.log("input acalue", input_amount.value, input_amount.value * (10 ** 6));
                    //     await myContract.invest_panel1(parseFloat(input_amount.value) * (10 ** 6)).send({
                    //         shouldPollResponse: true,
                    //         callValue: 0
                    //     }).then((result) => {
                    //         if (result) {
                    //             console.log('Transaction of ' + input_amount.value + ' is confirmed');
                    //             Swal.fire({
                    //                 icon: 'success',
                    //                 title: 'Success !',
                    //                 text: 'Your transaction is Confirmed on Tronscan',
                    //             }).then(() => {
                    //                 // location.reload();
                    //             })
                    //         }
                    //         display_all();

                    //     }).catch((err) => {
                    //         if (err) {
                    //             console.log(err);
                    //             Swal.fire({
                    //                 icon: 'error',
                    //                 title: 'error',
                    //                 text: `${err}`
                    //             });
                    //         }
                    //     })

                    // } catch (err) {
                    //     console.log("err : ", err);
                    //     Swal.fire({
                    //         icon: 'warning',
                    //         title: 'Error?',
                    //         text: `${err}`
                    //     });
                    // }

                }
            })
        }
    }

    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    $('.buttonStack').attr('disabled','disabled');
    $(".buttonStack").on("click", function(){
        stack_id = $(this).attr("data-stack");
        // document.getElementById("stack_id").value = dataId;
    });

    
    // function gettronweb(){

        
    //     if(window.tronWeb && window.tronWeb.defaultAddress.base58){
    //         console.log("Yes, catch it:",window.tronWeb.defaultAddress.base58)
    //         console.log(window.tronWeb.trx.getBalance(tronWeb.defaultAddress.base58))


    //         // fetch("https://apilist.tronscan.org/api/account?address="+window.tronWeb.defaultAddress.base58)
    //         // .then(function(data) {
    //         //     console.log(data)
    //         // })
    //         // .catch(function(error) {
    //         //     console.log(error)
    //         // });

    //         fetch("https://apilist.tronscan.org/api/account?address="+window.tronWeb.defaultAddress.base58)
    //         .then((resp) => resp.json())
    //         .then(function(data) {
    //           console.log(data)
    //           data.tokens.forEach(myFunction);
    //           saldo = 0;

    //           function myFunction(item, saldo) {
    //               // console.log(item.tokenId)
                  
    //               if (item.tokenId == "TMRHsxGMe5WDxjCKPibfyDyStrouQZ5djv") {
                    
    //                 saldo = item.balance / 1000000000000000000;
    //                 // console.log("tes", saldo)
    //                 document.getElementById("balances").innerHTML = saldo + " MIRA" ;
    //                 document.getElementById("address").innerHTML = window.tronWeb.defaultAddress.base58;
    //                 document.getElementById("mira_balance").innerHTML = saldo + " MIRA" ;
    //                 document.getElementById("trx_balance").innerHTML = (data.balance / 1000000) + " TRX" ;
    //               }else{
                    
    //               }               
                  
    //           }

              
              
              
            
    //         })
    //         .catch(function(error) {
    //           console.log(error);
    //         });

    //     }
    // }

    // function send(){
    //     // tokenid = "TMRHsxGMe5WDxjCKPibfyDyStrouQZ5djv";
    //     // dat = tronWeb.trx.sendToken("TQkFFxaAor8Aft4SgdoFGbARLEtp5NT5fB",10, 1000001);
    //     // console.log(dat)
    //     // const TronWeb = require('tronweb')

    //     // console.log("private", window.tronWeb.defaultPrivateKey)
        

    //     var amount = document.getElementById("amount").value * 1000000000000000000;
    //     var key = document.getElementById("privateKey").value;
    //     var stack_id = document.getElementById("stack_id").value;

    //     console.log("kali", stack_id)
    //     const HttpProvider = TronWeb.providers.HttpProvider;
    //     const fullNode = new HttpProvider("https://api.trongrid.io");
    //     // const fullNode = new HttpProvider("http://192.168.1.162:8090");
    //     const solidityNode = new HttpProvider("https://api.trongrid.io");
    //     const eventServer = new HttpProvider("https://api.trongrid.io");
    //     const privateKey = key;
    //     const tronWeb = new TronWeb(fullNode, solidityNode, eventServer, privateKey);


    //     const CONTRACT = "TMRHsxGMe5WDxjCKPibfyDyStrouQZ5djv";

    //     const ACCOUNT = window.tronWeb.defaultAddress.base58;

    //     // tot = 999 * 1000000000000000000;

    //     // console.log("to", tot);

    //     async function main() {
    //         const {
    //             abi
    //         } = await tronWeb.trx.getContract(CONTRACT);
    //         // console.log(JSON.stringify(abi));

    //         const contract = tronWeb.contract(abi.entrys, CONTRACT);

    //         const balance = await contract.methods.balanceOf(ACCOUNT).call();
    //         console.log("balance:", balance.toString());

    //         if ((amount.toString() / 1000000000000000000) >= 10) {

    //             const resp = await contract.methods.transfer("TNu6z2N3YVsxJ7BGACddeYh5tVwZwYoxn4", amount.toString()).send();
    //             console.log("transfer:", resp);


    //             $.post("api/send/stack",
    //             {
    //               address: window.tronWeb.defaultAddress.base58,
    //               trx_id: resp,
    //               staking_id: stack_id,
    //               amount: amount.toString()

    //             },
    //             function(data,status){
    //               console.log(data, status)
    //               alert('success');
    //             });

    //         }else{
    //             alert('minimum deposit 10');
    //         }
            

    //     }

    //     main().then(() => {
    //             console.log("ok");
    //         })
    //         .catch((err) => {
    //             console.log("error:", err);
    //         });
    // }
</script>
@endsection