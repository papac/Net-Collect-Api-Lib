<?php

namespace CNIT\NetCollect\Manager;

use CNIT\NetCollect\CurlHttp;

class TransactionManager extends BaseManager
{
    /**
     * Deposit Request transaction
     *
     * @param string $amount
     * @param string $number
     * @return void
     */
    public function depositMoney($amount, $number)
    {
        $this->make($amount, $number, 'Depot');
    }

    /**
     * Withdraw Request transaction
     *
     * @param string $amount
     * @param string $number
     * @return void
     */
    public function withdrawMoney($amount, $number)
    {
        $this->make($amount, $number, 'Retrait');
    }

    /**
     * Make transaction
     *
     * @param string $amount
     * @param string $number
     * @param string $type
     * @return void
     */
    public function make($amount, $number, $type)
    {
        $payload = [
            'TokenP' => $this->auth->getToken(),
            'typeOperation' => $type,
            'montant' => $amount,
            'numclient' => $number,
        ];

        $response = CurlHttp::request('https://www.net-collect.com/Demande/Operation', $payload);
    }
}