<template>

        <!-- <div class="modal-mask" v-show="show" transition="modal"></div> -->
        <button class="replyMessage" @click="showModal = ! showModal"><i class="fa {{showHideReply}}"></i></button>
        <button class="replyMessage" @click="showModal = ! showModal"><i class="fa fa-thumbs-up"></i></button>
        <button class="replyMessage" @click="showModal = ! showModal"><i class="fa fa-thumbs-down"></i></button>

        <div class="col-md-12">

            <div class="col-md-8" v-show="newMessage.length">
         
                    <ul class="media-list list-group col-md-8" v-for="msg in newMessage">

                        <div class="media comment-item">       

                                <a class="pull-left" href="#">
                                    <img class="media-object img-circle" style="width: 32px; height: 32px;"
                                         :src="getImg(msg.avatar)">
                                </a>

                            <div class="media-body">
                                <div class="col-xs-12 reply-header">
                                    {{ msg.user_name }}
                                    •
                                    <span v-if="msg.user_id == msg.pro_userId" class="label label-default tiny-badge">Propositiehouder</span>
                                    •
                                    <span>
                                        <i id="basic-addon1" class="time-ago addon right"
                                             title="{{.reply.created_at | moment 'd-m-Y h:i:s'}}">
                                        {{humanReadable(msg.created_at) }}
                                        </i>
                                    </span>

                                </div>

                                <div v-else class="col-xs-12">
                                    <p>{{ msg.message }}</p>
                                    <p><a class='reply_reply_to' href='writereply'
                                          data-replyto='{{ reply.id }}'
                                          onclick="toggleReply('{{ reply.id +'_'+ reply.created_at | moment 'Y-d-m'}}')">Reply</a>
                                    </p>
                                </div>
                           </div>
                        </div>
                    </ul>
                </div>


            

                <form v-show="showModal" class="form-horizontal col-md-8 col-md-offset-0" id="{{comment.id +'_'+ comment.created_at" >

                <!-- <textarea v-model="message" 
                          name="message"
                          class="form-control"
                          rows="4"
                          placeholder="Schrijf uw bericht hier...">
                </textarea> -->
                <div class="form-group">
                      
                      <div class="col-md-10">
                        <textarea v-model="message"
                                class="form-control" 
                                rows="3"
                                maxlength="250"
                                placeholder="Schrijf uw bericht hier..."
                                @keyup=""
                                >
                        </textarea>
                        <span class="help-block"><span class="badge badge-info"> <b> {{ maxChar }} </b> </span>  Resterende charactors</span>
                      </div>
                </div>

                    <div class="btn-panel">
                        <button type="button" 
                                class="col-lg-4 btn text-right send-message-btn pull-right"
                                role="button"
                                @click="sendReply(message)"
                        >
                            <i class="fa fa-reply"></i> Reageer
                        </button>

                    </div>
                </form>

    </div>
    <br>
    <br>
    <br>


     <!--&lt;!&ndash; app &ndash;&gt;-->
     <!--<div id="app">-->
         <!--<button id="show-modal" @click="showModal = true">Show Modal</button>-->

         <!--&lt;!&ndash; use the modal component, pass in the prop &ndash;&gt;-->

         <!--<modal :show.sync="showModal" bundle="comment">-->
           
            <!-- <h3 slot="header">custom header</h3>-->
         <!--</modal>-->

    


</template>


<style>
.replyMessage {
    border: 0;
    padding: 2px;
    margin: 2px 0px;    
    margin-bottom: 15px;
    background-color: transparent;
    color: #569FF9;
}

    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(38, 38, 38, 0.21);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-default-button {
        float: right;
    }

    /*
     * the following styles are auto-applied to elements with
     * v-transition="modal" when their visiblity is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
     */

    .modal-enter, .modal-leave {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>
<script>

    export default{
        props: ['bundle', 'user', 'propositie'],
       // props: {
       //     show: {
       //         type: Boolean,
       //         required: true,
       //         twoWay: true
       //     },

       //     bundle: {
       //       type: Object,
       //       require: true
       //     },
       
      

       data: function () {
                return {
                        message: '',
                        showModal: false,
                        comments: [],
                        newMessage: [],
                        
                }
       },

        ready() {
            
        },

        methods: {

            sendReply: function(message){
                alert(moment().valueOf())

                this.newMessage.push({pro_userId: this.propositie.user_id, user_id: this.user.id, user_name: this.user.first_name +' '+ this.user.last_name, avatar: this.user.avatar, message: message});

                this.message = '';
                                      
                this.$dispatch('new-comment', this.bundle);
                
            },

            getImg: function (link) {

                var t = link.replace('C:\\Users\\Hafiz\\Dropbox\\MyProjects\\Projects\\mytemplate-project\\public', '');
                return t;
            },

            humanReadable: function () {
                var date = moment().fromNow();                
                return date;

            },

            // countChar: function (){
            //     this.maxChar = this.maxChar - this.message.length;
            //     if (this.maxChar <=0) {
            //         return false;
            //     };
            // }
        },

        computed: {
            showHideReply: function (){
                if(this.showModal){
                    return "fa-times";
                }
                else{
                    return "fa-reply";
                }
            },

            maxChar: function (){
                var maxChar = 250
                var maxChar = maxChar - this.message.length;
                return maxChar;

            }
        }



    }
</script>