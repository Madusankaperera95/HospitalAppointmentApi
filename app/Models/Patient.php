<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_active',
        'age'
    ];

    public function appointments():HasMany{
      return $this->hasMany(Appointment::class,'external_patient_id','external_patient_id');
    }

    public function invoices():HasMany
    {
        return $this->hasMany(Invoice::class,'external_patient_id','external_patient_id');
    }

    public function receipts():HasMany
    {
        return $this->hasMany(Recipt::class,'external_patient_id','external_patient_id');
    }

}
