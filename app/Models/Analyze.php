<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Analyze extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'source_photo',
        'predict_xml',
        'predict_photo',
        'user_id',
        'patient_id'
    ];

     public function user()
     {
        return $this->belongsTo(User::class);
     }

     public function patient()
    {
     return $this->belongsTo(Patient::class);
    }
}
