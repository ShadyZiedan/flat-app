<?php

namespace App\Services;

interface IPlatformService
{
    /**
     * @param array|null|int[] $ids
     * @return array|AdvertStatusDTO[]
     */
    public function getStatuses(?array $ids = null): array;
}
