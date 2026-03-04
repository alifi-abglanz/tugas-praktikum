// dark mode
const btnTheme = document.getElementById('btn-theme');
const body = document.body;

if (btnTheme) {
    // Cek apakah ada simpanan tema di browser
    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
        btnTheme.innerHTML = 'Mode Terang';
    }

    btnTheme.addEventListener('click', function () {
        body.classList.toggle('dark-mode');

        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
            btnTheme.innerHTML = 'Mode Terang';
        } else {
            localStorage.removeItem('theme');
            btnTheme.innerHTML = 'Mode Gelap';
        }
    });
}

// tombol beli (hanya di card produk)
function aktifkanTombolBeli() {
    const tombolBeli = document.querySelectorAll('.card .card-body .btn-main');

    tombolBeli.forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const cardBody = e.currentTarget.closest('.card-body');
            if (!cardBody) {
                return;
            }

            const stokElement = cardBody.querySelector('.stok-text');
            if (!stokElement) {
                return;
            }

            let stok = parseInt(stokElement.textContent.replace('Stok: ', ''), 10);
            if (Number.isNaN(stok)) {
                return;
            }

            if (stok > 0) {
                stok -= 1;
                stokElement.textContent = 'Stok: ' + stok;
                const namaBarang = cardBody.querySelector('.card-title')?.innerText || 'produk';
                alert('Berhasil membeli ' + namaBarang);
            } else {
                alert('Stok Habis!');
                e.currentTarget.classList.add('btn-disabled');
                e.currentTarget.setAttribute('aria-disabled', 'true');
                e.currentTarget.innerHTML = 'Habis';
            }
        });
    });
}

aktifkanTombolBeli();
