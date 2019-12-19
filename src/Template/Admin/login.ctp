<div class="login-box">
    <div class="login-logo">
        <b>Admin</b>LTE
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php
        $fr = $this->Flash->render();
        if( !empty($fr) ){
        ?>
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?= $fr ?>
        </div>
        <?php } ?>

        <?= $this->Form->create("AdminUsers") ?>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Login ID">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <?= $this->Form->button("Sign In", ["class"=>"btn btn-primary btn-block btn-flat"]) ?>
                </div>
                <!-- /.col -->
            </div>
        <?= $this->Form->end() ?>
        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>
