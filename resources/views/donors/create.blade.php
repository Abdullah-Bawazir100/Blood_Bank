<x-dashboard-layout :section="$section">

    <div
        style="background:white; margin: 20px 0 0 35px; padding:3rem; border-radius:8px; box-shadow:0 2px 12px rgba(192,57,43,0.25); width: calc(100% - 50px); font-family: 'Segoe UI', sans-serif; font-size:1.1rem; line-height:1.6;">
        <h1 style="
        color:#c0392b;
        margin-bottom:2.5rem;
        font-size:2.2rem;
        font-weight: 800;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        padding: 0.5rem 1rem;
        border-top-right-radius: 10px;
        border-bottom-left-radius: 10px;
        background: rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 12px rgba(192,57,43,0.3);
        display: inline-block;
    ">
            New Donor Registration
        </h1>
        @if(session('success'))
            <div class="success-message" role="alert" tabindex="0"
                style="background-color:#d4edda; border:1px solid #28a745; color:#155724; padding:1.25rem; margin-bottom:2rem; border-radius:6px; font-size:1.1rem;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-messages" role="alert" tabindex="0"
                style="background-color:#fce4e4; border:1px solid #c0392b; color:#922b21; padding:1.25rem; margin-bottom:2rem; border-radius:6px; font-size:1.1rem;">
                <ul style="margin:0; padding-left:1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('donors.store') }}" novalidate style="width:100%;">
            @csrf

            @php $fieldStyle = 'width:100%; padding:1rem; margin-bottom:1.8rem; border-radius:6px; border:1.5px solid #ddd; font-size:1.1rem;'; @endphp

            <label for="full_name" style="font-size:1.2rem; font-weight:700;">Full Name <span
                    style="color:#c0392b">*</span></label>
            <input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" required
                style="{{ $fieldStyle }}" />

            <label for="date_of_birth" style="font-size:1.2rem; font-weight:700;">Date of Birth <span
                    style="color:#c0392b">*</span></label>
            <input id="date_of_birth" name="date_of_birth" type="date" value="{{ old('date_of_birth') }}" required
                max="{{ date('Y-m-d') }}" style="{{ $fieldStyle }}" />

            <label style="font-size:1.2rem; font-weight:700;">Gender <span style="color:#c0392b">*</span></label>
            <div class="radio-group" style="display:flex; gap:3.5rem; margin-bottom:2rem; font-size:1.15rem;">
                @foreach ($genders as $gender)
                    <label style="display:flex; align-items:center; gap:0.75rem; cursor:pointer;">
                        <input type="radio" name="gender" value="{{ $gender }}" @checked(old('gender') === $gender)
                            required />
                        {{ $gender }}
                    </label>
                @endforeach
            </div>

            <label for="phone_number" style="font-size:1.2rem; font-weight:700;">Phone Number <span
                    style="color:#c0392b">*</span></label>
            <input id="phone_number" name="phone_number" type="tel" value="{{ old('phone_number') }}" required
                style="{{ $fieldStyle }}" />

            <label for="whatsapp_number" style="font-size:1.2rem; font-weight:700;">WhatsApp Number</label>
            <input id="whatsapp_number" name="whatsapp_number" type="tel" value="{{ old('whatsapp_number') }}"
                style="{{ $fieldStyle }}" />

            <label for="governorate" style="font-size:1.2rem; font-weight:700;">Governorate <span
                    style="color:#c0392b">*</span></label>
            <select id="governorate" name="governorate" required style="{{ $fieldStyle }}">
                <option value="">Select Governorate</option>
                @foreach ($governorates as $gov)
                    <option value="{{ $gov }}" @selected(old('governorate') == $gov)>{{ $gov }}</option>
                @endforeach
            </select>

            <label for="city" style="font-size:1.2rem; font-weight:700;">City <span
                    style="color:#c0392b">*</span></label>
            <select id="city" name="city" required style="{{ $fieldStyle }}">
                <option value="">Select City</option>
                @foreach ($cities as $city)
                    <option value="{{ $city }}" @selected(old('city') == $city)>{{ $city }}</option>
                @endforeach
            </select>

            <label for="region" style="font-size:1.2rem; font-weight:700;">Region <span
                    style="color:#c0392b">*</span></label>
            <select id="region" name="region" required style="{{ $fieldStyle }}">
                <option value="">Select Region</option>
                @foreach ($regions as $region)
                    <option value="{{ $region }}" @selected(old('region') == $region)>{{ $region }}</option>
                @endforeach
            </select>

            <label for="blood_type" style="font-size:1.2rem; font-weight:700;">Blood Type <span
                    style="color:#c0392b">*</span></label>
            <select id="blood_type" name="blood_type" required style="{{ $fieldStyle }}">
                <option value="">Select Blood Type</option>
                @foreach ($bloodGroups as $bg)
                    <option value="{{ $bg }}" @selected(old('blood_type') == $bg)>{{ $bg }}</option>
                @endforeach
            </select>

            <label style="font-size:1.2rem; font-weight:700;">Do you have any chronic diseases? <span
                    style="color:#c0392b">*</span></label>
            <div class="radio-group" style="display:flex; gap:3.5rem; margin-bottom:2rem; font-size:1.15rem;">
                <label><input type="radio" name="chronic_disease" value="Yes" @checked(old('chronic_disease') === 'Yes')
                        required /> Yes</label>
                <label><input type="radio" name="chronic_disease" value="No" @checked(old('chronic_disease') === 'No')
                        required /> No</label>
            </div>

            <label for="additional_notes" style="font-size:1.2rem; font-weight:700;">Other Notes / Additional
                Information</label>
            <textarea id="additional_notes" name="additional_notes" rows="6"
                style="width:100%; padding:1rem; border-radius:6px; border:1.5px solid #ddd; margin-bottom:2rem; font-size:1.1rem;">{{ old('additional_notes') }}</textarea>

            <button type="submit" style="
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        padding: 1.2rem 2.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        font-size: 1.2rem;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(192, 57, 43, 0.3);
        transition: all 0.3s ease-in-out;
    " onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 18px rgba(192, 57, 43, 0.4)';"
                onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(192, 57, 43, 0.3)';">
                Regist Donor
            </button>

    </div>

</x-dashboard-layout>