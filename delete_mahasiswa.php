<?php
include "config/koneksi.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
      
        $sql = "DELETE FROM mahasiswa WHERE id='$id'";

       
        if (mysqli_query($conn, $sql)) {
            mysqli_query($conn, "ALTER TABLE mahasiswa AUTO_INCREMENT = 1");
            header("Location: mahasiswa.php");
            exit();
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($conn);
        }
    } else {
        echo "Anda yakin ingin menghapus data ini?<br>";
        echo "<a href=\"delete_mahasiswa.php?id=$id&confirm=yes\">Ya</a> | ";
        echo "<a href=\"mahasiswa.php\">Tidak</a>";
    }
}

mysqli_close($conn);
?>
