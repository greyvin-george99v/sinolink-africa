<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    // These fields allow the 'Lead::create' method to work
    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'vehicle_interest',
        'country',
        'status',
    ];

    /**
     * Relationship: A Lead belongs to an Affiliate (User).
     * This is what makes $lead->user->name work in your Blade file.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}