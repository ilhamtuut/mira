<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IEXBase\TronAPI\Tron;
use IEXBase\TronAPI\Exception\TronException;
use IEXBase\TronAPI\Provider\HttpProvider;

class TronController extends Controller
{
    private $api;

    public function __construct()
    {
        $fullNode = new HttpProvider('https://api.trongrid.io');
        $solidityNode = new HttpProvider('https://api.trongrid.io');
        $eventServer = new HttpProvider('https://api.trongrid.io');

        try {
            $this->api = new Tron($fullNode, $solidityNode, $eventServer);
        } catch (TronException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function getWalletBalance()
    {
    	$amount = (10 * (10*18));
    	// string $to, int $amount, string $tokenID, string $from = null
        $balance = $this->api->sendToken("TCW4nxk6MRZE6jvB1XJuncnsxaktFwTUas", $amount, 'TJ6CjSftX7ifUoBtK2VcvAKzcut9cnfrhq', 'TQkFFxaAor8Aft4SgdoFGbARLEtp5NT5fB');

        return response()->json([
            'balance' => $balance,
        ]);
    }
}


