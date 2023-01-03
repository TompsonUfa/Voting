window.addEventListener('click', function (event) {
    if (event.target.classList.contains('btn-status')) {
        const voting = event.target.closest('tr'),
            votingStatus = voting.querySelector('#status'),
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
                } else {
                    status = "Открыт";
                }
                votingStatus.innerHTML = `${status}`
            }
        });
    }
});