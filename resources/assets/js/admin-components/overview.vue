<template :user="user">
    <div class="panel panel-default">
        <div class="panel-heading">Overview</div>

        <div class="panel-body">
            <h3>Overview page</h3>
            <div class="panel-body">
                <table class="table table-borderless m-b-none">
                    <thead>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                    </thead>

                    <tbody>
                    <tr v-for="task in tasks">
                        <!-- Name -->
                        <td>
                            <div class="btn-table-align">
                                @{{ task.name }}
                            </div>
                        </td>

                        <!-- View Button -->
                        <td>
                            <a href="/teams/@{{ currentTeam.id }}/tasks/@{{ task.id }}">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </a>
                        </td>

                        <!-- Delete Button -->
                        <td>
                            <button class="btn btn-danger-outline" @click="deleteTask(task)">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
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
        props: ['user'],


        data(){
            return{
                appuser: {},
            }
        },

        ready(){
          this.getPros();

            this.appuser = JSON.parse(this.user);
            alert(this.appuser);
        },

        methods: {
            getPros: function(){
//                alert('{{Auth::user->id}}')
                this.$http.get('proposities').then(function(response){
                    alert(response.data);
                }.bind(this), function(response){

                })
            }
        }

    }
</script>
