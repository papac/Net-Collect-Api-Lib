<?php

namespace CNIT\NetCollect;

use CNIT\NetCollect\Exception\NetCollectContentExpiredOrDisabled;
use CNIT\NetCollect\Exception\NetCollectContentNotFound;

class CurlHttp
{
    /**
     * Make post Request
     *
     * @param string $url
     * @param array $payload
     * @return mixed
     */
    public static function request($url, array $payload = null)
    {
        $curl = curl_init($url);

        if (is_array($payload)) {
            $payload = json_encode($payload);
            var_dump($payload);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Length: '.strlen($payload),
            ]);
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $message = curl_error($curl);
            $code = curl_errno($curl);
            curl_close($curl);
            throw new \ErrorException($message, $code);
        }

        curl_close($curl);

        $content = json_decode($response, true, 512, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE);

        // Check the request error information
        if (isset($content['nCode'])) {
            if ($content['nCode'] == 404) {
                throw new NetCollectContentNotFound($content['sContenu']);
            }
            if ($content['nCode'] == 401) {
                throw new NetCollectContentExpiredOrDisabled($content['sContenu']);
            }
        }

        return $content;
    }
}