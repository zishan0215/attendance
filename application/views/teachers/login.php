<?php

    $user_string = 'class="form-control" placeholder="Username" required autofocus';
    $pass_string = 'class="form-control" placeholder="Password" required ';

?>

<?php echo validation_errors(); ?>
<div class="container" align="center">
    <form class="form-signin" role="form" action="/jmiams/teacher/login" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php echo form_input('username', '', $user_string); ?><br />
        <?php echo form_password('password', '', $pass_string); ?><br />
        <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Sign In" />
    </form>
    <form method="post" action="/jmiams/index.php/teacher/forgot">
    <input type="submit" name="forgot" class="btn btn-warning" value="Forgot Password">
    </form>
</div>
