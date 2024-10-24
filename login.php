<?php
include_once('include/header.php');
include_once('include/nav.php');
include_once('phplib/view.php');
include_once('phplib/controler.php');
?>
<!-- //header -->

<!-- login -->
<div class="w3_login">
    <h3>Login</h3>
    <div class="w3_login_module">
        <div class="module form-module">
            <?php
            if (isset($_POST['btnLogin'])) {
                $email = $_POST['txtEmail'] ?? '';
                $password = $_POST['txtPassword'] ?? '';
                $redirurl = $_POST['txtredirurl'] ?? ''; // Default to empty string if not set
                checklogin($email, $password, $redirurl);
            }
            ?>
            <div class="form">
                <h2>Login to your account</h2>
                <form action="login.php?name=VXNlciBMb2dpbg==" method="post">
                    <input type="text" name="txtEmail" placeholder="Email" required=" ">
                    <input type="password" name="txtPassword" placeholder="Password" required=" ">
                    <input type="submit" value="Login" name="btnLogin">
                </form>
            </div>
            <div class="form">
                <h2>Login to your account</h2>
                <form action="login.php?name=VXNlciBMb2dpbg==" method="post">
                    <input type="text" name="txtEmail" placeholder="Email" required=" ">
                    <input type="password" name="txtPassword" placeholder="Password" required=" ">
                    <input type="hidden" name="txtredirurl" value="<?php echo isset($_GET['redirurl']) ? htmlspecialchars($_GET['redirurl'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                    <input type="submit" value="Login" name="btnLogin">
                </form>
            </div>
            <div class="cta"><a href="register.php">Register A New Account</a></div>
        </div>
    </div>
</div>
<!-- //login -->
<?php
include_once('include/footer.php');
?>
