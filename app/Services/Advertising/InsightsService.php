<?php

namespace App\Services\Advertising;

use App\Models\Advertising;

class InsightsService
{
    public function clicks(?string $platform = null, ?string $start_date = null, ?string $end_date = null): array
    {
        $clicks = Advertising::query()
            ->totalByPlatform('total_clicks')
            ->when($platform, fn($query, $platform) => $query->where('platform', $platform))
            ->when($start_date, fn($query, $start_date) => $query->where('date', '>=', $start_date))
            ->when($end_date, fn($query, $end_date) => $query->where('date', '<=', $end_date))
            ->get();

        $insights = [];
        if (count($clicks) >= 2) {
            $firstPlatform = $clicks[0];
            $secondPlatform = $clicks[1];

            if ($firstPlatform->total_clicks > $secondPlatform->total_clicks) {
                $insights[] = "Bu ay içinde {$firstPlatform->platform} en çok tıklanıldı.";
            } elseif ($firstPlatform->total_clicks < $secondPlatform->total_clicks) {
                $insights[] = "Bu ay içinde {$secondPlatform->platform} en çok tıklanıldı.";
            } else {
                $insights[] = "Bu ay içinde {$firstPlatform->platform} ve {$secondPlatform->platform} eşit sayıda tıklama aldı.";
            }
        }

        return $insights;
    }

    public function impressions(?string $platform = null, ?string $start_date = null, ?string $end_date = null): array
    {
        $clicks = Advertising::query()
            ->totalByPlatform('total_impressions')
            ->when($platform, fn($query, $platform) => $query->where('platform', $platform))
            ->when($start_date, fn($query, $start_date) => $query->where('date', '>=', $start_date))
            ->when($end_date, fn($query, $end_date) => $query->where('date', '<=', $end_date))
            ->get();

        $insights = [];
        if (count($clicks) >= 2) {
            $firstPlatform = $clicks[0];
            $secondPlatform = $clicks[1];

            if ($firstPlatform->total_clicks > $secondPlatform->total_clicks) {
                $insights[] = "Bu ay içinde {$firstPlatform->platform} en çok izlenim aldı.";
            } elseif ($firstPlatform->total_clicks < $secondPlatform->total_clicks) {
                $insights[] = "Bu ay içinde {$secondPlatform->platform} en çok izlenim aldı.";
            } else {
                $insights[] = "Bu ay içinde {$firstPlatform->platform} ve {$secondPlatform->platform} eşit sayıda izlenim aldı.";
            }
        }

        return $insights;
    }

    public function spend(?string $platform = null, ?string $start_date = null, ?string $end_date = null): array
    {
        $clicks = Advertising::query()
            ->totalByPlatform('total_spend')
            ->when($platform, fn($query, $platform) => $query->where('platform', $platform))
            ->when($start_date, fn($query, $start_date) => $query->where('date', '>=', $start_date))
            ->when($end_date, fn($query, $end_date) => $query->where('date', '<=', $end_date))
            ->get();

        $insights = [];
        if (count($clicks) >= 2) {
            $firstPlatform = $clicks[0];
            $secondPlatform = $clicks[1];

            if ($firstPlatform->total_clicks > $secondPlatform->total_clicks) {
                $insights[] = "{$firstPlatform->platform} için daha çok para harcadınız.";
            } elseif ($firstPlatform->total_clicks < $secondPlatform->total_clicks) {
                $insights[] = "{$secondPlatform->platform} için daha çok para harcadınız.";
            } else {
                $insights[] = "{$firstPlatform->platform} ve {$secondPlatform->platform} için aynı miktarda para harcadınız.";
            }
        }

        return $insights;
    }

    public function revenue(?string $platform = null, ?string $start_date = null, ?string $end_date = null): array
    {
        $clicks = Advertising::query()
            ->totalByPlatform('total_revenue')
            ->when($platform, fn($query, $platform) => $query->where('platform', $platform))
            ->when($start_date, fn($query, $start_date) => $query->where('date', '>=', $start_date))
            ->when($end_date, fn($query, $end_date) => $query->where('date', '<=', $end_date))
            ->get();

        $insights = [];
        if (count($clicks) >= 2) {
            $firstPlatform = $clicks[0];
            $secondPlatform = $clicks[1];

            if ($firstPlatform->total_clicks > $secondPlatform->total_clicks) {
                $insights[] = "{$firstPlatform->platform} için daha fazla gelir elde ettiniz.";
            } elseif ($firstPlatform->total_clicks < $secondPlatform->total_clicks) {
                $insights[] = "{$secondPlatform->platform} için daha fazla gelir elde ettiniz.";
            } else {
                $insights[] = "{$firstPlatform->platform} ve {$secondPlatform->platform} için aynı miktarda gelir elde ettiniz.";
            }
        }

        return $insights;
    }
}
