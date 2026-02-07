<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * These match the fields we defined for your car cards.
     */
    protected $fillable = [
        'name',
        'slug',
        'price',
        'year',
        'km',
        'fuel',
        'color',
        'trans',
        'image',
        'desc',
        'is_sold', // Core field for the points logic
    ];

    /**
     * The attributes that should be cast.
     * This ensures 'is_sold' is always treated as a true/false boolean.
     */
    protected $casts = [
        'is_sold' => 'boolean',
        'price' => 'decimal:2',
    ];

    /**
     * Helper method to check point status.
     * Use this in your affiliate dashboard to show 0 if not sold.
     */
    public function getPointsAttribute()
    {
        // Logic: Return 0 points unless the admin has marked the vehicle as Sold
        if (!$this->is_sold) {
            return 0;
        }

        // Replace '100' with your actual point calculation logic per vehicle sale
        return 100; 
    }
}