<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Greasycle - Ubah Limbah Jadi Energi Hijau')</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#004030',
                    secondary: '#2d6a4f',
                    accent: '#d1e7e0',
                }
            }
        }
    }
</script>

<style>
    /* Global Styles */
    body { 
        font-family: 'Poppins', sans-serif; /* Pindah ke sini dan tanpa !important */
        background-color: #f7faf9;
        color: #333;
        line-height: 1.625;
        font-size: 16px;
        scroll-behavior: smooth; 
    }

    a { text-decoration: none !important; }

    /* Modal Styles */
    .modal-auth { 
        display: none; 
        position: fixed; 
        z-index: 3000; 
        left: 0; top: 0; 
        width: 100%; height: 100%; 
        background: rgba(0,0,0,0.6); 
        backdrop-filter: blur(5px); 
    }
    .modal-content { 
        background: white; 
        padding: 40px; 
        width: 90%; 
        max-width: 450px; 
        border-radius: 30px; 
        position: absolute; 
        top: 50%; left: 50%; 
        transform: translate(-50%, -50%); 
    }
    .hidden-form { display: none; }

    /* FAQ Animation Styles */
    .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.3s ease-out; }
    .faq-answer-active { max-height: 500px; transition: max-height 0.5s ease-in; }

    /* Footer Link Custom Style */
    .footer-link {
        color: #d1e7e0 !important;
        text-decoration: none !important;
        border-bottom: none !important;
        transition: all 0.3s ease;
        display: inline-block;
    }
    .footer-link:hover {
        color: white !important;
        transform: translateX(5px);
    }
</style>