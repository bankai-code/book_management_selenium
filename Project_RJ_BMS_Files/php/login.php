<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once 'user.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User();
    $loginSuccessful = $user->login($_POST['username'], $_POST['password']);

    if ($loginSuccessful) {
        $_SESSION['message'] = 'Hi ' . $_POST['username'] . '!';
        header('Location: book-list.php');
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>
<?php include 'header.php'; ?>
<div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Login</h2>
                    <?php if (isset($_SESSION['message']) && $_SESSION['message'] != ''): ?>
                        <div class="alert alert-info">
                            <?= $_SESSION['message'] ?>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>
                    <?php if ($error != ''): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>