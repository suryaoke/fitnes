<?php

namespace App\Repositories;

use App\Models\SubscribeTransaction;
use App\Repositories\Contracts\BookingRepositoryInterface;
use Illuminate\Support\Facades\Session;

class BookingRepository implements BookingRepositoryInterface
{

    public function createBooking(array $data)
    {
        return SubscribeTransaction::create($data);
    } //end method

    public function findByTrxIdAndPhoneNumber($bookingTrxId, $phoneNumber)
    {
        return SubscribeTransaction::where('booking_trx_id', $bookingTrxId)
            ->where('phone', $phoneNumber)
            ->first();
    } //end method

    public function saveToSession(array $data)
    {
        Session::put('bookingData', $data);
    } //end method

    public function getBookingDataFromSession()
    {
        return session('bookingData', []);
    } //end method

    public function updateSessionData(array $data)
    {
        $bookingData = session('bookingData', []);
        $bookingData = array_merge($bookingData, $data);
        session(['bookingData' => $bookingData]);
    } //end method

    public function clearSession()
    {
        Session::forget('bookingData');
    } //end method
}
