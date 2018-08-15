<?php

namespace App\Http\Controllers;

class ContractsController extends Controller
{
    protected $contract_address = "";
    protected $owner_address = "";

    public function __construct()
    {
        $this->contract_address = config('ethereum.contract.lottery.contract_addr');
        $this->owner_address = config('ethereum.contract.lottery.owner_addr');
    }
}
