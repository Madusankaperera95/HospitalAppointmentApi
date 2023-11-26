<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\PatientInterface;
use App\Repositories\PatientRepository;
use Illuminate\Http\Response;


class PatientController extends Controller
{
    private PatientInterface $patientRepository;

    public function __construct(PatientRepository $patientRepository)
    {
         $this->patientRepository = $patientRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke($external_patient_id)
    {
        $patientDetails = $this->patientRepository->getPatientDetails($external_patient_id);
        return response()->json(['patient_details' => $patientDetails->isEmpty() ? 'No Records Found' : $patientDetails],Response::HTTP_OK);
    }
}
