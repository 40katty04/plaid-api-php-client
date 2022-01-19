<?php

namespace Plaid\Api;

class Webhook extends Api
{
    public function __construct($client)
    {
        parent::__construct($client);
    }

    public function update($accessToken, $url)
    {
        return $this->client()->post('/item/webhook/update ', [
            'access_token' => $accessToken,
            'webhook' => $url
        ]);
    }
}
