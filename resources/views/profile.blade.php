<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/profile.css">
</head>

<div class="sidebar">
    <h2>Listo</h2>
    <a href="beranda">
        <i class="fas fa-tachometer-alt"></i> Beranda
    </a>
    <a href="tugas">
        <i class="fas fa-tasks"></i> Tugas Saya
    </a>
    <a href="pengaturan">
        <i class="fas fa-cog"></i> Pengaturan
    </a>
    <a href="profile">
        <i class="fas fa-user"></i> Profil
    </a>
    <a href="keluar">
        <i class="fas fa-sign-out-alt"></i> Keluar
    </a>
</div>

<body>


    <div class="main-content">
        <div class="header">
            <h1>Profil Pengguna</h1>
        </div>

        <div class="profile-container">
            <h2>Informasi Akun</h2>
            <div class="profile-picture-container">
                <img src="img/siti.jpeg" alt="Foto Profil" class="profile-picture">
            </div>

            <div class="profile-info">
                <div>
                    <label for="firstName">Nama Depan</label>
                    <input type="text" id="firstName" name="firstName" placeholder="Nama Depan">
                </div>
                <div>
                    <label for="lastName">Nama Belakang</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Nama Belakang">
                </div>
            </div>
            <div class="profile-info">
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="email@example.com">
                </div>
                <div>
                    <label for="phone">Nomor Telepon</label>
                    <input type="text" id="phone" name="phone" placeholder="Nomor Telepon">
                </div>
            </div>
            <button class="save-btn">Simpan Perubahan</button>
        </div>

        <footer class="footer">
            <p>&copy; 2024 Listo. Semua hak dilindungi.</p>
        </footer>
    </div>

</body>
</html>
