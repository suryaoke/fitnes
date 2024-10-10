<?php

namespace App\Repositories;

use App\Models\SubscribePackage;
use App\Repositories\Contracts\SubcribePackageRepositoryInterface;

class SubscribePackageRepository implements SubcribePackageRepositoryInterface
{
    public function getAllSubscribePackages()
    {
        return SubscribePackage::orderby('id', 'asc')->get();
    } //end method

    public function find($id)
    {
        return SubscribePackage::find($id);
    } //end method

    public function getPrice($subscribePackage)
    {
        $subscribePackage = $this->find($subscribePackage);
        return $subscribePackage ? $subscribePackage->price : 0;
    } //end method
}
