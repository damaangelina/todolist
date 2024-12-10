@extends('layout')

@section('konten')

<!-- Sidebar -->
<div class="sidebar">
    <h2>Listo</h2>
    <a href="Dashboard">
        <i class="fas fa-tachometer-alt"></i> Dashboard
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

<div class="main-content">
    <div class="header">
        <h1>Tambah Tugas</h1>
        <div>Selamat datang, [Nama Pengguna]</div>
    </div>

    <!-- Form Tambah Tugas -->
    <div class="form-container">
        <form action="{{ route('tugas.submit') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="judul-tugas">Judul Tugas</label>
                <input type="text" name="judul_tugas" id="judul-tugas" class="form-control" placeholder="Masukkan judul tugas" required>
            </div>
            <div class="form-group">
                <label for="mata-kuliah">Mata Kuliah</label>
                <input type="text" name="mata_kuliah" id="mata-kuliah" class="form-control" placeholder="Masukkan mata kuliah" required>
            </div>
            <div class="form-group">
                <label for="deskripsi-tugas">Deskripsi Tugas</label>
                <textarea name="deskripsi_tugas" id="deskripsi-tugas" class="form-control" rows="5" placeholder="Tambahkan deskripsi tugas" required></textarea>
            </div>
            <div class="form-group">
                <label for="deadline-tugas">Deadline Tugas</label>
                <input type="date" name="deadline_tugas" id="deadline-tugas" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prioritas">Prioritas</label>
                <select name="prioritas" id="prioritas" class="form-control" required>
                    <option value="tinggi">Tinggi</option>
                    <option value="sedang">Sedang</option>
                    <option value="rendah">Rendah</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Listo. Semua hak dilindungi.</p>
    </footer>
</div>

<style>
    /* CSS Sidebar dan Layout */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f8fa;
        color: #333;
        display: flex;
    }
    .sidebar {
        width: 250px;
        background-color: #D6EEFF;
        padding: 20px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: #1e0342;
    }
    .sidebar h2 {
        font-size: 24px;
        margin-bottom: 30px;
    }
    .sidebar a {
        display: block;
        margin: 10px 0;
        text-decoration: none;
        color: #1e0342;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .sidebar a:hover {
        background-color: #0056b3;
        color: #fff;
    }
    .main-content {
        margin-left: 250px;
        padding: 20px;
        width: calc(100% - 250px);
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: #D6EEFF;
        color: #1e0342;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .header h1 {
        font-size: 28px;
    }
    .form-container {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 700px;
        margin: 0 auto;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 10px;
        color: #0056b3;
    }
    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        background-color: #f9f9f9;
    }
    .form-group button {
        background-color: #0056b3;
        color: #fff;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }
    .form-group button:hover {
        background-color: #003f7f;
        transform: translateY(-2px);
    }
    .footer {
        margin-top: 30px;
        text-align: center;
        padding: 10px 0;
        font-size: 14px;
        color: #aaa;
    }
</style>

@endsection