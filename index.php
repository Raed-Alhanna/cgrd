<?php
require_once './controllers/article_controller.php';
require_once './models/article/article_manager.php';
require_once './controllers/login_controller.php';


$loginController = new LoginController();
$loginController->handleLogin();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  $articleManager = new ArticleManager();
  $articles = $articleManager->getArticles();
  $articleController = new ArticleController($articleManager);
  $articleController->handleRequest();
}
$error = isset($_SESSION['error']) ? $_SESSION['error'] : null;
$successMessage = isset($_SESSION['sucecessMessage']) ? $_SESSION['sucecessMessage'] : null;
unset($_SESSION['error']);
unset($_SESSION['sucecessMessage']);

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cgrd Test-Backend |Admin</title>
  <link rel="stylesheet" type="text/css" href="./views/style.css">
</head>

<body>
  <div class="main-container">
    <div class="content-wrapper">
      <div class="logo-container">
        <img src="views/assets/logo.svg" alt="logo">
      </div>
      <?php if (isset($successMessage)): ?>
        <div class="message">
          <?php echo $successMessage; ?>
        </div>
      <?php endif; ?>
      <?php if (isset($error)): ?>
        <div class="error">
          <?php echo $error; ?>
        </div>
      <?php endif; ?>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <?php include './views/admin_view.php'; ?>
      <?php else: ?>
        <?php include './views/login_view.php'; ?>
      <?php endif; ?>
    </div>
  </div>


</body>

</html>