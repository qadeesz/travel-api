<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'travel_id',
        'name',
        'starting_date',
        'endings_date',
        'price',
    ];


    public function price(): Attribute{
        return Attribute::make(
            get: fn($val) => $val / 100,
            set: fn($val) => $val * 100
        );
    }

}
