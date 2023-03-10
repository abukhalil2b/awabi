import axios from "axios";

export default function () {
    return {
        updateUrl:'',

        show: false,

        user: null,

        loading: false,

        update() {
            this.loading = true;

            axios.get('/sanctum/csrf-cookie')

            axios.post(this.updateUrl,{user:this.user}).then(res=>{
                console.log(res.data)
                this.loading=false;

            }).catch(err=>{
                console.log(err)
            })

            
        }
    };
}
