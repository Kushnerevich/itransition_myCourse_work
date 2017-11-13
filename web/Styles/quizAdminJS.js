 src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js";

    $(document).ready (function () {
        $(".DeleteQuiz").bind("click", function (event) {
            const quizId = event.target.dataset.index;
            $.ajax({
                url: "quizedit/del",
                type: "GET",
                data: ({id: quizId}),
                success: function () {
                    $(`[data-index~=${id}]`).parent().parent().remove()
                }
            })
        })
    });

$(document).ready (function () {
    $(".AddQuiz").bind("click", function (event) {
        input = document.getElementsByClassName('Quiz');
        classNameOfQuiz= document.getElementsByClassName('NameOfQuiz');
        nameOfQuiz= classNameOfQuiz[0].value;
        forGet = {};
        for (i = 0; i < input.length; i++) {
            z = input[i].name;
            forGet[z] = input[i].value;
        }

        $.ajax({
            url: "quizedit/add",
            type: "GET",
            data: ({
                quiz:nameOfQuiz,
                question1: forGet['1stquestion'],
                question2: forGet['2stquestion'],
                question3: forGet['3stquestion'],
                question4: forGet['4stquestion'],
                question5: forGet['5stquestion'],
                question6: forGet['6stquestion'],
                question7: forGet['7stquestion'],
                question8: forGet['8stquestion'],
                question9: forGet['9stquestion'],
                question10: forGet['10stquestion']
            }),
        })
    })
});
