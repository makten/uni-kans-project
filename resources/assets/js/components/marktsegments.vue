<template>

    <div class="col-md-12" style="padding: 0px;">
        <div class="row" style="margin: 0px;">

            <div class="markt col-xs-6 col-sm-4 col-md-3 col-lg-3" v-for="markt in markten">

                <div class="thumbnail marktthumnails ripplelink">

                    <div style="text-align: center; margin-bottom: 10px;">
                        <a href="/propositie/marktsegment/onderwijs" style="cursor: pointer;">
                            <span class="animated pageName">{{markt.name}}</span>
                        </a>
                    </div>

                    <div class="icon-container-big center-div"
                         style="text-align: center; margin-bottom: 0px; vertical-align: top">
                        <a href="{{markt.link}}">
                            <div class="pointers center-div" >
                                <div class="pointers-small center-div image">
                                    <span><i class="fa {{markt.icon}}"></i> </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>

</template>


<script>
    export default {

        data(){
            return {

                markten: [
                    {name: 'Zorg', link: '/propositie/marktsegment/zorg', icon: 'fa fa-heartbeat fa-2x'},
                    {name: 'Onderwijs', link: '/propositie/marktsegment/onderwijs', icon: 'fa-graduation-cap fa-2x'},
                    {name: 'Vastgoed', link: '/propositie/marktsegment/vastgoed', icon: 'fa-key fa-2x rt'},
                    {name: 'Retail', link: '/propositie/marktsegment/zorg', icon: 'fa-shopping-cart fa-2x'},
                    {
                        name: 'Zakelijke Dienstverlening',
                        link: '/propositie/marktsegment/zakelijkdienstverlening',
                        icon: 'fa-briefcase fa-2x'
                    },
                    {name: 'Bouw', link: '/propositie/marktsegment/bouw', icon: 'fa-home fa-2x'},
                    {name: 'Sport Cultuur & Recreatie', link: '/propositie/marktsegment/zorg', icon: 'fa-trophy fa-2x'},
                    {name: 'Industrie', link: '/propositie/marktsegment/industrie', icon: 'fa-industry fa-2x'},
                    {
                        name: 'Woning corporatie',
                        link: '/propositie/marktsegment/woningcorporatie',
                        icon: 'fa-hospital-o fa-2x'
                    },
                    {name: 'Overheid', link: '/propositie/marktsegment/overheid', icon: 'fa-university fa-2x'}
                ],
                page: "Marksegments Page",
                show: true
            };
        },

        methods: {

        }

    };

</script>