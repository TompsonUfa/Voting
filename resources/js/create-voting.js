import { validation } from './validation'
import { changeValidation } from './validation'
const btnCreateChoice = document.querySelector('.btn-create-voting');
btnCreateChoice.addEventListener('click', function () {
    const votingData = document.querySelector('.create-voting'),
        votingId = votingData.dataset.votingId,
        input = votingData.querySelectorAll("input[type='text']");
    if (validation(input)) {
        let choiceArray = [];
        const votingName = document.querySelector('#name').value,
            choice = document.querySelectorAll('.choice');
        for (let i = 0; i < choice.length; i++) {
            const choiceObj = {
                "id": choice[i].dataset.questionId ? choice[i].dataset.questionId : null,
                "challenger": choice[i].querySelector('#challenger').value,
                "desc": choice[i].querySelector('#desc').value,
            }
            choiceArray.push(choiceObj);
        }
        const votingObj = {
            "name": votingName,
            "choice": choiceArray,
        }
        var message = document.createElement("p"),
            modal = new bootstrap.Modal('#exampleModal');
        if (window.location.href.indexOf("edit") > -1) {
            $.ajax({
                url: `/votings/${votingId}`,
                headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                type: "PUT",
                typeData: 'json',
                data: { voting: votingObj },
                error: function (response) {
                    let result = response.responseJSON.errors,
                        counter = 1;
                    message.style.color = "red";
                    for (let value of Object.values(result)) {
                        message.innerHTML += counter + ") " + value + "<br>";
                        counter++;
                    }
                },
                success: function (response) {
                    message.innerHTML = response.success;
                }

            });
        } else {
            $.ajax({
                url: '/votings',
                headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                method: 'POST',
                typeData: 'json',
                data: { voting: votingObj },
                error: function (response) {
                    let result = response.responseJSON.errors,
                        counter = 1;
                    message.style.color = "red";
                    for (let value of Object.values(result)) {
                        message.innerHTML += counter + ") " + value + "<br>";
                        counter++;
                    }
                },
                success: function (response) {
                    for (let i = 0; i < input.length; i++) {
                        input[i].value = "";
                        input[i].classList.remove('is-valid');
                    }
                    message.innerHTML = response.success;
                }

            });
        }
        $('#exampleModal .modal-body').html(message);
        modal.show();
    }
});
changeValidation();
