<?php

namespace CNIT\NetCollect\Manager;

use CNIT\NetCollect\CurlHttp;

class TaxPayerManager extends BaseManager
{
    /**
     * Search TaxPayerManager
     *
     * @param string $type
     * @param string $search
     * @return array
     */
    public function search($type, $search)
    {
        $search = addslashes($search);

        $url = sprintf(
            '/netCollect/Contribuable/%s/2/%s/%s',
            $type,
            $search,
            $this->auth->getToken()
        );

        $response = CurlHttp::request($url);

        return $response;
    }

    /**
     * Get list of tax payer municipalities
     *
     * @param int $taxpayer_id
     * @return array
     */
    public function municipalities($taxpayer_id)
    {
        $url = sprintf(
            '/netCollect/%s/%s',
            $taxpayer_id,
            $this->auth->getToken()
        );

        $response = CurlHttp::request($url);

        return $response;
    }

    /**
     * Get list of tax payer activities
     *
     * @param string $taxpayer_id
     * @param string $municipality_id
     * @return array
     */
    public function activities($taxpayer_id, $municipality_id)
    {
        $url = sprintf(
            '/netCollect/%s/%s/%s',
            $taxpayer_id,
            $municipality_id,
            $this->auth->getToken()
        );

        $response = CurlHttp::request($url);

        return $response;
    }

    /**
     * Get tax list for tax payer by activity
     *
     * @param string $taxpayer_id
     * @param string $activity_id
     * @return array
     */
    public function tax($taxpayer_id, $activity_id)
    {
        $url = sprintf(
            '/netCollect/Taxes/%s/%s/%s',
            $taxpayer_id,
            $activity_id,
            $this->auth->getToken()
        );

        $response = CurlHttp::request($url);

        return $response;
    }

    /**
     * Make tax payment
     * 
     * @param string $tax_id
     * @param string $number
     * @return array
     */
    public function payTax($tax_id, $number)
    {
        $url = sprintf(
            '/netCollect/paiementTaxe/%s/%s/%s',
            $tax_id,
            $number,
            $this->auth->getToken()
        );

        $response = CurlHttp::request($url);

        return $response;
    }
}