<html>
    <head>
        <title>Login</title>
        <script src="../bootstrap/js/jquery.js"></script>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    </head>
    <body>
        <div class="col-md-5"></div>
        <h1>Login</h1>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php echo validation_errors(); ?>
            <?php echo form_open('loginTest'); ?>
                <label for="nickname">Nickname:</label>
                <input type="text" size="20" id="nickname" name="nickname"/>
                <br/>
                <label for="password">Password:</label>
                <input type="password" size="20" id="passowrd" name="password"/>
                <br/>
                <input type="submit" value="Login"/>
            </form>
            <?php
                $this->load->helper('url');
                $registerClick=base_url()."index.php/register/registerFormView";
            ?>
            <!--<button type="submit" name="register" onclick="window.location=('<?php echo($registerClick) ?>');">Register</button>-->
        </div>
    </body>
</html>