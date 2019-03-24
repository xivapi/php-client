<?php

namespace XIVAPI\Api;

use GuzzleHttp\RequestOptions;
use XIVAPI\Guzzle\Guzzle;

class Market
{
    public function item(int $itemId, array $servers = [], string $dc = '')
    {
        $options = [];

        if ($servers) {
            $options['servers'] = implode(',', $servers);
        }

        if ($dc) {
            $options['dc'] = $dc;
        }

        return Guzzle::get("/market/item/{$itemId}", [
            RequestOptions::QUERY => $options
        ]);
    }

    public function search($elasticQuery)
    {
        return Guzzle::get("/market/search", [
            RequestOptions::JSON => $elasticQuery
        ]);
    }

    public function categories()
    {
        return Guzzle::get("/market/categories");
    }


    public function itemPrices(string $accessKey, int $itemId, string $server)
    {
        return Guzzle::get("/private/market/item", [
            RequestOptions::QUERY => [
                'companion_access_key' => $accessKey,
                'item_id'   => $itemId,
                'server'    => $server,
            ]
        ]);
    }

    public function itemHistory(string $accessKey, int $itemId, string $server)
    {
        return Guzzle::get("/private/market/item/history", [
            RequestOptions::QUERY => [
                'companion_access_key' => $accessKey,
                'item_id'   => $itemId,
                'server'    => $server,
            ]
        ]);
    }

    public function manualUpdateItem(string $accessKey, int $itemId, string $server)
    {
        return Guzzle::get("/private/market/item/update", [
            RequestOptions::QUERY => [
                'companion_access_key' => $accessKey,
                'item_id'   => $itemId,
                'server'    => $server,
            ]
        ]);
    }

}
