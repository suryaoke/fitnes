<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscribeTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'booking_trx_id',
        'name',
        'phone',
        'email',
        'proof',
        'total_amount',
        'duration',
        'is_paid',
        'started_at',
        'ended_at',
        'subscribe_package_id'
    ];
    protected  $casts = [
        'started_at' => 'date',
        'ended_at' => 'date'
    ];

    public function subscribePackage(): BelongsTo
    {
        return $this->belongsTo(SubscribePackage::class, 'subscribe_package_id');
    }

    public static function generateuniqueTrxId()
    {
        $prefix = 'FIT';
        do {
            $ramdomString = $prefix. mt_rand(1000, 9999);

        }while (self::where('booking_trx_id', $ramdomString)->exists());
         return $ramdomString;
    
    }
}
