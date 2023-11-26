<?php

namespace App\Interfaces;

interface PatientInterface
{
    public function getPatientDetails($external_patient_id);
}
