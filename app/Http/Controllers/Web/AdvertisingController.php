<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advertising\CreateRequest;
use App\Http\Requests\Advertising\IndexRequest;
use App\Http\Requests\Advertising\StoreRequest;
use App\Services\Advertising\Contracts\AdvertisingServiceInterface;

class AdvertisingController extends Controller
{
    public function __construct(protected AdvertisingServiceInterface $service)
    {
    }

    public function index(IndexRequest $request)
    {
        $platform = $request->filled('platform') ? $request->input('platform') : null;
        $start_date = $request->filled('start_date') ? $request->input('start_date') : null;
        $end_date = $request->filled('end_date') ? $request->input('end_date') : null;

        $advertisings = $this->service->all(platform: $platform, start_date: $start_date, end_date: $end_date);

        $insights = $this->service->insights(platform: $platform, start_date: $start_date, end_date: $end_date);

        return view('advertising.index', compact('advertisings', 'insights'));
    }

    public function create(CreateRequest $request)
    {
        return view('advertising.create');
    }

    public function store(StoreRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route('advertising.index');
    }
}
