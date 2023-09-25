<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
  <link href="<?= asset_url('vendor/quill/quill.snow.css') ?>" rel="stylesheet">
  <link href="<?= asset_url('vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?= site_url('customer') ?>" class="logo d-flex align-items-center">
        <img src="<?= asset_url('img/logo.png') ?>" alt="">
        <span class="d-none d-lg-block">Customer</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="<?= site_url('customer') ?>">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= asset_url('img/profile-img.jpg') ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $customer['customer_name'] ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $customer['customer_name'] ?></h6>
              <span>Customer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= site_url('customer/logout') ?>">
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
        <a class="nav-link collapsed" href="<?= site_url('customer') ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= site_url('customer/OrderForm') ?>">
              <i class="bi bi-circle"></i><span>Order</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= site_url('customer/productsTable') ?>" >
              <i class="bi bi-circle"></i><span>Products Tables</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('customer/reportsTable') ?>"class="active">
              <i class="bi bi-circle"></i><span>Reports Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

      <div class="pagetitle">
        <h1>Reports Tables</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><p>Home</p></li>
            <li class="breadcrumb-item active">Your Reports</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Products Table</h5>

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">inventory</th>
                      <th scope="col">price</th>
                      <th scope="col">Total Price</th>
                      <th scope="col">Time</th>
                      <th scope="col">Status</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($reports as $reports): ?>
                        <?php if ($reports['status'] == 'pending' || $reports['status'] == 'failed'):?>
                          <tr>
                              <td><?= $reports['product_name'] ?></td>
                              <td><?= $reports['num_product'] ?></td>
                              <td><?= $reports['price'] ?></td>
                              <td><?= $reports['total_price'] ?></td>
                              <td><?= $reports['time'] ?></td>
                              <td>
                                <?php if ($reports['status'] == 'pending'):?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif ($reports['status'] == 'failed'): ?>
                                    <span class="badge bg-danger">Rejected</span>
                                <?php endif ?>
                              </td>
                              <td>
                                    <a href="<?= site_url("customer/reportDelete/".$reports['id']) ?>" class="btn btn-danger">Delete</a>
                              </td>
                          </tr>
                        <?php else: ?>
                            <tr>
                              <td><?= $reports['product_name'] ?></td>
                              <td><?= $reports['num_product'] ?></td>
                              <td><?= $reports['price'] ?></td>
                              <td><?= $reports['total_price'] ?></td>
                              <td><?= $reports['time'] ?></td>
                              <td><span class="badge bg-success">Approved</span></td>
                          </tr>
                        <?php endif ?>   
                      <?php endforeach ?>
                  </tbody>
                </table>
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
  <script src="<?= asset_url('vendor/echarts/echarts.min.js') ?>"></script>
  <script src="<?= asset_url('vendor/quill/quill.min.js') ?>"></script>
  <script src="<?= asset_url('vendor/simple-datatables/simple-datatables.js') ?>"></script>
  <script src="<?= asset_url('vendor/tinymce/tinymce.min.js') ?>"></script>
  <script src="<?= asset_url('vendor/php-email-form/validate.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= asset_url('js/main.js') ?>"></script>

</body>

</html>