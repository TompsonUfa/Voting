window.addEventListener('click', function(event){
    if(event.target.classList.contains('btn-status')){
        const voting = event.target.closest('tr'),
        votingId = voting.dataset.votingId;
        $.ajax({
            type: "POST",
            url: '',
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            data: {id: votingId}, 
            success: function(response)
            {
                let status;
                console.log(response)
                if(response.close){
                    status = "Закрыт";
                } else {
                    status = "Открыт";
                }
                voting.innerHTML = `<td>${response.name}</td>
                <td>${response.type}</td>
                <td>${status}</td>
                <td>2022-12-21 04:46:00</td>
                <td><i class="uil uil-edit btn btn-primary"></i></td>
                <td><i class="uil uil-unlock btn btn-status btn-primary"></i></td>`
            }
        });
    }
});