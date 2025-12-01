<?php

// app/Http/Controllers/DonorController.php
namespace App\Http\Controllers;

use App\Http\Requests\store_donor_request;
use Illuminate\Http\Request;
use App\Models\Donor;

class DonorController extends Controller
{

    public function index()
    {
        $donors = Donor::latest()->get();
        return view('donors.index', compact('donors'));
    }

    public function show(Donor $donor)
    {
        return view('donors.show', compact('donor'));
    }


    public function create()
    {
        $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $genders = ['Male', 'Female'];
        $governorates = ['حضرموت']; // Replace with actual data or DB
        $cities = ['المكلاء']; // Replace with actual data or DB
        $regions = [
                    'بويش', 'روكب', 'جول مسحة', 'الديس', 'المكلا', 'الشرج',
                    'اربعين شقة', 'امبيخة' , 'الانشاءات', 'المتضررين', 'المساكن', 'فوة القديمة',
                    'ابن سيناء', 'الشافعي', 'بروم'
                ]; // Replace with actual data or DB

        return view('donors.create', compact('bloodGroups', 'genders', 'governorates', 'cities', 'regions'));
    }

    public function store(store_donor_request $request)
    {
        $validated = $request->validated();

        Donor::create([
            'name' => $validated['full_name'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'phone_number' => $validated['phone_number'],
            'whatsapp_number' => $validated['whatsapp_number'],
            'governorate' => $validated['governorate'],
            'city' => $validated['city'],
            'region' => $validated['region'],
            'blood_group' => $validated['blood_type'],
            'chronic_disease' => $validated['chronic_disease'],
            'additional_notes' => $validated['additional_notes'],
        ]);

            return redirect()->route('dashboard.section', 'donors')
                        ->with('success', 'تم إضافة المتبرع بنجاح!');    
        }    
    
}
