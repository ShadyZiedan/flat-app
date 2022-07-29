<?php

namespace App\Services;

class DomclickService extends PlatformService
{

    protected int $platformId = 3;

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
                (random_int(0, 10) >= 3 ? 'success' : 'rejected'))
            )
            ->toArray();

    }
}
