@extends('layouts.master')

@section('content')

    @include('pages.searchform')

    <div class="col-xs-12 fill center-div">

        <div class="col-xs-12" style="padding: 0;">



            <div class="col-sm-12 col-md-3" style="padding: 2px; padding-top: 0;">

                <ul class="cat-links">
                    <li style="background-color: #ee8921;">
                        <a href="/propositie/thema/veiligheid">
                            <span>Veiligheid</span>
                        </a>
                    </li>

                    <li style="background-color: rgba(111, 111, 111, 1);">
                        <a href="/propositie/thema/comfort">
                            <span>Comfort & Gezondheid</span>
                        </a>
                    </li>

                    <li style="background-color: #0000ff;">
                        <a href="/propositie/thema/communicatie">
                            <span>Communicatie</span>
                        </a>
                    </li>

                    <li style="background-color: #008000;">
                        <a href="/propositie/thema/duurzaamenergie">
                            <span>Energie & Duurzaamheid</span>
                        </a>
                    </li>

                    <li style="background-color: #663399;">
                        <a href="/propositie/thema/integraaldienstverlening">
                            <span>Integrale dienstverlening</span>
                        </a>
                    </li>

                </ul>

            </div>


            <div class="hidden-xs hidden-sm col-xs-12 col-sm-9 transparent-div center-div" style="height: 200px; padding-top: 5px;"> {{--Large screen screen--}}

                <div class="col-xs-2 pointer-container" style="height: auto;">

                    <div class="pointer-container center-div" style="text-align: center; margin-bottom: 10px;">
                        <a href="/propositie/marktsegment/zorg" style="position: absolute; bottom: 0; left: 17px; cursor: pointer">
                            <span class="pageName">Zorg</span>
                        </a>
                    </div>

                        <a href="/propositie/marktsegment/zorg">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-heartbeat fa-2x"></i> </span>
                                </div>
                            </div>

                        </a>

                </div>

                <div class="col-xs-2 pointer-container" style="height: auto;">

                    <div class="pointer-container center-div" style="text-align: center; margin-bottom: 10px;">
                        <a href="/propositie/marktsegment/onderwijs" style="position: absolute; bottom: 0; left: 0px; cursor: pointer">
                            <span class="pageName">Onderwijs</span>
                        </a>
                    </div>

                    <div class="icon-container-big">
                        <a href="/propositie/marktsegment/onderwijs">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-graduation-cap fa-2x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>



                <div class="col-xs-2 pointer-container" style="height: auto;">

                    <div class="pointer-container center-div" style="text-align: right; margin-bottom: 10px;">
                        <a href="/propositie/marktsegment/vastgoed" style="position: absolute; bottom: 0; left: 7px; cursor: pointer">
                            <span class="pageName">Vastgoed</span>
                        </a>
                    </div>

                    <div class="icon-container-big">
                        <a href="/propositie/marktsegment/vastgoed">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-key fa-2x rt"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-2 pointer-container" style="height: auto;">

                    <div class="pointer-container center-div" style=" margin-bottom: 10px;">
                        <a href="/propositie/marktsegment/retail" style="position: absolute; bottom: 0; left: 15px; cursor: pointer">
                            <span class="pageName">Retail</span>
                        </a>
                    </div>

                    <div class="icon-container-big">
                        <a href="/propositie/marktsegment/retail">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-shopping-cart fa-2x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-2 pointer-container" style="height: auto;">

                    <div class="pointer-container center-div" style="text-align: inherit; margin-bottom: 10px; vertical-align: middle;">
                        <a href="/propositie/marktsegment/zakelijkdienstverlening" style="position: absolute; bottom: 0; left: -15px; cursor: pointer">
                            <span class="pageName">Zakelijke Dienstverlening</span>
                        </a>
                    </div>

                    <div class="icon-container-big">
                        <a href="/propositie/marktsegment/zakelijkdienstverlening">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-briefcase fa-2x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-2  pointer-container" style="height: auto;">

                    <div class="pointer-container center-div" style="margin-bottom: 10px;">
                        <a href="/propositie/marktsegment/bouw" style="position: absolute; bottom: 0; left: 17px; cursor: pointer">
                            <span class="pageName">Bouw</span>
                         </a>
                    </div>

                    <div class="icon-container-big">
                        <a href="/propositie/marktsegment/bouw">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-home fa-2x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-2  pointer-container" style="height: auto;">

                    <div class="pointer-container" style="margin-bottom: 10px;">
                        <a href="/propositie/marktsegment/sportcultuurrecreatie" style="position: absolute; bottom: 0; left: -15px; cursor: pointer">
                            <span class="pageName">Sport Cultuur & Recreatie</span>
                        </a>
                    </div>


                    <div class="icon-container-big">
                        <a href="/propositie/marktsegment/sportcultuurrecreatie">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-trophy fa-2x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-2  pointer-container" style="height: auto;">

                    <div class="pointer-container center-div" style="margin-bottom: 10px;">
                        <a href="/propositie/marktsegment/industrie" style="position: absolute; bottom: 0; left: 6px; cursor: pointer">
                            <span class="pageName">Industrie</span>
                        </a>
                   </div>

                    <div class="icon-container-big">
                        <a href="/propositie/marktsegment/industrie">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-industry fa-2x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-2 pointer-container" style="height: auto;">

                    <div class="pointer-container center-div" style="margin-bottom: 10px;">
                        <a href="/propositie/marktsegment/woningcorporatie" style="position: absolute; bottom: 0; left: -15px; cursor: pointer">
                            <span class="pageName">Woning corporatie</span>
                        </a>
                   </div>

                    <div class="icon-container-big">
                        <a href="/propositie/marktsegment/woningcorporatie">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-hospital-o fa-2x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-2 pointer-container" style="height: auto;">

                    <div class="pointer-container center-div" style="margin-bottom: 10px;">
                        <a href="/propositie/marktsegment/overheid" style="position: absolute; bottom: 0; left: 10px; cursor: pointer">
                            <span class="pageName">Overheid</span>
                        </a>
                    </div>

                    <div class="icon-container-big">
                        <a href="/propositie/marktsegment/overheid">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-university fa-2x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


            </div> {{--End Large screen--}}


            <div class="visible-xs visible-sm col-xs-12 transparent-div" style="padding: 0; padding-top: 5px;"> {{--small screen--}}

                <div class="col-xs-12" style="padding: 0;">
                    <div class="col-xs-3 icon-container">
                        <a href="/propositie/marktsegment/zorg">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-heartbeat fa-1x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-9 icon-text-container">
                        <div class="icon-text-wrapper">
                            <span class="pageName"><a href="/propositie/marktsegment/zorg">Zorg</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12" style="padding: 0;">
                    <div class="col-xs-3 icon-container">
                        <a href="/propositie/marktsegment/onderwijs">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-graduation-cap fa-1x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-9 icon-text-container">
                        <div class="icon-text-wrapper">
                            <span class="pageName"><a href="/propositie/marktsegment/onderwijs">Onderwijs</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12" style="padding: 0;">
                    <div class="col-xs-3 icon-container">
                        <a href="/propositie/marktsegment/zakelijkdienstverlening">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-briefcase fa-1x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-9 icon-text-container">
                        <div class="icon-text-wrapper">
                            <span class="pageName"><a href="/propositie/marktsegment/zakelijkdienstverlening">Zakelijke Dienstverlening</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12" style="padding: 0;">
                    <div class="col-xs-3 icon-container">
                        <a href="/propositie/marktsegment/vastgoed">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-key fa-1x rt"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-9 icon-text-container">
                        <div class="icon-text-wrapper">
                            <span class="pageName"><a href="/propositie/marktsegment/vastgoed">Vastgoed</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12" style="padding: 0;">
                    <div class="col-xs-3 icon-container">
                        <a href="/propositie/marktsegment/retail">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-shopping-cart fa-1x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-9 icon-text-container">
                        <div class="icon-text-wrapper">
                            <span class="pageName"><a href="/propositie/marktsegment/retail">Retail</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12" style="padding: 0;">
                    <div class="col-xs-3 icon-container">
                        <a href="/propositie/marktsegment/bouw">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-home fa-1x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-9 icon-text-container">
                        <div class="icon-text-wrapper">
                            <span class="pageName"><a href="/propositie/marktsegment/bouw">Bouw</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12" style="padding: 0;">
                    <div class="col-xs-3 icon-container">
                        <a href="/propositie/marktsegment/sportcultuurrecreatie">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-trophy fa-1x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-9 icon-text-container">
                        <div class="icon-text-wrapper">
                            <span class="pageName"><a href="/propositie/marktsegment/sportcultuurrecreatie">Sports Cultuur & Recreatie</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12" style="padding: 0;">
                    <div class="col-xs-3 icon-container">
                        <a href="/propositie/marktsegment/industrie">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-industry fa-1x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-9 icon-text-container">
                        <div class="icon-text-wrapper">
                            <span class="pageName"><a href="/propositie/marktsegment/industrie">Industrie</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12" style="padding: 0;">
                    <div class="col-xs-3 icon-container">
                        <a href="/propositie/marktsegment/woningcorporatie">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-hospital-o fa-1x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-9 icon-text-container">
                        <div class="icon-text-wrapper">
                            <span class="pageName"><a href="/propositie/marktsegment/woningcorporatie">Woning Corporaties</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12" style="padding: 0;">
                    <div class="col-xs-3 icon-container">
                        <a href="/propositie/marktsegment/overheid">
                            <div class="pointers center-div">
                                <div class="pointers-small center-div image">
                                    <span><i class="fa fa-university fa-1x"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xs-9 icon-text-container">
                        <div class="icon-text-wrapper">
                            <span class="pageName"><a href="/propositie/marktsegment/overheid">Overheid</a></span>
                        </div>
                    </div>
                </div>


            </div> {{--end small screen--}}
        </div>
    </div>

@endsection
