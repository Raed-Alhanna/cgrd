<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . '/database/db_handler.php';
require_once "./database/db_handler.php";
require_once 'article_model.php';

class ArticleManager extends DBHandler
{
    protected $connection;

    public function __construct()
    {
        try {
            $this->connection = $this->connect();
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            $_SESSION['error'] = $errorMessage;
            echo $errorMessage;
            exit;
        }

    }

    public function getArticles()
    {
        try {
            $query = "SELECT * FROM articles";
            $stmt = $this->connection->query($query);
            $articles = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $article = new Article($row['id'], $row['title'], $row['description']);
                $articles[] = $article;
            }

            return $articles;
        } catch (PDOException $e) {
            $_SESSION["error"] = "An error occurred while retrieving News: " . $e->getMessage();
            exit;
        }
    }

    public function createArticle($title, $description)
    {
        try {
            $query = "INSERT INTO articles (title, description) VALUES (?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->execute([$title, $description]);
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            $_SESSION["error"] = "An error occurred while creating the news: " . $e->getMessage();

            exit;
        }
    }

    public function deleteArticle($articleId)
    {
        try {
            $query = "DELETE FROM articles WHERE id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->execute([$articleId]);
            return true;
        } catch (PDOException $e) {
            $_SESSION["error"] = "An error occurred while deleting the news: " . $e->getMessage();

            exit;
        }
    }

    public function updateArticle($articleId, $title, $description)
    {
        try {
            $query = "UPDATE articles SET title = ?, description = ? WHERE id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->execute([$title, $description, $articleId]);
            return true;
        } catch (PDOException $e) {
            $_SESSION["error"] = "An error occurred while edting the news: " . $e->getMessage();

            exit;
        }
    }
} ?>