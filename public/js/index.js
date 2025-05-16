window.onload = function () {
    // 質問IDのテキストボックス
    let questionId = document.getElementById("question_id");

    // 「回答を見る」ボタン
    let button = document.getElementById("show_button");

    // 質問IDのセレクトボックス
    let select = document.getElementById("question_select");

    // ボタンが押されたら、質問IDのページに遷移
    button.onclick = () => {
        let id = parseInt(questionId.value);
        if (id && Number.isInteger(id) && id > 0) {
            window.location.href = "/answer/show/" + id;
        }
    };

    // セレクトボックスで質問IDを選択した場合、テキストボックスを無効にする
    select.onchange = () => {
        let id = parseInt(select.value);
        questionId.value = id != -1 ? id : "";
        questionId.disabled = id != -1;
    };
};