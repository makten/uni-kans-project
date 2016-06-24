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
                        <h4>Algemeen</h4>
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
                                <h4 class="card-title">{{{ propositie.pro_name | marked }}}</h4>
                            </div>
                            <hr>
                        </div>
                        <!--/.Card content-->
                        <br/>


                        <!-------------------Propositie Team details -------------->
                        <a href="#"> <h4>Propositie Team <i class="fa fa-chevron-right"></i> </h4> </a>
                        <hr>

                        <div class="media" v-for="member in propositie.team.users"
                             style="box-shadow: 0 8px 10px rgba(0,0,0,0.19), 0 6px 6px rgba(98, 98, 98, 0.23); background-color: rgba(24, 24, 24, 0.88); color: #FFFFFF; border-radius: 3px; padding: 2px;">

                            <a class="pull-left image" href="#" style="margin-left: 8px;">
                                <img class="img-circle media-object"
                                     :src="getImg(member.avatar)"
                                     alt="User profile">
                            </a>

                            <div class="media-body">

                                <div class="col-xs-12 comment-header media-heading">
                                    <h4 class="media-heading">{{ member.first_name +' '+ member.last_name}} </h4>
                                        <span v-if="member.id == propositie.id">
                                            •
                                            <span class="label label-default tiny-badge">Propositiehouder</span>
                                            •
                                        </span>


                                        <span><i id="basic-addon1" class="time-ago addon right"
                                                 title="Gezien {{humanReadable(propositie.created_at) }}">
                                            Gezien {{humanReadable(propositie.created_at) }}</i>
                                        </span>

                                </div>

                                <p>Some activities maybe ?.. Feeds perhaps</p>
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

                        <h4>Beschrijving</h4>
                        <!--Card content-->
                        <div class="card-block">
                            <hr>
                            <!--Text-->
                            <p class="card-text" style="font-size: 1.1em">{{{ propositie.pro_description | marked }}}</p>

                            <a href="/" class="link-text"><h5>Meer lezen <i class="fa fa-chevron-right"></i></h5>
                            </a>

                            <h4><i class="fa fa-clock-o pull-left"></i> Status</h4>
                            <hr>
                            <p>{{ propositie.pro_status }}</p>
                            <p>Docs</p>
                            <p>Views</p>
                            <p>Likes</p>

                            <h4>Markten</h4>
                            <hr>
                            <p>{{ propositie.pro_marktsegmenten }}</p>

                            <h4>Themas</h4>
                            <hr>
                            <p>{{ propositie.pro_themas }}</p>


                            <h4><i class="material-icons">person</i> Contactpersoon</h4>
                            <hr>
                            <p>{{ propositie.user.first_name +' '+ propositie.user.last_name }}</p>

                            <h4><i class="fa fa-tags pull-left"></i> Uniek</h4>
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


                            <h4><i class="fa fa-money pull-left"></i> Revenuen</h4>
                            <hr>
                            <p>{{ propositie.pro_revenuen }}</p>


                            <h4><i class="fa fa-money pull-left"></i> Documentent</h4>
                            <hr>
                            <p>{{ propositie.pro_saleskit }}</p>
                            <p>{{ propositie.pro_marktinfo }}</p>
                            <p>{{ propositie.pro_technical_doc }}</p>


                            <h4><i class="fa fa-money pull-left"></i> Referencen</h4>
                            <hr>
                            <p>{{ propositie.pro_ }}</p>


                        </div><!--/.Card content-->


                        <!-- Card footer -->
                        <div class="card-data"
                             style="background-color: rgba(167, 167, 167, 0.87); color: #ffffff; height: 35px; ">
                            <ul class="list-inline">
                                <li><i class="fa fa-clock-o"></i> {{ propositie.created_at | moment "D-M-Y"}}</li>
                                <li><a href="#"><i class="fa fa-comments-o"></i>12</a></li>
                                <li><a href="#"><i class="fa fa-facebook"> </i>21</a></li>
                                <li><a href="#"><i class="fa fa-twitter"> </i>5</a></li>
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
                        <div class="panel-body"  style="background: rgba(254, 255, 243, 0.71)">

                            <comments-component :user="user" :propositie="propositie">

                            </comments-component>

                        </div>
                    </div>
                </div>
            </div>

        </div><!--/row -->

    </div> <!--/main container -->


</template>

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