<link rel="stylesheet" href="main.css"/>
<?php
    require("ketnoidatabase.php");
    $sql="SELECT * FROM `sanpham`";
    $query = mysqli_query($conn,$sql);
?>

<div class="header flex j-between a-center">
    <h1>KYT</h1>
    <p>Phone: 0888590904</p>
    <p>Address: Earth</p>
    <nav>
        <ul class="flex a-center">
            <li class="active">Home</li>
            <li>About</li>
            <li>Contact</li>
        </ul>
    </nav>
</div>
<div class="squares j-end">
    <div class="square"></div>
    <div class="rectangle"></div>
    <div class="s-rectangle"></div>
</div>
<div class="squares j-between">
    <div class="square"></div>
    <div class="rectangle "></div>
    <div class="s-rectangle"></div>
</div>
<div class="squares j-between">
    <div class="square"></div>
    <div class="rectangle"></div>
    <div class="s-rectangle ml-200"></div>
</div>
<img src="NEWARRIVAL.jpg" width=100%;>
<button>
    <a href="themsanpham.php">Add</a>
</button>
<table id="productlist">
    <tr>
        <th><center>ID</center></th>
        <th><center>NAME</center></th>
        <th><center>PRICE</center></th>
        <th><center>PHOTO</center></th>
        <th><center>ACTION</center></th>
    </tr>
    <?php
        while($row=mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?=$row["id"]?></td>
        <td><?=$row["name"]?></td>
        <td><?=$row["price"]?>&nbsp; $</td>
        <td><img style="width: 200px; height:200px" src="./images/<?=$row['imgURL'] ?>" alt=""></td>
        <td><a href="suasanpham.php?id=<?=$row['id']?>">Edit</a>
        <a onclick="return xoasanpham()" href="xoasanpham.php?id=<?=$row['id']?>">Del</a>
        </td>
    </tr>
    <?php   }?>
</table>