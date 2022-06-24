<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Analyze;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_birth',
        'parent_name',
        'parent_email'
    ];

     public function analyzes()
     {
        return $this->hasMany(Analyze::class);
     }
}
