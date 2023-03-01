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

            let _token = document.querySelector('input[name="_token"]').value;
            // console.log(token)
            // axios.post(this.updateUrl,{user:this.user}).then(res=>{
            //     console.log(res.data)
            //     this.loading=false;

            // }).catch(err=>{
            //     console.log(err)
            // })

            fetch(this.updateUrl, {
                method: 'POST',
                headers:{"X-XSRF-TOKEN": this.getCookie('XSRF-TOKEN')},
                body: JSON.stringify({user:this.user})
            }).then(r => r.json()).then((r) => console.log(r))
        },
         getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
              let c = ca[i];
              while (c.charAt(0) == ' ') {
                c = c.substring(1);
              }
              if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
              }
            }
            return "";
          }
    };
}
