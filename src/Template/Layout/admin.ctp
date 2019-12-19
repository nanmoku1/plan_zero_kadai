<?php
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= $this->Url->build('/bower_components/bootstrap/dist/css/bootstrap.min.css', true) ?>">
    <!-- font awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- adminLTE style -->
    <link href="<?= $this->Url->build('/css/AdminLTE.min.css', true) ?>" rel="stylesheet" type="text/css" />
    <link href="<?= $this->Url->build('/css/skins/skin-blue.min.css', true) ?>" rel="stylesheet" type="text/css" />
</head>
<body class="skin-blue">
    <div class="wrapper">

        <!-- トップメニュー -->
        <header class="main-header">

            <!-- ロゴ -->
            <a href="" class="logo">管理画面</a>

            <!-- トップメニュー -->
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </nav>

        </header><!-- end header -->


        <!-- サイドバー -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">

                    <!-- メニューヘッダ -->
                    <li class="header">機能一覧</li>

                    <!-- メニュー項目 -->
                    <li><?= $this->Html->link("一覧", ['action' => 'index']) ?></li>
                    <li><?= $this->Html->link("新規登録", ['action' => 'add']) ?></li>
                    <li><?= $this->Html->link("ログアウト", ['action' => 'logout']) ?></li>

                </ul>
            </section>
        </aside><!-- end sidebar -->


        <!-- content -->
        <div class="content-wrapper">

            <?= $this->fetch('content') ?>

        </div><!-- end content -->


        <!-- フッター -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">Version1.0</div>
            <strong>Copyright &copy; 2015</strong>, All rights reserved.
        </footer><!-- end footer -->


    </div><!-- end wrapper -->
    <!-- JS -->
    <!-- jQuery 3 -->
    <script src="<?= $this->Url->build('/bower_components/jquery/dist/jquery.min.js', true) ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= $this->Url->build('/bower_components/jquery-ui/jquery-ui.min.js', true) ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= $this->Url->build('/bower_components/bootstrap/dist/js/bootstrap.min.js', true) ?>"></script>
    <!-- SlimScroll -->
    <script src="<?= $this->Url->build('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js', true) ?>"></script>
    <!-- FastClick -->
    <script src="<?= $this->Url->build('/bower_components/fastclick/lib/fastclick.js', true) ?>"></script>
    <!-- adminLTE -->
    <script src="<?= $this->Url->build('/js/adminlte.min.js', true) ?>"></script>
    <script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
    </script>
</body>
</html>
