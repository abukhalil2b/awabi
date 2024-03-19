export default function () {
    return {
        audiences: [],

        selected: null,

        numberOfSelected: 2,

        timesOfCount: 50,

        selectAudienceId: 0,

        progress: 0,

        withdraw() {
            var counter = this.timesOfCount;

            var interval = setInterval(() => {
                counter--;

                this.select();

                if (counter == 0) {
                    clearInterval(interval);
                }
                this.progress = counter;
            }, 100);
        },

        select() {
            var audiencesLength = this.audiences.length;

            var rand = Math.floor(Math.random() * audiencesLength);

            this.selected = this.audiences[rand];

            // console.log(this.selected);
        },

        storeSelectAudience(id) {
            this.selectAudienceId = id;
           
        },
    };
}
