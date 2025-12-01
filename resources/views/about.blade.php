<!-- resources/views/about.blade.php -->
<x-dashboard-layout :section="$section">
    <div style="
    display: grid;
    grid-template-columns: 1fr;
    grid-row-gap: 2rem;
    width: calc(100% - 50px);
    height: 100%;
    margin: 15px 0 0 35px;
    
">

        <div style="
        width: 100%;
        background: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.05);
        display: grid;
        grid-template-rows: auto;
        grid-row-gap: 1.5rem;
    ">

            <h1 style="color:#c0392b; margin-bottom:0.5rem;">About Blood Bank :</h1>
            <p style="color:#555;">Your trusted platform for managing blood donors and donations efficiently and safely.
            </p>

            <section style="width: 100%;">
                <h2 style="color:#922b21; margin-bottom:1rem;">Our Mission</h2>
                <p>
                    The Blood Bank Dashboard aims to streamline the process of blood donation by providing a clean,
                    modern,
                    and user-friendly interface for managing donor information and facilitating communication.
                </p>
            </section>

            <section style="width: 100%;">
                <h2 style="color:#922b21; margin-bottom:1rem;">Key Features</h2>
                <ul style="padding-left:1rem; text-align:left;">
                    <li>Register and maintain an updated list of donors with detailed profiles.</li>
                    <li>Manage donor registrations easily through a simple and responsive form.</li>
                    <li>Quick access to donor information sorted by blood group and location.</li>
                    <li>Secure user authentication and intuitive dashboard navigation.</li>
                </ul>
            </section>

            <section style="width: 100%;">
                <h2 style="color:#922b21; margin-bottom:1rem;">Why Choose Us?</h2>
                <p>
                    Our platform is built with a professional blood bank color scheme, ensuring accessibility and
                    clarity.
                    It is responsive and works seamlessly across desktop and mobile devices. The dashboard is designed
                    with
                    smooth animations and subtle hover effects to enhance user experience.
                </p>
            </section>

            <section style="width: 100%;">
                <h2 style="color:#922b21; margin-bottom:0.5rem;">Contact Information</h2>
                <p>Email: Abdullah@gmail.com</p>
                <p>Phone: +967 735-940-751</p>
            </section>

        </div>
    </div>
</x-dashboard-layout>