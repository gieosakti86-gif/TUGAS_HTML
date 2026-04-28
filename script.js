document.addEventListener('DOMContentLoaded', () => {
    const fuji = document.getElementById('fuji-moving');
    const btn = document.getElementById('btnStart');

    let positionX = 0;
    let animationId = null;
    let isMoving = false;

    // Cek status sukses dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const sudahSubmit = urlParams.get('status') === 'sukses';

    if (sudahSubmit) {
        alert("Alhamdulillah sudah di isi, mangga bisa di start mueheheheehe");
    }

    function move() {
        positionX -= 2;
        // Reset posisi jika sudah geser satu putaran gambar (lebar container 400px)
        if (positionX <= -400) positionX = 0;
        fuji.style.left = positionX + 'px';
        animationId = requestAnimationFrame(move);
    }

    btn.addEventListener('click', () => {
        if (!sudahSubmit) {
            alert("eitsss isi dlu itu nama dan umur lalu submit baru bisa jalankan animasinya wahahaahahaha");
            return;
        }

        if (!isMoving) {
            move();
            isMoving = true;
            btn.textContent = "Stop Animasi";
            btn.style.backgroundColor = "#dc3545";
        } else {
            cancelAnimationFrame(animationId);
            isMoving = false;
            btn.textContent = "Start Animasi";
            btn.style.backgroundColor = "#007bff";
        }
    });
});