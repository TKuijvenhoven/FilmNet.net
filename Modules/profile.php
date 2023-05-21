<?php

function changeProfile():bool
{
    global $pdo;

    $email=filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $firstName=filter_input(INPUT_POST,"firstName");
    $lastName=filter_input(INPUT_POST,"lastName");

    if($email!==false && !empty($firstName) && !empty($lastName)) {


            $sth = $pdo->prepare('UPDATE `user` SET `first_name`=:f, `last_name`=:l WHERE `email`=:e');

            $sth->bindValue(":f",$firstName);
            $sth->bindValue(":l", $lastName);
            $sth->bindValue(":e",$email);
            $sth->execute();
;
            $_SESSION['user']->first_name=$firstName;
            $_SESSION['user']->last_name=$lastName;
            return true;
    } else {
        return false;
    }

}

function changePassword():string
{
    global $pdo;

    $password=filter_input(INPUT_POST,"oudpassword");
    $newPassword1=filter_input(INPUT_POST,"nieuwpassword1");
    $newPassword2=filter_input(INPUT_POST,"nieuwpassword2");

    if(!empty($password) && !empty($newPassword1) && !empty($newPassword2)) {

        if($password===$_SESSION['user']->password) {
            if ($newPassword1 === $newPassword2) {
                $sth = $pdo->prepare('UPDATE `user` SET `password`=:p WHERE `email`=:e');

                $sth->bindValue(":p", $newPassword1);
                $sth->bindValue(":e", $_SESSION['user']->email);
                $sth->execute();
                $_SESSION['user']->password = $newPassword1;
                return "SUCCESS";
            } else {
                return "NEWPASSWORD";
            }
        } else  {
            return "OLDPASSWORD";
        }
    }
    return "INCOMPLETE";
}