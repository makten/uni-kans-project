<template>
    <header-component :user="{{$user}}"/>
    <div>this is template body</div>
    <other-component/>
</template>


<script>

//    import HeaderComponent from './components/header.vue'
//    import OtherComponent from './components/other.vue'
    export default{

        props: [
                'user'
        ],

        data(){
            return{
                msg:'hello vue'
            }
        },

        ready() {
          this.getPros()
            alert('hellos')
        },
        components:{
//            'other-component':OtherComponent,
//            HeaderComponent,
        },

        methods: {

        },
    }
</script>