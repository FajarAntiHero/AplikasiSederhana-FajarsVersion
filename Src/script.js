const tbody = document.querySelector('tbody');
const tbodyChild = tbody.getElementsByTagName('tr');
let popUpContainer = document.querySelector('.pop-up-container');
let closePopUp = popUpContainer.firstElementChild.lastElementChild.querySelector(".fa-rectangle-xmark");

for (let i = 0; i < tbodyChild.length; i++) {
    const links = tbodyChild[i].lastElementChild.firstElementChild.querySelector('a'); // Ambil semua link di dalam kolom terakhir
    if (links) {
        links.addEventListener('click', (event) => {
            // event.preventDefault(); // Mencegah link berjalan ke URL
            const id = new URL(this.href).searchParams.get('id');
        
            // Arahkan halaman ke URL yang sesuai (index.php?action=edit&id=id)
            window.location.href = `index.php?action=edit&id=${id}`;
            // popUpContainer.classList.remove('d-none'); // Toggle visibility
        });
    } else {
        console.warn(`Tidak ada link di baris ${i + 1}`);
    }
}

closePopUp.addEventListener('click', () => {
    popUpContainer.classList.toggle('d-none');
})

