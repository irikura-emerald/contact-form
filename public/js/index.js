window.onload = function () {
    let questionId = document.getElementById("question_id");
    let button = document.getElementById("show_button");
    let select = document.getElementById("question_select");

    button.onclick = () => {
        let id = parseInt(questionId.value);
        if (id && Number.isInteger(id) && id > 0) {
            window.location.href = "/answer/show/" + id;
        }
    };

    select.onchange = () => {
        let id = parseInt(select.value);
        questionId.value = id != -1 ? id : "";
        questionId.disabled = id != -1;
    };
};