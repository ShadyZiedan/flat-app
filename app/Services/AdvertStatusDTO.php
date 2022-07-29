<?php

namespace App\Services;

class AdvertStatusDTO
{
    public function __construct(
        private int  $platform_id,
        private int  $advert_id,
        private string $status,
    )
    {
    }

    /**
     * @return int
     */
    public function getPlatformId(): int
    {
        return $this->platform_id;
    }

    /**
     * @return int
     */
    public function getAdvertId(): int
    {
        return $this->advert_id;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }



}
