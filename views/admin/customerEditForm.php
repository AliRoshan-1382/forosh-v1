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
  <link href="<?= asset_url('css/style.css') ?>" rel="stylesheet">

</head>

<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <a class="btn btn-info"> <h1>Customer Edit</h1></a>
    </div><!-- End Page Title -->

    <section class="section mt-5">
      <div class="row">
        <div class="col-lg-12">
          <div class="card mt-4">
            <div class="card-body">
              <h5 class="card-title">Edit Form</h5>

              <!-- General Form Elements -->
              <form action="<?= site_url('admin/customerEdit') ?>" method="post">
                <div class="row mb-3">
                    <label for="id" class="col-sm-2 col-form-label">id</label>
                    <div class="col-sm-10">
                        <input type="text" name="id" value="<?= $customer['id'] ?>" id="id" class="form-control" readonly>
                    </div>
                </div>
                <!-- <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control" required disabled hidden>
                  </div>
                </div> -->
            
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="Username" value="<?= $customer['customer_username'] ?>" id="Username" class="form-control" required>
                  </div>
                </div>


                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Access Login</legend>
                  <div class="col-sm-10">
                    <?php if ($customer['access_login'] == 'ok'):?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="login" id="gridRadios1" value="ok" checked>
                            <label class="form-check-label" for="gridRadios1">
                                allowed                      
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="login" id="gridRadios2" value="no">
                            <label class="form-check-label" for="gridRadios2">
                                not allowed
                            </label>
                        </div>
                    <?php else: ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="login" id="gridRadios1" value="ok">
                            <label class="form-check-label" for="gridRadios1">
                                allowed                      
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="login" id="gridRadios2" value="no" checked>
                            <label class="form-check-label" for="gridRadios2">
                                not allowed
                            </label>
                        </div>
                    <?php endif ?>
                  </div>
                </fieldset>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                    <a href="<?= site_url('admin/customersTable') ?>" class="btn btn-info">Back To Customer Table</a>
                  </div>
                </div>
                
              </form>

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