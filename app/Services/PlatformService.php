<?php

namespace App\Services;

abstract class PlatformService
{
    protected int $platformId;
    /**
     * @param array|null|int[] $ids
     * @return array|AdvertStatusDTO[]
     */
    abstract public function getStatuses(?array $ids = null): array;
}
