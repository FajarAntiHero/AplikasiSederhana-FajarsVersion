<?php
    // MAIN PAGE PROGRAM
// Create database connection using config file
require_once 'config.php';
use function Doc\Config\connectToDatabase;
use function Doc\Change\add\addRow;
use function Doc\Change\edit\updateRow;
use function Doc\Change\delete\deleteRow;

// Fetch all users data from database
$result = connectToDatabase('SELECT * FROM users');

$id = 'id';
$showPopUP = '';

if (isset($_GET['id']) && isset($_GET['action']) ) {
    $id = $_GET['id'];
    $data_id = $id;
    $action = $_GET['action'];
    
    if ($action == 'delete') {
        deleteRow($_GET['id']); // -> Delete a row
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
            <div class="container container-md container-lg container-xl container-xxl border border-3 border-white rounded-3 table-data pb-3 mb-3">
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
                        <?php $order = 1;  ?>
                        <?php foreach ($result as $get_user) : ?>
                            <tr>
                                <td><?= $order++?></td>
                                <td><?= $get_user['name']?></td>
                                <td><?= $get_user['kelas']?></td>
                                <td><?= $get_user['kontak']?></td>
                                <td><?= $get_user['alamat']?></td>
                                <td class="d-flex edit-table">
                                    <div class="bg-warning">
                                        <!-- Button Modal to Edit Data -->
                                        <a href="index.php?action=edit&id=<?=$get_user['id']?>" data-bs-target="#edit-data">Edit</a>
                                    </div>
                                    <!-- Button to delete data -->
                                    <div class="bg-danger"><a href="index.php?action=delete&id=<?=$get_user['id']?>"; onclick="return confirm('Are Your Sure?')";>Delete</a></div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Button Modal to Add Data -->
            <button type="button" class="btn button-add-data text-white border border-lg border-white" data-bs-toggle="modal" data-bs-target="#tambah-data">
                Tambahkan data
            </button>

            <!-- Modal Add Data -->
            <div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="tambah-data" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header text-center d-block">
                            <h1 class="modal-title fs-5 text-primary fw-bold" id="exampleModalLabel">Tambahkan Data</h1>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" class="form-update row" id="form-input-data">
                                <div class="col-6 mb-3">
                                    <div class="input-group">
                                        <label for="add-name" class="form-label me-2 ">Nama : </label>
                                        <input type="text" name="name" class="form-control" id="add-name" required> 
                                    </div>

                                </div>
                                <div class="col-6 mb-3">
                                    <div class="input-group">
                                    <label for="add-kelas" class="form-label me-2">Kelas : </label>
                                    <input type="text" name="kelas" class="form-control" id="add-kelas" required>
                                </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class=" input-group">
                                        <label for="add-kontak" class="form-label me-2">Kontak : </label>
                                        <input type="text" name="kontak" class="form-control" id="add-major" required>
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="input-group">
                                        <label for="add-alamat " class="form-label me-2">Alamat : </label>
                                        <input type="text" name="alamat" class="form-control" id="add-alamat" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="submit" form="form-input-data" class="btn btn-primary" data-bs-dismiss="modal">Tambahkan data</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal Update Data -->
            <div class="modal fade" id="edit-data" tabindex="-1" aria-labelledby="edit-data"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header text-center d-block">
                            <h1 class="modal-title fs-5 text-primary fw-bold">Edit Data</h1>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" id="form-update-data" class=" row d-flex flex-wrap justify-content-evenly">
                                <input type="hidden" name="id" value="<?= $data_id ?>">
                                <input type="hidden" name="action" value="edit">
                                <div class="col-5 mb-3">
                                    <div class="input-group">
                                        <label for="update-name" class="form-label me-2 ">Name : </label>
                                        <input type="text" name="name" class="form-control" id="update-name" required> 
                                    </div>
    
                                </div>
                                <div class="col-5 mb-3">
                                    <div class="input-group">
                                    <label for="update-kelas" class="form-label me-2">Kelas : </label>
                                    <input type="text" name="kelas" class="form-control" id="update-kelas" required>
                                </div>
                                </div>
                                <div class="col-5 mb-4">
                                    <div class=" input-group">
                                        <label for="update-kontak" class="form-label me-2">Kontak : </label>
                                        <input type="text" name="kontak" class="form-control" id="update-kontak" required>
                                    </div>
                                </div>
                                <div class="col-5 mb-4">
                                    <div class="input-group">
                                        <label for="update-alamat " class="form-label me-2">Alamat : </label>
                                        <input type="text" name="alamat" class="form-control" id="update-alamat" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="submit" form="form-update-data" class="btn btn-primary">Perbarui data</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <footer></footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="Src/script.js"></script>
    <script><?= ""// $showPopUP ?></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('action') === 'edit') {
                setTimeout(() => {
                    var myModal = new bootstrap.Modal(document.getElementById('edit-data'));
                    myModal.show();

                }, 1000)
            }
        });
    </script>
</body>
</html>
