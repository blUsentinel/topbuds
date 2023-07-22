<?php 

if(isset($_POST["addItemBtn"])){
    $item_code = rand(1000, 9999);
    $item_name = $_POST["item_name"];
    $item_price = $_POST["item_price"];
    $item_description = $_POST["item_description"];
    $item_keyword = $_POST["item_keyword"];
    $item_category = $_POST["item_category"];
    $item_status = "Available";

    $size_raw = $_POST['size_check'];
    $uc_first = array_map('ucfirst', $size_raw);
    $size = implode(", ", $uc_first);

    //accessing item images
    $item_image1 = $_FILES["item_image1"]["name"];
    $item_image2 = $_FILES["item_image2"]["name"];
    $item_image3 = $_FILES["item_image3"]["name"];

    //accessing image tmp name
    $temp_item_image1 = $_FILES["item_image1"]["tmp_name"];
    $temp_item_image2 = $_FILES["item_image2"]["tmp_name"];
    $temp_item_image3 = $_FILES["item_image3"]["tmp_name"];

    // checks if any forms are empty
    if(empty($item_name) || empty($item_price) || empty($item_description) || empty($item_keyword) || empty($item_category)
    || empty($item_image1) || empty($item_image2) || empty($item_image3)){
        echo "<script>alert('Please fill all the available fields!')</script>";
        exit();
    } else {
        move_uploaded_file($temp_item_image1, "./item_images/$item_image1");
        move_uploaded_file($temp_item_image2, "./item_images/$item_image2");
        move_uploaded_file($temp_item_image3, "./item_images/$item_image3");

        //insert query
        $insert_item = "INSERT INTO `items` 
        (item_code, item_name, item_price, sizes_available, item_description, item_keyword, item_category,
         item_image1, item_image2, item_image3, date_added, item_status)
          VALUES ('$item_code', '$item_name', '$item_price', '$size',
          '$item_description', '$item_keyword', '$item_category', '$item_image1', '$item_image2', '$item_image3', 
          NOW(), '$item_status')";

        $result_query = mysqli_query($conn, $insert_item);
        if($result_query){
            echo "<script>alert('Item has been successfully delivered to the database!')</script>";
        }
    }
}

?>