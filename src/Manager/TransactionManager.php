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
     * @return array
     */
    public function depositMoney($amount, $number)
    {
        try {
            $response = $this->make($amount, $number, 'Depot');
            return $response;
        } catch (\Exception $e) {

        }
    }

    /**
     * Withdraw Request transaction
     *
     * @param string $amount
     * @param string $number
     * @return array
     */
    public function withdrawMoney($amount, $number)
    {
        try {
            $response = $this->make($amount, $number, 'Retrait');
            return $response;
        } catch (\Exception $e) {
            
        }
    }

    /**
     * Withdraw Money validation
     *
     * @param string $code
     * @return array
     */
    public function withdrawMoneyValidation($code)
    {
        $payload = ['tokenP' => $this->auth->getToken(), 'codeTransaction' => $code];

        return CurlHttp::request('https://www.net-collect.com/Client/Debiter', $payload);
    }

    /**
     * Make transaction
     *
     * @param string $amount
     * @param string $number
     * @param string $type
     * @return array
     */
    private function make($amount, $number, $type)
    {
        $payload = [
            'TokenP' => $this->auth->getToken(),
            'typeOperation' => $type,
            'montant' => $amount,
            'numclient' => $number,
        ];

        $response = CurlHttp::request('https://www.net-collect.com/Demande/Operation', $payload);

        return $response;
    }
}