<?php

namespace App\Http\Controllers;

use App\Repositories\EthereumRepository as Ethereum;

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
            'msg' => '',
        ];

        $result['msg'] = Ethereum::transaction(

            // 莊家錢包位址
            $this->owner_address,

            // 被呼叫的合約或錢包位址
            $this->contract_address,

            // 下注金額 (單位:Wei)
            0,

            // 呼叫合約方法名稱
            'pickWinner',

            // 呼叫合約方法參數 [型態 => 值, 型態 => 值]
            []
        );

        $result['status'] = true;

        return response()->json($result);
    }
}
