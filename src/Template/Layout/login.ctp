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
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= $this->Url->build('/plugins/iCheck/square/blue.css', true) ?>">
</head>
<body class="hold-transition login-page">
    <?= $this->fetch('content') ?>
    <!-- JS -->
    <!-- jQuery 3 -->
    <script src="<?= $this->Url->build('/bower_components/jquery/dist/jquery.min.js', true) ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= $this->Url->build('/bower_components/bootstrap/dist/js/bootstrap.min.js', true) ?>"></script>
    <!-- iCheck -->
    <script src="<?= $this->Url->build('/plugins/iCheck/icheck.min.js', true) ?>"></script>
    <script>
    $(function () {
        $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>
</html>
