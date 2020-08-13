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
     * Get list of tax payer communes
     *
     * @param int $taxpayer_id
     * @return array
     */
    public function communes($taxpayer_id)
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
     * Get list of tax payer communes
     *
     * @param int $taxpayer_id
     * @return array
     */
    public function activities($taxpayer_id, $commune_id)
    {
        $taxpayer_id = (int) $taxpayer_id;
        $commune_id = (int) $commune_id;

        $url = sprintf(
            'https://www.net-collect.com/netCollect/%i/%i/%s',
            $taxpayer_id,
            $commune_id,
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