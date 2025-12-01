<!-- resources/views/donors/index.blade.php -->
<x-dashboard-layout :section="$section">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div style="
        display: flex;
        flex-direction: column;
        width: 100%;
        min-height: 100%;
        padding-top: 10px;
        padding-left: 35px;
        padding-right: 35px;
        font-family: 'Segoe UI', sans-serif;
        box-sizing: border-box;
    ">

        <div style="
            width: 100%;
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(192,57,43,0.2);
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        ">

            <h1 style="color:#c0392b; font-size:2rem; margin-bottom:2rem; text-align:center; font-weight:800;">
                Donors List
            </h1>

            <!-- Filter Form -->
            <form method="GET" action="{{ route('dashboard.section', 'donors') }}"
                style="margin-bottom:1.5rem; display:flex; gap:1rem; flex-wrap:wrap; justify-content:center; align-items:center;">
                <div>
                    <label for="blood_group" style="margin-right:0.5rem; font-weight:600;">Blood Group:</label>
                    <select name="blood_group" id="blood_group"
                        style="padding:0.5rem 0.8rem; border-radius:6px; border:1px solid #ccc; min-width:120px;">
                        <option value="">All</option>
                        @foreach($bloodGroups as $bg)
                            <option value="{{ $bg }}" {{ request('blood_group') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="region" style="margin-right:0.5rem; font-weight:600;">Region:</label>
                    <select name="region" id="region"
                        style="padding:0.5rem 0.8rem; border-radius:6px; border:1px solid #ccc; min-width:150px;">
                        <option value="">All</option>
                        @foreach($regions as $r)
                            <option value="{{ $r }}" {{ request('region') == $r ? 'selected' : '' }}>{{ $r }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" style="
                    padding:0.55rem 1rem;
                    background:#c0392b;
                    color:white;
                    border:none;
                    border-radius:6px;
                    cursor:pointer;
                    font-weight:600;
                    min-width:100px;
                    text-align:center;
                    transition: all 0.2s ease;
                " onmouseover="this.style.background='#e74c3c';" onmouseout="this.style.background='#c0392b';">
                    Filter
                </button>

                @if(request()->has('blood_group') || request()->has('region'))
                    <a href="{{ route('dashboard.section', 'donors') }}" style="
                            padding:0.55rem 1rem;
                            background:#7f8c8d;
                            color:white;
                            border-radius:6px;
                            text-decoration:none;
                            font-weight:600;
                            min-width:100px;
                            text-align:center;
                            display:inline-block;
                            transition: all 0.2s ease;
                        " onmouseover="this.style.background='#606060';" onmouseout="this.style.background='#7f8c8d';">
                        Reset
                    </a>
                @endif
            </form>

            @if(session('success'))
                <div style="
                        background-color:#d4edda;
                        border:1px solid #28a745;
                        color:#155724;
                        padding:1rem;
                        margin-bottom:1.5rem;
                        border-radius:6px;
                        text-align:center;
                    ">
                    {{ session('success') }}
                </div>
            @endif

            @if($donors && $donors->count())
                <div style="overflow-x:auto; width:100%; flex-grow:1;">
                    <table style="
                            width: 100%;
                            border-collapse: separate;
                            border-spacing: 0;
                            min-width: 600px;
                            font-size:1rem;
                            text-align:center;
                        ">
                        <thead>
                            <tr style="background:#c0392b; color:white; font-weight:600;">
                                <th style="border-left:1px solid #eee; padding:0.75rem; border-top-left-radius:12px;">Name
                                </th>
                                <th style="border-left:1px solid #eee; padding:0.75rem;">Blood Group</th>
                                <th style="border-left:1px solid #eee; padding:0.75rem;">Contact</th>
                                <th style="border-left:1px solid #eee; padding:0.75rem;">Region</th>
                                <th style="border-left:1px solid #eee; padding:0.75rem; border-top-right-radius:12px;">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donors as $index => $donor)
                                <tr style="
                                            border-bottom:1px solid #eee;
                                            transition: background 0.2s;
                                            background: {{ $index % 2 === 0 ? '#ffffff' : '#f9f9f9'}};
                                        ">
                                    <td style="padding:0.75rem;">{{ $donor->name }}</td>
                                    <td style="padding:0.75rem;">{{ $donor->blood_group }}</td>
                                    <td style="padding:0.75rem;">{{ $donor->phone_number ?? 'N/A' }}</td>
                                    <td style="padding:0.75rem;">{{ $donor->region }}</td>
                                    <td style="padding:0.75rem; display:flex; justify-content:center; gap:0.5rem;">

                                        <!-- زر عرض التفاصيل -->
                                        <a href="{{ route('donors.show', $donor->id) }}" style="
                                                    display:inline-block;
                                                    padding:0.55rem 0.85rem;
                                                    border-radius:10px;
                                                    background:#c0392b;
                                                    color:white;
                                                    text-decoration:none;
                                                    transition: all 0.3s ease;
                                                    box-shadow: 0 2px 6px rgba(192, 57, 43, 0.35);
                                                    min-width:50px;
                                                    text-align:center;
                                                " title="View Details" onmouseover="
                                                    this.style.background='#e74c3c';
                                                    this.style.transform='scale(1.05)';
                                                    this.style.boxShadow='0 4px 12px rgba(192,57,43,0.55)';
                                                " onmouseout="
                                                    this.style.background='#c0392b';
                                                    this.style.transform='scale(1)';
                                                    this.style.boxShadow='0 2px 6px rgba(192,57,43,0.35)';
                                                ">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <!-- زر التحديث باللون الأزرق -->
                                        <a href="{{ route('donors.edit', $donor->id) }}" style="
                                                    display:inline-block;
                                                    padding:0.55rem 0.85rem;
                                                    border-radius:10px;
                                                    background:#3498db;
                                                    color:white;
                                                    text-decoration:none;
                                                    transition: all 0.3s ease;
                                                    box-shadow: 0 2px 6px rgba(52,152,219,0.35);
                                                    min-width:50px;
                                                    text-align:center;
                                                " title="Edit Donor" onmouseover="
                                                    this.style.background='#217dbb';
                                                    this.style.transform='scale(1.05)';
                                                    this.style.boxShadow='0 4px 12px rgba(52,152,219,0.55)';
                                                " onmouseout="
                                                    this.style.background='#3498db';
                                                    this.style.transform='scale(1)';
                                                    this.style.boxShadow='0 2px 6px rgba(52,152,219,0.35)';
                                                ">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <!-- زر الحذف  -->
                                        <form action="{{ route('donors.destroy', $donor->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this donor?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="
                                                        display:inline-block;
                                                        padding:0.55rem 0.85rem;
                                                        border-radius:10px;
                                                        background:#7f8c8d;
                                                        color:white;
                                                        border:none;
                                                        cursor:pointer;
                                                        transition: all 0.3s ease;
                                                        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
                                                        min-width:50px;
                                                        height:40px;
                                                        text-align:center;
                                                    " onmouseover="
                                                        this.style.background='#606060';
                                                        this.style.transform='scale(1.05)';
                                                        this.style.boxShadow='0 4px 12px rgba(0,0,0,0.3)';
                                                    " onmouseout="
                                                        this.style.background='#7f8c8d';
                                                        this.style.transform='scale(1)';
                                                        this.style.boxShadow='0 2px 6px rgba(0,0,0,0.2)';
                                                    " title="Delete Donor">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p style="
                        padding:1rem;
                        background:#fce4e4;
                        color:#922b21;
                        border-radius:6px;
                        text-align:center;
                        margin-top:1rem;
                    ">
                    No donors registered yet.
                </p>
            @endif

        </div>
    </div>

    <style>
        @media (max-width: 768px) {
            table {
                font-size: 0.9rem;
            }

            h1 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.5rem;
            }

            table {
                min-width: 100%;
            }
        }
    </style>

</x-dashboard-layout>