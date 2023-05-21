<?php

function getCategories():array
{
    global $pdo;
    $categories = $pdo->query('SELECT * FROM category')->fetchAll(PDO::FETCH_CLASS, 'Category');
    return $categories;
}

function getProducts(int $id):array
{
    global $pdo;
    $sth= $pdo->prepare("SELECT * FROM product WHERE category_id = :id");
    $sth->bindParam(':id', $id);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}

function getCategoryName(int $id):string
{
    global $pdo;
    $sth= $pdo->prepare("SELECT name FROM category WHERE id = :id");
    $sth->bindParam(':id', $id);
    $sth->setFetchMode(PDO::FETCH_CLASS, 'Category');
    $sth->execute();
    $category= $sth->fetch();
    return $category->name;
}

function getDetail(int $id):array
{
    global $pdo;
    $sth= $pdo->prepare("SELECT * FROM product WHERE id = :id");
    $sth->bindParam(':id', $id);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}

function getReview(int $id):array
{
    global $pdo;
    $sth= $pdo->prepare("SELECT * FROM comment WHERE film_id = :id");
    $sth->bindParam(':id', $id);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}