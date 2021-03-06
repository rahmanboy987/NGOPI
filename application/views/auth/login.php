<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>NGOPI - Login</title>

  <script src="https://kit.fontawesome.com/659604d02a.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= base_url() ?>asset/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" action="<?= base_url() ?>home/login" method="POST">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                      <small class="text-danger"><?= form_error('email'); ?></small>
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" class="form-control form-control-user" placeholder="Password">
                      <small class="text-danger"><?= form_error('pass'); ?></small>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>asset/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>asset/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>asset/js/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>asset/js/sb-admin-2.min.js"></script>
</body>

</html>