<?php 

    $user_string = 'class="form-control" placeholder="Username" required autofocus';
    $pass_string = 'class="form-control" placeholder="Password" required ';

?>

<?php echo validation_errors(); ?>
<div class="container">
    <form class="form-signin" role="form" action="/jmiams/admin/login" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php echo form_input('username', '', $user_string); ?><br />
        <?php echo form_password('password', '', $pass_string); ?><br />
        <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Sign In" />
    </form>
</div> <!-- /container -->
