    window.addEventListener('load', () => {
    const loader = document.getElementById('loading-screen');

    // Jika ada penanda 'skipLoader' (bekas hapus data)
    if (sessionStorage.getItem('skipLoader') === 'true') {
        loader.style.display = 'none'; // Langsung sembunyikan loader tanpa animasi
        sessionStorage.removeItem('skipLoader'); // Hapus penanda agar loading normal kembali nanti
    } else {
        // Jika buka halaman biasa, jalankan animasi loading seperti biasa
        setTimeout(() => {
        loader.classList.add('hidden');
        }, 2000);
    }
    });