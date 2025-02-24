<?php
    // MAIN PAGE PROGRAM
// Create database connection using config file
require_once 'config.php';
use function Doc\Config\connectToDatabase;
use function Doc\Change\add\addRow;
use function Doc\Change\edit\updateRow;
use function Doc\Change\delete\deleteRow;

// Fetch all users data from database
$result = connectToDatabase('users');

$id = 'id';
$showPopUP = '';
$order = 0;

if (isset($_GET['id']) && isset($_GET['action']) ) {
    $id = $_GET['id'];
    $data_id = $id;
    $action = $_GET['action'];
    
    if ($action == 'delete') {
        deleteRow($_GET['id']); // -> Delete a row
    } elseif ($action == 'edit'){
        $showPopUP = "document.getElementById('popUpContainer').classList.remove('d-none');";
    }
}

if(isset($_POST['submit']) && isset($_POST['action'])){
    $action = $_POST['action'];
    if ($action == 'edit') {
        updateRow($_POST['id']); // -> update row
    }
    
}
if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['kelas']) && isset($_POST['kontak']) && isset($_POST['alamat'])) { // -> if adding a data
    addRow();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Sederhana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Src/style.css" type="text/css">
</head>
<body>
    <main>
        <header class="container-fluid d-flex flex-column justify-content-center align-items-center vh-100 ">
            <div class="container container-md container-lg container-xl container-xxl mb-5 d-flex justify-content-center align-items-center header-content border border-3 border-white rounded-3">
                <p class="fs-4 mb-0 text-white">
                    Aplikasi Sederhana
                </p>
            </div>
            <div class="container container-md container-lg container-xl container-xxl border border-3 border-white rounded-3 table-data pb-3">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>Ubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataUsers as $get_user) : ?>
                            <tr>
                                <td><?= $order++?></td>
                                <td><?= $get_user['name']?></td>
                                <td><?= $get_user['kelas']?></td>
                                <td><?= $get_user['kontak']?></td>
                                <td><?= $get_user['alamat']?></td>
                                <td class="d-flex edit-table">
                                    <div class="bg-warning">
                                        <a href="index.php?action=edit&id=<?=$get_user['id']?>">Edit</a>
                                    </div>
                                    <div class="bg-danger"><a href="index.php?action=delete&id=<?=$get_user['id']?>"; onclick="return confirm('Are Your Sure?')";>Delete</a></div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="pop-up-container col-6 position-absolute rounded-3 p-3 border border-info d-none" id="popUpContainer"> <!-- POP UP CONTAINER -->
                <div class="pop-up-title d-flex flex-column align-items-center position-relative">
                    <i class="fa-solid fa-medal fs-2"></i>
                    <p>Input Data Change</p>
                    <div class="pop-up-close position-absolute">
                        <i class="fa-regular fa-rectangle-xmark fs-2"></i>
                    </div>
                </div>
                <div class="pop-up-form w-auto">
                    <form action="" method="post" class="form-update row d-flex flex-wrap justify-content-evenly">
                        <input type="hidden" name="id" value="<?= $data_id ?>">
                        <input type="hidden" name="action" value="edit">
                        <div class="col-12 mb-3">
                            <div class=" input-group">
                                <label for="update-nim " class="form-label me-2">Nim</label>
                                <input type="text" name="Nim" class="form-control" id="update-nim" required>
                            </div>
                        </div>
                        <div class="col-5 mb-3">
                            <div class="input-group">
                                <label for="update-name" class="form-label me-2 ">Name</label>
                                <input type="text" name="Name" class="form-control" id="update-name" required> 
                            </div>

                        </div>
                        <div class="col-5 mb-3">
                            <div class="input-group">
                            <label for="update-image" class="form-label me-2">Image</label>
                            <input type="text" name="Image" class="form-control" id="update-image" required>
                        </div>
                        </div>
                        <div class="col-5 mb-4">
                            <div class=" input-group">
                                <label for="update-major" class="form-label me-2">Major</label>
                                <input type="text" name="Major" class="form-control" id="update-major" required>
                            </div>
                        </div>
                        <div class="col-5 mb-4">
                            <div class="input-group">
                                <label for="update-email " class="form-label me-2">Email</label>
                                <input type="text" name="Email" class="form-control" id="update-email" required>
                            </div>
                        </div>
                        <!-- <div class="col-12 d-flex justify-content-center"> -->
                        <button type="submit" name='submit' class="rounded-3 p-1 w-25">Submit Change</button>
                        <!-- </div> -->
                    </form>
                </div>
            </div>

        </header>
        <footer></footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="Src/script.js"></script>
</body>
</html>
