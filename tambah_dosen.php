<?php include 'header.php'; ?>

<?php
include "config/koneksi.php";

if (!$conn) {
   die("Koneksi database gagal: " . mysqli_connect_error());
}

$nama = $nidn = $jenjang_pendidikan = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nama = $_POST['nama'];
   $nidn = $_POST['nidn'];
   $jenjang_pendidikan = $_POST['jenjang_pendidikan'];

   // Validasi jenjang pendidikan
   if ($jenjang_pendidikan !== "S2" && $jenjang_pendidikan !== "S3") {
      $error = "Jenjang pendidikan hanya dapat diisi dengan S2 atau S3.";
   } else {
      $query = "INSERT INTO dosen (nama, nidn, jenjang_pendidikan) VALUES ('$nama', '$nidn', '$jenjang_pendidikan')";

      if (mysqli_query($conn, $query)) {
         echo "Data dosen berhasil disimpan.";
         header("Location: dosen.php");
         exit();
      } else {
         $error = "Error: " . mysqli_error($conn);
      }
   }
}

mysqli_close($conn);
?>


<div class="content-wrapper">
   <h2>Tambah Dosen</h2>

   <form action="tambah_dosen.php" method="POST">
      <div class="form-group">
         <label for="nama">Nama:</label>
         <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      <div class="form-group">
         <label for="nidn">NIDN:</label>
         <input type="text" class="form-control" id="nidn" name="nidn" required>
      </div>
      <div class="form-group">
         <label for="jenjang_pendidikan">Jenjang Pendidikan:</label>
         <select class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" required>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
         </select>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
   </form>

   <?php if (!empty($error)) { ?>
      <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
   <?php } ?>
</div>

<?php include 'footer.php'; ?>