<?php

namespace App\Models;

use App\Dtos\StoreWebhookLogDto;
use App\EloquentModels\ClipWebhookLog;

class ClipWebhookLogRepository
{
    public function storeLog(StoreWebhookLogDto $storeWebhookLogDTO)
    {
        try {
            $query = ClipWebhookLog::create((array) $storeWebhookLogDTO);

            return (object) [
                'status' => 1,
                'id' => $query->id
            ];

        } catch (\Exception $e) {

            return (object) [
                'status' => 0,
                'msg' => $e->getMessage()
            ];
        }
    }
}
