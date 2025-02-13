<?php

namespace App\Repositories\Kintone;

use Exception;
use Illuminate\Support\Facades\Http;

class KintoneRepository
{
    private $appId;
    private $subdomain;

    public function __construct($appId)
    {
        $this->appId = $appId;
        $this->subdomain = env('KINTONE_SUBDOMAIN');
    }

    public function getRecord($query)
    {
        try {
            $apiToken = $this->getToken($this->appId);

            if (!$this->subdomain || !$apiToken) {
                return 'Kintone API config is missing';
            }

            $url = "{$this->subdomain}/k/v1/records.json";

            $response = Http::withHeaders([
                'X-Cybozu-API-Token' => $apiToken
            ])->get($url, [
                'app' => $this->appId,
                'query' => $query,
            ]);

            return $response->json();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function addRecord($record)
    {
        try {
            $apiToken = $this->getToken($this->appId);
            if (!$this->subdomain || !$apiToken) {
                return 'Kintone API config is missing';
            }

            $url = "{$this->subdomain}/k/v1/record.json";
            $response = Http::withHeaders([
                'X-Cybozu-API-Token' => $apiToken,
                'Content-Type' => 'application/json',
            ])->post($url, [
                'app' => $this->appId,
                'record' => $record,
            ]);

            return $response->json();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateRecord($id, $record)
    {
        try {
            $apiToken = $this->getToken($this->appId);
            if (!$this->subdomain || !$apiToken) {
                return 'Kintone API config is missing';
            }

            $url = "{$this->subdomain}/k/v1/record.json";
            $response = Http::withHeaders([
                'X-Cybozu-API-Token' => $apiToken,
                'Content-Type' => 'application/json',
            ])->put($url, [
                'app' => $this->appId,
                'id' => $id,
                'record' => $record,
            ]);

            return $response->json();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getToken($appId)
    {
        switch ($appId) {
            case env('KINTONE_APP_ID_MEMBER'):
                return env('KINTONE_API_TOKEN_MEMBER');
            case env('KINTONE_APP_ID_APP'):
                return env('KINTONE_API_TOKEN_APP');
            case env('KINTONE_APP_ID_PURCHASE'):
                return env('KINTONE_API_TOKEN_PURCHASE');
            default:
                return null;
        }
    }
}
