<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Gym;
use App\Services\FrontService;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    protected $frontService;
    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    public function index()
    {
        $data = $this->frontService->getFrontPageData();

        return view('front.index', $data);
    } //end method


    public function pricing()
    {
        $data = $this->frontService->getSubscriptionsData();

        return view('front.pricing', $data);
    } //end method

    public function details(Gym $gym)  // model binding
    {
        return view('front.details', compact('gym'));
    }

    public function city(City $city)
    {
        return view('front.city', compact('city'));
    }
}
