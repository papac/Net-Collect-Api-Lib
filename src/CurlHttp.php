<?php

namespace CNIT\NetCollect;

use CNIT\NetCollect\Exception\NetCollectErrorException;
use CNIT\NetCollect\Exception\NetCollectExpiredOrDisabledException;

class CurlHttp
{
    const BASE_URL = "https://net-collect.com";

    /**
     * Make post Request
     *
     * @param string $url
     * @param array $payload
     * @return mixed
     */
    public static function request($url, array $payload = null)
    {
        $curl = curl_init(CurlHttp::BASE_URL.$url);
        $headers = ['Content-Type: application/json'];

        if (is_array($payload)) {
            $payload = json_encode($payload);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
            $headers[] = 'Content-Length: '.strlen($payload);
        } else {
            $headers[] = 'Content-Length: 0';
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $message = curl_error($curl);
            $code = curl_errno($curl);
            curl_close($curl);
            throw new \ErrorException($message, $code);
        }

        curl_close($curl);

        $content = json_decode($response, true, 512, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE);

        // if (isset($content['fault'])) {
        //     throw new NetCollectErrorException($content['fault']['faultstring']);
        // }

        // Check the request error information
        if (isset($content['nCode'])) {
            if ($content['nCode'] == 404) {
                throw new NetCollectErrorException($content['sContenu']);
            }
            if ($content['nCode'] == 401) {
                throw new NetCollectExpiredOrDisabledException($content['sContenu']);
            }
        }

        return $content;
    }
}