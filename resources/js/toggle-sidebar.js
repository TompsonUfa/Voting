const toggler = document.querySelector(".navbar-toggler__input"),
    sidebar = document.querySelector(".sidebar");
toggler.addEventListener("click", function () {
    if (toggler.checked) {
        sidebar.classList.add("sidebar_hide");
        document.cookie = "sidebar=hidden";
    } else {
        sidebar.classList.remove("sidebar_hide");
        document.cookie = "sidebar=";
    }
});
