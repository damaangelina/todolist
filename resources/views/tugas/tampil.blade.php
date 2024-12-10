<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="css/dashboard.css"> 

@extends('layout')

@section('konten')

<!-- Sidebar -->
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

<div class="main-content">
    <div class="header">
        <h1>Tugas Saya</h1>
        <div>Selamat datang, [Nama Pengguna]</div>
    </div>

    <div class="d-flex task-header">
        <h4>List Tugas</h4>
        <div class="ms-auto">
            <a class="btn btn-success" href="{{ route('tugas.tambah') }}">Tambah Tugas</a>
        </div>
    </div>

    <!-- Form Pencarian -->
    <form action="{{ route('tugas.tampil') }}" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Cari tugas..." class="search-input" value="{{ request()->get('search') }}" />
        <button type="submit" class="search-button">
            <i class="fas fa-search"></i>
        </button>
    </form>

    <!-- Tabel Tugas dengan Ikon Sort -->
    <table class="table task-list">
        <tr>
            <th>No</th>
            <th>
                Judul Tugas 
                <a href="{{ route('tugas.sort', ['field' => 'judul_tugas', 'order' => 'asc']) }}">
                    <i class="fas fa-sort"></i>
                </a>
            </th>
            <th>
                Mata Kuliah 
                <a href="{{ route('tugas.sort', ['field' => 'mata_kuliah', 'order' => 'asc']) }}">
                    <i class="fas fa-sort"></i>
                </a>
            </th>
            <th>Deskripsi Tugas</th>
            <th>
                Deadline Tugas 
                <a href="{{ route('tugas.sort', ['field' => 'deadline_tugas', 'order' => 'asc']) }}">
                    <i class="fas fa-sort"></i>
                </a>
            </th>
            <th>Prioritas</th>
            <th>Aksi</th>
        </tr>
        @foreach ($tugas as $no => $data)
        <tr class="task-item">
            <td>{{ $no+1 }}</td>
            <td>{{ $data->judul_tugas }}</td>
            <td>{{ $data->mata_kuliah }}</td>
            <td>{{ $data->deskripsi_tugas }}</td>
            <td>{{ $data->deadline_tugas }}</td>
            <td>{{ $data->prioritas }}</td>
            <td>
                <div class="task-actions">
                    <a href="{{ route('tugas.edit', $data->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form action="{{ route('tugas.delete', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE') <!-- Tambahkan ini -->
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr> 
        @endforeach
    </table>

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
    .task-header {
        background-color: #ffffff;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .search-form {
        display: flex;
        margin-bottom: 20px;
    }
    .search-input {
        padding: 8px;
        font-size: 16px;
        border-radius: 5px 0 0 5px;
        border: 1px solid #ccc;
        width: 300px;
    }
    .search-button {
        background-color: #0056b3;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
    }
    .search-button:hover {
        background-color: #003f7f;
    }
    .table {
        width: 100%;
        background-color: #ffffff;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .table th, .table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .table th {
        background-color: #D6EEFF;
        color: #1e0342;
        font-weight: bold;
    }
    .task-item {
        transition: background-color 0.3s;
    }
    .task-item:hover {
        background-color: #f1f1f1;
    }
    .btn-success {
        background-color: #0056b3;
        color: #fff;
        border: none;
        padding: 8px 20px;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s;
    }
    .btn-success:hover {
        background-color: #003f7f;
    }
    .task-actions {
        display: flex;
        gap: 10px;
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