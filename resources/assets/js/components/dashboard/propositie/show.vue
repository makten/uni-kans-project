<template>

    <div class="container-fluid"> <!--main container--->

        <div class="row" v-if="propositie">

            <!------ General and team details ------------->
            <div class="col-md-3 col-md-offset-0">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <p class="bs-component btn-group-sm"
                           style="position: absolute; top: 0px; right: 15px; margin: 3px;">
                            <a href="javascript:void(0)" class="btn btn-primary btn-fab"><i class="material-icons">edit</i></a>
                            <a href="javascript:void(0)" class="btn btn-danger btn-fab"><i class="material-icons">delete</i></a>
                        </p>
                        <br/>
                        <h2 class="title">Algemeen</h2>
                        <hr>


                        <!--Card image-->
                        <div class="ripplelink">

                            <a href="#" class="image img-circle ripplelink">
                                <img :src="getImg(propositie.pro_avatar)" alt="Propositie foto">
                            </a>
                        </div>
                        <!--/.Card image-->

                        <!--Button-->

                        <a class="btn-floating btn-action btn-fab">
                            <img :src="getImg(propositie.user.userprofile.avatar_thumbnail)" alt="User profile">
                        </a>

                        <!--Card content-->
                        <div class="card-block">
                            <!--Title-->
                            <div>
                                <h4 class="card-title">{{{ propositie.pro_name }}}</h4>
                            </div>
                            <hr>
                        </div>
                        <!--/.Card content-->
                        <br/>



                        <h2 class="title">Project Team</h2>

                        <div class="media team-card" v-for="member in propositie.team.users">

                            <a class="pull-left image" href="/user/{{ member.id }}/profile" style="margin-left: 1px;">
                                <img class="img-square media-object"
                                     :src="getImg(member.avatar)"
                                     alt="User profile">
                            </a>

                            <div class="media-body content">

                                <div class="col-xs-12 media-heading" style="padding-left: 0px;">
                                    <a href="/user/{{ member.id }}/profile">
                                        <h5 class="media-heading">
                                            {{ member.first_name +' '+ member.last_name}}
                                            <span v-if="member.id == propositie.id">
                                               •
                                               <span class="label label-default tiny-badge">Propositiehouder</span>
                                               •
                                            </span>

                                            <span><i id="basic-addon1" class="time-ago addon right"
                                                     title="Gezien {{humanReadable(propositie.created_at) }}">
                                                Gezien {{humanReadable(propositie.created_at) }}</i>
                                            </span>

                                        </h5>
                                    </a>






                                </div>

                                    <p><i class="fa fa-envelope"> &nbsp;{{ member.email }}</i> </p>
                                    <!--<p><i class="fa fa-phone"> &nbsp; 061 1234587</i> </p>-->



                            </div>

                        </div>

                        <!-------------------Team details------------->
                    </div>

                </div>

            </div>
            <!------ General and team details ------------->


            <!------ Main content section ------------->
            <div class="col-md-7 col-md-offset-0">

                <div class="panel panel-default">

                    <div class="panel-body">

                        <h2 class="title">Beschrijving</h2>
                        <!--Card content-->
                        <div class="card-block readable">
                            <hr>
                            <!--Text-->
                            <p class="card-text">{{{ propositie.pro_description | marked }}}</p>
                            <br>
                            
                            <h2 class="title"><i class="fa fa-clock-o pull-left"></i> Status</h2>
                            <hr>
                            <p>{{ propositie.pro_status }}</p>
                            <p>Docs</p>
                            <p>Views</p>
                            <p>Likes</p>
                            <br>


                            <h2 class="title">Markten</h2>
                            <hr>
                            <p>{{ propositie.pro_marktsegmenten }}</p>
                            <br>

                            <h2 class="title">Themas</h2>
                            <hr>
                            <p>{{ propositie.pro_themas }}</p>
                            <br>


                            <h2 class="title"><i class="material-icons">person</i> Contactpersoon</h2>
                            <hr>
                            <p>{{ propositie.user.first_name +' '+ propositie.user.last_name }}</p>
                            <br>

                            <h2 class="title"><i class="fa fa-tags pull-left"></i> Uniek</h2>
                            <p>
                            <ul class="list-inline">
                                <li class="label-info"><a style="color: white;" href="#"> {{ propositie.pro_uniek }}</a>
                                </li>
                                <li class="label-info"><a style="color: white;" href="#"> {{ propositie.pro_uniek }}</a>
                                </li>
                                <li class="label-info"><a style="color: white;" href="#"> {{ propositie.pro_uniek }}</a>
                                </li>
                            </ul>
                            </p>
                            <br>


                            <h2 class="title"><i class="fa fa-money pull-left"></i> Revenuen</h2>
                            <hr>
                            <p>{{ propositie.pro_revenuen }}</p>
                            <br>


                            <h2 class="title"><i class="fa fa-money pull-left"></i> Documentent</h2>
                            <hr>
                            <p>{{ propositie.pro_saleskit }}</p>
                            <p>{{ propositie.pro_marktinfo }}</p>
                            <p>{{ propositie.pro_technical_doc }}</p>
                            <br>


                            <h2 class="title"><i class="fa fa-money pull-left"></i> Referencen</h2>
                            <hr>
                            <p>{{ propositie.pro_ }}</p>
                            <br>


                        </div><!--/.Card content-->


                        <!-- Card footer -->
                        <div class="card-data"
                             style="background-color: #D9D9D9; color: #ffffff; height: 35px;">
                            <ul class="list-inline">
                                <li><i class="fa fa-clock-o"></i> {{ propositie.created_at | moment "D-M-Y"}}</li>
                                <!-- <li><a href="#"><i class="fa fa-comments-o"></i>12</a></li> -->
                                <!-- <li><a href="#"><i class="fa fa-facebook"> </i>21</a></li> -->
                                <!-- <li><a href="#"><i class="fa fa-twitter"> </i>5</a></li> -->
                            </ul>
                        </div>

                        <!-- Card footer -->

                    </div>

                </div>

            </div>

           <!--/Main content section-->

            <!--Related Items Sections -->
            <div class="col-md-2 col-md-offset-0">

                <div class="panel panel-default">

                    <div class="panel-body">

                        <h4>Related items</h4>
                        <!--Card content-->
                        <div class="card-block">
                            <hr>
                            <a href="/" class="link-text"><h5>oluptas veritatis. Ad sed autem et et et facilis Do <i
                                    class="fa fa-chevron-right"></i></h5></a>
                            <a href="/" class="link-text"><h5>oluptas veritatis. Ad sed autem et et et facilis Do <i
                                    class="fa fa-chevron-right"></i></h5></a>
                            <a href="/" class="link-text"><h5>oluptas veritatis. Ad sed autem et et et facilis Do <i
                                    class="fa fa-chevron-right"></i></h5></a>
                            <a href="/" class="link-text"><h5>oluptas veritatis. Ad sed autem et et et facilis Do <i
                                    class="fa fa-chevron-right"></i></h5></a>
                            <a href="/" class="link-text"><h5>oluptas veritatis. Ad sed autem et et et facilis Do <i
                                    class="fa fa-chevron-right"></i></h5></a>


                        </div><!--/.Card content-->

                    </div>

                </div>

            </div>
            <!------ /Related Items Sections ------------->

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">Comments</div>-->
                        <div class="panel-body">

                            <comments-component :user="user" :propositie="propositie">

                            </comments-component>

                        </div>
                    </div>
                </div>
            </div>

        </div><!--/row -->

    </div> <!--/main container -->


</template>

<style>
    .team-card {
        border-radius: 3px;
        padding: 2px;
        box-shadow: 0.1px 0.1px 1px 0px lightgrey;
    }

    .team-card .content{
        /*text-align: justify;*/
        padding: 0px;
    }

    .team-card p {
        font-size: 12px;
    }
</style>


<script>



    import Comments from './comments.vue';

    var marked = require('marked');
    marked.setOptions({ghm: true});

    export default{

        props: ['user', 'proId'],

        data: function() {
            return {
                viewers: [],
                propositie: null,
                checkMember: '',
                image: '',
                seeMore: false,
//                showHide: false,
            };
        },

        ready() {
            this.user = JSON.parse(this.user);
            this.getpropositie();

        },

        created() {

        },

        methods: {

            getpropositie() {

                this.$http.get('/api/content/'  + this.proId + '/show')
                        .then(function(response) {
                    this.propositie = response.data;
                        }.bind(this));

            },

            humanReadable: function (value) {
                var date = moment(value).fromNow();
                return date;

            },

            getImg: function(link){

                var t = link.replace('C:\\Users\\Hafiz\\Dropbox\\MyProjects\\Projects\\mytemplate-project\\public', '');
                return t;
            },

        },

        computed: {


        },

        filters: {
            'marked': marked,
        },

        components:{
            'comments-component': Comments,

        }
    }
</script>