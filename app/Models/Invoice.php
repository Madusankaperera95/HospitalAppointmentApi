<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    public function Patient()
    {
        return $this->belongsTo(Patient::class,'external_patient_id','external_patient_id');
    }
}
