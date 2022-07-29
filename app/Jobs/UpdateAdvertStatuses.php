<?php

namespace App\Jobs;

use App\Models\AdvertStatus;
use App\Models\Platform;
use App\Services\AdvertStatusDTO;
use App\Services\IPlatformService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateAdvertStatuses implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private IPlatformService $platformService)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $statuses = $this->platformService->getStatuses();
        collect($statuses)
            ->map(function (AdvertStatusDTO $dto) {
                $model = AdvertStatus::firstOrNew(['advert_id' => $dto->getAdvertId(), 'platform_id' => $dto->getPlatformId()]);
                $model->status = $dto->getStatus();
                return $model;
            })
            ->each(fn(AdvertStatus $model) => $model->save());
    }
}
