
<!--Search container-->
<div class=" col-sm-12 search-container animated" v-show="searchOutput.length > 0" transition="swipe">


    <div class="close-bar">@{{ searchOutput.length }} Results found
        <span class="pull-right" @click="searchOutput = []"><i class="fa fa-times "></i></span>
    </div>


    <div v-for="result in searchOutput" :class="'list-inline'">
        <div class="col-md-3"><!--Card-wrapper-->

            {{--<!--Card-->--}}
            <div class="card" style="padding: 3px; margin-bottom: 0.9%">

                <!--Card image-->
                <div :class="'ripplelink'" class=" view overlay hm-white-slight " s5>

                    <img :src="getImg(result.pro_avatar)" height="180"
                         width="200">
                    <a>
                        <div class="mask"></div>
                    </a>
                </div>
                <!--/.Card image-->

                <!--Button-->

                <a class="btn-floating btn-action btn ">
                    <img src="@{{result.user.userprofile.avatar_resized}}"/>
                </a>

                <!--Card content-->
                <div class="card-block">
                    <!--Title-->

                    <div style="height: 50px; overflow: hidden">
                        <h4 class="card-title">@{{{ result.pro_name  | highlight query }}}</h4>
                    </div>
                    <hr>
                    <!--Text-->
                    <div style="height: 100px; overflow: hidden">
                        <p class="card-text">@{{ result.pro_description }}</p>
                    </div>
                    <a href="/" class="link-text"><h5>Meer lezen <i class="fa fa-chevron-right"></i></h5></a>
                </div>
                <!--/.Card content-->

                <!-- Card footer -->
                <div class="card-data" style="background-color: #6a6a6a; color: #ffffff; height: 35px; ">
                    <ul class="list-inline">
                        <li><i class="fa fa-clock-o"></i> @{{ result.created_at | moment "D-M-Y"}}</li>
                        <li><a href="#"><i class="fa fa-comments-o"></i>12</a></li>
                        <li><a href="#"><i class="fa fa-facebook"> </i>21</a></li>
                        <li><a href="#"><i class="fa fa-twitter"> </i>5</a></li>
                    </ul>
                </div>

                <!-- Card footer -->

            </div> <!--Card-->
        </div><!--Card-wrapper-->

    </div>

    <div class="paginator-container" v-show="searchOutput.length > 0">
        <nav>
            <ul class="pagination">
                <li v-if="pagination.current_page > 1">
                    <a href="#" aria-label="Previous"
                       @click.prevent="changePage(pagination.current_page - 1)">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li v-for="page in pagesNumber"
                    v-bind:class="[ page == isActived ? 'active' : '']">
                    <a href="#"
                       @click.prevent="changePage(page)">@{{ page }}</a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page">
                    <a href="#" aria-label="Next"
                       @click.prevent="changePage(pagination.current_page + 1)">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!--Cards container col-12--->

</div><!--Search container -->