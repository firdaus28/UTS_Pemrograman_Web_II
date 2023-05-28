<?php include 'header.php'; ?>

<div class="content-wrapper">

   <div class="card-container">
      <div class="card">
         <i class="fas fa-users"></i>
         <h3>Total Mahasiswa</h3>
         <p>250</p>
      </div>
      <div class="card">
         <i class="fas fa-chalkboard-teacher"></i>
         <h3>Total Dosen</h3>
         <p>30</p>
      </div>
      <div class="card">
         <i class="fas fa-book"></i>
         <h3>Total Mata Kuliah</h3>
         <p>15</p>
      </div>
   </div>
</div>

<style>
   .card-container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
   }

   .card {
      width: 300px;
      height: 300px;
      background-color: #f1f1f1;
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
   }

   .card i {
      font-size: 48px;
      margin-bottom: 10px;
   }

   .card h3 {
      font-size: 24px;
      margin-bottom: 10px;
   }

   .card p {
      font-size: 18px;
      color: #888;
   }

   .card:hover {
      transform: scale(1.05);
   }
</style>

<?php include 'footer.php'; ?>
