<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'goal_amount',
        'raised_amount',
        'owner_id',
        'status',
    ];

    // Relationship with Donations
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    // Optionally, a method to calculate the total raised amount
    public function updateRaisedAmount()
    {
        $this->raised_amount = $this->donations()->sum('amount');
        $this->save();
    }

    // Relationship with User (Owner)
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
