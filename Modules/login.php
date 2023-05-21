<?php

function checkLogin():string
{
    global $pdo;
    $email=filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $password=filter_input(INPUT_POST,'password');

    if($email!==false && !empty($password))
    {
        $sql = 'SELECT * FROM `user` WHERE `email` = :e AND `password` = :p';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':e',$email);
        $sth->bindParam(':p',$password);
        $sth->setFetchMode(PDO::FETCH_CLASS,'User');
        $sth->execute();
        $user = $sth->fetch();

        //$user=false verkeerde password/username, anders $user is object
        if($user!==false)
        {
            $_SESSION['user']=$user;
            if($_SESSION['user']->role=="admin")
            {
                return 'ADMIN';
            }
            else
            {
                return 'MEMBER';
            }
        }
        return 'FAILURE';
    }
    return 'INCOMPLETE';
}



function isAdmin():bool
{
    //controleer of er ingelogd is en de user de rol admin heeft
    if(isset($_SESSION['user'])&&!empty($_SESSION['user']))
    {
        $user=$_SESSION['user'];
        if ($user->role == "admin")
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    return false;
}

function isMember():bool
{
    //controleer of er ingelogd is en de user de rol admin heeft
    if(isset($_SESSION['user'])&&!empty($_SESSION['user']))
    {
        $user=$_SESSION['user'];
        if ($user->role === "member")
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    return false;
}

function makeRegistration():string
{
    global $pdo;
    $email=filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $password=filter_input(INPUT_POST,'password');
    $firstName=filter_input(INPUT_POST,"firstName");
    $lastName=filter_input(INPUT_POST,"lastName");
    if($email!==false && !empty($password) && !empty($firstName) && !empty($lastName)) {
        $sql = 'SELECT * FROM `user` WHERE `email` = :e';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':e',$email);
        $sth->setFetchMode(PDO::FETCH_CLASS,'User');
        $sth->execute();
        $user = $sth->fetch();

        if($user!==false) {
            return "EXIST";
        } else {
            $sth = $pdo->prepare('INSERT INTO user  (email,password,first_name,last_name,role) VALUES (?,?,?,?,"member")');
            $sth->bindParam(1, $email);
            $sth->bindParam(2, $password);
            $sth->bindParam(3,$firstName);
            $sth->bindParam(4, $lastName);
            $sth->execute();
            return "SUCCESS";
        }
    }
    return "INCOMPLETE";
}
