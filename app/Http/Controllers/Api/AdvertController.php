<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertStatusResource;
use App\Models\AdvertStatus;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function status(int $id)
    {
        $statuses = AdvertStatus::where('advert_id', $id)->get();
        if ($statuses->isEmpty()) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        return AdvertStatusResource::collection($statuses);
    }
}
