<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Вход в панель управления</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?=ADMINLTE_PATH?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?=ADMINLTE_PATH?>dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?=ADMINLTE_PATH?>plugins/iCheck/square/blue.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b>St</b>Cms v5.0</a>
            </div>
            <div class="login-box-body">
                
                {% if validate_errors is defined %}
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {% for error in validate_errors %}
                        <p>- {{ error.getMessage() }}</p>
                    {% endfor  %}
                </div>
                {% endif %}
                
                <form action="/login" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" required="true" name="email" placeholder="Email" value="<?=$this->request->getPost('email')?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" required="true" name="password" placeholder="Password" value="<?=$this->request->getPost('password')?>">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Вход</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="<?=ADMINLTE_PATH?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="<?=ADMINLTE_PATH?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=ADMINLTE_PATH?>plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
