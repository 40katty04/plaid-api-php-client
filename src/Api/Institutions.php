<?php

namespace Plaid\Api;

use ArrayObject;

class Institutions extends Api
{
    public function get($count = 100, $offset = 0, $countryCodes = ['US'], $options = null)
    {
        $post = [
            'count' => $count,
            'offset' => $offset,
            'country_codes' => $countryCodes
        ];
        if($options != null) {
            $post['options'] = $options;
        }
        return $this->client()->post('/institutions/get', $post);
    }

    public function getById($institutionId, $options = [])
    {
        // This will map to a JSON object even if it's empty
        $optionsObj = new ArrayObject($options);

        return $this->client()->post('/institutions/get_by_id', [
            'institution_id' => $institutionId,
            'options' => $optionsObj
        ]);
    }

    public function search($query, $options = [], $products = null)
    {
        // This will map to a JSON object even if it's empty
        $optionsObj = new ArrayObject($options);

        return $this->client()->post('/institutions/search', [
            'query' => $query,
            'options' => $optionsObj,
            'products' => $products
        ]);
    }
}
