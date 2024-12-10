
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Listo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/beranda.css"> 
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Listo</h2>
        <a href="#">
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
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <div>Selamat datang, [Nama Pengguna]</div>
        </div>

        <!-- Notification Section -->
        <div class="notification">
            <strong>Notifikasi:</strong> Kamu memiliki tugas yang jatuh tempo dalam 2 hari. Pastikan untuk menyelesaikannya!
        </div>


        <!-- Task Management Section -->
        <div class="task-management">
            <h2>Manajemen Tugas</h2>
            <div id="task-container"></div> <!-- Tambahkan container untuk menampilkan tugas -->
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Fetch tasks for task management
                fetch('/api/tugas')
                    .then(response => response.json())
                    .then(data => {
                        const taskContainer = document.getElementById('task-container');
                        data.forEach((task) => {
                            let priorityIcons = '';
        
                            // Tentukan jumlah ikon bintang berdasarkan prioritas
                            if (task.prioritas === 'rendah') {
                                priorityIcons = '<i class="fas fa-star"></i>';
                            } else if (task.prioritas === 'sedang') {
                                priorityIcons = '<i class="fas fa-star"></i><i class="fas fa-star"></i>';
                            } else if (task.prioritas === 'tinggi') {
                                priorityIcons = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
                            }
        
                            // Check if the task is already checked from localStorage
                            const isChecked = localStorage.getItem(task_${task.id}) === 'true';
        
                            // Struktur elemen tugas dengan judul di samping ikon checklist
                            taskContainer.innerHTML += `
                                <div class="task">
                                    <label class="task-label">
                                        <input type="checkbox" class="task-checkbox" data-id="${task.id}" ${isChecked ? 'checked' : ''} />
                                        <span class="task-title">${task.judul_tugas}</span>
                                    </label>
                                    <span class="priority">${priorityIcons}</span>
                                </div>
                            `;
                        });
        
                        // Listen for checkbox changes
                        const checkboxes = document.querySelectorAll('.task-checkbox');
                        checkboxes.forEach(checkbox => {
                            checkbox.addEventListener('change', function() {
                                const taskId = this.getAttribute('data-id');
                                localStorage.setItem(task_${taskId}, this.checked);
                            });
                        });
                    })
                    .catch(error => console.log('Error:', error));
            });
        </script>        

        <!-- Calendar Section -->
        <div class="calendar-container">
            <h2>Kalender Tugas</h2>
            <div id="calendar"></div>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const taskModal = document.getElementById('taskModal');
            const closeButton = document.querySelector('.close-button');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: function(fetchInfo, successCallback, failureCallback) {
                    fetch('/api/tugas')
                        .then(response => response.json())
                        .then(data => {
                            const events = data.map(task => ({
                                title: task.judul_tugas,
                                date: task.deadline_tugas,
                                extendedProps: {
                                    mata_kuliah: task.mata_kuliah,
                                    deskripsi: task.deskripsi_tugas,
                                    prioritas: task.prioritas
                                }
                            }));
                            successCallback(events);
                        })
                        .catch(error => {
                            console.log('Error fetching tasks:', error);
                            failureCallback(error);
                        });
                },
                eventClick: function(info) {
                    // Populate modal with event data
                    document.getElementById('taskTitle').innerText = info.event.title;
                    document.getElementById('taskSubject').innerText = info.event.extendedProps.mata_kuliah;
                    document.getElementById('taskDescription').innerText = info.event.extendedProps.deskripsi;
                    document.getElementById('taskDeadline').innerText = info.event.start.toLocaleDateString();
                    document.getElementById('taskPriority').innerText = info.event.extendedProps.prioritas;

                    // Show the modal
                    taskModal.style.display = "block";
                }
            });

            calendar.render();

            // Close modal when close button is clicked
            closeButton.onclick = function() {
                taskModal.style.display = "none";
            };

            // Close modal when user clicks outside of modal content
            window.onclick = function(event) {
                if (event.target == taskModal) {
                    taskModal.style.display = "none";
                }
            };
        });
        </script>

    <!-- Modal Pop-up -->
    <div id="taskModal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2 id="taskTitle">Tugas</h2>
            <p><strong>Mata Kuliah:</strong> <span id="taskSubject"></span></p>
            <p><strong>Deskripsi:</strong> <span id="taskDescription"></span></p>
            <p><strong>Deadline:</strong> <span id="taskDeadline"></span></p>
            <p><strong>Prioritas:</strong> <span id="taskPriority"></span></p>
        </div>
    </div>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2024 Listo. Semua hak dilindungi.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        // Calendar Initialization
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    { title: 'Tugas 1: Penulisan Laporan', date: '2024-10-15' },
                    { title: 'Tugas 2: Presentasi Proyek', date: '2024-10-20' },
                    { title: 'Tugas 3: Ujian Tengah Semester', date: '2024-10-25' },
                    { title: 'Tugas 4: Baca Buku "Belajar JavaScript"', date: '2024-10-30' }
                ]
            });
            calendar.render();
        });
    </script>

</body>
</html>