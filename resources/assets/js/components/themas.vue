<template>

    <style>
        .thema-links {
            position: absolute;
            left: 30px;
            bottom: 5px;
            width: 100%;
        }
    </style>




<div class="row thema-links">

    <div class="col-xs-8 col-lg-3">
        <ul class="cat-links">
            <li style="background-color: #ee8921;">
                 <a href="/propositie/thema/veiligheid" class="links"><span><i class="fa fa-lock"></i> Veiligheid</span>
                </a>
            </li>

            <li style="background-color: rgba(111, 111, 111, 1);">
                <a href="/propositie/thema/comfort" class="links">
                    <span><i class="fa fa-heartbeat"></i> Comfort & Gezondheid</span>
                </a>
            </li>

            <li style="background-color: #0000ff;">
                <a href="/propositie/thema/communicatie" class="links">
                    <span><i class="fa fa-users"></i> Communicatie</span>
                </a>
            </li>

            <li style="background-color: #008000;">
                <a href="/propositie/thema/duurzaamenergie">
                    <span><i class="fa fa-line-chart" class="links"></i> Energie & Duurzaamheid</span>
                </a>
            </li>

            <li style="background-color: #663399;">
                <a href="/propositie/thema/integraaldienstverlening" class="links">
                    <span><i class="fa fa-suitcase"></i> Integrale dienstverlening</span>
                </a>
            </li>

        </ul>
    </div>
</div>
</template>
<script>
    export default {

        props: [
            'app'
        ],
    }
</script>




