<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Kelas</td>
                <td><input type="text" name="kelas"></td>
            </tr>
            <tr> 
                <td>Nomor Kontak</td>
                <td><input type="text" name="kontak"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    // if(isset($_POST['Submit'])) {
    //     $name = $_POST['name'];
    //     $kelas = $_POST['kelas'];
    //     $kontak = $_POST['kontak'];
    //     $alamat = $_POST['alamat'];
        
    //     // include database connection file
    //     include_once("config.php");
                
    //     // Insert user data into table
    //     $result = mysqli_query($mysqli, "INSERT INTO users(name,kelas,kontak,alamat) VALUES('$name','$kelas','$kontak','$alamat')");
        
    //     // Show message when user added
    //     echo "User added successfully. <a href='index.php'>View Users</a>";
    // }
    ?>
</body>
</html>
