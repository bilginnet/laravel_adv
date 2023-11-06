<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Advertising extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['cpc', 'cpi', 'roi'];

    public function scopeTotalByPlatform($query, string $order = 'total_clicks'): mixed
    {
        return $query
            ->selectRaw('platform')
            ->selectRaw('SUM(clicks) as total_clicks')
            ->selectRaw('SUM(impressions) as total_impressions')
            ->selectRaw('SUM(spend) as total_spend')
            ->selectRaw('SUM(revenue) as total_revenue')
            ->groupBy('platform')
            ->when($order, function ($q, $order) {
                if (in_array($order, ['total_clicks', 'total_impressions', 'total_spend', 'total_revenue'])) {
                    $q->orderBy($order, 'desc');
                }
            });
    }

    protected function cpc(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->clicks == 0) {
                    return 0;
                }

                return $this->spend / $this->clicks;
            },
        );
    }

    protected function cpi(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->impressions == 0) {
                    return 0;
                }

                return $this->spend / $this->impressions;
            },
        );
    }

    protected function roi(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->spend == 0) {
                    return 0;
                }

                return (($this->revenue - $this->spend) / $this->spend) * 100;
            },
        );
    }
}
