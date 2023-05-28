<?php include 'header.php'; ?>

<div class="content-wrapper">
   <h2>Data Mata Kuliah</h2>

   <a href="tambah_matakuliah.php" class="btn btn-primary">Tambah</a>

   <table class="table">
      <thead>
         <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kode Mata Kuliah</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php
         include "config/koneksi.php";

         if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
         }

         $query = "SELECT * FROM matakuliah";
         $result = mysqli_query($conn, $query);

         if (!$result) {
            die("Query error: " . mysqli_error($conn));
         }

         while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['kode_mata_kuliah'] . "</td>";
            echo "<td>" . $row['deskripsi'] . "</td>";
            echo "<td>";
            echo "<a href='update_matakuliah.php?id=" . $row['id'] . "' class='btn btn-primary'>Update</a>";
            echo "<a href='delete_matakuliah.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
            echo "</td>";
            echo "</tr>";
         }

         mysqli_close($conn);
         ?>
      </tbody>
   </table>
</div>

<?php include 'footer.php'; ?>