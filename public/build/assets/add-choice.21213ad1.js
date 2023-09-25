const d=document.querySelector(".btn-add-choice");d.addEventListener("click",function(){const e=document.querySelectorAll(".choice"),t=e[e.length-1],c=Number(e[e.length-1].dataset.choiceNumber),i=`
        <div class="row px-2 py-4 p-lg-5 mb-3 block-wrapper choice" data-choice-number="${c+1}">
            <h2 class="title mb-3">\u0412\u044B\u0431\u043E\u0440 \u2116 ${c+1}</h2>
            <div class="mb-3">
                <input type="text" placeholder="\u041F\u0440\u0435\u0442\u0435\u043D\u0434\u0435\u043D\u0442" id="challenger" name="challenger" class="form-control" required>
            </div>
            <div>
                <input type="text" placeholder="\u041E\u043F\u0438\u0441\u0430\u043D\u0438\u0435 \u0432\u044B\u0431\u043E\u0440\u0430" id="desc" name="desc" class="form-control" required>
            </div>
            <div class="btn-delete">
				<img src="/images/delete.png" alt="\u0423\u0434\u0430\u043B\u0438\u0442\u044C">
			</div>
        </div>`;t.insertAdjacentHTML("afterend",i)});
