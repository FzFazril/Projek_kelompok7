<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-64 bg-indigo-900 text-white flex flex-col justify-between">
            <div>
                <div class="p-5 text-2xl font-bold border-b border-indigo-800 flex items-center gap-3">
                    <i class="fa-solid fa-book-open text-indigo-400"></i> PerpusApp
                </div>
                <nav class="mt-5 px-3">
                    <a href="#" onclick="switchTab('petugas')" id="nav-petugas" class="nav-item flex items-center gap-3 py-3 px-4 rounded-lg bg-indigo-800 text-white font-medium mb-2 transition">
                        <i class="fa-solid fa-user-shield w-5"></i> Data Petugas
                    </a>
                    <a href="#" onclick="switchTab('peminjam')" id="nav-peminjam" class="nav-item flex items-center gap-3 py-3 px-4 rounded-lg text-indigo-200 hover:bg-indigo-800 hover:text-white font-medium mb-2 transition">
                        <i class="fa-solid fa-users w-5"></i> Data Peminjam
                    </a>
                    <a href="#" onclick="switchTab('buku')" id="nav-buku" class="nav-item flex items-center gap-3 py-3 px-4 rounded-lg text-indigo-200 hover:bg-indigo-800 hover:text-white font-medium mb-2 transition">
                        <i class="fa-solid fa-book w-5"></i> Data Buku
                    </a>
                </nav>
            </div>
            <div class="p-5 border-t border-indigo-800 text-xs text-indigo-300">
                System Admin v1.0
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Header -->
            <header class="bg-white shadow-sm p-4 flex justify-between items-center px-8">
                <h1 id="page-title" class="text-2xl font-bold text-gray-800">Data Petugas</h1>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600">Halo, <b>Admin</b></span>
                    <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold">A</div>
                </div>
            </header>

            <main class="p-8">
                <!-- Stat Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Total Petugas</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-1" id="stat-petugas">0</h3>
                        </div>
                        <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center text-xl">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Total Peminjam</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-1" id="stat-peminjam">0</h3>
                        </div>
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center text-xl">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Total Buku</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-1" id="stat-buku">0</h3>
                        </div>
                        <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center text-xl">
                            <i class="fa-solid fa-book"></i>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 id="table-title" class="text-lg font-bold text-gray-800">Daftar Petugas</h2>
                        <button onclick="openModal()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition">
                            <i class="fa-solid fa-plus"></i> Tambah Data
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-600">
                            <thead class="bg-gray-50 text-gray-700 uppercase text-xs border-b">
                                <tr id="table-header">
                                    <!-- Header terisi otomatis via JavaScript -->
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <!-- Data terisi otomatis via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal Form (Tambah / Edit) -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
            <div class="flex justify-between items-center mb-4 border-b pb-3">
                <h3 id="modal-title" class="text-lg font-bold text-gray-800">Form Data</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
            </div>
            <form id="data-form" onsubmit="saveData(event)">
                <input type="hidden" id="edit-id">
                <div id="form-fields" class="space-y-4">
                    <!-- Dynamic Input Fields -->
                </div>
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-50 text-sm">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript Logic -->
    <script>
        // Data Dummy awal
        let data = {
            petugas: [
                { id: 1, nama: 'Ahmad Fauzi', id_petugas: 'PTG001', jabatan: 'Kepala Perpustakaan' },
                { id: 2, nama: 'Siti Rahma', id_petugas: 'PTG002', jabatan: 'Staf Administrasi' }
            ],
            peminjam: [
                { id: 1, nama: 'Budi Santoso', id_peminjam: 'PMJ001', status: 'Siswa', kontak: '08123456789' },
                { id: 2, nama: 'Dewi Lestari', id_peminjam: 'PMJ002', status: 'Guru', kontak: '08987654321' }
            ],
            buku: [
                { id: 1, judul: 'Laskar Pelangi', kode: 'BK001', pengarang: 'Andrea Hirata', stok: 5 },
                { id: 2, judul: 'Bumi', kode: 'BK002', pengarang: 'Tere Liye', stok: 3 }
            ]
        };

        let currentTab = 'petugas';

        // Inisialisasi Tampilan
        document.addEventListener('DOMContentLoaded', () => {
            render();
        });

        // Pindah Tab Navigasi
        function switchTab(tab) {
            currentTab = tab;
            
            // Update Tampilan Sidebar Active State
            document.querySelectorAll('.nav-item').forEach(el => {
                el.classList.remove('bg-indigo-800', 'text-white');
                el.classList.add('text-indigo-200');
            });
            const activeNav = document.getElementById(`nav-${tab}`);
            activeNav.classList.add('bg-indigo-800', 'text-white');
            activeNav.classList.remove('text-indigo-200');

            // Update Judul
            const titles = { petugas: 'Data Petugas', peminjam: 'Data Peminjam', buku: 'Data Buku' };
            document.getElementById('page-title').innerText = titles[tab];
            document.getElementById('table-title').innerText = `Daftar ${titles[tab].replace('Data ', '')}`;

            render();
        }

        // Render Data ke Tabel dan Update Statistik
        function render() {
            // Update Stat Cards
            document.getElementById('stat-petugas').innerText = data.petugas.length;
            document.getElementById('stat-peminjam').innerText = data.peminjam.length;
            document.getElementById('stat-buku').innerText = data.buku.length;

            const header = document.getElementById('table-header');
            const body = document.getElementById('table-body');
            header.innerHTML = '';
            body.innerHTML = '';

            // Header & Body Render berdasarkan Tab Aktif
            if (currentTab === 'petugas') {
                header.innerHTML = `
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">ID Petugas</th>
                    <th class="py-3 px-4">Nama</th>
                    <th class="py-3 px-4">Jabatan</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                `;
                data.petugas.forEach((item, index) => {
                    body.innerHTML += `
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">${index + 1}</td>
                            <td class="py-3 px-4 font-semibold text-indigo-600">${item.id_petugas}</td>
                            <td class="py-3 px-4">${item.nama}</td>
                            <td class="py-3 px-4">${item.jabatan}</td>
                            <td class="py-3 px-4 text-center space-x-2">
                                <button onclick="editData(${item.id})" class="text-amber-500 hover:text-amber-700"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                                <button onclick="deleteData(${item.id})" class="text-red-500 hover:text-red-700 ml-2"><i class="fa-solid fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    `;
                });
            } else if (currentTab === 'peminjam') {
                header.innerHTML = `
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">ID Peminjam</th>
                    <th class="py-3 px-4">Nama</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Kontak</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                `;
                data.peminjam.forEach((item, index) => {
                    body.innerHTML += `
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">${index + 1}</td>
                            <td class="py-3 px-4 font-semibold text-indigo-600">${item.id_peminjam}</td>
                            <td class="py-3 px-4">${item.nama}</td>
                            <td class="py-3 px-4"><span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">${item.status}</span></td>
                            <td class="py-3 px-4">${item.kontak}</td>
                            <td class="py-3 px-4 text-center space-x-2">
                                <button onclick="editData(${item.id})" class="text-amber-500 hover:text-amber-700"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                                <button onclick="deleteData(${item.id})" class="text-red-500 hover:text-red-700 ml-2"><i class="fa-solid fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    `;
                });
            } else if (currentTab === 'buku') {
                header.innerHTML = `
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Kode Buku</th>
                    <th class="py-3 px-4">Judul Buku</th>
                    <th class="py-3 px-4">Pengarang</th>
                    <th class="py-3 px-4">Stok</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                `;
                data.buku.forEach((item, index) => {
                    body.innerHTML += `
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">${index + 1}</td>
                            <td class="py-3 px-4 font-semibold text-indigo-600">${item.kode}</td>
                            <td class="py-3 px-4">${item.judul}</td>
                            <td class="py-3 px-4">${item.pengarang}</td>
                            <td class="py-3 px-4">${item.stok}</td>
                            <td class="py-3 px-4 text-center space-x-2">
                                <button onclick="editData(${item.id})" class="text-amber-500 hover:text-amber-700"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                                <button onclick="deleteData(${item.id})" class="text-red-500 hover:text-red-700 ml-2"><i class="fa-solid fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    `;
                });
            }
        }

        // Buka Modal
        function openModal(isEdit = false) {
            const formFields = document.getElementById('form-fields');
            document.getElementById('modal-title').innerText = isEdit ? 'Edit Data' : 'Tambah Data';
            formFields.innerHTML = '';

            if (currentTab === 'petugas') {
                formFields.innerHTML = `
                    <div>
                        <label class="block text-sm font-medium text-gray-700">ID Petugas</label>
                        <input type="text" id="f_id_petugas" required class="mt-1 w-full p-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Petugas</label>
                        <input type="text" id="f_nama" required class="mt-1 w-full p-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jabatan</label>
                        <input type="text" id="f_jabatan" required class="mt-1 w-full p-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                `;
            } else if (currentTab === 'peminjam') {
                formFields.innerHTML = `
                    <div>
                        <label class="block text-sm font-medium text-gray-700">ID Peminjam</label>
                        <input type="text" id="f_id_peminjam" required class="mt-1 w-full p-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Peminjam</label>
                        <input type="text" id="f_nama" required class="mt-1 w-full p-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="f_status" class="mt-1 w-full p-2 border rounded-lg">
                            <option value="Siswa">Siswa</option>
                            <option value="Guru">Guru</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kontak</label>
                        <input type="text" id="f_kontak" required class="mt-1 w-full p-2 border rounded-lg">
                    </div>
                `;
            } else if (currentTab === 'buku') {
                formFields.innerHTML = `
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kode Buku</label>
                        <input type="text" id="f_kode" required class="mt-1 w-full p-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul Buku</label>
                        <input type="text" id="f_judul" required class="mt-1 w-full p-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pengarang</label>
                        <input type="text" id="f_pengarang" required class="mt-1 w-full p-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Stok</label>
                        <input type="number" id="f_stok" required class="mt-1 w-full p-2 border rounded-lg">
                    </div>
                `;
            }

            document.getElementById('modal').classList.remove('hidden');
        }

        // Tutup Modal
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('edit-id').value = '';
            document.getElementById('data-form').reset();
        }

        // Simpan Data (Tambah atau Update)
        function saveData(event) {
            event.preventDefault();
            const editId = document.getElementById('edit-id').value;

            if (currentTab === 'petugas') {
                const payload = {
                    id: editId ? parseInt(editId) : Date.now(),
                    id_petugas: document.getElementById('f_id_petugas').value,
                    nama: document.getElementById('f_nama').value,
                    jabatan: document.getElementById('f_jabatan').value
                };

                if (editId) {
                    const idx = data.petugas.findIndex(i => i.id == editId);
                    data.petugas[idx] = payload;
                } else {
                    data.petugas.push(payload);
                }
            } else if (currentTab === 'peminjam') {
                const payload = {
                    id: editId ? parseInt(editId) : Date.now(),
                    id_peminjam: document.getElementById('f_id_peminjam').value,
                    nama: document.getElementById('f_nama').value,
                    status: document.getElementById('f_status').value,
                    kontak: document.getElementById('f_kontak').value
                };

                if (editId) {
                    const idx = data.peminjam.findIndex(i => i.id == editId);
                    data.peminjam[idx] = payload;
                } else {
                    data.peminjam.push(payload);
                }
            } else if (currentTab === 'buku') {
                const payload = {
                    id: editId ? parseInt(editId) : Date.now(),
                    kode: document.getElementById('f_kode').value,
                    judul: document.getElementById('f_judul').value,
                    pengarang: document.getElementById('f_pengarang').value,
                    stok: document.getElementById('f_stok').value
                };

                if (editId) {
                    const idx = data.buku.findIndex(i => i.id == editId);
                    data.buku[idx] = payload;
                } else {
                    data.buku.push(payload);
                }
            }

            closeModal();
            render();
        }

        // Fitur Edit
        function editData(id) {
            openModal(true);
            document.getElementById('edit-id').value = id;
            const targetData = data[currentTab].find(item => item.id === id);

            if (currentTab === 'petugas') {
                document.getElementById('f_id_petugas').value = targetData.id_petugas;
                document.getElementById('f_nama').value = targetData.nama;
                document.getElementById('f_jabatan').value = targetData.jabatan;
            } else if (currentTab === 'peminjam') {
                document.getElementById('f_id_peminjam').value = targetData.id_peminjam;
                document.getElementById('f_nama').value = targetData.nama;
                document.getElementById('f_status').value = targetData.status;
                document.getElementById('f_kontak').value = targetData.kontak;
            } else if (currentTab === 'buku') {
                document.getElementById('f_kode').value = targetData.kode;
                document.getElementById('f_judul').value = targetData.judul;
                document.getElementById('f_pengarang').value = targetData.pengarang;
                document.getElementById('f_stok').value = targetData.stok;
            }
        }

        // Fitur Hapus Data
        function deleteData(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                data[currentTab] = data[currentTab].filter(item => item.id !== id);
                render();
            }
        }
    </script>
</body>
</html>