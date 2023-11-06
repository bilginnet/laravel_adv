<?php

namespace App\Services\Advertising;

use App\Models\Advertising;
use App\Services\Advertising\Contracts\AdvertisingServiceInterface;
use App\Services\Advertising\Contracts\InsightsServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdvertisingService implements AdvertisingServiceInterface
{
    public function all(?string $platform = null, ?string $start_date = null, ?string $end_date = null): ?Collection
    {
        return Advertising::query()
            ->when($platform, fn($query, $platform) => $query->where('platform', $platform))
            ->when($start_date, fn($query, $start_date) => $query->where('date', '>=', $start_date))
            ->when($end_date, fn($query, $end_date) => $query->where('date', '<=', $end_date))
            ->get();
    }

    public function insights(?string $platform = null, ?string $start_date = null, ?string $end_date = null): array
    {
        $service = app()->get(InsightsServiceInterface::class);

        return array_merge(
            $service->clicks(platform: $platform, start_date: $start_date, end_date: $end_date),
            $service->impressions(platform: $platform, start_date: $start_date, end_date: $end_date),
            $service->spend(platform: $platform, start_date: $start_date, end_date: $end_date),
            $service->revenue(platform: $platform, start_date: $start_date, end_date: $end_date),
        );
    }

    public function byId(int $id): Advertising
    {
        return Advertising::find($id);
    }

    public function create(array $data): Advertising
    {
        $advertising = Advertising::create($data);

        return $this->byId($advertising->id);
    }

    public function aggregate(string $platform): ?Model
    {
        return Advertising::query()
            ->where('platform', $platform)
            ->selectRaw('SUM(clicks) as total_clicks, SUM(impressions) as total_impressions, SUM(spend) as total_spend, SUM(revenue) as total_revenue')
            ->first();
    }
}
