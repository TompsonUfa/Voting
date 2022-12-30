import { validation } from './validation';
import { changeValidation } from './validation';
const targetValidation = document.querySelector('.block-wrapper'),
    input = targetValidation.querySelectorAll("input[type='radio']"),
    btnPostVoting = targetValidation.querySelector('.btn-post-voting');
btnPostVoting.addEventListener('click', function () {
    if (validation(input)) {
        let userVoices = [];
        const questions = document.querySelectorAll('.question');
        for (let i = 0; i < questions.length; i++) {
            const question = questions[i],
                questionId = question.dataset.questionId,
                questionVote = question.querySelector("input[type='radio']:checked").id,
                vote = {
                    "questionId": questionId,
                    "questionVote": questionVote,
                };
            userVoices.push(vote);
        };
        console.log(userVoices)
        let message = document.createElement("p"),
            modal = new bootstrap.Modal('#exampleModal');
        $.ajax({
            url: '',
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            method: 'POST',
            typeData: 'json',
            data: { userVoices: userVoices },
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
        $('#exampleModal .modal-body').html(message);
        modal.show();
    }
})
changeValidation();



