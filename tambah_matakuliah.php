<?php include 'header.php'; ?>

<div class="content-wrapper">
   <h2>Tambah Mata Kuliah</h2>

   <?php
   include "config/koneksi.php";

   if (!$conn) {
      die("Koneksi database gagal: " . mysqli_connect_error());
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nama = $_POST['nama'];
      $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
      $deskripsi = $_POST['deskripsi'];

      $query = "INSERT INTO matakuliah (nama, kode_mata_kuliah, deskripsi) VALUES ('$nama', '$kode_mata_kuliah', '$deskripsi')";

      if (mysqli_query($conn, $query)) {
         header("Location: matakuliah.php");
         exit();
      } else {
         echo "Error: " . mysqli_error($conn);
      }
   }

   mysqli_close($conn);
   ?>

   <form action="tambah_matakuliah.php" method="POST">
      <div class="form-group">
         <label for="nama">Nama Mata Kuliah:</label>
         <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      <div class="form-group">
         <label for="kode_mata_kuliah">Kode Mata Kuliah:</label>
         <input type="text" class="form-control" id="kode_mata_kuliah" name="kode_mata_kuliah" required>
      </div>
      <div class="form-group">
         <label for="deskripsi">Deskripsi:</label>
         <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
   </form>
</div>

<?php include 'footer.php'; ?>
