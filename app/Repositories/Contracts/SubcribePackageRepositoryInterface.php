<?php

namespace App\Repositories\Contracts;

interface SubcribePackageRepositoryInterface
{
    public function getAllSubscribePackages();
    public function find($id);
    public function getPrice($subscribePackage);
}
