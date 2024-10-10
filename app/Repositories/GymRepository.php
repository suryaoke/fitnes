<?php

namespace App\Repositories;

use App\Models\Gym;
use App\Repositories\Contracts\GymRepositoryInterface;

class GymRepository implements GymRepositoryInterface
{

    public function getPopularGyms($limit = 4)
    {
        return Gym::where('is_popular', true)->take($limit)->get();
    } //end method

    public function getAllNewGyms()
    {
        return Gym::latest()->get();
    } // end method

    public function find($id)
    {
        return Gym::find($id);
    } //end method

    public function getPrice($gymId)
    {
        $gym = $this->find($gymId);
        return $gym ? $gym->price : 0;
    } // end method
}
