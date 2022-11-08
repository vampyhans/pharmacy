<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Quotation;
use App\Models\Drug;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class PharmarcyController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::all();
        return view('dashboards.pharmacy.home', compact('prescriptions'));
    }

    public function ViewPrescription($id)
    {
        $prescription = Prescription::find(Crypt::decrypt($id));

        return view('dashboards.pharmacy.viewPrescription', compact('prescription'));
    }

    public function addQuotation($id)
    {
        $prescription = Prescription::find(Crypt::decrypt($id));

        return view('dashboards.pharmacy.addQuotation', compact('prescription'));
    }

    public function saveQuotation(Request $request)
    {

        $prescription_id = $request->prescription_id;
        
        $quotation = Quotation::create([
            'amount' => 1,
            'prescription_id' => $prescription_id,
            'user_id' => $request->customer,
        ]);

        if($quotation){
            $prescription = Prescription::find($prescription_id);
            $prescription->quotation = 'sent';
            $prescription->save();
        }

        $qid = $quotation->id;

        $drug = $request->drug;
        $quantity = $request->quantity;
        $price = $request->price;

        for($i=0; $i<count($drug); $i++){
            $save= [
                'drug' => $drug[$i],
                'quantity' => $quantity[$i],
                'price' => $price[$i],
                'total' => $quantity[$i] * $price[$i],
                'quotation_id' => $qid,
            ];
            Drug::create($save);
        }

        return redirect()->route('pharmacy-home');
    }
}
