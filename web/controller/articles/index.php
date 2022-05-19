
<?php
require_once 'model/connection.php';
require_once 'model/articles.php';

// TODO: class化 -> やるかどうか迷う

function article_list() {
    $connection = new Article();
    $articles = $connection->getAll();
    if (count($articles) === 0) {
        echo 'まだ記事はないよ';
        return http_response_code(404);
    }
    include 'template/articles.php';
}

function article_detail($id) {
    $connection = new Article();
    $article = $connection->getByID($id);
    if (count($article) === 0) {
        echo 'その記事ないよ';
        return http_response_code(404);
    }
    $article = $article[0];
    include 'template/articleDetail.php';
}