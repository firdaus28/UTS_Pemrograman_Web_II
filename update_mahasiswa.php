<?php
include "config/koneksi.php";

$id = $nama = $nim = $program_studi = "";
$error = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $program_studi = $_POST["program_studi"];


        if (empty($nama) || empty($nim) || empty($program_studi)) {
            $error = "Harap isi semua field.";
        } else {

            $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', program_studi='$program_studi' WHERE id='$id'";

            if (mysqli_query($conn, $sql)) {
                header("Location: mahasiswa.php");
                exit();
            } else {
                $error = "Terjadi kesalahan: " . mysqli_error($conn);
            }
        }
    }

    $query = "SELECT * FROM mahasiswa WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $nama = $row['nama'];
    $nim = $row['nim'];
    $program_studi = $row['program_studi'];

    mysqli_free_result($result);
}

mysqli_close($conn);
?>

<?php include 'header.php'; ?>

<div class="content-wrapper">
   <h2>Update Mahasiswa</h2>

   <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
      <div class="form-group">
         <label for="nama">Nama:</label>
         <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
      </div>
      <div class="form-group">
         <label for="nim">NIM:</label>
         <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim; ?>">
      </div>
      <div class="form-group">
         <label for="program_studi">Program Studi:</label>
         <input type="text" class="form-control" id="program_studi" name="program_studi" value="<?php echo $program_studi; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
   </form>

   <?php if (!empty($error)) { ?>
      <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
   <?php } ?>
</div>

<?php include 'footer.php'; ?>