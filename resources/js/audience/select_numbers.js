export default function () {
    return {
        audiences: [],

        selected: null,

        numberOfSelected: 2,

        timesOfCount: 50,

        selectedPhone:'',

        withdraw() {
            var interval = setInterval(() => {
                this.timesOfCount--;

                this.select();

                if (this.timesOfCount == 0) {
                    clearInterval(interval);
                }

            }, 100);
        },

        select() {
            var audiencesLength = this.audiences.length;

            var rand = Math.floor(Math.random() * audiencesLength);

            this.selected = this.audiences[rand];

            // console.log(this.selected);
        },

        storeSelectAudience(phone){
            this.selectedPhone = phone
            console.log(phone)
        }
    };
}
