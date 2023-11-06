<?php

namespace Tests\Feature;

use App\Models\Advertising;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdvertisingTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_advertising_index(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/advertising');

        $response->assertStatus(200)
            ->assertSee(__('Date'))
            ->assertSee(__('Platform'))
            ->assertSee(__('Impression'))
            ->assertSee(__('Click'))
            ->assertSee(__('Spend'))
            ->assertSee(__('Revenue'));
    }

    public function test_advertising_store(): void
    {
        $user = User::factory()->create();

        $data = [
            'date' => '2023-11-06',
            'platform' => 'TikTok',
            'impressions' => 1000,
            'clicks' => 200,
            'spend' => 50.00,
            'revenue' => 100.00,
        ];

        $response = $this->actingAs($user)->post('/advertising', $data);

        $response->assertStatus(302);
    }
}
