<?php

namespace Plaid\Api;

class LinkToken extends Api
{
    public function __construct($client)
    {
        parent::__construct($client);
    }

    public function create(array $user, string $clientName, array $options = [], array $countryCodes = ["US"], string $language = "en", array $products = ["auth", "transactions"])
    {
        $options["client_name" ] = $clientName;
        $options["country_codes"] = $countryCodes;
        $options["language"] = $language;
        $options["user"] = $user;
        $options["products"] = $products;

        return $this->client()->post('/link/token/create', $options);
    }

    public function get($linkToken)
    {
        return $this->client->post('/link/token/get', [
            'link_token' => $linkToken
        ]);
    }
}
