<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Панель администратора</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?=ADMINLTE_PATH?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?=ADMINLTE_PATH?>dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?=ADMINLTE_PATH?>dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?=ADMINLTE_PATH?>plugins/iCheck/all.css">
        <link rel="stylesheet" href="<?=ADMINCSS_PATH?>template.css">
        {% block styles %}{% endblock %} 
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="#" class="logo">
                    <span class="logo-mini"><b>SC</b></span>
                    <span class="logo-lg"><b>St</b> Cms</span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li><a href="/" target="_blank"><span> На сайт</span></a></li>
                            <li><a href="/logout"><span> Выход</span></a></li>
                        </ul>
                    </div>
                </nav>
            </header>

            <aside class="main-sidebar">
                <section class="sidebar">
                    
                    <!-- LEFT MENU -->
                    <ul class="sidebar-menu">
                        <li><a href="/admin/pages"><i class="fa fa-th"></i> <span>Страницы</span></a></li>
                        <li><a href="/admin/users"><i class="glyphicon glyphicon-user"></i> <span>Пользователи</span></a></li>
                        <li><a href="/admin/catalog"><i class="glyphicon glyphicon-folder-open"></i> <span>Каталог</span></a></li>
                        <li><a href="/admin/news"><i class="glyphicon glyphicon-list-alt"></i> <span>Новости</span></a></li>
                        <li><a href="/admin/articles"><i class="glyphicon glyphicon-th-list"></i> <span>Статьи</span></a></li>
                    </ul>
                    <!-- \ LEFT MENU -->
                    
                </section>
            </aside>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        {{ content() }}
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 5.0
                </div>
                <strong>Copyright &copy; 2016 All rights reserved.
            </footer>
            <div class="control-sidebar-bg"></div>
        </div>
        <script src="<?=ADMINLTE_PATH?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="<?=ADMINLTE_PATH?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=ADMINLTE_PATH?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?=ADMINLTE_PATH?>plugins/fastclick/fastclick.min.js"></script>
        <script src="<?=ADMINLTE_PATH?>dist/js/app.min.js"></script>
        <script src="<?=ADMINLTE_PATH?>dist/js/demo.js"></script>
        <script src="<?=ADMINLTE_PATH?>plugins/iCheck/icheck.min.js"></script>
        {% block scripts %}{% endblock %} 
        <script src="<?=ADMINJS_PATH?>upload.js"></script>
        <script src="<?=ADMINJS_PATH?>common.js"></script>
    </body>
</html>