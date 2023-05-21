<?php
    $db = new PDO("mysql:host = localhost; dbname=filmnet", "root", "");
    if (isset($_POST['submit'])){
        $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $film_id = $detail->id;
        $query = $db-> prepare("INSERT INTO comment(name,info,film_id) VALUES (:name, :info, :film_id)");
        $query ->bindParam("text", $text);
        $query ->bindParam("name", $name);
        $query ->bindParam("film_id", $film_id);
        if (!empty($_POST['info'])) {
            if ($query->execute()){
            echo "Review successfully added";
            } else {
            echo "Something went wrong.";
            }
        }
    }
?>
<form method="post">
    <label for="name">Name</label>
    <br>
    <input type="text" name="name" id="name">
    <br><br>
    <label for="info">Your review:</label>
    <textarea  class="form-control" name="info" id="info"></textarea>
    <br>
    <input class="btn btn-primary" type="submit" name="submit" value="Submit" >
</form>