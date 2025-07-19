<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'attendance_date',
        'scan_time',
        'location_id',
        'latitude',
        'longitude',
        'photo_path',
        'status',
        'time_status',
        'is_valid_location'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
