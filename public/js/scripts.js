document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".centernav ul li a");
    let currentPath = window.location.pathname.split("/").pop(); // Ambil nama file HTML

    if (currentPath === "" || currentPath === "index.html") {
        currentPath = "index.html"; // Jika kosong, anggap sebagai index.html
    }

    links.forEach(link => {
        if (link.getAttribute("href") === currentPath) {
            link.classList.add("active");
        }
    });
});
