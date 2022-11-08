<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Prescription;
use App\Models\PrescriptionImage;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $prescriptions = Prescription::where('user_id', $id)->get();
        return view('dashboards.user.home',compact('prescriptions'));
    }

    public function createPrescription()
    {
        return view('dashboards.user.createPrescription');
    }

    public function postPrescription(Request $request)
    {
        $validated = $request->validate([
            'images' => 'required|max:5',
            'note' => "required",
            'address' => 'required',
            'time' => 'required',
        ]);

        $prescription = Prescription::create([
            'note' => $request->input('note'),
            'address' => $request->input('address'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'user_id' => Auth::id(),
        ]);

        if($request->has('images')){
            foreach($request->file('images') as $image){
                $path = 'public/uploads/prescriptions/'.uniqid();
                $path = $image->store($path);
                $path = explode('public/', $path);
                PrescriptionImage::create([
                    'url' => 'storage/'.$path[1],
                    'prescription_id' => $prescription->id,
                ]);
            }
        }

        return redirect()->route('user-home');
    }

    public function ViewQuotation($id)
    {
        $quotations = Quotation::where('prescription_id', Crypt::decrypt($id))->get();
        return view('dashboards.user.viewQuotation', compact('quotations'));
    }

    public function ViewQuotationDetails($id)
    {
        $quotation = Quotation::where('prescription_id', Crypt::decrypt($id))->get();
        $images = PrescriptionImage::where('prescription_id', Crypt::decrypt($id))->get();
        $drugs = $quotation[0]->drugs;
        return view('dashboards.user.viewQuotationDetails', compact('quotation', 'images', 'drugs'));
    }


    public function acceptQuotation(Request $request)
    {
        $quotation = Quotation::find($request->quotation);
        $quotation->status = 'approved';
        $quotation->save();
        return redirect()->route('ViewQuotation');
    }

    public function rejectQuotation(Request $request)
    {
        $quotation = Quotation::find($request->quotation);
        $quotation->status = 'rejected';
        $quotation->save();
        return redirect()->route('ViewQuotation');
    }
}
