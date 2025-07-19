<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workschedules extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = [
        'start_time',
        'end_time',
        'day_of_week',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_time' => 'time',
            'end_time' => 'time',
        ];
    }
}
