<?php

namespace App\Repositories;

use App\Interfaces\PatientInterface;
use App\Models\Patient;
use Carbon\Carbon;

class PatientRepository implements PatientInterface
{

    public function getPatientDetails($external_patient_id)
    {
        return Patient::where('external_patient_id',$external_patient_id)->with(['appointments','invoices','receipts'])->get()
            ->map(function (Patient $patient){
                return [
                    'patient_id' => $patient->external_patient_id,
                    'first_appointment_id' => !$patient->appointments->isEmpty() ? $patient->appointments->sortBy('appointment_date')->first()->appointment_id : null,
                    'invoice' => !$patient->invoices->isEmpty() ? $patient->invoices->pluck('invoice_no') : null,
                    'total_receipts' => $patient->receipts->reduce(function ($sum,$receipt){
                        return  $sum += $receipt->amount;
                    },0),
                    'receipts' => $patient->receipts->pluck('receipt_id'),
                    'first_receipt_date' => !$patient->receipts->isEmpty() ? Carbon::parse($patient->receipts->sortBy('receipt_created_date')->first()->receipt_created_date)->toDateString() : null,
                    'first_invoice_date' =>!$patient->invoices->isEmpty() ? $patient->invoices->sortBy('date')->first()->date : null,
                    'first_appointment_date' => !$patient->appointments->isEmpty() ? Carbon::parse($patient->appointments->sortBy('appointment_date')->first()->appointment_date)->toDateString() : null,
                    'patient_created_date' => $patient->created_at ? Carbon::parse($patient->created_at)->toDateString() : null

                ];
            });
    }
}
