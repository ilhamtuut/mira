<?php

namespace App\Http\Controllers;

use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ixudra\Curl\Facades\Curl;
use IEXBase\TronAPI\Tron;

class WalletController extends Controller
{

	public function index(Request $request)
	{
		$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
		$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
		$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

		try {
		    $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
		} catch (\IEXBase\TronAPI\Exception\TronException $e) {
		    exit($e->getMessage());
		}

		$wallet = Auth::user()->wallet;

		
		

		if (!$wallet) {
			$wallet_address = null;

			$qrCode = null;
			$saldo = 0;
		}else{
			// wallet/unfreezebalance
			// dd($wallet->address);
			$tron->setAddress('TMLvUopBqMyTG9BCggNmtExJ2qWeVKyW6T');
			$response = Curl::to('https://apilist.tronscan.org/api/account?address='.$wallet->address)
		        ->asJson()
		        ->get();
		        // dd(count($response->tokens));

	       	if (count($response->tokens) > 1) {
	       	
		     $saldo = $response->tokens[1]->balance / 1000000000000000000;
		    }else{
		    	$saldo = 0;
		    }
			$wallet_address = $wallet->address;
			$renderer = new \BaconQrCode\Renderer\Image\Png();
	        $renderer->setWidth(200);
	        $renderer->setHeight(200);
	        $encoding = 'utf-8';
	        $bacon = new \BaconQrCode\Writer($renderer);
	        $data = $bacon->writeString($wallet_address, $encoding);
	        $qrCode = 'data:image/png;base64,'.base64_encode($data);


		}

		
		
		return view('backend.wallet.index', compact('wallet','saldo','wallet_address','qrCode'));
	}

	public function createAddress(){
		$password = $this->ascii2hex('rahasia');
		// dd($password);
		// $response = Curl::to('3.225.171.164:8090/wallet/generateaddress')
  //       ->asJson()
  //       ->get();
		$response = Curl::to('3.225.171.164:8090/wallet/createaddress')
        ->withData( array( 'value' => str_replace(' ', '', $password) ) )
        ->asJson()
        ->post();

        dd(json_encode($response));

        $address = new Wallet;
        $address->fill([
        	'user_id' => Auth::User()->id,
	        'currency' => 'MIRA',
	    	'address' => $response->address,
	        'data' => json_encode($response),
	    	'status' => 0
        ]);

        $address->save();

        return redirect()->back();
		
	}

	function ascii2hex($ascii) {
	  $hex = '';
	  for ($i = 0; $i < strlen($ascii); $i++) {
	    $byte = strtoupper(dechex(ord($ascii{$i})));
	    $byte = str_repeat('0', 2 - strlen($byte)).$byte;
	    $hex.=$byte." ";
	  }
	  return $hex;
	}


	public function sendTransaksi(){
		$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
		$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
		$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

		try {
		    $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
		} catch (\IEXBase\TronAPI\Exception\TronException $e) {
		    exit($e->getMessage());
		}
		// $wallet = Auth::user()->wallet;
		// dd(json_decode($wallet->data));
		$tron->setAddress("TUcwuYpgzhH9ZJpApyiDKbKWckjpJKUSip");
		$tron->setPrivateKey("a6487deff0a48d21dcfc0593ffa92f203eda42119ce87a0c988997e66443024c");

		try {
		    $transfer = $tron->send( 'TQkFFxaAor8Aft4SgdoFGbARLEtp5NT5fB', 1000, 'TMRHsxGMe5WDxjCKPibfyDyStrouQZ5djv');
		} catch (\IEXBase\TronAPI\Exception\TronException $e) {
		    die($e->getMessage());
		}

		var_dump($transfer);
	}


	
}
