<?php

namespace App\Services\Advertising\Contracts;

use App\Models\Advertising;
use Illuminate\Database\Eloquent\Collection;

interface AdvertisingServiceInterface
{
    public function all(?string $platform = null, ?string $start_date = null, ?string $end_date = null): ?Collection;

    public function insights(?string $platform = null, ?string $start_date = null, ?string $end_date = null): array;

    public function byId(int $id): Advertising;

    public function create(array $data): Advertising;

    public function aggregate(string $platform);
}
