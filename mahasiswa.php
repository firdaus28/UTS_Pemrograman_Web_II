<?php include 'header.php'; ?>

<div class="content-wrapper">
   <h2>Data Mahasiswa</h2>

   <a href="tambah_mahasiswa.php" class="btn btn-primary">Tambah</a>

   <table class="table">
      <thead>
         <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php
         include "config/koneksi.php";

         if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
         }

         $query = "SELECT * FROM mahasiswa";
         $result = mysqli_query($conn, $query);

         if (!$result) {
            die("Query error: " . mysqli_error($conn));
         }

         while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['nim'] . "</td>";
            echo "<td>" . $row['program_studi'] . "</td>";
            echo "<td>";
            echo "<a href='update_mahasiswa.php?id=" . $row['id'] . "' class='btn btn-primary'>Update</a>";
            echo "<a href='delete_mahasiswa.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
            echo "</td>";
            echo "</tr>";
         }

         mysqli_close($conn);
         ?>
      </tbody>
   </table>
</div>

<?php include 'footer.php'; ?>