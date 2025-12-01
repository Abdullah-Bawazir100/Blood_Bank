<?php

namespace App\Http\Controllers;

use App\Http\Requests\update_donor_request;
use App\Models\Donor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return redirect()->route('dashboard.section', 'donors');
    }

    public function section($section, Request $request)
    {
        $allowed = ['donors', 'register', 'about', 'contact'];

        if (!in_array($section, $allowed)) {
            abort(404);
        }

        $data = ['section' => $section];

        // قائمة المناطق الموحدة
        $regionsList = [
            'بويش', 'روكب', 'جول مسحة', 'الديس', 'المكلا', 'الشرج',
            'اربعين شقة', 'امبيخة', 'الانشاءات', 'المتضررين',
            'المساكن', 'فوة القديمة', 'ابن سيناء', 'الشافعي', 'بروم'
        ];

        switch ($section) {

            case 'donors':

                $query = Donor::orderBy('created_at', 'desc');

                if ($request->has('blood_group') && $request->blood_group != '') {
                    $query->where('blood_group', $request->blood_group);
                }

                if ($request->has('region') && $request->region != '') {
                    $query->where('region', $request->region);
                }

                $data['donors'] = $query->get();

                // فلاتر الواجهة
                $data['bloodGroups'] = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                $data['regions'] = $regionsList;

                return view('donors.index', $data);


            case 'register':

                $data['genders'] = ['Male', 'Female'];
                $data['bloodGroups'] = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                $data['governorates'] = ['حضرموت'];
                $data['cities'] = ['المكلا'];
                $data['regions'] = $regionsList;

                return view('donors.create', $data);


            case 'about':
            case 'contact':
                return view($section, $data);

            default:
                abort(404);
        }
    }

    public function destroy($id)
    {
        $donor = Donor::findOrFail($id);
        $donor->delete();

        return redirect()->route('dashboard.section', 'donors')
                         ->with('success', 'Donor deleted successfully.');
    }

    public function update(update_donor_request $request, $id)
    {
        $donor = Donor::findOrFail($id);

        $validated = $request->validated();

        // Update donor record
        $donor->name             = $validated['full_name'];
        $donor->date_of_birth    = $validated['date_of_birth'];
        $donor->gender           = $validated['gender'];
        $donor->blood_group      = $validated['blood_type'];
        $donor->phone_number     = $validated['phone_number'];
        $donor->whatsapp_number  = $validated['whatsapp_number'];
        $donor->governorate      = $validated['governorate'];
        $donor->city             = $validated['city'];
        $donor->region           = $validated['region'];
        $donor->chronic_disease  = $validated['chronic_disease'];
        $donor->additional_notes = $validated['additional_notes'];

        $donor->save();

        return redirect()
            ->route('dashboard.section', 'donors')
            ->with('success', 'Donor information updated successfully.');
    }

    public function edit($id)
    {
        $donor = Donor::findOrFail($id);

        // نفس البيانات المستخدمة في صفحة create
        $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $genders = ['Male', 'Female'];
        $governorates = ['حضرموت'];
        $cities = ['المكلا'];
        $regions = [
            'بويش', 'روكب', 'جول مسحة', 'الديس', 'المكلا', 'الشرج',
            'اربعين شقة', 'امبيخة', 'الانشاءات', 'المتضررين', 
            'المساكن', 'فوة القديمة', 'ابن سيناء', 'الشافعي', 'بروم'
        ];

        return view('donors.edit', [
            'donor' => $donor,
            'bloodGroups' => $bloodGroups,
            'genders' => $genders,
            'governorates' => $governorates,
            'cities' => $cities,
            'regions' => $regions,
            'section' => 'donors'
        ]);
    }
}
