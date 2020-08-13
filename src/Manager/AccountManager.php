<?php

namespace CNIT\NetCollect\Manager;

use CNIT\NetCollect\CurlHttp;

class AccountManager extends BaseManager
{
    const CIVILITE_MONSIEUR = 1;
    const CIVILITE_MADAME = 2;
    const CIVILITE_MADEMOISELLE = 3;

    /**
     * Get client balance
     *
     * @param string $number
     * @return array
     */
    public function balance($number)
    {
        $url = sprintf('https://www.net-collect.com/SoldeClient/%s/%s', $number, $this->auth->getToken());

        return CurlHttp::request($url);
    }

    /**
     * Create new new account
     *
     * @param string $name
     * @param string $lastname
     * @param int $civility_id
     * @param string $number
     * @param string $second_number
     * @return array
     */
    public function register($name, $lastname, $civility_id, $number, $second_number)
    {
        $payload = [
            'tokenP' => $this->auth->getToken(),
            'TelPrincipal' => $number,
            'IDCivilite' => $civility_id,
            'Nom' => $name,
            'Prenom' => $lastname,
            'TelReinitilisation' => $second_number, // NOTE: Peut-être TelReinitialisation
        ];

        return CurlHttp::request('https://www.net-collect.com/Inscription', $payload);
    }

    /**
     * Client account validator
     *
     * @param string $code
     * @return array
     */
    public function validation($code)
    {
        $payload = [
            'tokenP' => $this->auth->getToken(),
            'code' => $code
        ];

        return CurlHttp::request('https://www.net-collect.com/ValidationInscription', $payload);
    }
}