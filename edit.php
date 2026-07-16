<?php

include_once("config.php");

if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];

    mysqli_query($conn,"UPDATE users
    SET
    name='$name',
    age='$age',
    email='$email'
    WHERE id=$id");

    header("Location:index.php");
}

$id=$_GET['id'];

$result=mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

$res=mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>

    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
            background:#f4f4f4;
            margin:0;
            padding:40px;
        }

        .container{
            width:400px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,.15);
        }

        h2{
            text-align:center;
            color:#2c3e50;
            margin-bottom:25px;
        }

        .home-btn{
            text-decoration:none;
            color:white;
            background:#3498db;
            padding:10px 18px;
            border-radius:5px;
            display:inline-block;
            margin-bottom:20px;
        }

        .home-btn:hover{
            background:#2980b9;
        }

        label{
            display:block;
            margin-top:15px;
            margin-bottom:5px;
            font-weight:bold;
        }

        input[type=text]{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
            box-sizing:border-box;
        }

        input[type=submit]{
            width:100%;
            margin-top:25px;
            padding:12px;
            background:#27ae60;
            color:white;
            border:none;
            border-radius:5px;
            font-size:16px;
            cursor:pointer;
        }

        input[type=submit]:hover{
            background:#219150;
        }

    </style>

</head>

<body>

<div class="container">

    <a class="home-btn" href="index.php">🏠 Home</a>

    <h2>Edit User</h2>

    <form method="post" action="edit.php">

        <label>Name</label>
        <input
            type="text"
            name="name"
            value="<?php echo $res['name'];?>"
            required>

        <label>Age</label>
        <input
            type="text"
            name="age"
            value="<?php echo $res['age'];?>"
            required>

        <label>Email</label>
        <input
            type="text"
            name="email"
            value="<?php echo $res['email'];?>"
            required>

        <input
            type="hidden"
            name="id"
            value="<?php echo $res['id'];?>">

        <input
            type="submit"
            name="update"
            value="💾 Update User">

    </form>

</div>

</body>
</html>