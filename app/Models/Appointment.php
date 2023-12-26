<?php

// app/Models/Appointment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

   // app/Models/Appointment.php

    protected $fillable = [
        'first_name',
        'last_name',
        'appointment_date',
        'appointment_time',
        'user_id',
        'status', // Add this line
    ];

    // Define the inverse relationship with the 'User' model
        public function user()
    {
        return $this->belongsTo(User::class);
    }
        public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }
}
