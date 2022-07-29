<?php

namespace App\Services;

class AvitoService extends PlatformService
{

    protected int $platformId = 1;

    /**
     * @inheritDoc
     */
    public function getStatuses(?array $ids = null): array
    {
        // Fake implementation for the purpose of demonstration
        if (empty($ids)) {
            $ids = [1,2,3,4,5,6,7,8,9,10];
        }

        return collect($ids)
            ->map(fn(int $advertId) => new AdvertStatusDTO(
                $this->platformId,
                $advertId,
                (random_int(0, 10) >= 5 ? 'success' : 'rejected'))
            )
            ->toArray();

    }
}
