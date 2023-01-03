window.addEventListener('click', function (event) {
    if (event.target.classList.contains('btn-status')) {
        const voting = event.target.closest('tr'),
            votingStatus = voting.querySelector('.table__status'),
            btnToggleStatus = voting.querySelector('.table__toggle-status'),
            votingId = voting.dataset.votingId;
        $.ajax({
            type: "POST",
            url: '',
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            data: { id: votingId },
            success: function (response) {
                let status;
                if (response.close) {
                    status = "Закрыт";
                    btnToggleStatus.innerHTML = `<i class="uil uil-unlock btn btn-status btn-primary"></i>`;
                } else {
                    status = "Открыт";
                    btnToggleStatus.innerHTML = `<i class="uil uil-lock btn btn-status btn-primary"></i>`;
                }
                votingStatus.innerHTML = `${status}`
            }
        });
    }
});