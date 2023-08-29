import { validation } from './validation'
import { changeValidation } from './validation'
const btnCreateChoice = document.querySelector('.btn-create-voting');
btnCreateChoice.addEventListener('click', function () {
    const votingData = document.querySelector('.create-voting'),
        input = votingData.querySelectorAll("input[type='text']");
    if (validation(input)) {
        let choiceArray = [];
        const votingName = document.querySelector('#name').value,
            votingType = document.querySelector('#type').value,
            choice = document.querySelectorAll('.choice');
        for (let i = 0; i < choice.length; i++) {
            const choiceObj = {
                "id": choice[i].dataset.choiceNumber,
                "challenger": choice[i].querySelector('#challenger').value,
                "desc": choice[i].querySelector('#desc').value,
            }
            choiceArray.push(choiceObj);
        }
        const votingObj = {
            "name": votingName,
            "type": votingType,
            "choice": choiceArray,
        }
        var message = document.createElement("p"),
            modal = new bootstrap.Modal('#exampleModal');
        $.ajax({
            url: '',
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
        $('#exampleModal .modal-body').html(message);
        modal.show();
    }
});
changeValidation();
