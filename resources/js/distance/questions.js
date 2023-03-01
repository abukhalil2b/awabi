export default function (questions) {
    return {
        init() {

            this.questions = questions.map((question) => {
                return {
                    id: question.id,
                    A: question.A,
                    B: question.B,
                    C: question.C,
                    D: question.D,
                    ans: question.ans,
                    app: question.app,
                    content: question.content,
                    type: question.type,
                    opt: "",
                };
            });
        },

        questions: [],

        showButton: false,

        message: "",

        loading: false,

        select(ans) {
            this.questions = this.questions.map((question) => {
                if (ans.qid == question.id) {
                    question.opt = ans.opt;
                    return question;
                } else {
                    return question;
                }
            });

            //show button if all question is answered
            this.showButton =
                this.questions.length ==
                this.questions.filter((q) => {
                    return q.opt !== "";
                }).length;
        },

        sendAnswer(wire) {
            this.showButton = false;
            this.loading = true;

            const answers = this.questions.map((question) => {
                return {
                    questionId: question.id,
                    questionContent: question.content,
                    userAnswerOption: question.opt,
                    userAnswerContent: question[question.opt],
                };
            });

            wire.getUserAnswer(JSON.stringify(answers))
                .then((result) => {
                    this.loading = false;

                    this.message = "تم إستلام الإجابة";
                })
                .catch((err) => {});
        },
    };
}
