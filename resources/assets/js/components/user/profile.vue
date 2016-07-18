<template>

    <!--<p class="bs-component btn-group-sm"-->
    <!--style="position: absolute; top: 0px; right: 15px; margin: 3px;">-->
    <!--<a href="javascript:void(0)" class="btn btn-primary btn-fab fab-mini"><i-->
    <!--class="material-icons">edit</i></a>-->
    <!--<a href="javascript:void(0)" class="btn btn-danger btn-fab-mini"><i-->
    <!--class="material-icons">delete</i></a>-->
    <!--</p>-->
    <!--<br/>-->

    <div class="container-fluid" v-show="user"> <!--main container--->

        <div class="row">
            <!------ General and team details ------------->
            <div class="col-md-3 col-md-offset-0">

                <!--card-wrapper content-->
                <div class="profile-card">
                    <div class="header-bg" :style="{ 'background-image': 'url('+ backgroundImage + ')'}"></div>
                    <div style="margin-bottom: 10px; border-bottom: 2px solid white; width: 100%; position: absolute; top: 99px;"></div>

                    <!--Card image-->
                    <div class="avatar">
                        <img :src="backgroundImage" alt="Userfoto" @mouseover="changeavatar = !changeavatar">
                        <div class="change-image" v-if="changeavatar">
                            <a>
                                <label>
                                    <i class="fa fa-paper-plane fa-3x"></i>
                                    <input id="uploadavatar" @change="fireUpload" v-el="fileInput" v-model="upload" type="file" style="display: none;">
                                </label>
                            </a>
                        </div>
                    </div>
                    <!--/.Card image-->

                    <!--card content-->
                    <div class="content">
                        <h3>{{user.first_name + ' '+ user.last_name}}</h3>
                        <p>System administrator</p>
                        <p>
                            <i class="fa fa-envelope"></i> {{ user.email }}
                            <br/>
                            <i class="fa fa-phone"></i> 06 14859701
                        </p>

                    </div>
                    <!--/card content-->
                </div>
                <!--/card-wrapper content-->



                <div class="media activities">

                        <h2 class="title">Teams</h2>


                    <a class="pull-left image" href="#" style="margin-left: 8px;">
                        <!--<img class="img-circle media-object"-->
                        <!--:src="getImg(member.avatar)"-->
                        <!--alt="User profile">-->
                    </a>

                    <div class="media-body">

                        <div class="col-xs-12 media-heading">
                            <h4 class="media-heading">Team 1 </h4>
                            <h4 class="media-heading">Team 2 </h4>
                            <h4 class="media-heading">Team 3 </h4>

                        </div>

                    </div>

                </div>

                <br/>

            </div>
            <!------ General and team details ------------->


            <!------ Main content section ------------->
            <div class="col-md-7 col-md-offset-0">


                <div class="page-divider">
                    <h2 class="title">
                        About <a> <i class="fa fa-pencil"></i></a>
                    </h2>

                </div>

                <!--Card content-->
                <div class="card-block readabale">

                    <p><b>DOB:</b> 01-01-2010</p>
                    <p><b>Sex:</b> Male</p>
                    <p><b>Status:</b> Single</p>
                    <p><b>Height:</b> 1.75m</p>
                    <p><b>City:</b> Zwolle</p>
                    <p><b>Address:</b> PR. Magrietstraat 13</p>

                    <br>

                </div><!--/.Card content-->

                <h2 class="title">Activities</h2>


                <!--Card content-->
                <div class="card-block readabale-text">

                    <p><b>DOB:</b> 01-01-2010</p>
                    <p><b>Sex:</b> Male</p>
                    <p><b>Status:</b> Single</p>
                    <p><b>Height:</b> 1.75m</p>
                    <p><b>City:</b> Zwolle</p>
                    <p><b>Address:</b> PR. Magrietstraat 13</p>

                    <br>

                </div><!--/.Card content-->


                    <h2 class="title">Biography <a> <i class="fa fa-pencil"></i></a></h2>

                <!--Card content-->
                <div class="card-block readabale">

                    <p>
                       {{{" Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                        Why do we use it?
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        " | marked }}}
                    </p>

                </div><!--/.Card content-->


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
        </div>



    </div> <!--/main container -->

</template>

<style>
    .profile-card {
        overflow: hidden;
        position: relative;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        border-radius: 0px;
        text-align: center;
        background-color: rgba(87, 196, 190, 0.65);
        color: rgb(243, 246, 255);
        height: 350px;
        font-family: "Roboto Slab";
        font-size: 13px;
    }

    .profile-card .header-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100px;
        z-index: 1;
        background-size: cover;

        -webkit-filter: blur(5px);
        -moz-filter: blur(5px);
        -o-filter: blur(5px);
        -ms-filter: blur(5px);
        filter: blur(5px);
        border-bottom: 2px solid #FFF;
        overflow: hidden;

    }

    .profile-card .avatar {
        position: relative;
        margin-top: 15px;
        z-index: 100;
        height: 170px;
        width: 100%;

    }

    .profile-card .avatar img {
        width: 150px;
        height: 150px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        border: solid 5px rgba(87, 196, 190, 0.65);
    }

    .change-image {
        position: absolute;
        top: 60px;
        left: 45%;
    }

    .change-image a {
        color: #aadcff;
    }

    .content {
        margin-top: 8px;
        font-family: "Roboto Slab";
    }

    .activities {
        box-shadow: 0 8px 10px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(98, 98, 98, 0.23);
        background-color: rgba(24, 24, 24, 0.88);
        color: #FFFFFF;
        border-radius: 3px;
        padding: 2px;
    }


    .edit-pen {
        position: absolute;
        top: 1px;
        bottom: 1px;
        right: 15px;
    }

    .edit-pen a {
        text-decoration: none;
        color: #b7e0ff;
    }

</style>
<script>

    var marked = require('marked');
    marked.setOptions({ghm: true});

    export default{
        props: ['userId'],
        data(){
            return {

                user: [],
                backgroundImage: '',
                changeavatar: false,
                upload: ''


            }
        },

        ready() {
            this.getUser();
        },

        methods: {
            getUser: function () {
                this.$http.get('/api/userprofile/' + this.userId + '/show').then(function (response) {
                    this.user = response.data;
                    this.backgroundImage = '/uploads/users/' + this.getImg(this.user.avatar);

                })
            },

            fireUpload: function () {
                alert(this.upload);
            },

            getImg: function (link) {

                var t = link.replace('C:\\Users\\Hafiz\\Dropbox\\MyProjects\\Projects\\mytemplate-project\\public/uploads/users\\', '');
                return t;
            },

        },

        filters: {
            'marked': marked,
        },

    }
</script>