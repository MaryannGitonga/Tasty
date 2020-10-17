<?php
    require_once("mysql_connect.php");
    if (isset($_POST['create'])) {
        $food_name = $_POST["food_name"];
        $food_price = $_POST["food_price"];
        $food_image = $_FILES["food_image"];

        $original_image_file = $food_image["name"];
        $file_tmp_location = $food_image["tmp_name"];

        $file_type = substr($original_image_file, strpos($original_image_file, "."), strlen($original_image_file));

        $file_path = "images/food_images/";
        $new_file_name = time().$file_type;
        
        if(move_uploaded_file($file_tmp_location, $file_path.$original_image_file)){
            $sql = "INSERT foods(food_name, food_price, food_image) VALUES('$food_name', '$food_price', '$original_image_file')";
            insert_data($sql);
            header("Location: foods.php");
        }
    }

    // update food item
    if(isset($_POST['edit'])){
        $id = $_POST["id"];
        $food_name = $_POST["foodname"];
        $food_price = $_POST["foodprice"];
        $food_image = $_FILES["foodimage"];
        print_r($food_image);

        $original_image_file = $food_image["name"];
        $file_tmp_location = $food_image["tmp_name"];

        $file_type = substr($original_image_file, strpos($original_image_file, "."), strlen($original_image_file));

        $file_path = "images/food_images/";
        $new_file_name = time().$file_type;

        if(move_uploaded_file($file_tmp_location, $file_path.$original_image_file)){
            $update_query = "UPDATE foods SET food_name = '$food_name', food_price = '$food_price', food_image = '$original_image_file' WHERE food_id='$id'";
            $users = update_data($update_query);
            header("Location: foods.php");
        }
    }

    // delete food item
    if (isset($_GET['delete'])) {
        $id = $_GET["delete"];
        $delete_query = "DELETE FROM foods WHERE food_id=$id";
        delete_data($delete_query);
        header("Location: foods.php");
    }
?>