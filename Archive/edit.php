<?php
// include database connection file
// include_once("config.php");
 
// // Check if form is submitted for user update, then redirect to homepage after update
// if(isset($_POST['update']))
// {	
//     $id = $_POST['id'];
    
//     $name=$_POST['name'];
//     $kelas=$_POST['kelas'];
//     $kontak=$_POST['kontak'];
//     $alamat=$_POST['alamat'];
        
//     // update user data
//     $result = mysqli_query($mysqli, "UPDATE users SET name='$name',kelas='$kelas',kontak='$kontak',alamat='$alamat' WHERE id=$id");
    
//     // Redirect to homepage to display updated user in list
//     header("Location: index.php");
// }
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
// $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
 
// while($user_data = mysqli_fetch_array($result))
// {
//     $name = $user_data['name'];
//     $kelas = $user_data['kelas'];
//     $kontak = $user_data['kontak'];
//     $alamat = $user_data['alamat'];
// }
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="name" value=<?php // echo $name;?>></td>
            </tr>
            <tr> 
                <td>Kelas</td>
                <td><input type="text" name="kelas" value=<?php // echo $kelas;?>></td>
            </tr>
            <tr> 
                <td>Kontak</td>
                <td><input type="text" name="kontak" value=<?php /// echo $kontak;?>></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php // echo $alamat;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php // echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
