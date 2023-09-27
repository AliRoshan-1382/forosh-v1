<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= asset_url('img/favicon.png') ?>" rel="icon">
  <link href="<?= asset_url('img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= asset_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= asset_url('vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= asset_url('vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= asset_url('vendor/quill/quill.snow.cs') ?>s" rel="stylesheet">
  <link href="<?= asset_url('vendor/quill/quill.bubble.cs') ?>s" rel="stylesheet">
  <link href="<?= asset_url('vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?= asset_url('vendor/simple-datatables/style.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= asset_url('css/style.css') ?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

 <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?= site_url('') ?>" class="logo d-flex align-items-center">
        <img src="<?= asset_url('img/logo.png') ?>" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= asset_url('img/profile-img.jpg') ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $admin['admin-name'] ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $admin['admin-name'] ?></h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= site_url('admin/logout') ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>logout</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= site_url('') ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= site_url('admin/customerForm') ?>">
              <i class="bi bi-circle"></i><span>Customer registration form</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/categoryForm')?>">
              <i class="bi bi-circle"></i><span>Category registration form</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/productForm')?>" class="active">
              <i class="bi bi-circle"></i><span>Product registration form</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= site_url('admin/productsTable') ?>">
              <i class="bi bi-circle"></i><span>Products Tables</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/categoriesTable') ?>">
              <i class="bi bi-circle"></i><span>Categories Tables</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/reportsTable') ?>">
              <i class="bi bi-circle"></i><span>Reports Tables</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('admin/customersTable') ?>">
              <i class="bi bi-circle"></i><span>Customers Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Product Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><p>Home</p></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Product Form</h5>

              <!-- General Form Elements -->
              <form action="<?= site_url('admin/addproduct') ?>" method="post" class="novalidate">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="pname" id="pname" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Product Inventory</label>
                  <div class="col-sm-10">
                    <input type="number" name="pinventory" id="pinventory" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Product Price</label>
                  <div class="col-sm-10">
                    <input type="number" name="pprice" id="pprice" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Product category</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="pcategory" aria-label="Default select example" required>
                    <?php foreach ($category as $key): ?>
                        <option value="<?= $key['category_name'] ?>"><?= $key['category_name'] ?></option>
                    <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= asset_url('vendor/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?= asset_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= asset_url('vendor/chart.js/chart.umd.js') ?>"></script>
  <script src="<?= asset_url('vendor/echarts/echarts.min.j') ?>s"></script>
  <script src="<?= asset_url('vendor/quill/quill.min.js') ?>"></script>
  <script src="<?= asset_url('vendor/simple-datatables/simple-datatables.js') ?>"></script>
  <script src="<?= asset_url('vendor/tinymce/tinymce.min.js') ?>"></script>
  <script src="<?= asset_url('vendor/php-email-form/validate.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= asset_url('js/main.js') ?>"></script>

</body>

</html>