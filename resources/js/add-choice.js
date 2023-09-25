const btnAddChoice = document.querySelector('.btn-add-choice');
btnAddChoice.addEventListener('click', function () {
    const choice = document.querySelectorAll('.choice'),
        lastChoice = choice[choice.length - 1],
        numberLastChoice = Number(choice[choice.length - 1].dataset.choiceNumber),
        newChoice = `
        <div class="row px-2 py-4 p-lg-5 mb-3 block-wrapper choice" data-choice-number="${numberLastChoice + 1}">
            <h2 class="title mb-3">Выбор № ${numberLastChoice + 1}</h2>
            <div class="mb-3">
                <input type="text" placeholder="Претендент" id="challenger" name="challenger" class="form-control" required>
            </div>
            <div>
                <input type="text" placeholder="Описание выбора" id="desc" name="desc" class="form-control" required>
            </div>
            <div class="btn-delete">
				<img src="/images/delete.png" alt="Удалить">
			</div>
        </div>`;
    lastChoice.insertAdjacentHTML("afterend", newChoice)
})
