import { validation } from "./validation";
import { changeValidation } from "./validation";
const form = document.querySelector(".post-form");
form.addEventListener("submit", function (e) {
    e.preventDefault();
    const input = e.target.querySelectorAll(".form-control");
    if (validation(input)) {
        let href = $(this).attr("data-attr");
        var form = $(this);
        var message = document.createElement("p");
        var modal = new bootstrap.Modal("#exampleModal");
        $.ajax({
            url: href,
            method: "POST",
            data: form.serialize(),
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
            },
        });
        $("#exampleModal .modal-body").html(message);
        modal.show();
    }
});
changeValidation();
