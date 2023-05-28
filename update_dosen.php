<?php
include "config/koneksi.php";

$id = $nama = $nidn = $jenjang_pendidikan = "";
$error = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $nidn = $_POST["nidn"];
        $jenjang_pendidikan = $_POST["jenjang_pendidikan"];

        // Validasi jenjang pendidikan
        if ($jenjang_pendidikan !== "S2" && $jenjang_pendidikan !== "S3") {
            $error = "Jenjang pendidikan hanya dapat diisi dengan S2 atau S3.";
        } else {
            $sql = "UPDATE dosen SET nama='$nama', nidn='$nidn', jenjang_pendidikan='$jenjang_pendidikan' WHERE id='$id'";

            if (mysqli_query($conn, $sql)) {
                header("Location: dosen.php");
                exit();
            } else {
                $error = "Terjadi kesalahan: " . mysqli_error($conn);
            }
        }
    }

    $query = "SELECT * FROM dosen WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $nama = $row['nama'];
    $nidn = $row['nidn'];
    $jenjang_pendidikan = $row['jenjang_pendidikan'];

    mysqli_free_result($result);
}

mysqli_close($conn);
?>

<?php include 'header.php'; ?>

<div class="content-wrapper">
   <h2>Update Dosen</h2>

   <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
      <div class="form-group">
         <label for="nama">Nama:</label>
         <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
      </div>
      <div class="form-group">
         <label for="nidn">NIDN:</label>
         <input type="text" class="form-control" id="nidn" name="nidn" value="<?php echo $nidn; ?>" required>
      </div>
      <div class="form-group">
         <label for="jenjang_pendidikan">Jenjang Pendidikan:</label>
         <select class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" required>
            <option value="S2" <?php if ($jenjang_pendidikan === "S2") echo "selected"; ?>>S2</option>
            <option value="S3" <?php if ($jenjang_pendidikan === "S3") echo "selected"; ?>>S3</option>
         </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
   </form>

   <?php if (!empty($error)) { ?>
      <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
   <?php } ?>
</div>

<?php include 'footer.php'; ?>