<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $fillable = [
        'car_plate',
        'model',
        'slug',
        'foto',
        'tahun',
        'jok',
        'harga',
        'bbm',
        'odometer',
        'transmisi',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'model'
            ]
        ];
    }

    /**
     * The roles that belong to the Car
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'car_brands', 'car_id', 'brand_id');
    }
}
