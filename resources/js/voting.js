console.log('voting.js terhubung');

// Variabel untuk melacak status voting
let hasVoted = false;

document.querySelectorAll('form').forEach(function (form) {
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Mencegah submit form default

        // Cek apakah pengguna sudah memberikan suara
        if (hasVoted) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Anda sudah melakukan voting.',
                showConfirmButton: true
            });
            return; // Keluar dari fungsi jika sudah voting
        }

        // Ambil URL form dan token CSRF
        let actionUrl = form.action;
        let csrfToken = form.querySelector('input[name="_token"]').value;
        let kandidatId = form.querySelector('input[name="kandidat_id"]').value; // Ganti sesuai nama input Anda

        // Kirim request AJAX untuk voting
        fetch(actionUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ id: kandidatId }) // Kirim ID kandidat
        })
        .then(response => response.json())
        .then(data => {
            console.log('Response Data:', data); // Debugging
            
            if (data.success) {
                hasVoted = true; // Set status voting
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });

                // Nonaktifkan form setelah voting berhasil
                form.querySelector('button[type="submit"]').disabled = true; // Nonaktifkan tombol submit
                updateChart(); // Update diagram setelah voting berhasil
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: data.message, // Tampilkan pesan dari server
                    showConfirmButton: true
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Terjadi kesalahan. Coba lagi.',
                showConfirmButton: true
            });
        });
    });
});