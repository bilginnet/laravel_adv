<?php

namespace App\Services\Advertising\Contracts;

interface InsightsServiceInterface
{
    public function clicks(?string $platform = null, ?string $start_date = null, ?string $end_date = null): array;

    public function impressions(?string $platform = null, ?string $start_date = null, ?string $end_date = null): array;

    public function spend(?string $platform = null, ?string $start_date = null, ?string $end_date = null): array;

    public function revenue(?string $platform = null, ?string $start_date = null, ?string $end_date = null): array;
}
