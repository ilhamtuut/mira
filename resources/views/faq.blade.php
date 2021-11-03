
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="{{asset('images/logo/favicon.png')}}" />
    <!-- Fonts -->
    <link href="{{asset('dist/antler/fonts/cloudicon/cloudicon.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{asset('dist/antler/fonts/fontawesome/css/all.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{asset('dist/antler/fonts/opensans/opensans.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <!-- CSS styles -->
    <link href="{{asset('dist/antler/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/antler/css/owl.carousel.min.css')}}" rel="stylesheet" media="all" onload="if(media!='all')media='all'">
    <link href="{{asset('dist/antler/css/filter.css')}}" rel="stylesheet" media="all" onload="if(media!='all')media='all'">
    <link href="{{asset('dist/antler/css/style.min.css')}}" rel="stylesheet">
    <!-- Custom color styles -->
    <link href="{{asset('dist/antler/css/colors/pink.css')}}" rel="stylesheet" title="pink" media="none" onload="if(media!='all')media='all'"/>
    <link href="{{asset('dist/antler/css/colors/blue.css')}}" rel="stylesheet" title="blue" media="none" onload="if(media!='all')media='all'"/>
    <link href="{{asset('dist/antler/css/colors/green.css')}}" rel="stylesheet" title="green" media="none" onload="if(media!='all')media='all'"/>  
  </head>
  <body>
  <!-- ***** LOADING PAGE ****** -->
  <div id="spinner-area">
    <div class="spinner">
      <div class="double-bounce1"></div>
      <div class="double-bounce2"></div>
    </div>
  </div>
  <!-- ***** UPLOADED MENU FROM HEADER.HTML ***** -->
  <header>
    <!-- ***** NAV MENU ****** -->
    <div class="menu-wrap">
      <div class="nav-menu">
        <div class="container">
          <div class="row">
            <div class="col-2 col-md-2">
              <a href="{{url('/')}}">
                  <img alt="Logo" src="{{asset('images/logo/mira.png')}}" height="36px" />
              </a>
            </div>
            <nav id="menu" class="col-10 col-md-10">
              <div class="navigation float-right">
                <button class="menu-toggle">
                <span class="icon"></span>
                <span class="icon"></span>
                <span class="icon"></span>
                </button>
                <ul class="main-menu nav navbar-nav navbar-right">
                  <li class="menu-item menu-item-has-children">
                    <a href="{{url('/')}}#home">Home</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a href="{{url('/')}}#about">About Mira</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a href="{{url('/')}}#roadmap">Roadmap</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a href="{{url('/')}}#news">News</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a data-toggle="modal" data-target="#contactUs">Contact Us</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a href="{{route('faq')}}">FAQ</a>
                  </li>
                  <li class="menu-item">
                    {{-- <a class="pr-0 mr-0" href="{{asset('file/whitepaper_v3.pdf')}}" download> <div class="btn btn-default-yellow-fill question"><span>Whitepaper</span> <i class="fas fa-download pl-1"></i> </div></a> --}}
                    <a class="pr-0 mr-0" href="{{route('earn.index')}}"> <div class="btn btn-default-yellow-fill question"><span>DeFi</span> <i class="fas fa-user pl-1"></i> </div></a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ***** NAV MENU MOBILE ****** -->
    <div id="nav-menu-mobile" class="menu-wrap mobile">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <a href="{{url('/')}}"><img class="svg logo-menu" src="{{asset('images/logo/mira.png')}}" alt="logo Antler"></a>
          </div>
          <div class="col-6">
            <nav class="nav-menu">
              <button id="nav-toggle" class="menu-toggle">
                <span class="icon"></span>
                <span class="icon"></span>
                <span class="icon"></span>
              </button>
              <div class="main-menu">
                <div class="menu-item">
                  <a class="click-action" href="{{url('/')}}#home">Home</a>
                </div>
                <div class="menu-item">
                  <a class="click-action" href="{{url('/')}}#about">Abouts Mira</a>
                </div>
                <div class="menu-item">
                  <a class="click-action" href="{{url('/')}}#roadmap">Roadmap</a>
                </div>
                <div class="menu-item">
                  <a class="click-action" href="{{url('/')}}#news">News</a>
                </div>
                <div class="menu-item menu-last">
                  <a class="click-action" data-toggle="modal" data-target="#contactUs">Contact Us</a>
                </div>
                <div class="menu-item">
                  <a class="click-action" href="{{route('faq')}}">FAQ</a>
                </div>
                <div>
                  {{-- <a href="{{asset('file/whitepaper_v3.pdf')}}" download><div class="btn btn-default-yellow-fill mt-3">Whitepaper <i class="fas fa-download pl-1"></i></div></a> --}}
                  <a href="{{route('earn.index')}}"><div class="btn btn-default-yellow-fill mt-3">DeFi <i class="fas fa-user pl-1"></i></div></a>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** BANNER ***** -->
  <div class="top-header">
    <div class="total-grad-inverse"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="heading mb-0">Frequently asked questions</div>
          </div>
        </div>
        {{-- <div class="col-lg-6">
          <div class="cd-filter-block checkbox-group mb-0">
            <label><a href=""><i class="fas fa-search"></i></a></label>
            <input type="text" class="input" placeholder="Search.."/>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
  <!-- ***** KNOWLEDGEBASE ***** -->
  <section id="gotop" class="blog motpath pb-80">
    <div class="container">
      <div class="row"><div class="col-sm-12 mt-5">
          <div class="sec-main sec-bg1">
            <h3>About Mira.id</h3>
            <div class="accordion faq">
              <div class="panel-wrap">
                <div class="panel-title">
                  <span>Before the appearance of cryptocurrency, similar systems already existed. Why it is better?</span>
                  <div class="float-right">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus c-pink"></i>
                  </div>
                </div>
                <div class="panel-collapse">
                  <div class="wrapper-collapse">
                    <div class="info">
                      <ul class="list">
                        <li>
                          <p>Yes, indeed, such systems existed both 5 years ago and before the advent of the Internet, and they WORK.</p>However, it had several major problems:<br><br>

                          1) Different payment systems constantly blocked the wallets of the participants.<br>
                          2) Manual confirmation of transfers with all the ensuing consequences in the form of the human factor and constant proceedings, who transferred funds to whom and who did not.<br>
                          3) There were restrictions. A person once created a structure and once received money, albeit relatively large. And then all the turns went deep into the structure, and the participant did not get any more.<br>
                          4) Closing or hacking a site meant a system crash, and hacking sites sometimes happened.<br><br>

                          <p>Cryptocurrency and Tron solves ALL these problems:</p>
                          1) Wallet can not be blocked even in theory. The reverse side of the coin: in no case do not lose control over your wallet. It will be impossible to replace your wallet with others.<br>
                          2) Public transactions and instant automatic confirmations. The human factor is excluded completely.<br>
                          3) Closing or hacking the site will in no way affect the operation of the system, since the MIRA smart contract is loaded into the main Tron network, and cannot be deleted by anyone including its developers.<br><br>
                          This means that for the first time in the history of mankind (no matter how loud it sounds), there are real 100% guarantees that the account will not be hacked, and even theoretically when the site is closed, the Smart Contract and the System itself will continue to exist in any case. <br>Moreover, any programmer in the world will be able to make a NEW site based on the same smart contract, and any leader of the structure can make a site structure in the same smart contract. Therefore, the system is protected from any actions of the project administration.
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-wrap">
                <div class="panel-title">
                  <span>How to make money here?</span>
                  <div class="float-right">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus c-pink"></i>
                  </div>
                </div>
                <div class="panel-collapse">
                  <div class="wrapper-collapse">
                    <div class="info">
                      <ul class="list">
                        <li>
                          <p>The quick start guide is on the <a class="c-pink" href="{{route('earn.index')}}">Main page</a> at the section of "How it works".</p>
                          <p></p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-wrap">
                <div class="panel-title">
                  <span>What are the guarantees that you will not close or block my account?</span>
                  <div class="float-right">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus c-pink"></i>
                  </div>
                </div>
                <div class="panel-collapse">
                  <div class="wrapper-collapse">
                    <div class="info">
                      <ul class="list">
                        <li>
                          <p>This is one of the most important questions!</p>
                          <p>For the first time in the history of mankind, there is not 99%, but 100% guarantee that NO ONE CAN BLOCK YOUR wallet or your account, even the administration of the project (this is a feature of cryptocurrency).</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 mt-5">
          <div class="sec-main sec-bg1">
            <h3>Main question</h3>
            <div class="accordion faq">
              <div class="panel-wrap">
                <div class="panel-title">
                  <span>What is Tron?</span>
                  <div class="float-right">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus c-pink"></i>
                  </div>
                </div>
                <div class="panel-collapse">
                  <div class="wrapper-collapse">
                    <div class="info">
                      <ul class="list">
                        <li>
                          <p>Tron is one of the most popular cryptocurrencies that allows you to create functional smart contracts based on the blockchain.</p>
                          <p>
                          Features of the project on the tron smart contract:<br>
                          1. Secure tron wallet. It can't be blocked. It is decentralized.<br>
                          2. The MIRA smart contract code is uploaded to The main tron network and is an integral part of the tron cryptocurrency. This code cannot be deleted or modified. Your account cannot be hacked or blocked.<br>
                          3. The code is completely in the public domain. Any programmer in the world can verify the validity of his algorithm.<br>
                          4. All transfers are public and confirmed automatically. Funds are immediately credited to your wallet, so you don't need to confirm or order payments. The human factor is completely excluded.<br>
                          5. Even if the MIRA site ceases to exist and the administration disappears, the MIRA smart contract in the Tron network will continue to exist, which means that the System itself will continue to work. Even in this case, all accounts and payouts will continue to work properly. Any programmer in the world can make a website that mirrors the same smart contract for the entire system or a specific group.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-wrap">
                <div class="panel-title">
                  <span>How do I register a tron wallet and start using it?</span>
                  <div class="float-right">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus c-pink"></i>
                  </div>
                </div>
                <div class="panel-collapse">
                  <div class="wrapper-collapse">
                    <div class="info">
                      <ul class="list">
                        <li>
                          The tron wallet is primarily two things:<br>
                          1. Your <b>public key</b> - this is the tron wallet number. You don't have to hide it.<br>
                          2. Your <b>private key</b> - analogous to the usual password. It is your personal account. Losing your private key means losing control of your wallet. If someone gets hold of Your private key, they get Hold of your money, and You can't change it to another private key.<br>
                          <span class="c-pink">We never ask you to enter private keys.</span><br><br>
                          Depending on your device, There are tron wallets for the browser on your computer and for your mobile device. Information about this is below. <br><br>
                          <div class="row">
                            <div class="col-lg-6 text-center">
                              <h4>TronLink</h4>
                              <img class="mb-3" width="200px" src="https://tron.smartbitpoint.com/assets/img/new/i_tronlink.svg">
                              <p><i class="fa fa-desktop"></i> browser plug-in</p>
                              <p><i class="fa fa-check-circle text-success"></i> safely</p>
                              {{-- <p>Learn more in <a class="c-pink" href="https://tron.smartbitpoint.com/page/faqtronlink">TronLink FAQ</a></p> --}}
                            </div>
                          </div>
                          <span class="c-pink">Important!</span> If you have registered a Tron wallet in one of the services, you can always continue using the other. For example, if you registered Tron via TronLink, you can continue using The same wallet via TronWallet, and Vice versa. For integration (import), you only need a private key.
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-wrap">
                <div class="panel-title">
                  <span>How do I Deposit funds to my Tron wallet?</span>
                  <div class="float-right">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus c-pink"></i>
                  </div>
                </div>
                <div class="panel-collapse">
                  <div class="wrapper-collapse">
                    <div class="info">
                      <ul class="list">
                        <li>
                          1. Go to the exchange <br>
                          2. Select the currency that you are ready to exchange for Tron.<br>
                          3. Select the Tron currency to receive.<br>
                          4. Choose an exchange with a favorable exchange rate. Pay attention to the reviews of exchangers.<br>
                          5. Go to the website of the selected exchanger and follow the simple instructions.<br>
                          6. Make sure that your Tron wallet has received funds.
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-wrap">
                <div class="panel-title">
                  <span>How can I withdraw funds from my Tron wallet to other payment systems?</span>
                  <div class="float-right">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus c-pink"></i>
                  </div>
                </div>
                <div class="panel-collapse">
                  <div class="wrapper-collapse">
                    <div class="info">
                      <ul class="list">
                        <li>
                          Withdrawal of funds from Tron is carried out in the same way as its replenishment, only the reverse direction of exchange is selected.<br>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-wrap">
                <div class="panel-title">
                  <span>What is "Energy", "Fee Limit" (SUN) and "Freeze"?</span>
                  <div class="float-right">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus c-pink"></i>
                  </div>
                </div>
                <div class="panel-collapse">
                  <div class="wrapper-collapse">
                    <div class="info">
                      <ul class="list">
                        <li>
                          <p><b>Energy</b> — resources consumed during the time period of contract execution.</p>
                          <p><b>Fee Limit (SUN)</b> — the maximum allowable cost of TRX consumed by the user when calling or creating a smart contract, including resources received from freezing TRX.</p>
                          <p>If the account does not have enough TRX to complete the transaction, the transaction will be canceled. TRX will be refunded back minus the Commission.</p>
                          <p><b>Freeze</b> — If the account does not have enough TRX to complete the transaction, the transaction will be canceled. TRX will be refunded back minus the Commission.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-wrap">
                <div class="panel-title">
                  <span>Why is the transaction waiting so long?</span>
                  <div class="float-right">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus c-pink"></i>
                  </div>
                </div>
                <div class="panel-collapse">
                  <div class="wrapper-collapse">
                    <div class="info">
                      <ul class="list">
                        <li>
                          <p>The main reason is the high load on the Tron network. It's worth waiting a bit.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-wrap">
                <div class="panel-title">
                  <span>Why was the transaction rejected?</span>
                  <div class="float-right">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus c-pink"></i>
                  </div>
                </div>
                <div class="panel-collapse">
                  <div class="wrapper-collapse">
                    <div class="info">
                      <ul class="list">
                        <li>
                          <p>The main reason is that there is not enough TRX on the balance to make a transaction. Make sure that you have enough TRX on your balance, taking into account the Commission.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-wrap">
                <div class="panel-title">
                  <span>Installing TronLink and creating a tron wallet</span>
                  <div class="float-right">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus c-pink"></i>
                  </div>
                </div>
                <div class="panel-collapse">
                  <div class="wrapper-collapse">
                    <div class="info">
                      <ul class="list">
                        <li>
                          Step 1. Visit the site <a class="c-pink" href="https://www.tronlink.org/">www.tronlink.org</a>. <br><br>

                          Step 2. Click <a class="c-pink" href="https://chrome.google.com/webstore/detail/tronlink/ibnejdfjmmkpcnlpebklmnkoeoihofec">"Chrome Extension"</a> and install the plugin.<br><br>

                          Step 3. After installation, you will see the TronLink logo to the right of the address bar in the browser. Click on it. A pop-up window will appear.<br><br>

                          Step 4. Create a password to log in the extension. Enter your password twice. Make sure to write down your password so that you don't forget it. Click "Continue".<br><br>

                          Step 5. You will be offered three options to continue. Select the first option "Create".<br><br>

                          Step 6. A mnemonic phrase will appear. Make sure to write down the phrase from left to right, from top to bottom, so that you don't forget. This phrase gives you full access to your Tron wallet. Only you should know the phrase.<br><br>

                          Step 7. To check, make a recorded phrase. Click "Confirm".<br><br>

                          Step 8. Your wallet number and its balance will appear. In the future, when working in the system, your wallet balance will be replenished in TRX tokens. Therefore, only watch this token.<br><br>

                          Step 9. Click the Three stripes icon to the right of your wallet. A menu appears. In it, select "Export Account". Enter your TronLink password and click "Confirm". Select "Private key". Your private key will appear on the screen. Save it and never lose it.
                          We remind you that losing your private key means losing control of your wallet forever. It is impossible to restore it or change it to another one, even theoretically.<br><br>

                          Step 10. Once you are sure That your private key is securely stored, you can exit their menu. From now on, you can use your wallet.<br>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal fade" id="contactUs" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="exampleModalScrollableTitle">Contact Us</h5>
        </div>
        <form action="{{route('send.mail')}}" method="POST">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                <input class="form-control" id="email" name="email" type="text" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input class="form-control" id="subject" name="subject" type="text" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea class="form-control" type="text" id="message" name="message" placeholder="Message"></textarea>
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-xs btn-default-fill mr-2" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-xs btn-default-purple-fill" value="submit"><i class="fa fa-envelope"></i> Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- ***** UPLOADED FOOTER FROM FOOTER.HTML ***** -->
  <footer class="footer" id="contact">
    <img class="logo-bg logo-footer" src="{{asset('dist/antler/symbol.svg')}}" alt="logo">
    <div class="container">
      <div class="footer-top">
        <div class="row">
          <div class="col-md-12 text-center">
            <a><img class="svg logo-footer" src="{{asset('images/logo/mira.png')}}" alt="logo"></a>
            <div class="copyrigh">© {{date('Y')}} {{ config('app.name') }} - All rights reserved</div>
            <div class="soc-icons">
              <a href="https://facebook.com/Miracoin.Official"><i class="fab fa-facebook-f"></i></a>
              <a href="https://www.youtube.com/channel/UCbPE9c1ALCU4ojDRqRi9F8Q"><i class="fab fa-youtube"></i></a>
              <a href="https://twitter.com/mira_Coin"><i class="fab fa-twitter"></i></a>
              <a href="https://www.instagram.com/mira_coin"><i class="fab fa-instagram"></i></a>
              <a href="https://t.me/mira_defi"><i class="fab fa-telegram"></i></a>
              <a href="https://linkedin.com/in/mira-coin-4679a61b5"><i class="fab fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ***** BUTTON GO TOP ***** -->
  <a href="#0" class="cd-top"> <i class="fas fa-angle-up"></i> </a>
  <!-- Javascript -->
  <script src="{{asset('dist/antler/js/jquery.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/popper.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/bootstrap.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/jquery.circliful.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/jquery.countdown.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/jquery.magnific-popup.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/slick.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/owl.carousel.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/isotope.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/jquery.scrollme.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/swiper.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/lazysizes.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/scripts.min.js')}}"></script>
</body>
</html>