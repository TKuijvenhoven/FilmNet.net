<?php
global $params;

//check if user has role admin
if (!isAdmin()) {
    logout();
    header ("location:/home");
} else {

    switch ($params[2]) {

        case 'home':
            include_once "../Templates/admin/home.php";
            break;

        case 'products':
            $products = getAllProducts();
            include_once "../Templates/admin/products.php";
            break;

        case 'add':
            if (isPost()) {
                if (fileupload()) {
                    saveProduct($_POST['name'], $_POST['category'], $_POST['description'], $message);
                    header("Location: /admin/products");
                } else {
                    $categories = getCategories();
                    include_once "../Templates/admin/addproduct.php";
                }
            } else {
                $categories = getCategories();
                include_once "../Templates/admin/addproduct.php";
            }
            break;

        case 'delete':
            $product = getProduct($_GET['id']);
            unlink('img/' . $product->picture);
            deleteProduct($_GET['id']);
            //$products = getAllProducts();
            //include_once "../Templates/admin/products.php";
            header("location:/admin/products");
            break;

        default:
            include_once "../Templates/admin/home.php";
            break;
    }
}