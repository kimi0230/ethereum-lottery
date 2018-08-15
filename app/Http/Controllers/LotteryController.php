<?php

namespace App\Http\Controllers;

use App\Repositories\EthereumRepository as Ethereum;
use Auth;

/**
 * 樂透遊戲範例
 */

class LotteryController extends ContractsController
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');

        // 莊家錢包位址
        // $this->owner_address = '0x9EeaC2533E48d68725974beC1f8A79cd03A87dAD';

        // 被呼叫的合約或錢包位址
        // $this->contract_address = '0x0a977fa934740179ffdec52ff4ae9cf999c1c29e';
    }

    // 開獎
    public function pick_winner()
    {
        $result = [
            'status' => false,
            'msg' => 'no authority or no bonus',
        ];
        $total_balance = Ethereum::from_wei(base_convert(Ethereum::eth_getBalance($this->contract_address), 16, 10));

        if (Auth::user()->address == $this->owner_address && $total_balance > 0) {

            try {
                $result['msg'] = Ethereum::transaction(

                    // 莊家錢包位址
                    Auth::user()->address,

                    // 被呼叫的合約或錢包位址
                    $this->contract_address,

                    // 下注金額 (單位:Wei)
                    0,

                    // 呼叫合約方法名稱
                    'pickWinner',

                    // 呼叫合約方法參數 [型態 => 值, 型態 => 值]
                    []
                );
            } catch (Exception $e) {
                $result['status'] = false;
            }

            $result['status'] = true;
        }

        return response()->json($result);
    }
}
