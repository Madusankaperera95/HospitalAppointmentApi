<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipt extends Model
{
    use HasFactory;

    protected $table = 'receipt';

    public function patient(){
        return $this->belongsTo(Patient::class,'external_patient_id','external_patient_id');
    }
}
