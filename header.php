<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
   <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="shortcut icon" href="assets/logo.jpg" />
</head>
<body>
   
   <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
         <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
               <li class="nav-item nav-profile">
                  <a href="#" class="nav-link">
                     <div class="nav-profile-image">
                        <img src="assets/logo.jpg" alt="profile">
                        <span class="login-status online"></span>
                     </div>
                     <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">Universitas Siber Asia</span>
                        <span class="text-secondary text-small">SIAKAD</span>
                     </div>
                     <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="dashboard.php">
                     <span class="menu-title">Dashboard</span>
                     <i class="mdi mdi-home menu-icon"></i>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                     <span class="menu-title">Pendaftaran</span>
                     <i class="menu-arrow"></i>
                     <i class="mdi mdi-contact-mail menu-icon"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                     <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                           <a class="nav-link" href="dosen.php">Dosen</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                        </li>
                     </ul>
                  </div>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="matakuliah.php">
                     <span class="menu-title">Mata Kuliah</span>
                     <i class="mdi mdi-seal menu-icon"></i>
                  </a>
               </li>
            </ul>
         </nav>
         <div class="main-panel">
            <div class="content-wrapper">
               <div class="page-header">
                  <h3 class="page-title">
                     <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                     </span> Dashboard
                  </h3>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                           <span>Overview</span>
                           <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                     </ul>
                  </nav>
               </div>
