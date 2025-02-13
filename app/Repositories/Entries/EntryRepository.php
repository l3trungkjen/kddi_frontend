<?php

namespace App\Repositories\Entries;

use Exception;

class EntryRepository
{
    public static function addRecord($appId, $record)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $headers = [
                'Content-Type' => 'application/json',
            ];
            $requestClient = $client->request('POST', "http://127.0.0.1:8000/api/kintone/add-record?app-id=$appId", ['headers' => $headers, 'json' => $record]);
            $response = json_decode((string) $requestClient->getBody());
            return $response;
        } catch (Exception $e) {
            return $e;
        }
    }
}
