window.generateWhatsAppLink = function () {
    const phoneInput = document.getElementById("phone");
    const linkInput = document.getElementById("link");
    const phone = phoneInput.value.trim();

    if (!phone) {
        alert("Masukkan nomor telepon terlebih dahulu!");
        return;
    }

    // Pastikan nomor telepon hanya berisi angka
    const cleanedPhone = phone.replace(/[^0-9]/g, "");

    // Jika nomor dimulai dengan 0, ubah menjadi format internasional dengan 62
    const internationalPhone = cleanedPhone.startsWith("0")
        ? `62${cleanedPhone.slice(1)}`
        : cleanedPhone;

    // Generate link WhatsApp
    const whatsappLink = `https://wa.me/${internationalPhone}`;
    linkInput.value = whatsappLink;
};
