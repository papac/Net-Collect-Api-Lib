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
            'https://www.net-collect.com/netCollect/Contribuable/%s/2/%s/%s',
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
        $taxpayer_id = (int) $taxpayer_id;

        $url = sprintf(
            'https://www.net-collect.com/netCollect/%i/%s',
            $taxpayer_id,
            $this->auth->getToken()
        );

        $response = CurlHttp::request($url);

        return $response;
    }

    /**
     * Get list of tax payer activities
     *
     * @param int $taxpayer_id
     * @param int $municipality_id
     * @return array
     */
    public function activities($taxpayer_id, $municipality_id)
    {
        $taxpayer_id = (int) $taxpayer_id;
        $municipality_id = (int) $municipality_id;

        $url = sprintf(
            'https://www.net-collect.com/netCollect/%i/%i/%s',
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
     * @param int $taxpayer_id
     * @param int $activity_id
     * @return array
     */
    public function tax($taxpayer_id, $activity_id)
    {
        $taxpayer_id = (int) $taxpayer_id;
        $activity_id = (int) $activity_id;

        $url = sprintf(
            'https://www.net-collect.com/netCollect/Taxes/%i/%i/%s',
            $taxpayer_id,
            $activity_id,
            $this->auth->getToken()
        );

        $response = CurlHttp::request($url);

        return $response;
    }
}