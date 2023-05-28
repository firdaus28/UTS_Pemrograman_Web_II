<?php
include "config/koneksi.php";

$id = $nama = $kode_mata_kuliah = $deskripsi = "";
$error = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $kode_mata_kuliah = $_POST["kode_mata_kuliah"];
        $deskripsi = $_POST["deskripsi"];

        if (empty($nama) || empty($kode_mata_kuliah) || empty($deskripsi)) {
            $error = "Harap isi semua field.";
        } else {
            $sql = "UPDATE matakuliah SET nama='$nama', kode_mata_kuliah='$kode_mata_kuliah', deskripsi='$deskripsi' WHERE id='$id'";

            if (mysqli_query($conn, $sql)) {
                header("Location: matakuliah.php");
                exit();
            } else {
                $error = "Terjadi kesalahan: " . mysqli_error($conn);
            }
        }
    }

    $query = "SELECT * FROM matakuliah WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $nama = $row['nama'];
    $kode_mata_kuliah = $row['kode_mata_kuliah'];
    $deskripsi = $row['deskripsi'];

    mysqli_free_result($result);
}

mysqli_close($conn);
?>

<?php include 'header.php'; ?>

<div class="content-wrapper">
   <h2>Update Mata Kuliah</h2>

   <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
      <div class="form-group">
         <label for="nama">Nama Mata Kuliah:</label>
         <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
      </div>
      <div class="form-group">
         <label for="kode_mata_kuliah">Kode Mata Kuliah:</label>
         <input type="text" class="form-control" id="kode_mata_kuliah" name="kode_mata_kuliah" value="<?php echo $kode_mata_kuliah; ?>">
      </div>
      <div class="form-group">
         <label for="deskripsi">Deskripsi:</label>
         <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?php echo $deskripsi; ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
   </form>

   <?php if (!empty($error)) { ?>
      <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
   <?php } ?>
</div>

<?php include 'footer.php'; ?>