
  <meta charset="utf-8">
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="resource/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="resource/bootstrap/css/bootstrap.min.css">


<style type="text/css">
    body,html{
        margin: 0;
        height: 100%;
    }
    #content{
        height: 100%;
        position: relative;
    }
    #content .bg_content{
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        height: 100%;
        background-image: url("view/page/images/bg.jpg");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        z-index: -1;
    }
    #content .wrap-content{
        width: 950px;
        position: relative;
        margin: 0 auto;
        height: 100%;
    }
    #content .wrap-content .block-login{
        display: block;
        width: 410px;
        height: 420px;
        background-color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -210px;
        margin-left: -205px;
        border-radius: 4px;
        text-align: center;
        -webkit-box-shadow: 0px 0px 13px 0px rgba(0,0,0,0.53);
        -moz-box-shadow: 0px 0px 13px 0px rgba(0,0,0,0.53);
        box-shadow: 0px 0px 13px 0px rgba(0,0,0,0.53);
    }
    #content .wrap-content .block-login .bg-top{
        display: inline-block;
        width: 100%;
        margin-bottom: 26px;
    }
    #content .wrap-content .block-login .text{
        font-size: 17px;
        line-height: 17px;
        color: #464646;
        margin-bottom: 28px;
    }
    #content .wrap-content .block-login .input-text{
        display: block;
        width: 300px;
        height: 30px;
        border: 1px solid #9c9c9c;
        font-size: 14px;
        left: 30px;
        color: #464646;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 16px;
        border-radius: 3px;
        padding-left: 8px;
        padding-right: 8px;
    }

    #content .wrap-content .block-login .btn-submit{
        background-color: #3c8dbc;
        color:#fff;
        font-size: 14px;
        line-height: 30px;
        width: 80px;
        height: 30px;
        border-radius: 3px;
        text-align: center;
        margin: 30px auto 0;
        cursor: pointer;
    }
    #content .wrap-content .block-login .btn-submit:hover{
        -webkit-box-shadow: inset 0px 0px 5px 0px rgba(0,0,0,0.53);
        -moz-box-shadow: inset 0px 0px 5px 0px rgba(0,0,0,0.53);
        box-shadow: inset 0px 0px 5px 0px rgba(0,0,0,0.53);
        text-shadow: 0px 0px 5px rgba(0,0,0,0.53);
    }
    #content .wrap-content .block-login .part{
        color: #ff1919;
        font-weight: bold;
        font-size: 17px;
        line-height: 17px;
        text-align: right;
        padding-right: 26px;
    }
</style>
<style type="text/css">

    /* #####################################################################
       #
       #   Project       : Modal Login with jQuery Effects
       #   Author        : Rodrigo Amarante (rodrigockamarante)
       #   Version       : 1.0
       #   Created       : 07/28/2015
       #   Last Change   : 08/02/2015
       #
       ##################################################################### */


    #login-modal .modal-dialog {
        width: 350px;
    }

    #login-modal input[type=text], input[type=password] {
        margin-top: 10px;
    }

    #div-login-msg,
    #div-lost-msg,
    #div-register-msg {
        border: 1px solid #dadfe1;
        height: 30px;
        line-height: 28px;
        transition: all ease-in-out 500ms;
    }

    #div-login-msg.success,
    #div-lost-msg.success,
    #div-register-msg.success {
        border: 1px solid #68c3a3;
        background-color: #c8f7c5;
    }

    #div-login-msg.error,
    #div-lost-msg.error,
    #div-register-msg.error {
        border: 1px solid #eb575b;
        background-color: #ffcad1;
    }

    #icon-login-msg,
    #icon-lost-msg,
    #icon-register-msg {
        width: 30px;
        float: left;
        line-height: 28px;
        text-align: center;
        background-color: #dadfe1;
        margin-right: 5px;
        transition: all ease-in-out 500ms;
    }

    #icon-login-msg.success,
    #icon-lost-msg.success,
    #icon-register-msg.success {
        background-color: #68c3a3 !important;
    }

    #icon-login-msg.error,
    #icon-lost-msg.error,
    #icon-register-msg.error {
        background-color: #eb575b !important;
    }

    #img_logo {
        max-height: 200px;
        max-width: 200px;
    }

    /* #########################################
       #    override the bootstrap configs     #
       ######################################### */

    .modal-backdrop.in {
        filter: alpha(opacity=50);
        opacity: .8;
    }

    .modal-content {
        background-color: #ececec;
        border: 1px solid #bdc3c7;
        border-radius: 0px;
        outline: 0;
        width: 400px;
        height: 500px;
    }

    .modal-header {
        min-height: 16.43px;
        padding: 15px 15px 15px 15px;
        border-bottom: 0px;
    }

    .modal-body {
        position: relative;
        padding: 5px 15px 5px 15px;
    }

    .modal-footer {
        padding: 15px 15px 15px 15px;
        text-align: left;
        border-top: 0px;
    }

    .checkbox {
        margin-bottom: 0px;
    }

    .btn {
        border-radius: 0px;
    }

    .btn:focus,
    .btn:active:focus,
    .btn.active:focus,
    .btn.focus,
    .btn:active.focus,
    .btn.active.focus {
        outline: none;
    }

    .btn-lg, .btn-group-lg>.btn {
        border-radius: 0px;
    }

    .btn-link {
        padding: 5px 10px 0px 0px;
        color: #95a5a6;
    }

    .btn-link:hover, .btn-link:focus {
        color: #2c3e50;
        text-decoration: none;
    }

    .glyphicon {
        top: 0px;
    }

    .form-control {
        border-radius: 0px;
    }
</style>
<html>
    <head>
        <title>เข้าสู่ระบบการจัดการอพาร์ทเมนต์</title>
    </head>
    <body>
        <div id="content" class = "col-md-12">
            <div class="bg_content"></div>


            <div class="wrap-content container">
                <div id="error">
                    <!-- error will be shown here ! -->
                </div>
                <div class="block-login col-md-6">

                    <img class="bg-top" src="view/page/images/top.png">

                    <form name = "login-form" id = "login-form" method = "post">
                        <div class="text">เข้าสู่ระบบ</div>
                        <input placeholder="ชื่อผู้ใช้งาน" id="username" name="username" class="input-text" type="text"/>
                        <input placeholder="กรอกรหัสผ่าน" id="password" name="password" class="input-text" type="password"/>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-sm" name="btn-login" id="btn-login">
                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; เข้าระบบ
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#login-modal">ลงทะเบียน</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </body>



    <!-- Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="img-circle" id="img_logo" src="view/page/images/top.png">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>

                <!-- Begin # DIV Form -->
                <div id="div-forms">

                    <!-- Begin # Login Form -->

                    <!-- End | Lost Password Form -->

                    <!-- Begin | Register Form -->
                    <form id="register-form" method = "post">
                        <div class="modal-body">
                            <div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-user"></div>
                                <span id="text-register-msg">ลงทะเบียนสมาชิก</span>
                            </div>
                            <input id="register_username" name = "register_username"class="form-control" type="text" placeholder="ชื่อผู้ใช้งาน" required>
                            <input id="register_password" name ="register_password" class="form-control" type="password" placeholder="กรอกรหัสผ่าน" required>

                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" id ="register" class="btn btn-primary btn-lg btn-block">ลงทะเบียนสมาชิก</button>
                            </div>

                        </div>
                    </form>
                    <!-- End | Register Form -->

                </div>
                <!-- End # DIV Form -->

            </div>
        </div>
    </div>

</html>


<script type="text/javascript">
    $('#btn-login').on('click', function (e) {
        var data = $("#login-form").serialize();

        $.ajax({
            type: 'POST',
            url: 'verify.php',
            data: data,
            beforeSend: function ()
            {
                $("#error").fadeOut();
                $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success: function (response)
            {
                
               
                if (response == "ok") {

                    $("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; กำลังเข้าสู่ระบบ...');
                    setTimeout(' window.location.href = "view/page/home.php"; ', 4000);
                }
                if(response != "ok")  {

                    $("#error").fadeIn(1000, function () {
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
                        $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                    });
                }
            }
        });
        return false;

    })

    $('#register').on('click', function (e) {
        var data = $("#register-form").serialize();

        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: data,
            success: function (response)
            {
                // if(response== "ok"){


                $("#login-modal").modal('hide');

                alert('ลงทะเบียนเรียบร้อย');

                //     }
            }
        });
        return false;

    })
</script>