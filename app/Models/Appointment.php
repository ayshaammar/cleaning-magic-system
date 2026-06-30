<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id','patient_name','patient_phone','complaint','date','time',
        'status','admin_note','reviewed_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
