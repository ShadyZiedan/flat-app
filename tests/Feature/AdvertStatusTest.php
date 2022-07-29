<?php

namespace Tests\Feature;

use App\Http\Resources\AdvertStatusResource;
use App\Models\AdvertStatus;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdvertStatusTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Testing status method
     *
     * @return void
     */
    public function test_status_method_works()
    {
        $id = 1;
        $statuses = collect([1, 2, 3])
            ->map(fn(int $platform_id) => AdvertStatus::factory()->create(['advert_id' => $id, 'platform_id' => $platform_id]))
            ->collect();

        $response = $this->get("/api/advert/{$id}/status");

        $response->assertStatus(200);

        $expectedResponse = [
            'data' => $statuses->map(fn(AdvertStatus $model) => [
                'platform' => $model->platform->name,
                'status' => $model->status,
            ])->toArray()
        ];

        $response->assertJson($expectedResponse);
    }
}
