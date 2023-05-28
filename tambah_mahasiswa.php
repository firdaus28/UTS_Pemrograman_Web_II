<?php
include "config/koneksi.php";

$id = $nama = $nim = $program_studi = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $program_studi = $_POST["program_studi"];

    if (empty($nama) || empty($nim) || empty($program_studi)) {
        $error = "Harap isi semua field.";
    } else {
        $sql = "INSERT INTO mahasiswa (nama, nim, program_studi) VALUES ('$nama', '$nim', '$program_studi')";

        if (mysqli_query($conn, $sql)) {

            header("Location: mahasiswa.php");
            exit();
        } else {
            $error = "Terjadi kesalahan: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<?php include 'header.php'; ?>

<div class="content-wrapper">
   <h2>Tambah Mahasiswa</h2>

   <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
      <button type="submit" class="btn btn-primary">Tambah</button>
   </form>

   <?php if (!empty($error)) { ?>
      <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
   <?php } ?>
</div>

<?php include 'footer.php'; ?>