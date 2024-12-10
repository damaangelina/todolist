<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple To-Do List</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Fredoka', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Menghindari scroll horizontal */
            background: linear-gradient(to bottom, rgb(226, 238, 249), rgb(237, 243, 247), rgb(245, 248, 250)); /* Gradasi biru ke putih */
        }

        .navbar {
            background-color: rgb(226, 238, 249);
            position: fixed; /* Ubah menjadi fixed untuk menjaga posisi di atas */
            top: 0;
            left: 0; /* Tambahkan ini untuk memastikan navbar mengisi lebar layar */
            width: 100%;
            z-index: 1000;
            padding: 10px;
            display: flex;
            justify-content: space-between; /* Mendorong logo ke tengah dan tombol ke kiri dan kanan */
            align-items: center;
        }

        .logo {
            font-size: 50px; /* Mengubah ukuran font */
            font-weight: bold; /* Mengubah ketebalan font */
            font-family: 'Fredoka', sans-serif; /* Menggunakan font Fredoka */
            color: #1E0342; /* Mengubah warna font */
            position: absolute; /* Memindahkan logo ke tengah */
            left: 50%;
            transform: translateX(-50%); /* Menyeimbangkan posisi logo */
        }

        .nav-items {
            display: flex; /* Membuat item navbar menjadi baris */
            justify-content: flex-start; /* Mengatur item ke kiri */
            margin-left: 30px; /* Menambahkan margin kiri untuk jarak dari tepi */
        }

        .nav-items a {
            text-decoration: none;
            color: #1e034296;
            font-size: 23px; /* Mengubah ukuran font */
            font-weight: 600; /* Mengubah ketebalan font */
            font-family: 'Fredoka', sans-serif; /* Menggunakan font Fredoka */
            padding: 5px;
            margin-right: 30px; /* Menambahkan margin kanan untuk jarak antar tombol */
            width: auto; /* Atur lebar otomatis agar sesuai dengan teks */
            text-align: center; /* Memastikan teks terpusat */
        }

        .navbar a:hover {
            color: rgb(99, 195, 236);
        }

        .login-button {
            border: 3px solid rgba(120, 215, 255, 0.766); /* Outline berwarna yang valid */
            border-radius: 35px; /* Sudut melengkung */
            padding: 7px; /* Hapus padding horizontal yang berlebihan */
            width: 120px; /* Atur lebar tombol */
            background-color: transparent; /* Membuat latar belakang transparan */
            color: #1e034296; /* Warna teks */
            font-size: 20px; /* Mengubah ukuran font */
            font-weight: 600; /* Mengubah ketebalan font */
            font-family: 'Fredoka', sans-serif; /* Menggunakan font Fredoka */
            transition: background-color 0.3s; /* Transisi halus */
            text-align: center; /* Mengatur teks agar terpusat */
            margin-right: 30px; /* Menambahkan margin kanan untuk jarak dari tepi kanan navbar */
            margin-left: 20px; /* Menambahkan margin kiri untuk memberi ruang dari tombol-tombol lain */
            text-decoration: none; /* Menghilangkan garis bawah */
        }

        .login-button:hover {
            background-color: rgb(244, 248, 251); /* Mengubah latar belakang saat hover */
            color: #1e034296; /* Mengubah warna teks saat hover */
        }

        .hero-section {
            display: flex; /* Mengatur hero-section sebagai flexbox */
            align-items: center; /* Menyelaraskan item di tengah secara vertikal */
            justify-content: space-between; /* Menyebar item di sepanjang sumbu horizontal */
            text-align: left;
            margin-left: 30px;
            padding: 50px 20px;
            margin-top: 0px; /* Memberi jarak untuk konten di bawah navbar */
        }

        .hero-section h1 {
            font-size: 58px;
            margin-bottom: 25px;
        }

        .hero-section p {
            font-size: 20px;
            color: #1e034296;
        }

        .hero-section img {
            width: 450px; /* Sesuaikan lebar gambar */
            height: auto; /* Menjaga rasio aspek gambar */
            margin-left: 50px; /* Memberikan jarak antara teks dan gambar */
            margin-right: 60px;
        }

        .cta-button {
            background-color: rgb(162, 227, 255);
            color: #1E0342;
            padding: 15px 50px;
            border: none;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 30px; /* Tambahkan jarak di atas tombol */
            display: inline-block; /* Pastikan tombol memiliki ruang */
        }

        .cta-button:hover {
            background-color: rgb(244, 248, 251);
            color: #1e034296;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 100%;
            max-width: 980px;
            margin-top: 0px; /* Jarak dari atas */
            margin-left: 250px; /* Jarak dari kiri */
            margin-right: 250px; /* Jarak dari kanan */
            margin-bottom: 1000px; /* Tambahkan jarak bawah untuk memberi ruang di bawah */
            gap: 40px; /* Memberikan jarak antara dua bagian */
        }

        .section {
            background: rgb(244, 248, 251);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 40%; /* Membagi lebar dua bagian */
            height: 100;
        }

        .section h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .task-list {
            margin-bottom: 20px;
        }

        .task-list p {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .calendar {
            background-color: #333; /* Latar belakang hitam untuk bagian kalender */
            color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .calendar h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .calendar-item {
            margin-bottom: 10px; /* Jarak antar item kalender */
        }

        
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">Listo</div>
        <div class="nav-items">
            <a href="#">Features</a>
            <a href="#">Pricing</a>
            <a href="#">Contact</a>
        </div>
        <a href="#" class="login-button">Login</a> <!-- Kelas login-button digunakan di sini -->
    </div>

    <div class="hero-section">
        <div>
            <h1>Listo memudahkan dalam mengelola proyek dan tugas</h1>
            <p>Mudah mengatur tugas pribadi, memberikan gambaran yang jelas tentang apa yang perlu diselesaikan.</p>
            <a href="#" class="cta-button">Get Started. It's FREE</a>
        </div>
        <img src="img/check.png" alt="check"> <!-- Gambar ditambahkan di sini -->
    </div>

    <div class="container">
        <div class="section">
            <h2>Tasks & Lists</h2>
            <div class="task-list">
                <p>Buy anniversary gift for Jenny</p>
                <p>Buy tickets for Radiohead</p>
                <p>Buy flowers for mom</p>
                <p>Call cable company</p>
                <p>Review Jen's work</p>
            </div>
        </div>

        <div class="section calendar">
            <h2>Calendar</h2>
            <div class="calendar-item">
                <strong>Monday</strong>
                <p>Breakfast with Alpha team at 09:00–10:30 at Main Market</p>
            </div>

            <div class="calendar-item">
                <p>Call the cable company at 12:30 PM</p>
            </div>

            <div class="calendar-item">
                <p>Get a new set of glasses at 2:30 PM</p>
            </div>

            <div class="calendar-item">
                <p>Review Q4 plan at 3:45 PM</p>
            </div>
        </div>
    </div>
</body>
</html>
