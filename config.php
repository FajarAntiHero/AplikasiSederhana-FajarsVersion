<?php
    namespace Doc\Config{
        // Create a connection to database
        function createConnection(){
            $databaseHost = 'localhost'; //-> Write the host of database
            $databaseUsername = 'root'; // -> Write the User Name of database
            $databasePassword = ''; // -> Write the Password of database
            $databaseName = 'crud_db'; // -> Write the name of database

            return mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
        }
    

        function connectToDatabase($query) {
            $mysqli = createConnection();
            $result = mysqli_query($mysqli ,$query);
            $rows = [];
        
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        
            return $rows;
        
        }
    }

    namespace Doc\Change\add {
        use function Doc\Config\createConnection;

        function addRow() {
            $mysqli = createConnection();
        
            $name = $_POST['name'];
            $kelas = $_POST['kelas'];
            $kontak = $_POST['kontak'];
            $alamat = $_POST['alamat'];
        
            $query_insert_data = "INSERT INTO users VALUES ('','$name','$kelas','$kontak','$alamat')";
        
            if (mysqli_query($mysqli, $query_insert_data)) {
                header("Location: " . $_SERVER['PHP_SELF']); // Redirect ke halaman yang sama
                exit(); // Menghentikan eksekusi script setelah redirect
            } else {
                echo "Error: " . mysqli_error($mysqli);
            }
        }
    }

    namespace Doc\Change\delete {

        use function Doc\Config\createConnection;

        function deleteRow($id) {
            $mysqli = createConnection();
        
            $query_insert_data = "DELETE FROM users WHERE id = '$id'";
        
            if (mysqli_query($mysqli, $query_insert_data)) {
                header("Location: " . $_SERVER['PHP_SELF']); // Redirect ke halaman yang sama
                exit(); // Menghentikan eksekusi script setelah redirect
            } else {
                echo "Error: " . mysqli_error($mysqli);
            }
        }
    }

    namespace Doc\Change\edit {
        use function Doc\Config\createConnection;

        // Update data
        function updateRow($id){
            $mysqli = createConnection();

            $name = $_POST['name'];
            $kelas = $_POST['kelas'];
            $kontak = $_POST['kontak'];
            $alamat = $_POST['alamat'];

            $query_insert_data = "UPDATE users SET name = '$name', kelas = '$kelas', kontak = '$kontak', alamat = '$alamat' WHERE id = '$id'";

            if (mysqli_query($mysqli, $query_insert_data)) {
                header("Location: " . $_SERVER['PHP_SELF']); // Redirect ke halaman yang sama
                exit(); // Menghentikan eksekusi script setelah redirect
            } else {
                echo "Error: " . mysqli_error($mysqli);
            }
        }
    }
 
?>