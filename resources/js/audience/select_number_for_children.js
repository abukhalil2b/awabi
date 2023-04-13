export default function () {
    return {
        init() {
            var storedNumbers = JSON.parse(localStorage.getItem("numbers"));

            var storedPrevWinners = JSON.parse(
                localStorage.getItem("prevWinners")
            );

            this.numbers = storedNumbers == null ? [] : storedNumbers;

            this.prevWinners =
                storedPrevWinners == null ? [] : storedPrevWinners;
        },

        showEraseButton: false,

        numbers: [],

        toNum: 5,

        winnerNumber: 0,

        prevWinners: [],

        withdraw() {
            var count = 20;

            var interval = setInterval(() => {
                var indexNumber = Math.floor(
                    Math.random() * this.numbers.length
                );

                count = count - 1;

                this.winnerNumber = this.numbers[indexNumber];

                if (count < 1) {
                    clearInterval(interval);

                    this.numbers = JSON.parse(localStorage.getItem("numbers"));

                    this.numbers = this.numbers.filter(
                        (n) => n != this.winnerNumber
                    );

                    localStorage.setItem(
                        "numbers",
                        JSON.stringify(this.numbers)
                    );

                    let prevWinners = JSON.parse(
                        localStorage.getItem("prevWinners",[])
                    );

                    prevWinners = prevWinners == null ? [] : prevWinners;

                    prevWinners.push(this.winnerNumber);

                    console.log(prevWinners);

                    localStorage.setItem(
                        "prevWinners",
                        JSON.stringify(prevWinners)
                    );

                    this.prevWinners = JSON.parse(localStorage.getItem("prevWinners"));
                }
            }, 100);
        },

        generateNumbers() {
            if (this.toNum < 4) {
                return;
            }

            var numbers = [];

            for (let index = 1; index <= this.toNum; index++) {
                numbers.push(index);
            }

            localStorage.setItem("numbers", JSON.stringify(numbers));

            this.numbers = numbers;
        },

        erase() {
            this.numbers = [];

            this.prevWinners = [];

            this.winnerNumber = 0;

            localStorage.removeItem("numbers");

            localStorage.removeItem("prevWinners");
        },
    };
}
