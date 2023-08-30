<?php
class ArticleController
{
  private $articleManager;

  public function __construct($articleManager)
  {
    $this->articleManager = $articleManager;
  }
  private function validateString($str)
  {
    if (strlen($str) < 1) {
      return false;
    }
    return true;
  }
  public function handleRequest()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if (isset($_POST['create-article'])) {

        $title = $_POST['title'];
        $description = $_POST['description'];
        if ($this->validateString($title) && $this->validateString($description)) {
          $result = $this->articleManager->createArticle($title, $description);
          if (isset($result)) {
            $_SESSION["sucecessMessage"] = "News was successfully created";
          }
        } else {
          $_SESSION["error"] = "Invalid input";
        }

      } elseif (isset($_POST['delete-article'])) {

        $articleId = $_POST['article-id'];
        $result = $this->articleManager->deleteArticle($articleId);
        if (isset($result)) {
          $_SESSION["sucecessMessage"] = "News was successfully deleted";
        }
      } elseif (isset($_POST['update-article'])) {

        $articleId = $_POST['article-id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        if ($this->validateString($title) && $this->validateString($description)) {
          $result = $this->articleManager->updateArticle($articleId, $title, $description);
          if (isset($result)) {
            $_SESSION["sucecessMessage"] = "News was successfully changed";
          }
        } else {
          $_SESSION["error"] = "Invalid input";
        }

      }


      header('Location: index.php');
      exit;
    }

  }
}

?>