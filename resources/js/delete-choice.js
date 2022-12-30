window.addEventListener('click', function (event) {
    if (event.target.classList.contains('btn-delete')) {
        let choise = event.target.parentNode;
        choise.remove();
    }
})
