<?php

namespace CNIT\NetCollect\Manager;

use CNIT\NetCollect\CurlHttp;
use CNIT\NetCollect\Exception\DepositException;
use CNIT\NetCollect\Exception\NetCollectContentExpiredOrDisabled;
use CNIT\NetCollect\Exception\NetCollectContentNotFound;
use CNIT\NetCollect\Exception\WithdrawException;

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
            if (!$e instanceof NetCollectContentNotFound && !$e instanceof NetCollectContentExpiredOrDisabled) {
                throw new DepositException($e->getMessage(), $e->getCode());
            }
            throw $e;
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
            if (!$e instanceof NetCollectContentNotFound && !$e instanceof NetCollectContentExpiredOrDisabled) {
                throw new WithdrawException($e->getMessage(), $e->getCode());
            }
            throw $e;
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

        try {
            return CurlHttp::request('https://www.net-collect.com/Client/Debiter', $payload);
        } catch (\Exception $e) {

        }
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