<?php
$encrypter = app('Illuminate\Encryption\Encrypter');
$encrypted_token = $encrypter->encrypt(csrf_token());
?>
<input id="token" type="hidden" value="{{$encrypted_token}}">

<!-- Skin toggle button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-circle" style="color: {{$userSettings->skin_color_code}}"></i>
    <span class="label label-danger">skin</span>
</a>

<ul class="dropdown-menu">

    {{Form::hidden('user_id', Auth::user()->id)}}
    <li class="header">Select a skin</li>
    <li>
        <!-- inner menu: contains the skins -->
        <ul class="menu">
            <li onclick="changeSkin('skin-blue', '#3c8dbc')"><!-- start blue skins -->
                <a href="#">
                    <div class="pull-left">
                        <i class="fa fa-circle text-blue" style="font-size: 25px;"></i>
                    </div>
                    <!-- Skin color name -->
                    <h4>
                        Blue
                    </h4>
                    <!-- What the skin changes -->
                    <p><small>Changes the color of the navigation bar</small></p>
                </a>
            </li><!-- end blue skins -->
            <li onclick="changeSkin('skin-blue-light', '#3c8dbc')"><!-- start lightblue skins -->
                <a href="#">
                    <div class="pull-left">
                        <i class="fa fa-circle text-light-blue" style="font-size: 25px;"></i>
                    </div>
                    <!-- Skin color name -->
                    <h4>
                        Light-blue
                    </h4>
                    <!-- What the skin changes -->
                    <p><small>Changes the color of the navigation bar</small></p>
                </a>
            </li><!-- end skins -->
            <li onclick="changeSkin('skin-green', '#00a65a')"><!-- start green skins -->
                <a href="#">
                    <div class="pull-left">
                        <i class="fa fa-circle text-success" style="font-size: 25px;"></i>
                    </div>
                    <!-- Skin color name -->
                    <h4>
                        Green
                    </h4>
                    <!-- What the skin changes -->
                    <p><small>Changes the color of the navigation bar</small></p>
                </a>
            </li><!-- end skins -->
            <li onclick="changeSkin('skin-green-light', '#00a65a')"><!-- start lightgreen skins -->
                <a href="#">
                    <div class="pull-left">
                        <i class="fa fa-circle text-green" style="font-size: 25px;"></i>
                    </div>
                    <!-- Skin color name -->
                    <h4>
                        Light-green
                    </h4>
                    <!-- What the skin changes -->
                    <p><small>Changes the color of the navigation bar</small></p>
                </a>
            </li><!-- end skins -->

            <li onclick="changeSkin('skin-red', '#dd0506')"><!-- start lightgreen skins -->
                <a href="#">
                    <div class="pull-left">
                        <i class="fa fa-circle text-red" style="font-size: 25px;"></i>
                    </div>
                    <!-- Skin color name -->
                    <h4>
                        Red
                    </h4>
                    <!-- What the skin changes -->
                    <p><small>Changes the color of the navigation bar</small></p>
                </a>
            </li><!-- end skins -->
            <li onclick="changeSkin('skin-purple', '#605ca8')"><!-- start lightgreen skins -->
                <a href="#">
                    <div class="pull-left">
                        <i class="fa fa-circle text-purple" style="font-size: 25px;"></i>
                    </div>
                    <!-- Skin color name -->
                    <h4>
                        Purple
                    </h4>
                    <!-- What the skin changes -->
                    <p><small>Changes the color of the navigation bar</small></p>
                </a>
            </li><!-- end skins -->
            <li onclick="changeSkin('skin-purple-light', '#605ca8')"><!-- start lightgreen skins -->
                <a href="#">
                    <div class="pull-left">
                        <i class="fa fa-circle text-purple" style="font-size: 25px;"></i>
                    </div>
                    <!-- Skin color name -->
                    <h4>
                        Purple-light
                    </h4>
                    <!-- What the skin changes -->
                    <p><small>Changes the color of the navigation bar</small></p>
                </a>
            </li><!-- end skins -->
        </ul><!-- /.menu -->
    </li>
</ul>

<script type="text/javascript">

    function changeSkin(skin, skin_color)
    {


        var skin_val = $('#skin-value').val();
        $('link[href="{{ asset('/css/skins/') }}/'+skin_val+'.css"]').attr('href','{{ asset('/css/skins/') }}/'+skin+'.css');

        $('#skin-value').val(skin);

         $('#admin_app').removeClass();
         $('#admin_app').addClass('sidebar-mini');
         $('#admin_app').addClass(skin);


        var data = {'skin': skin, 'skin_color_code': skin_color, 'user_id': '{{Auth::user()->id}}' }
        $.ajax({
            url: '/api/userprofile/' + '{{Auth::user()->id}}' + '/updateSkin',
            type: "POST",
            headers: { 'X-XSRF-TOKEN' : "{{$encrypted_token}}" },
            cache: false,
            data: data,
            success: function (response) {

            }
        });
    }

</script>
