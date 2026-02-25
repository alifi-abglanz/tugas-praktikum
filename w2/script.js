
//dark mode
const btnTheme = document.getElementById('btn-theme');
const body = document.body;

// Cek apakah ada simpanan tema di browser?
if (localStorage.getItem('theme') === 'dark') {
    body.classList.add('dark-mode');
    btnTheme.innerHTML = "Mode Terang";
}

btnTheme.addEventListener('click', function() {
    body.classList.toggle('dark-mode');

    if (body.classList.contains('dark-mode')) {
    localStorage.setItem('theme', 'dark');
    btnTheme.innerHTML = "Mode Terang";
    } else {
    localStorage.removeItem('theme');
    btnTheme.innerHTML = "Mode Gelap";
    }
});

//button beli
function aktifkanTombolBeli() {
    const tombolBeli = document.querySelectorAll('.btn-main');
    tombolBeli.forEach(function(button) {
        button.replaceWith(button.cloneNode(true));
    });
    const tombolBaru = document.querySelectorAll('.btn-main');
    tombolBaru.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const cardBody = e.target.closest('.card-body');
            const stokElement = cardBody.querySelector('.stok-text');
            let stok = parseInt(stokElement.innerHTML.replace("Stok: ", ""));
            if (stok > 0) {
                stok--;
                stokElement.innerHTML = "Stok: " + stok;
                const namaBarang = cardBody.querySelector('.card-title').innerText;
                alert("Berhasil membeli " + namaBarang);
            } else {
                alert("Stok Habis!");
                e.target.classList.add('btn-disabled');
                e.target.setAttribute('aria-disabled', 'true');
                e.target.innerHTML = "Habis";
            }
        });
    });
}

aktifkanTombolBeli();
