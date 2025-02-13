<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KintoneController extends Controller
{
    private $subdomain;

    public function __construct()
    {
        $this->subdomain = env('KINTONE_SUBDOMAIN');
    }

    public function getRecord(Request $request)
    {
        $appId = $request->input('app-id');
        $query = $request->input('query');

        $apiToken = $this->getToken($appId);

        if (!$this->subdomain || !$apiToken) {
            return response()->json(['error' => 'Kintone API config is missing'], 500);
        }

        $url = "{$this->subdomain}/k/v1/records.json";

        $response = Http::withHeaders([
            'X-Cybozu-API-Token' => $apiToken
        ])->get($url, [
            'app' => $appId,
            'query' => $query,
        ]);

        return response()->json($response->json(), $response->status());
    }

    public function addRecord(Request $request)
    {
        $appId = $request->input('app-id');
        $record = $request->input('record');
        // dd($record);
        $apiToken = $this->getToken($appId);
        if (!$this->subdomain || !$apiToken) {
            return response()->json(['error' => 'Kintone API config is missing'], 500);
        }

        $url = "{$this->subdomain}/k/v1/record.json";
        $response = Http::withHeaders([
            'X-Cybozu-API-Token' => $apiToken,
            'Content-Type' => 'application/json',
        ])->post($url, [
            'app' => $appId,
            'record' => $record,
        ]);
        return response()->json($response->json(), 200);
        // if ($response->successful()) {
        //     return response()->json($response->json(), 200);
        // } else {
        //     return response()->json(['error' => 'Failed to add record'], 500);
        // }
    }

    public function updateRecord(Request $request)
    {
        $appId = $request->input('app-id');
        $recordId = $request->input('recordId');
        $updateData = $request->input('record');

        $apiToken = $this->getToken($appId);

        if (!$this->subdomain || !$apiToken) {
            return response()->json(['error' => 'Kintone API config is missing'], 500);
        }

        $url = "{$this->subdomain}/k/v1/record.json";

        $response = Http::withHeaders([
            'X-Cybozu-API-Token' => $apiToken,
            'Content-Type' => 'application/json',
        ])->put($url, [
            'app' => $appId,
            'id' => $recordId,
            'record' => $updateData,
        ]);

        if ($response->successful()) {
            return response()->json($response->json(), 200);
        } else {
            return response()->json([
                'error' => 'Failed to update record',
                'status' => $response->status(),
                'message' => $response->body(),
            ], 500);
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
