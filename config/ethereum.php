<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 15/11/2017
 * Time: 1:07 PM
 */
return [
    'host' => env('ETH_HOST', 'http://localhost'),
    'port' => env('ETH_PORT', '8545'),
    'contract' => [
        'lottery' => [
            'contract_addr' => env('LOTTERY_CONTRACT_ADDR', '0x0a977fa934740179ffdec52ff4ae9cf999c1c29e'),
            'owner_addr' => env('LOTTERY_OWNER_ADDR', '0x9EeaC2533E48d68725974beC1f8A79cd03A87dAD'),
        ],
    ],
];
