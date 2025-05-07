console.log("Layout.js loaded successfully");

// Definisikan fungsi di global scope
window.toggleDropdown = function () {
    const dropdownMenu = document.getElementById('dropdownMenu');
    if (dropdownMenu.classList.contains('show')) {
        dropdownMenu.classList.remove('show');
        setTimeout(() => {
            dropdownMenu.classList.add('hidden');
        }, 300); // Durasi animasi
    } else {
        dropdownMenu.classList.remove('hidden');
        setTimeout(() => {
            dropdownMenu.classList.add('show');
        }, 10); // Sedikit delay untuk memulai animasi
    }
};

// Tutup dropdown jika pengguna mengklik di luar elemen dropdown
document.addEventListener("click", function (event) {
    const dropdown = document.getElementById("dropdownMenu");
    const profileImg = document.getElementById("photoprofile");
    if (
        dropdown &&
        profileImg &&
        !profileImg.contains(event.target) &&
        !dropdown.contains(event.target)
    ) {
        dropdown.classList.add("hidden"); // Tambahkan class 'hidden' jika klik di luar dropdown
    }
});

// Fungsi untuk toggle search bar
window.toggleSearchBar = function () {
    const searchBar = document.getElementById("searchBar");
    if (searchBar) {
        searchBar.classList.toggle("hidden"); // Toggle visibility
        searchBar.classList.toggle("animate-slide-down"); // Add animation class
    }
};

// Tutup search bar jika pengguna mengklik di luar elemen search bar
document.addEventListener("click", function (event) {
    const searchBar = document.getElementById("searchBar");
    const searchButton = document.getElementById("searchButton");
    if (
        searchBar &&
        searchButton &&
        !searchButton.contains(event.target) &&
        !searchBar.contains(event.target)
    ) {
        searchBar.classList.add("hidden"); // Hide search bar
        searchBar.classList.remove("animate-slide-down"); // Remove animation
    }
});

window.previewImage = function (event) {
    const previewContainer = document.getElementById("previewContainer");
    const imagePreview = document.getElementById("imagePreview");
    const file = event.target.files[0];

    console.log("File selected:", file); // Debugging: Periksa file yang dipilih

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            console.log("FileReader result:", e.target.result); // Debugging: Periksa hasil FileReader
            imagePreview.src = e.target.result;
            previewContainer.classList.remove("hidden");
        };
        reader.readAsDataURL(file);
    } else {
        console.log("No file selected"); // Debugging: Tidak ada file
        previewContainer.classList.add("hidden");
        imagePreview.src = "";
    }
};

document.addEventListener("DOMContentLoaded", function () {
    const imageInput = document.getElementById("imageInput");
    const cropperModal = document.getElementById("cropperModal");
    const imagePreview = document.getElementById("imagePreview");
    const profileImage = document.getElementById("profileImage");
    const cropButton = document.getElementById("cropButton");
    const cancelCrop = document.getElementById("cancelCrop");
    let cropper;

    // Ketika gambar diunggah
    imageInput.addEventListener("change", function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                imagePreview.src = event.target.result;
                cropperModal.classList.remove("hidden");
                cropper = new Cropper(imagePreview, {
                    aspectRatio: 1, // Rasio 1:1 untuk foto profil
                    viewMode: 1,
                });
            };
            reader.readAsDataURL(file);
        }
    });

    // Ketika tombol "Simpan" ditekan
    cropButton.addEventListener("click", function () {
        const canvas = cropper.getCroppedCanvas({
            width: 300,
            height: 300,
        });

        // Perbarui gambar profil di halaman
        profileImage.src = canvas.toDataURL();

        // Simpan data gambar ke input hidden untuk dikirim ke server
        let croppedImageInput = document.querySelector(
            "input[name='cropped_image']"
        );
        if (!croppedImageInput) {
            croppedImageInput = document.createElement("input");
            croppedImageInput.type = "hidden";
            croppedImageInput.name = "cropped_image";
            document.querySelector("form").appendChild(croppedImageInput);
        }
        croppedImageInput.value = canvas.toDataURL("image/png"); // Data Base64 dari gambar yang di-crop

        cropper.destroy();
        cropperModal.classList.add("hidden");
        console.log("Cropped Image Input:", croppedImageInput.value);
    });

    // Ketika tombol "Batal" ditekan
    cancelCrop.addEventListener("click", function () {
        cropper.destroy();
        cropperModal.classList.add("hidden");
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;

    // Periksa preferensi dark mode dari localStorage
    if (localStorage.getItem('darkMode') === 'enabled') {
        body.classList.add('dark');
        darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>'; // Ganti ikon ke matahari
    }

    // Toggle dark mode
    darkModeToggle.addEventListener('click', function () {
        if (body.classList.contains('dark')) {
            body.classList.remove('dark');
            localStorage.setItem('darkMode', 'disabled');
            darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>'; // Ganti ikon ke bulan
        } else {
            body.classList.add('dark');
            localStorage.setItem('darkMode', 'enabled');
            darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>'; // Ganti ikon ke matahari
        }
    });
});
