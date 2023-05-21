<?php

function getReviews(int $id):array
{
    GLOBAL $pdo,$params;
    $sth=$pdo->prepare('SELECT * FROM review WHERE product_id=? order by date DESC  ');
    $sth->bindParam(1,$id);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS,'Review');
}

function saveReview( string $review, string $stars):void
{
    GLOBAL $pdo,$product;
    $review=filter_var($review,FILTER_SANITIZE_STRING);
    $sth=$pdo->prepare('SELECT * FROM review WHERE name=? AND description=?');
    $name=$_SESSION['user']->first_name . ' ' . $_SESSION['user']->last_name;
    $sth->bindParam(1,$name);
    $sth->bindParam(2,$review);
    $sth->execute();
    if (count($sth->fetchAll(PDO::FETCH_CLASS,'Review'))==0) {
        $sth = $pdo->prepare('INSERT INTO review  (name,date,description,stars,product_id,user_id) VALUES (?,NOW(),?,?,?,?)');
        $sth->bindParam(1, $name);
        $sth->bindParam(2, $review);
        $sth->bindParam(3,$stars);
        $sth->bindParam(4, $product->id);
        $sth->bindParam(5,$_SESSION['user']->id);
        $sth->execute();
    }
}
