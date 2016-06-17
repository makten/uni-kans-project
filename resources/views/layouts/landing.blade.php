<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Hafiz Abass">
    <meta id="token" name="token" content="{{ csrf_token() }}">

    <title>H Abass Project</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Custom styles for this template -->
    {{--<link href="{{ asset('/css/main.css') }}" rel="stylesheet">--}}

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">--}}
    <script src="https://use.fontawesome.com/c2efdf6501.js"></script>
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>

    {!! Html::style('/css/app.css') !!}
    {!! Html::style('/css/query_css.css') !!}
    {!! Html::style('/css/cust/-datetimepicker.css') !!}
    {!! Html::style('/css/cust/bootstrap-material-design.css') !!}
    {!! Html::style('/css/cust/ripples.min.css') !!}
    {!! Html::style('/css/animate.css') !!}
    {!! Html::style('/css/landing.css') !!}

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation" id="app">

<!-- Fixed navbar -->
{{--<header>--}}
<header>
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>Hafiz Abass Temp</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#home" class="smoothScroll">Home</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="/" data-target="#" class="dropdown-toggle" data-toggle="dropdown">

                                <div class="pull-left">
                                    <!-- User Image -->
                                    <img src="{{asset('/uploads/users\6d5b03fbf96cf31bbad3aa1586c3a689.jpg')}}"
                                         class="img_circle">

                                    {{ Auth::user()->first_name }}
                                </div>

                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->isAdmin('admin'))
                                    <li><a href="/dashboard"><i class="material-icons">dashboard</i> Dashboard</a></li>
                                @endif
                                <li><a href="javascript:void(0)"><i class="material-icons">settings</i> Profile</a></li>

                                <li class="divider"></li>
                                <li><a href="/logout"><i class="material-icons">close</i> Logout</a></li>
                            </ul>
                        </li>

                    @endif
                </ul>

                <div id="navSearch">
                    <nav-search @new-searchresults="handleSearchResults"></nav-search>
                </div>

            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>


<div class="container-full-bg container">
    <!--Main image container container-->

    <!--Search container-->
    <div class=" col-sm-12 search-container animated" v-show="searchOutput.length > 0" transition="swipe">


            <div class="close-bar">@{{ searchOutput.length }} Results found
                <span class="pull-right" @click="searchOutput = []"><i class="fa fa-times "></i></span>
            </div>


            <div v-for="result in searchOutput" :class="'list-inline'">
                <div class="col-md-3">

                    {{--<!--Card-->--}}
                    <div class="card" style="padding: 3px; margin-bottom: 0.9%">

                        <!--Card image-->
                        <div :class="'ripplelink'" class=" view overlay hm-white-slight " style="height: 150px">

                            <img :src="getImg(result.pro_avatar)" height="180"
                                 width="200">
                            <a>
                                <div class="mask"></div>
                            </a>
                        </div>
                        <!--/.Card image-->

                        <!--Button-->

                        <a class="btn-floating btn-action btn img_circle">
                            <img src="{{asset('/images/profile/images.jpg')}}"/>
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

    <aside id="themas_links">
        <themas></themas>
    </aside>

</div><!--Main image container container-->


<br/>

<div class="container" style="height: 50% !important;">
    <div class="row">
        <section class="content" id="marktsegments" style="position: relative;">
            <marktsegments></marktsegments>
        </section><!-- /.content -->
    </div>

</div>
</div>
</div>

{{--Stopword function - Hafiz Abass--}}

<script>


    function getDictionary() {
        return [
            "a", "about", "above", "across", "after", "again", "against", "all", "almost", "alone", "along", "already", "also", "although",
            "always", "among", "an", "and", "another", "any", "anybody", "anyone", "anything", "anywhere", "are", "area", "areas", "around",
            "as", "ask", "asked", "asking", "asks", "at", "away", "b", "back", "backed", "backing", "backs", "be", "became", "because", "become",
            "becomes", "been", "before", "began", "behind", "being", "beings", "best", "better", "between", "big", "both", "but", "by", "c", "came",
            "can", "cannot", "case", "cases", "certain", "certainly", "clear", "clearly", "come", "could", "d", "did", "differ", "different", "differently",
            "do", "does", "done", "down", "down", "downed", "downing", "downs", "during", "e", "each", "early", "either", "end", "ended", "ending", "ends",
            "enough", "even", "evenly", "ever", "every", "everybody", "everyone", "everything", "everywhere", "f", "face", "faces", "fact", "facts",
            "far", "felt", "few", "find",
            "finds",
            "first",
            "for",
            "four",
            "from",
            "full",
            "fully",
            "further",
            "furthered",
            "furthering",
            "furthers",
            "g",
            "gave",
            "general",
            "generally",
            "get",
            "gets",
            "give",
            "given",
            "gives",
            "go",
            "going",
            "good",
            "goods",
            "got",
            "great",
            "greater",
            "greatest",
            "group",
            "grouped",
            "grouping",
            "groups",
            "h",
            "had",
            "has",
            "have",
            "having",
            "he",
            "her",
            "here",
            "herself",
            "high",
            "high",
            "high",
            "higher",
            "highest",
            "him",
            "himself",
            "his",
            "how",
            "however",
            "i",
            "if",
            "important",
            "in",
            "interest",
            "interested",
            "interesting",
            "interests",
            "into",
            "is",
            "it",
            "its",
            "itself",
            "j",
            "just",
            "k",
            "keep",
            "keeps",
            "kind",
            "knew",
            "know",
            "known",
            "knows",
            "l",
            "large",
            "largely",
            "last",
            "later",
            "latest",
            "least",
            "less",
            "let",
            "lets",
            "like",
            "likely",
            "long",
            "longer",
            "longest",
            "m",
            "made",
            "make",
            "making",
            "man",
            "many",
            "may",
            "me",
            "member",
            "members",
            "men",
            "might",
            "more",
            "most",
            "mostly",
            "mr",
            "mrs",
            "much",
            "must",
            "my",
            "myself",
            "n",
            "necessary",
            "need",
            "needed",
            "needing",
            "needs",
            "never",
            "new",
            "new",
            "newer",
            "newest",
            "next",
            "no",
            "nobody",
            "non",
            "noone",
            "not",
            "nothing",
            "now",
            "nowhere",
            "number",
            "numbers",
            "o",
            "of",
            "off",
            "often",
            "old",
            "older",
            "oldest",
            "on",
            "once",
            "one",
            "only",
            "open",
            "opened",
            "opening",
            "opens",
            "or",
            "order",
            "ordered",
            "ordering",
            "orders",
            "other",
            "others",
            "our",
            "out",
            "over",
            "p",
            "part",
            "parted",
            "parting",
            "parts",
            "per",
            "perhaps",
            "place",
            "places",
            "point",
            "pointed",
            "pointing",
            "points",
            "possible",
            "present",
            "presented",
            "presenting",
            "presents",
            "problem",
            "problems",
            "put",
            "puts",
            "q",
            "quite",
            "r",
            "rather",
            "really",
            "right",
            "right",
            "room",
            "rooms",
            "s",
            "said",
            "same",
            "saw",
            "say",
            "says",
            "second",
            "seconds",
            "see",
            "seem",
            "seemed",
            "seeming",
            "seems",
            "sees",
            "several",
            "shall",
            "she",
            "should",
            "show",
            "showed",
            "showing",
            "shows",
            "side",
            "sides",
            "since",
            "small",
            "smaller",
            "smallest",
            "so",
            "some",
            "somebody",
            "someone",
            "something",
            "somewhere",
            "state",
            "states",
            "still",
            "till",
            "such",
            "sure",
            "t",
            "take",
            "taken",
            "than",
            "that",
            "the",
            "their",
            "them",
            "then",
            "there",
            "therefore",
            "these",
            "they",
            "thing",
            "things",
            "think",
            "thinks",
            "this",
            "those",
            "though",
            "thought",
            "thoughts",
            "three",
            "through",
            "thus",
            "to",
            "today",
            "together",
            "too",
            "took",
            "toward",
            "turn",
            "turned",
            "turning",
            "turns",
            "two",
            "u",
            "under",
            "until",
            "up",
            "upon",
            "us",
            "use",
            "used",
            "uses",
            "v",
            "very",
            "w",
            "want",
            "wanted",
            "wanting",
            "wants",
            "was",
            "way",
            "ways",
            "we",
            "well",
            "wells",
            "went",
            "were",
            "what",
            "when",
            "where",
            "whether",
            "which",
            "while",
            "who",
            "whole",
            "whose",
            "why",
            "will",
            "with",
            "within",
            "without",
            "work",
            "worked",
            "working",
            "works",
            "would",
            "x",
            "we'd",
            "we'll",
            "we're",
            "we've",
            "y",
            "year",
            "years",
            "yet",
            "you",
            "young",
            "younger",
            "youngest",
            "your",
            "yours",
            "z"
        ];
    }

    function regexStopWord(stop_word) {
        var regex;
        var regex_str;


        // Trim stop word with regex
        regex_str = "^\\s*" + stop_word + "\\s*$";
        regex_str += "|^\\s*" + stop_word + "\\s+";
        regex_str += "|\\s+" + stop_word + "\\s*$";
        regex_str += "|\\s+" + stop_word + "\\s+";
        regex = new RegExp(regex_str, "ig");

        return regex;
    }

    String.prototype.rmStopWords = function () {
        var word;
        var stop_word;
        var your_wording = this.valueOf();


        words = your_wording.match(/[^\s]+|\s+[^\s+]$/g);

        for (var i = 0; i < words.length; i++) {

            for (var x = 0; x < getDictionary().length; x++) {
                word = words[i].replace(/\s+|[^a-z]+/ig, "");

                stop_word = getDictionary()[x];

                if (word.toLowerCase() == stop_word) {
                    // Remove any found word from the keywords
                    your_wording = your_wording.replace(regexStopWord(stop_word), " ");
                }
            }
        }

        return your_wording.replace(/^\s+|\s+$/g, "").split(' ');

    }


    var kc = "The world is bigger than you and me php";
    console.log(kc.rmStopWords());

</script>


<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.24/vue.js"></script>
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.2/vue-resource.js"></script>--}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/default_script.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/material.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/ripples.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/default_script.js') }}" type="text/javascript"></script>
{{--<script src="{{ asset('/js/vue-resource.js') }}" type="text/javascript"></script>--}}

<script>
    $(function () {
        var ink, d, x, y;
        $(".ripplelink").click(function (e) {
            if ($(this).find(".ink").length === 0) {
                $(this).prepend("<span class='ink'></span>");
            }

            ink = $(this).find(".ink");
            ink.removeClass("animate");

            if (!ink.height() && !ink.width()) {
                d = Math.max($(this).outerWidth(), $(this).outerHeight());
                ink.css({height: d, width: d});
            }

            x = e.pageX - $(this).offset().left - ink.width() / 2;
            y = e.pageY - $(this).offset().top - ink.height() / 2;

            ink.css({top: y + 'px', left: x + 'px'}).addClass("animate");
        });
    });

</script>

</body>
</html>
