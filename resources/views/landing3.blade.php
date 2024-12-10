<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Pengingat Tugas Kuliah</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&family=Satisfy&display=swap" rel="stylesheet">
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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .navbar.scrolled {
            background-color: #D6EEFF;
        }

        .logo {
            font-size: 40px;
            font-weight: bold;
            font-family: 'Fredoka', sans-serif;
            color: #1E0342;
            transition: color 0.3s;
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
            color: #1E90FF;
        }

        .login-button {
            border: 2px solid #1E90FF;
            border-radius: 25px;
            padding: 10px 20px;
            background-color: transparent;
            color: #1E90FF;
            font-size: 18px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }

        .login-button:hover {
            background-color: #1E90FF;
            color: white;
            box-shadow: 0px 4px 15px rgba(30, 144, 255, 0.5);
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
            animation: fadeIn 1s ease-in-out;
        }

        .hero-text {
            max-width: 50%;
            animation: slideInLeft 1.5s ease-out;
        }

        .hero-text h1 {
            font-size: 60px;
            margin-bottom: 20px;
            color: #1E0342;
            font-family: 'Fredoka', sans-serif;
        }

        .hero-text p {
            font-size: 22px;
            color: #333;
            margin-bottom: 30px;
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
            background-color: #1E90FF;
            box-shadow: 0px 4px 15px rgba(30, 144, 255, 0.5);
        }

        .hero-section img {
            width: 600px;
            height: auto;
            margin-left: 30px;
            animation: slideInRight 1.5s ease-out;
        }

        /* Feature Section Styles */
        .feature-section {
            padding: 70px 0;
            background-color: #f0f8ff;
        }

        .features {
            display: flex;
            justify-content: space-around;
            text-align: center;
        }

        .feature {
            width: 30%;
            padding: 30px;
            background-color: white;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
        }

        .feature-section h2 {
            text-align: center;
            font-size: 34px;
            margin-bottom: 50px;
            color: #1E0342;
        }

        .feature h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #1E0342;
        }

        .feature p {
            color: #666;
        }

        .feature img {
            width: 200px; /* Ukuran gambar */
            height: auto;
            margin-bottom: 15px; /* Jarak antara gambar dan teks */
        }

        /* Testimonials Section */
        .testimonial-section {
            padding: 45px 0;
            background-color: #EAF6FF;
        }

        .testimonial-section h2 {
            text-align: center;
            font-size: 34px;
            margin-bottom: 50px;
            color: #1E0342;
        }

        .testimonials {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            gap: 20px;
            padding: 0 20px;
            height: 400px; /* Menentukan panjang/tinggi kontainer */

            scrollbar-width: none; /* Untuk Firefox */
            -ms-overflow-style: none; /* Untuk Internet Explorer/Edge */
        }

        .testimonials::-webkit-scrollbar {
        display: none; /* Untuk Chrome, Safari, dan Edge berbasis Chromium */
        }

        .testimonial {
            scroll-snap-align: center;
            flex: 0 0 auto;
            height: 320px;
            width: 300px;
            padding: 25px;
            margin-top: 15px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .testimonial:last-child {
            margin-right: 0; /* Menghapus margin pada testimoni terakhir */
        }

        .testimonial:hover {
            transform: translateY(-10px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
        }

        .testimonial img {
            border-radius: 50%;
            width: 100px;
            margin-bottom: 20px;
        }

        .testimonial p {
            font-size: 16px;
            color: #666;
        }

        .testimonial h3 {
            margin-top: 20px;
            font-size: 22px;
            color: #1E0342;
        }

        .contact-section {
            background-color: #EAF6FF;
            padding: 50px 20px;
            text-align: center;
            margin-bottom: 0px;
        }

        .contact-section h2 {
            font-size: 34px;
            color: #1E0342;
            margin-bottom: 15px;
        }

        .contact-section p {
            font-size: 18px;
            color: #333;
            margin-bottom: 25px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .social-icons a img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .social-icons a img:hover {
            transform: scale(1.1);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Footer Section */
        .footer {
            background-color: #1E90FF;
            color: white;
            padding: 30px 50px;
            height: 80px;
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

    <div class="navbar">
        <div class="logo">Listo</div>
        <div class="nav-items">
            <a href="#fitur">Fitur</a>
            <a href="#ulasan">Ulasan</a>
            <a href="#kontak">Kontak</a>
        </div>
        <a href="login" class="login-button">Login</a>
    </div>

    <section class="hero-section">
        <div class="hero-text">
            <h1>Kelola Tugas Kuliahmu dengan Mudah</h1>
            <p>Dengan Listo, kamu dapat mengelola tugas kuliah, menandai prioritas, dan mendapatkan notifikasi pengingat tepat waktu, sehingga tidak ada lagi tugas yang terlewat.</p>
            <a href="login" class="cta-button">Coba Gratis Sekarang</a>
        </div>
        <div class="hero-image">
            <img src="img/check.png" alt="check">
        </div>
    </section>

    <section id="fitur" class="feature-section">
        <h2>Fitur</h2>
        <div class="container">
            <div class="features">
                <div class="feature">
                <img src="img/manajemen_2.png" alt="manajemen_2">
                    <h3>Manajemen Tugas</h3>
                    <p>Mudah mengatur, memprioritaskan, dan melacak tugas kuliah dalam satu platform.</p>
                </div>
                <div class="feature">
                    <img src="img/reminder2-.png" alt="reminder2-">
                    <h3>Pemberitahuan Pengingat</h3>
                    <p>Notifikasi otomatis untuk mengingatkanmu sebelum tenggat waktu tugas.</p>
                </div>
                <div class="feature">
                    <img src="img/ui-removebg.png" alt="ui-removebg">
                    <h3>Antarmuka yang Ramah Pengguna</h3>
                    <p>Desain yang intuitif dan mudah digunakan untuk semua mahasiswa.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="ulasan" class="testimonial-section">
        <h2>Apa Kata Pengguna Kami?</h2>
        <div class="testimonials">
            <div class="testimonial">
                <img src="img/andi.jpeg" alt="andi">
                <p>"Listo sangat membantu dalam mengatur tugas-tugas kuliah saya, tidak ada lagi tugas yang terlewat."</p>
                <h3>Andi, Mahasiswa TI</h3>
            </div>
            <div class="testimonial">
                <img src="img/siti.jpeg" alt="siti">
                <p>"Fitur prioritas dan notifikasinya luar biasa! Saya lebih teratur dalam menyelesaikan tugas."</p>
                <h3>Siti, Mahasiswa Manajemen</h3>
            </div>
            <div class="testimonial">
                <img src="img/budi.jpeg" alt="budi">
                <p>"Listo benar-benar membantu saya tetap produktif selama semester yang sibuk ini."</p>
                <h3>Budi, Mahasiswa Akuntansi</h3>
            </div>
            <div class="testimonial">
                <img src="img/rina.jpg" alt="rina">
                <p>"Aplikasi ini membuat hidup saya jauh lebih terorganisir. Tidak pernah lupa lagi dengan tugas-tugas penting."</p>
                <h3>Rina, Mahasiswa Psikologi</h3>
            </div>
            <div class="testimonial">
                <img src="img/david.jpg" alt="david">
                <p>"Sangat membantu dalam menyelesaikan semua tugas tepat waktu, apalagi saat jadwal kuliah sedang padat."</p>
                <h3>David, Mahasiswa Hukum</h3>
            </div>
        </div>
    </section>

    <section id="kontak" class="contact-section">
        <h2>Hubungi Kami</h2>
        <p>Terhubung dengan kami di platform favorit Anda</p>
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank">
                <img src="img/facebook.png" alt="Facebook">
            </a>
            <a href="https://instagram.com" target="_blank">
                <img src="img/instagram.png" alt="Instagram">
            </a>
            <a href="https://tiktok.com" target="_blank">
                <img src="img/tiktok.png" alt="TikTok">
            </a>
            <a href="https://twitter.com" target="_blank">
                <img src="img/twitter.png" alt="Twitter">
            </a>
        </div>
    </section>
    
    <footer class="footer">
        <p>&copy; 2024 Listo. Semua hak dilindungi.</p>
    </footer>

    <script>
        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

    <script>
        document.querySelectorAll('.nav-items a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                window.scrollTo({
                    top: targetElement.offsetTop - document.querySelector('.navbar').offsetHeight,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>