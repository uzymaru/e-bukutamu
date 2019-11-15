<?php $this->load->view("head.php") ?>
<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="<?php echo base_url('images/logo.png" alt=""')?>">
                </a>
            </div>
            <div class="login-form">
                <?php
                if (isset($logout_message)) {
                    echo "<div class='message'>";
                    echo $logout_message;
                    echo "</div>";
                }
                ?>
                <?php echo form_open('login/login_proses'); ?>
                <?php
                echo "<div class='error_msg'>";
                if (isset($error_message)) {
                    echo $error_message;
                }
                echo validation_errors();
                echo "</div>";
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                        <input type="password" id="password" name="password" class="form-control" placeholder="**********">  
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("foot.php") ?>