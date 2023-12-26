<?php

// app/Models/Clinic.php

// app/Models/Clinic.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $fillable = ['name', 'location', 'contact', 'status', 'user_id'];

    // Define the inverse relationship with the 'User' model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Add a relationship to users
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    // Adjust the relationship to use hasMany
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }
}
