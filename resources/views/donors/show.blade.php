<!-- خلفية الصفحة مع Gradient علوي وسفلي -->
<div style="
    background: linear-gradient(to bottom, rgba(192,57,43,0.08), transparent 30%), 
                linear-gradient(to top, rgba(192,57,43,0.08), transparent 30%);
    padding: 3rem 1rem;
">

    <div
        style="background:white; padding:2rem; border-radius:8px; 
               box-shadow:0 2px 12px rgba(192,57,43,0.2);
               font-family:'Segoe UI', sans-serif; 
               font-size:1rem; 
               max-width:600px; 
               margin:auto; 
               line-height:1.5;">

        <h1 style="color:#c0392b; margin-bottom:1.5rem; font-size:1.8rem; text-align:center;">
            Donor Details
        </h1>

        <table style="width:100%; border-collapse:collapse; font-size:1rem;">
            <tbody>
                <tr>
                    <td style="padding:0.6rem; font-weight:700; width:40%;">Full Name:</td>
                    <td style="padding:0.6rem;">{{ $donor->name }}</td>
                </tr>
                <tr style="background:#f9f9f9;">
                    <td style="padding:0.6rem; font-weight:700;">Date of Birth:</td>
                    <td style="padding:0.6rem;">{{ $donor->date_of_birth }}</td>
                </tr>
                <tr>
                    <td style="padding:0.6rem; font-weight:700;">Gender:</td>
                    <td style="padding:0.6rem;">{{ $donor->gender }}</td>
                </tr>
                <tr style="background:#f9f9f9;">
                    <td style="padding:0.6rem; font-weight:700;">Phone Number:</td>
                    <td style="padding:0.6rem;">{{ $donor->phone_number ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td style="padding:0.6rem; font-weight:700;">WhatsApp Number:</td>
                    <td style="padding:0.6rem;">{{ $donor->whatsapp_number ?? 'N/A' }}</td>
                </tr>
                <tr style="background:#f9f9f9;">
                    <td style="padding:0.6rem; font-weight:700;">Governorate:</td>
                    <td style="padding:0.6rem;">{{ $donor->governorate }}</td>
                </tr>
                <tr>
                    <td style="padding:0.6rem; font-weight:700;">City:</td>
                    <td style="padding:0.6rem;">{{ $donor->city }}</td>
                </tr>
                <tr style="background:#f9f9f9;">
                    <td style="padding:0.6rem; font-weight:700;">Region:</td>
                    <td style="padding:0.6rem;">{{ $donor->region }}</td>
                </tr>
                <tr>
                    <td style="padding:0.6rem; font-weight:700;">Blood Type:</td>
                    <td style="padding:0.6rem;">{{ $donor->blood_group }}</td>
                </tr>
                <tr style="background:#f9f9f9;">
                    <td style="padding:0.6rem; font-weight:700;">Chronic Disease:</td>
                    <td style="padding:0.6rem;">{{ $donor->chronic_disease }}</td>
                </tr>
                <tr>
                    <td style="padding:0.6rem; font-weight:700;">Additional Notes:</td>
                    <td style="padding:0.6rem;">{{ $donor->additional_notes ?? 'None' }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('dashboard.section', 'donors') }}"
            style="display:inline-block; margin-top:1.5rem; padding:0.7rem 1.2rem; background:#c0392b; 
                   color:white; border-radius:6px; text-decoration:none; transition:0.3s;"
            onmouseover="this.style.background='#e74c3c';" 
            onmouseout="this.style.background='#c0392b';">
            Back to Donors
        </a>
    </div>
</div>
