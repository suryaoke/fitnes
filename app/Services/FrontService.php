<?php

namespace App\Services;

use App\Repositories\Contracts\CityRepositoryInterface;
use App\Repositories\Contracts\GymRepositoryInterface;
use App\Repositories\Contracts\SubcribePackageRepositoryInterface;

class FrontService

{
    protected $gymRepository;
    protected $cityRepository;
    protected $subscribePackageRepository;

    //dependency injection
    public function __construct(
        CityRepositoryInterface $cityRepository,

        GymRepositoryInterface $gymRepository,
        SubcribePackageRepositoryInterface  $subscribePackageRepository
    ) {

        $this->gymRepository = $gymRepository;
        $this->cityRepository = $cityRepository;
        $this->subscribePackageRepository = $subscribePackageRepository;
    }

    public function getFrontPageData()
    {
        $cities = $this->cityRepository->getAllCities();
        $popularGyms = $this->gymRepository->getPopularGyms(10);
        $newGyms = $this->gymRepository->getAllNewGyms();

        return compact('cities', 'popularGyms', 'newGyms');
    }

    public function getSubscriptionsData()
    {
        $subscribePackages = $this->subscribePackageRepository->getAllSubscribePackages();
        return compact('subscribePackages');
    }
}
