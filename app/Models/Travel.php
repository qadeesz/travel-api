<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Travel extends Model
{
    use HasFactory, Sluggable, HasUuids;
    protected $table = 'travels';

    protected $fillable = [
        'is_public',
        'slug',
        'name',
        'description',
        'number_of_days',
    ];

    public function tours() : HasMany{
        return $this->hasMany(Tour::class);
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // Accessers 
    // getters and setters
    // e.x: set = 5; get = 5 - 1 ; // 4
    
    // v9.0 || but use this
    public function numberOfNights(): Attribute {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['number_of_days'] * 3
        );
    }

    // // recomended this new 
    // public function getNumberOfNightsAttribute(){
    //     return $this->number_of_days - 1 ;
    // }
}
