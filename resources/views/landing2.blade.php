<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Pengingat Tugas Kuliah</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Fredoka', sans-serif;
            background-color: #f5f8fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #EAF6FF;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 45px;
            font-weight: bold;
            font-family: 'Fredoka', sans-serif;
            color: #1E0342;
            margin-left: 30px;
        }

        .nav-items {
            display: flex;
        }

        .nav-items a {
            text-decoration: none;
            color: #1e0342;
            font-size: 20px;
            font-weight: 600;
            margin-left: 30px;
            transition: color 0.3s;
        }

        .nav-items a:hover {
            color: rgb(99, 195, 236);
        }

        .login-button {
            border: 2px solid rgb(99, 195, 236);
            border-radius: 25px;
            padding: 10px 20px;
            background-color: transparent;
            color: rgb(99, 195, 236);
            font-size: 18px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .login-button:hover {
            background-color: rgb(99, 195, 236);
            color: white;
        }

        /* Hero Section Styles */
        .hero-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom, #EAF6FF, #D6EEFF);
            padding: 100px 50px;
            color: #1E0342;
        }

        .hero-text {
            max-width: 50%;
            margin-left: 18px;
            margin-bottom: 20px;
        }

        .hero-text h1 {
            font-size: 50px;
            margin-bottom: 10px;
            color: #1E0342;
        }

        .hero-text p {
            font-size: 20px;
            color: #333;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .cta-button {
            background-color: rgb(99, 195, 236);
            border: rgb(96, 193, 235);
            color: white;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 25px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: rgb(165, 226, 252);
        }

        .hero-image img {
            width: 550px;
            height: auto;
        }

        /* Feature Section Styles */
        .feature {
            width: 30%;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center; /* Menambahkan ini untuk memusatkan teks */
            display: flex; /* Menambahkan ini */
            flex-direction: column; /* Menambahkan ini */
            align-items: center; /* Menambahkan ini */
        }

        .feature-section h2 {
            text-align: center; /* Menambahkan ini untuk memusatkan teks */
            font-size: 32px;
            margin-bottom: 40px;
            margin-top: 40px;
            color: #1E0342;
        }

        .features {
            display: flex;
            justify-content: space-around;
            text-align: center;
        }

        .feature {
            width: 30%;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .feature h3 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .feature p {
            color: #666;
        }

        /* Testimonials Section */
        .testimonial-section {
            padding: 50px 0;
            background-color: #EAF6FF;
        }

        .testimonial-section h2 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 40px;
            color: #1E0342;
        }

        .testimonials {
            display: flex;
            justify-content: space-around;
            text-align: center;
        }

        .testimonial {
            width: 30%;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .testimonial img {
            border-radius: 50%;
            width: 80px;
            margin-bottom: 10px;
        }

        .testimonial p {
            font-size: 16px;
            color: #666;
        }

        .testimonial h3 {
            margin-top: 15px;
            font-size: 20px;
            color: #1E0342;
        }

        /* Footer Section */
        .footer {
            background-color: rgb(99, 195, 236);
            color: white;
            padding: 30px 50px;
            text-align: center;
        }

        .footer p {
            margin-bottom: 0;
        }

         /* Animations */
         @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(0);
            }
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">Listo</div>
        <div class="nav-items">
            <a href="#">Features</a>
            <a href="#">Pricing</a>
            <a href="#">Contact</a>
        </div>
        <a href="#" class="login-button">Login</a>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-text">
            <h1>Kelola Tugas Kuliahmu dengan Mudah</h1>
            <p>Dengan Listo, kamu dapat mengelola tugas kuliah, menandai prioritas, dan mendapatkan notifikasi pengingat tepat waktu, sehingga tidak ada lagi tugas yang terlewat.</p>
            <a href="#" class="cta-button">Coba Gratis Sekarang</a>
        </div>
        <div class="hero-image">
            <img src="img/check.png" alt="check">
        </div>
    </section>

    <!-- Feature Section -->
    <section class="feature-section">
        <h2>Fitur</h2>
        <div class="container">
            <div class="features">
                <div class="feature">
                    <h3>Manajemen Tugas</h3>
                    <p>Mudah mengatur, memprioritaskan, dan melacak tugas kuliah dalam satu platform.</p>
                </div>
                <div class="feature">
                    <h3>Notifikasi Pengingat</h3>
                    <p>Dapatkan notifikasi pengingat sebelum tenggat waktu sehingga kamu tidak akan lupa.</p>
                </div>
                <div class="feature">
                    <h3>Prioritas Tugas</h3>
                    <p>Tandai tugas berdasarkan tingkat prioritas agar kamu tahu mana yang harus diselesaikan lebih dahulu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <h2>Apa Kata Pengguna Kami?</h2>
        <div class="testimonials">
            <div class="testimonial">
                <img src="img/andi.jpeg" alt="Andi">
                <p>"Listo sangat membantu dalam mengatur tugas-tugas kuliah saya, tidak ada lagi tugas yang terlewat."</p>
                <h3>Andi, Mahasiswa TI</h3>
            </div>
            <div class="testimonial">
                <img src="img/siti.jpeg" alt="User">
                <p>"Fitur prioritas dan notifikasinya luar biasa! Saya lebih teratur dalam menyelesaikan tugas."</p>
                <h3>Siti, Mahasiswa Manajemen</h3>
            </div>
            <div class="testimonial">
                <img src="img/budi.jpeg" alt="User">
                <p>"Listo benar-benar membantu saya tetap produktif selama semester yang sibuk ini."</p>
                <h3>Budi, Mahasiswa Akuntansi</h3>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 Listo. Semua hak dilindungi.</p>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>


</body>
</html>