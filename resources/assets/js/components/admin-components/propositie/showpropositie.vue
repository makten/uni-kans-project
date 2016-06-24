<template :pro_id="hello there">
    <div class="panel panel-default">
        <div class="panel-heading">Show Propositie</div>

        <div class="panel-body">
            <h3>Show page</h3>
        </div>
    </div>

</template>


<style>
    body{
        background-color:#ff0000;
    }
</style>
<script>

    export default{

        props: ['pro_id'],

        data(){
            return{
                msg:'hello vue'
            }
        },

        methods:{
            getPropositie: function(propositie){


                this.$http.get('/api/proposities/').then(function(response){
                    this.proposities = response.data;
                }.bind(this), function(response){

                })
            },
        },

        ready() {

            alert(this.pro_id);
//            this.getPropositie(this.propositieId);
        }


    }
</script>