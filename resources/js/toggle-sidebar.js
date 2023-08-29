document.addEventListener('DOMContentLoaded', function(){
    const toggler = document.querySelector(".navbar-toggler__input"),
    sidebar = document.querySelector(".sidebar");
    const sidebarStatus = window.localStorage.getItem('sidebar');
    if (sidebarStatus == null || sidebarStatus == 'true'){
        window.localStorage.setItem('sidebar', 'true');
        sidebar.classList.add("sidebar_hide");
        toggler.checked = false;
    } else if (sidebarStatus == 'false'){
        toggler.checked = true;
    } 
    toggler.addEventListener("click", function () {
        if (!toggler.checked) {
            sidebar.classList.add("sidebar_hide");
            window.localStorage.setItem('sidebar', 'true');
        } else  {
            sidebar.classList.remove("sidebar_hide");
            window.localStorage.setItem('sidebar', 'false');
        }
    });

})

