<?php
global $params;

//check if user has role admin
if (!isMember()) {
    logout();
    header ("location:/home");
} else {

    switch ($params[2]) {

        case 'home':
            include_once "../Templates/member/home.php";
            break;

        case 'products':
            $products = getAllProducts();
            include_once "../Templates/admin/products.php";
            break;
        case 'profile':
            include_once "../Templates/member/profile.php";
            break;
        case 'editprofile':
            $titleSuffix = ' | Profile';

            if(isset($_POST['profile'])) {

                $result = changeProfile();
                if($result===true) {
                    header("Location: /member/profile");
                } else {
                    $message="Niet alle velden correct ingevuld";
                    include_once "../Templates/member/editprofile.php";
                }
                break;

            }
            else {
                include_once "../Templates/member/editprofile.php";
            }
            break;
        case 'changepassword':
            $titleSuffix = ' | Profile';

            if(isset($_POST['password'])) {

                $result = changePassword();
                switch ($result) {
                    case 'SUCCESS':
                        header("Location: /member/profile");
                        break;
                    case 'OLDPASSWORD':
                        $message = "Oude wachtwoord verkeerd";
                        include_once "../Templates/member/changepassword.php";
                        break;
                    case 'NEWPASSWORD':
                        $message = "Nieuwe wachtwoord niet twee keer hetzelfde";
                        include_once "../Templates/member/changepassword.php";
                        break;
                    case 'INCOMPLETE':
                        $message="Niet alles ingevuld";
                        include_once "../Templates/member/changepassword.php";
                        break;
                }
            } else {
                include_once "../Templates/member/changepassword.php";
            }
            break;

        case 'categories':
            $titleSuffix = ' | Categories';
            $categories = getCategories();
            //var_dump($categories);die;
            include_once "../Templates/member/categories.php";
            break;

        case 'category':
            $titleSuffix = ' | Category';
            if (isset($_GET['id'])) {
                $categoryId = $_GET['id'];
                $products = getProducts($categoryId);
                $name = getCategoryName($categoryId);
                include_once "../Templates/member/products.php";
            } else {
                $titleSuffix = ' | Home';
                include_once "../Templates/member/home.php";
            }
            break;

        case 'product':
            if (isset($_GET['id'])) {
                $productId = $_GET['id'];
                $product = getProduct($productId);
                $name = getCategoryName($product->category_id);
                $titleSuffix = ' | ' . $product->name;
                $reviews = getReviews($productId);
                include_once "../Templates/member/product.php";
            } else {
                $titleSuffix = ' | Home';
                include_once "../Templates/member/home.php";
            }
            break;

        case 'review':
            if(isset($_GET['id'])) {
                $productId = $_GET['id'];
                $product = getProduct($productId);
                $name = getCategoryName($product->category_id);
                $titleSuffix = ' | Review '. $product->name;
                //close button
                if(isset($_POST['close'])) {
                    header("Location: /member/product/$productId");
                }
                //submit form button
                elseif(isset($_POST['review']) && !empty($_POST['review'])) {
                    saveReview($_POST['review'],$_POST['stars']);
                    $reviews=getReviews($productId);
                    $message=$_POST['name'];
                    header("Location: /member/product/$productId");
                    //include_once "../Templates/product.php";

                } else {
                    include_once "../Templates/member/review.php";
                }
            } else {
                $titleSuffix = ' | Home';
                include_once "../Templates/member/home.php";
            }
            break;

        default:
            include_once "../Templates/member/home.php";
            break;
    }
}