<!-- resources/views/donors/edit.blade.php -->
<x-dashboard-layout :section="$section">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div
        style="display:flex; flex-direction:column; width:100%; min-height:100%; padding:20px 35px; box-sizing:border-box; font-family:'Segoe UI', sans-serif;">

        <div
            style="width:100%; background:#fff; padding:2rem; border-radius:12px; box-shadow:0 2px 12px rgba(0,0,0,0.06);">
            <h1 style="color:#c0392b; font-size:1.8rem; text-align:center; font-weight:800; margin-bottom:1rem;">
                Edit Donor
            </h1>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div
                    style="background:#fdecea; border:1px solid #f5c6cb; color:#842029; padding:0.85rem; border-radius:8px; margin-bottom:1rem;">
                    <strong>There are some errors:</strong>
                    <ul style="margin:0.5rem 0 0 1.2rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('donors.update', $donor->id) }}">
                @csrf
                @method('PUT')

                <div style="display:grid; grid-template-columns: repeat(2, 1fr); gap:1rem;">
                    <!-- Full name -->
                    <div>
                        <label for="full_name" style="display:block; font-weight:600; margin-bottom:0.3rem;">Full
                            name</label>
                        <input id="full_name" name="full_name" type="text" value="{{ old('full_name', $donor->name) }}"
                            style="width:100%; padding:0.6rem; border:1px solid #ccc; border-radius:8px;">
                    </div>

                    <!-- Date of birth -->
                    <div>
                        <label for="date_of_birth" style="display:block; font-weight:600; margin-bottom:0.3rem;">Date of
                            birth</label>
                        <input id="date_of_birth" name="date_of_birth" type="date"
                            value="{{ old('date_of_birth', $donor->date_of_birth ? $donor->date_of_birth->format('Y-m-d') : '') }}"
                            style="width:100%; padding:0.55rem; border:1px solid #ccc; border-radius:8px;">
                    </div>

                    <!-- Gender -->
                    <div>
                        <label for="gender" style="display:block; font-weight:600; margin-bottom:0.3rem;">Gender</label>
                        <select id="gender" name="gender"
                            style="width:100%; padding:0.55rem; border:1px solid #ccc; border-radius:8px;">
                            @foreach($genders as $g)
                                <option value="{{ $g }}" {{ old('gender', $donor->gender) == $g ? 'selected' : '' }}>{{ $g }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Blood type -->
                    <div>
                        <label for="blood_type" style="display:block; font-weight:600; margin-bottom:0.3rem;">Blood
                            type</label>
                        <select id="blood_type" name="blood_type"
                            style="width:100%; padding:0.55rem; border:1px solid #ccc; border-radius:8px;">
                            @foreach($bloodGroups as $bg)
                                <option value="{{ $bg }}" {{ old('blood_type', $donor->blood_group) == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Phone number -->
                    <div>
                        <label for="phone_number" style="display:block; font-weight:600; margin-bottom:0.3rem;">Phone
                            number</label>
                        <input id="phone_number" name="phone_number" type="text"
                            value="{{ old('phone_number', $donor->phone_number) }}"
                            style="width:100%; padding:0.6rem; border:1px solid #ccc; border-radius:8px;">
                    </div>

                    <!-- WhatsApp -->
                    <div>
                        <label for="whatsapp_number"
                            style="display:block; font-weight:600; margin-bottom:0.3rem;">WhatsApp (optional)</label>
                        <input id="whatsapp_number" name="whatsapp_number" type="text"
                            value="{{ old('whatsapp_number', $donor->whatsapp_number) }}"
                            style="width:100%; padding:0.6rem; border:1px solid #ccc; border-radius:8px;">
                    </div>

                    <!-- Governorate -->
                    <div>
                        <label for="governorate"
                            style="display:block; font-weight:600; margin-bottom:0.3rem;">Governorate</label>
                        <select id="governorate" name="governorate"
                            style="width:100%; padding:0.55rem; border:1px solid #ccc; border-radius:8px;">
                            @foreach($governorates as $gov)
                                <option value="{{ $gov }}" {{ old('governorate', $donor->governorate) == $gov ? 'selected' : '' }}>{{ $gov }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- City -->
                    <div>
                        <label for="city" style="display:block; font-weight:600; margin-bottom:0.3rem;">City</label>
                        <select id="city" name="city"
                            style="width:100%; padding:0.55rem; border:1px solid #ccc; border-radius:8px;">
                            @foreach($cities as $ct)
                                <option value="{{ $ct }}" {{ old('city', $donor->city) == $ct ? 'selected' : '' }}>{{ $ct }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Region (full-width column below grid) -->
                </div>

                <div style="margin-top:1rem;">
                    <label for="region" style="display:block; font-weight:600; margin-bottom:0.3rem;">Region</label>
                    <select id="region" name="region"
                        style="width:100%; padding:0.55rem; border:1px solid #ccc; border-radius:8px;">
                        @foreach($regions as $r)
                            <option value="{{ $r }}" {{ old('region', $donor->region) == $r ? 'selected' : '' }}>{{ $r }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:1rem; margin-top:1rem;">
                    <!-- Chronic disease -->
                    <div>
                        <label for="chronic_disease"
                            style="display:block; font-weight:600; margin-bottom:0.3rem;">Chronic disease</label>
                        <select id="chronic_disease" name="chronic_disease"
                            style="width:100%; padding:0.55rem; border:1px solid #ccc; border-radius:8px;">
                            <option value="No" {{ old('chronic_disease', $donor->chronic_disease) == 'No' ? 'selected' : '' }}>No</option>
                            <option value="Yes" {{ old('chronic_disease', $donor->chronic_disease) == 'Yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                    <!-- Additional notes -->
                    <div>
                        <label for="additional_notes"
                            style="display:block; font-weight:600; margin-bottom:0.3rem;">Additional notes</label>
                        <input id="additional_notes" name="additional_notes" type="text"
                            value="{{ old('additional_notes', $donor->additional_notes) }}"
                            style="width:100%; padding:0.6rem; border:1px solid #ccc; border-radius:8px;">
                    </div>
                </div>

                <!-- Buttons -->
                <div style="display:flex; gap:0.8rem; justify-content:center; margin-top:1.25rem;">
                    <button type="submit" style="
                        padding:0.6rem 1rem;
                        background:#2980b9;
                        color:white;
                        border:none;
                        border-radius:8px;
                        font-weight:700;
                        cursor:pointer;
                        min-width:120px;
                        box-shadow:0 2px 8px rgba(41,128,185,0.25);
                    " onmouseover="this.style.background='#3498db';" onmouseout="this.style.background='#2980b9';">
                        Update
                    </button>

                    <a href="{{ route('dashboard.section', 'donors') }}" style="
                        display:inline-block;
                        padding:0.6rem 1rem;
                        background:#7f8c8d;
                        color:white;
                        border-radius:8px;
                        text-decoration:none;
                        font-weight:700;
                        min-width:120px;
                        text-align:center;
                    " onmouseover="this.style.background='#606060';" onmouseout="this.style.background='#7f8c8d';">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>

    <style>
        @media (max-width: 900px) {
            form>div[style*="display:grid"] {
                grid-template-columns: 1fr;
            }
        }
    </style>

</x-dashboard-layout>