<?php
//
//function getProducts(int $categoryId):array
//{
//    global $pdo;
//    $sth = $pdo->prepare('SELECT * FROM product WHERE category_id=? ');
//    $sth->bindParam(1, $categoryId);
//    $sth->execute();
//    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
//}
//
//function getProduct(int $productId):Product
//{
//    global $pdo;
//    $sth = $pdo->prepare('SELECT * FROM product WHERE id=? ');
//    $sth->bindParam(1, $productId);
//    $sth->execute();
//    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product')[0];
//}
//
//function getAllProducts():array
//{
//    global $pdo;
//    $sth = $pdo->prepare('SELECT * FROM product ORDER BY category_id');
//    $sth->execute();
//    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
//}
//
//function deleteProduct(int $productId)
//{
//    global $pdo;
//    $id = filter_var($productId, FILTER_VALIDATE_INT);
//    if($id!=false)
//    {
//        $sql = 'DELETE FROM `product` WHERE `id`=:id';
//
//        $stmnt = $pdo->prepare($sql);
//        $stmnt->bindParam(':id',$id);
//        $stmnt->execute();
//    }
//}
//
//function fileupload()
//{
//    global $message;
//
//    $allowed=['gif','png','jpg'];
//    $filename=$_FILES['fileToUpload']['name']; //original filename
//    $ext=pathinfo($filename,PATHINFO_EXTENSION);
//    if (!in_array($ext,$allowed) || exif_imagetype($_FILES['fileToUpload']['tmp_name'])===false) {
//        $message="Sorry alleen gif,png of jpg files toegestaan";
//        return false;
//    }
//    $target_dir = "img/categories/". strtolower(getCategoryName((int)$_POST['category'])) ."/";
//    $target_file = $_FILES["fileToUpload"]["name"];
//    do {
//        $target_file=$target_dir.md5($target_file).".$ext";
//    } while (file_exists($target_file));
//
//
//// Check file size
//    if ($_FILES["fileToUpload"]["size"] > 500000) {
//        $message=  "Sorry, your file is too large.";
//        return false;
//    }
//
//
//// if everything is ok, try to upload file
//
//    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//
//        //$path= "categories/". strtolower(getCategoryName((int)$_POST['category'])) ."/";
//        $message= substr($target_file,4);
//        var_dump($message);
//        return true;
//    } else {
//        $message=  "Sorry, there was an error uploading your file.";
//        return false;
//    }
//
//}
//
//function isPost()
//{
//    if( (isset($_POST['name'])) && (!empty($_POST['name'])) &&
//        (isset($_POST['category'])) && (!empty($_POST['category'])) &&
//        (isset($_POST['description'])) && (!empty($_POST['description'])) &&
//        (isset($_FILES['fileToUpload']['tmp_name'])) && (!empty($_FILES['fileToUpload']['tmp_name'])) )
//    {
//        return true;
//    } else
//        return false;
//}
//
//function saveProduct(string $name, string $category, string $description, string $picture)
//{
//    GLOBAL $pdo;
//
//    $sth = $pdo->prepare('INSERT INTO product  (name,description,category_id,picture) VALUES (?,?,?,?)');
//    $sth->bindParam(1, $name);
//    $sth->bindParam(2, $description);
//    $sth->bindParam(3,$category);
//    $sth->bindParam(4, $picture);
//    $sth->execute();
//
//}
//
//
//
