<link rel="stylesheet" href="main.css">

<?php
    require("ketnoidatabase.php");
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM `sanpham` WHERE `id` = '$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $img = $row['imgURL']
?>
 <button><a href = "trangchu.php">Home</a></button>
    <h2>Update</h2>
    <form action ="" method = "POST" enctype= "multipart/form-data">
        <div>
            <label for = "name" >NAME</label>
            <input type = "text" id='name' name="name" value="<?= $row["name"]?>">
        </div>
        <div>
            <label for = "price">PRICE</label>
            <input type = "number" id = 'price' name = "price" value="<?= $row["price"]?>">
        </div>
        <div>
            <img style = "width:200px; height:200px;  " src= './images/<?= $row["imgURL"]?>' alt="">
        </div>
        <div>
            <label for = "file"> PHOTO </label>
            <input type = "file" id="file" name="photo" value="Choose File">
        </div>
        <div>
            <label for="describe"> DESCRIBE  </label>
            <textarea name = "describe" id = 'describe' cols="30" rows="10"><?= $row["describe"]?></textarea>
        </div>
        <button type="submit" name = "submit"> UPDATE </button>
    </form>
    <?php
    require("ketnoidatabase.php");
    if(isset($_POST["submit"])){
        $name=$_POST["name"];
        $price=$_POST["price"];
        $describe=$_POST["describe"];
        $photo=$_FILES["photo"]["name"];
        $target_dir="./images/";
        if ($photo){
            if (file_exists("./images/".$img)) {
                unlink("./images/". $img);
            }
            $target_file=$target_dir.$photo;
        }else{
            $target_file = $target_dir.$img;
            $photo = $img;
        }
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