document.addEventListener("DOMContentLoaded", function () {
    let menuItems = document.querySelectorAll(".sidebar ul li");
    menuItems.forEach((item) => {
        item.addEventListener("click", () => {
            menuItems.forEach((el) => el.classList.remove("active"));
            item.classList.add("active");
        });
    });
});
