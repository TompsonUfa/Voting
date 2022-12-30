export function validation(input) {
    let isNotValid = [];
    for (let i = 0; i < input.length; i++) {
        let condition;
        if (input[i].type === 'radio') {
            const dublicateInput = document.querySelectorAll(`[name="${input[i].name}"]`)
            if (input[i].checked) {
                condition = false;
                for (let i = 0; i < dublicateInput.length; i++) {
                    dublicateInput[i].classList.remove('is-invalid');
                    dublicateInput[i].classList.add('is-valid');
                }
            } else {
                let success = false;
                for (let i = 0; i < dublicateInput.length; i++) {
                    if (dublicateInput[i].checked) {
                        success = true;
                    }
                }
                if (!success) {
                    condition = true;
                }
            }
        } else {
            condition = input[i].value.trimStart().length === 0;
        }
        if (condition) {
            isNotValid.push(input[i]);
            input[i].classList.add('is-invalid');
            input[i].classList.remove('is-valid');
        } else {
            input[i].classList.remove('is-invalid');
            input[i].classList.add('is-valid');
        }
    }
    if (isNotValid.length === 0) {
        return true;
    } else {
        isNotValid[0].scrollIntoView();
        return false;
    }
}
export function changeValidation() {
    window.addEventListener('change', function (event) {
        if (event.target.classList.contains('form-control') || event.target.classList.contains('form-check-input')) {
            if (event.target.type === "radio") {
                const dublicateInput = document.querySelectorAll(`[name="${event.target.name}"]`)
                for (let i = 0; i < dublicateInput.length; i++) {
                    dublicateInput[i].classList.remove('is-invalid');
                    dublicateInput[i].classList.add('is-valid');
                }
            } else {
                if (event.target.value.length > 0) {
                    event.target.classList.add('is-valid');
                    event.target.classList.remove('is-invalid');
                } else {
                    event.target.classList.remove('is-valid');
                    event.target.classList.add('is-invalid');
                }
            }
        }
    });
    // input.addEventListener('change', function () {
    //     if (input[i].type === "radio") {
    //         const dublicateInput = document.querySelectorAll(`[name="${input[i].name}"]`)
    //         for (let i = 0; i < dublicateInput.length; i++) {
    //             dublicateInput[i].classList.remove('is-invalid');
    //             dublicateInput[i].classList.add('is-valid');
    //         }
    //     } else {
    //         if (input[i].value.length > 0) {
    //             input[i].classList.add('is-valid');
    //             input[i].classList.remove('is-invalid');
    //         } else {
    //             input[i].classList.remove('is-valid');
    //             input[i].classList.add('is-invalid');
    //         }

    //     }
    // });

}
