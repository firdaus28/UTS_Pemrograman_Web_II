<?php
include "config/koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        $sql = "DELETE FROM dosen WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            mysqli_query($conn, "ALTER TABLE dosen AUTO_INCREMENT = 1");
            header("Location: dosen.php");
            exit();
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($conn);
        }
    } else {
        echo "Anda yakin ingin menghapus data ini?<br>";
        echo "<a href=\"delete_dosen.php?id=$id&confirm=yes\">Ya</a> | ";
        echo "<a href=\"dosen.php\">Tidak</a>";
    }
}

mysqli_close($conn);
?>