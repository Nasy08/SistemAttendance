<?php
include_once("connection.php");
 
// Mengambil semua data dari database
$result = mysqli_query($mysqli, "SELECT * FROM student ORDER BY ndp DESC");
 
if (isset($_POST['Submit'])) {
    $nama = $_POST['nama'];
    $ndp = $_POST['ndp'];
 
    // Insert data ke database
    $add = mysqli_query($mysqli, "INSERT INTO student(nama,ndp,waktu_kehadiran) VALUES('$nama','$ndp', NOW())");
    if ($add) {
        header("Refresh:0");
    }
}
?>
 
<html>
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <title>TPP Attendance</title>
</head>
 
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">KEHADIRAN KELAS</span>
        </div>
    </nav>
 
    <div class="bg-success p-2 text-dark bg-opacity-10">
        <h1 class="p-4 text-center">DAFTAR KEHADIRAN PELAJAR</h1>
        <div class="container">
            <form action="" method="post" name="form_absen">
                <div class="col-md-6 offset-md-3">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NDP</label>
                        <input type="text" class="form-control" name="ndp" placeholder="Masukkan No.NDP Anda" required>
                    </div>
                </div>
                <div class="text-center">
                    <button type="reset" class="btn btn-danger" name="Reset">Reset</button>
                    <button type="done" class="btn btn-primary" name="Submit">Done</button>
                </div>
            </form>
 
            <table class="my-5 table table-striped" name="tk">
                <tr class="table-dark">
                    <th>Nama</th>
                    <th>NDP</th>
                    <th>Waktu Kehadiran</th>
                    <th>Tindakan</th>
                </tr>
 
                <?php
                while ($r = mysqli_fetch_array($result)) {
                ?>
                    <tr class="table-primary">
                        <td><?php echo $r['nama']; ?></td>
                        <td><?php echo $r['ndp']; ?></td>
                        <td><?php echo $r['waktu_kehadiran']; ?></td>
                        <td>
                        <button><a href="edit.php?edit_ndp=<?php echo $r['ndp'] ?>">Edit</a></button>
                        <button><a href="delete.php?delete_ndp=<?php echo $r['ndp'] ?>">Delete</a></button>
                        </td>    
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
 
</body>
</html>