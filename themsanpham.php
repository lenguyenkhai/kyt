<?php
include "ketnoidatabase.php";
?>
<link rel= "stylesheet" href="main.css"/>
<button><a href="trangchu.php">Home</a></button>
<h2>Add</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="number" id="price" name="price" required>

    </div>
    <div>
        <label for="file">Photo</label>
        <input type="file" id="file" name="photo" value="Choose file" required>

    </div>
    <div>
        <label for="describe">Describe</label>
        <textarea name="describe" id="describe" cols="30" rows="10" required></textarea>

    </div>
    <button type="submit" name="submit">Submit</button>
</form>
<?php
    require("ketnoidatabase.php");
    if(isset($_POST["submit"])){
        $name=$_POST["name"];
        $price=$_POST["price"];
        $describe=$_POST["describe"];
        $photo=$_FILES["photo"]["name"];
        //tao thu muc=>note, tao thu muc images o ben ngoai truoc nhe
        $target_dir="./images/";
        //tao duong dan den file
        $target_file=$target_dir.$photo;
        //check du cac truong thong tin
        if(isset($name)&&isset($price)&&isset($describe)&&isset($photo)){
            move_uploaded_file($_FILES["photo"]["tmp_name"],$target_file);
            $sql="INSERT INTO `sanpham` (`id`, `name`, `price`,`describe`,`imgURL`)
            values(NULL,'$name','$price','$describe','$photo')";
            mysqli_query($conn,$sql);
            echo "<script>alert('Successful')</script>";
            header("Location:trangchu.php");
        }
    }
?>