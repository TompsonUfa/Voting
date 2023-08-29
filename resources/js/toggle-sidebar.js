document.addEventListener('DOMContentLoaded', function(){
    const toggler = document.querySelector(".navbar-toggler__input"),
    sidebar = document.querySelector(".sidebar"),
    sidebarStatus = window.localStorage.getItem('sidebar');
    if (sidebarStatus == null || sidebarStatus == 'false'){
        window.localStorage.setItem('sidebar', 'false');
        toggler.checked = false;
    } else if (sidebarStatus == 'true'){
        toggler.checked = true;
        sidebar.classList.add("sidebar_open");
    } 
    window.addEventListener('click', function(e){
        if (e.target == toggler) {
            if (toggler.checked) {
                sidebar.classList.add("sidebar_open");
                window.localStorage.setItem('sidebar', 'true');
            } else  {
                sidebar.classList.remove("sidebar_open");
                window.localStorage.setItem('sidebar', 'false');
            }
        } 
    })
})

