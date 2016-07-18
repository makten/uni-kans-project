<template>

    <div class="col-md-10 col-md-offset-1">
    <div class="col-md- col-xs-3 ripplelink markten-container" v-for="markt in markten">
        <h3>

            <a href="{{markt.link}}">
                <i class="fa {{markt.icon}} fa-2x super-icon image"></i>
            </a>

            <br>
            <span class="blocked" style="font-size: 15px;">
                <a href="/propositie/marktsegment/onderwijs" style="cursor: pointer;">
                    {{ markt.name }}
                </a>
            </span>
        </h3>

        <!--<p>{{ markt.name }}</p>-->
        <!--<br/>-->
        <hr/>

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
                    {name: 'Industrie', link: '/content/marktsegment/industrie', icon: 'fa-industry fa-2x'},
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