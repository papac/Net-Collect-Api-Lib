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
        $url = sprintf('/SoldeClient/%s/%s', $number, $this->auth->getToken());

        return CurlHttp::request($url);
    }

    /**
     * Create new new account
     *
     * @param string $name
     * @param string $lastname
     * @param int $civility_id
     * @param string $principal_number
     * @param string $reset_number
     * @return array
     */
    public function register($name, $lastname, $civility_id, $principal_number, $reset_number)
    {
        $payload = [
            'token' => $this->auth->getToken(),
            'Nom' => $name,
            'Prenom' => $lastname,
            'TelPrincipal' => $principal_number,
            'IDCivilite' => $civility_id,
            'TelReinitilisation' => $reset_number, // NOTE: Peut-être TelReinitialisation
        ];

        return CurlHttp::request('/Inscription', $payload);
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
            'sToken' => $this->auth->getToken(),
            'sCode' => $code,
        ];

        return CurlHttp::request('/ValidationInscription', $payload);
    }
}