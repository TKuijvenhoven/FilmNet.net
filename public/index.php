<?php
require '../Modules/categories.php';
require '../Modules/products.php';
require '../Modules/review.php';
require '../Modules/login.php';
require '../Modules/logout.php';
require '../Modules/profile.php';
require '../Modules/database.php';
require '../Modules/common.php';

session_start();
//var_dump($_SESSION);
//var_dump($_POST);
$message="";

$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
//print_r($request);
$title = "HealthOne";
$titleSuffix = "";

switch ($params[1]) {

    case 'categories':
        $titleSuffix = ' | Categories';
        $categories = getCategories();
        //var_dump($categories);die;
        include_once "../Templates/categories.php";
        break;

    case 'contact':
        $titleSuffix = ' | Contact';
        $categories = getCategories();
        //var_dump($categories);die;
        include_once "../Templates/contact.php";
        break;

    case 'category':
        $products=getProducts($params[2]);
        $name=getCategoryName($params[2]);
        include_once "../Templates/products.php";
        break;

//    case 'product':
//        $products=getProducts($params[2]);
//        $name=getCategoryName($params[2]);
//        include_once "../Templates/review.php";
//        break;

    case 'product':
        $details=getDetail($params[2]);
        $reviews=getReview($params[2]);
//        $name=getCategoryName($params[2]);
        include_once "../Templates/review.php";
        break;

//    case 'product':
//        if (isset($_GET['id'])) {
//            $productId = $_GET['id'];
//            $product = getProduct($productId);
//            $name = getCategoryName($product->category_id);
//            $titleSuffix = ' | ' . $product->name;
//            $reviews = getReviews($productId);
//            include_once "../Templates/review.php";
//        }
//        break;

    case 'login':

        $titleSuffix = ' | Login';
        if(isset($_POST['login'])) {
            $result = checkLogin();
var_dump($die);
            switch ($result) {
                case 'ADMIN':
                    header("Location: /admin/home");
                    //include_once "../Templates/admin/home.php";
                    break;
                case 'MEMBER':
                    header("Location: /member/home");
                    //include_once "../Templates/admin/member.php";
                    break;
                case 'FAILURE':
                    $message = "Email of password niet correct ingevuld!";
                    include_once "../Templates/login.php";
                    break;
                case 'INCOMPLETE':
                    $message = "Formulier niet volledig ingevuld!";
                    include_once "../Templates/login.php";
                    break;
            }
        }
        else {
            include_once "../Templates/login.php";
        }
        break;

    case 'admin':
        include_once ('admin.php');
        break;

    case 'member':
        include_once ('member.php');
        break;

    case 'logout':
        logout();
        header("Location: /home");
        //include_once "../Templates/home.php";
        break;

    case 'register':
        $titleSuffix = ' | Register';

        if(isset($_POST['register'])) {

            $result = makeRegistration();
            switch ($result) {
                case 'SUCCESS':
                    header("Location: /admin/home");
                    break;
                case 'INCOMPLETE':
                    $message="Niet alle velden correct ingevuld";
                    include_once "../Templates/register.php";
                    break;
                case 'EXIST':
                    $message = "Gebruiker bestaat al";
                    include_once "../Templates/register.php";
                    break;
            }

        }
        else {
            include_once "../Templates/register.php";
        }
        break;

    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
}






