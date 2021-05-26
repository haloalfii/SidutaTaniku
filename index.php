<?php
require_once 'koneksi.php';
require_once 'Dbconfig.php';
require_once 'classUser.php';

if ($user->is_loggedin() != "") {
    $user->redirect('home.php');
}

if (isset($_POST['btn-login'])) {
    $uname = $_POST['txt_uname_email'];
    $umail = $_POST['txt_uname_email'];
    $upass = $_POST['txt_password'];

    if ($user->login($uname, $umail, $upass)) {
        $user->redirect('home.php');
    } else {
        $error = "Wrong Details !";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php
        include_once 'header.php';
    ?>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <form method="post">
                <h2 class="text-center">Sign in. Sidutaniku</h2>
                <hr />
                <?php
                if (isset($error)) {
                ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                    </div>
                <?php
                }
                ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="txt_password" placeholder="Your Password" required />
                </div>
                <div class="clearfix"></div>
                <hr />
                <div class="form-group">
                    <button type="submit" name="btn-login" class="btn btn-block btn-primary">
                        <i class="glyphicon glyphicon-log-in"></i>&nbsp;SIGN IN
                    </button>
                </div>
                <br />
                <label>Don't have account yet ! <a href="sign-up.php">Sign Up</a></label>
            </form>
        </div>
    </div>

</body>

</html>