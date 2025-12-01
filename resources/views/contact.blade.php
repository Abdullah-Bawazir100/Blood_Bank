<x-dashboard-layout :section="$section">

    <div class="contact-page">

        <h1 class="contact-title">Contact Us</h1>

        <div class="contact-grid">
            @foreach([
                    ['name' => 'Ammar Guzi', 'email' => 'ammar@gmail.com', 'phone' => '+1 234 567 8901', 'whatsapp' => '+1 234 567 8901'],
                    ['name' => 'Mohammed Bashwaih', 'email' => 'mohammed@gmail.com', 'phone' => '+1 234 567 8902', 'whatsapp' => '+1 234 567 8902']
                ] as $contact)
                <section class="contact-card">
                    <div class="contact-name">{{ $contact['name'] }}</div>
                    <hr>
                    <div class="contact-info">

                                                   <p><span>📧</span> <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a></p>
                        <p><span>📞</span> <a href="tel:{{ $contact['phone'] }}">{{ $contact['phone'] }}</a></p>
                        <p><span>💬</span> <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['whatsapp']) }}" target="_blank" rel="noopener">{{ $contact['whatsapp'] }}</a></p>
                    </div>
                </section>
            @endforeach
        </div>

    </div>

    <style>
        /* الحاوية العامة للصفحة */
        .contact-page {

            display: flex;
            flex-direction: column;
            justify-content: center; /* محاذاة عمودية للصفحة */
            align-items: center;    /* محاذاة أفقية للصفحة */
            flex-grow: 1;
            width: 100%;
            min-height: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        /* عنوان الصفحة */
        .contact-title {
            color: #c0392b;
            font-size: 1.8rem;
            text-align: center;
            font-weight: 700;
            margin-bottom: 3.5rem;
        }

        /* شبكة البطاقات */
        .contact-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* بطاقات في الوسط */
            align-items: center;      /* محاذاة عمودية للبطاقات */
            gap: 1.5rem;
            width: 100%;
            max-width: 1000px;       /* الحد الأقصى للعرض */
        }

        /* كل بطاقة */
        .contact-card {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            justify-content:
            flex-start;
            align-items: center;
            gap: 0.8rem;
            flex: 0 0 250px; /* حجم ثابت لكل بطاقة */
            transition: all 0.3s ease;
        }
   
        .contact-card:hover {
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }

        /* اسم الشخص */
        .contact-name {
            font-weight: 600;
            font-size: 1.2rem;
            color: #922b21;
            text-align: center;
        }

        hr {
            border: none;
            border-top: 1px solid #eee;
            margin: 0.5rem 0;
            width: 100%;
        }

        /* معلومات الاتصال */
        .contact-info p {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.95rem;
            color: #3d1a1a;
            line-height: 1.4;
            margin: 0.3rem 0;
        }

        .contact-info a {
            color: #c0392b;
            text-decoration: none;
        }

  
              
                  /* استجابة الشاشات */
        @media (max-width: 1024px) {
            .contact-card { flex: 0 0 45%; }
        }



                          
                          

        @media (max-width: 768px) {
            .contact-title { font-size: 1.6rem; }
            .contact-card { flex: 0 0 100%; }
        }

        @media (max-width: 480px) {
            .contact-title { font-size: 1.4rem; }
            .contact-card { padding: 1rem; }
        }
    </style>

</x-dashboard-layout>
