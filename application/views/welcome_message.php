
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="<?php echo base_url('assets/admin-temp/'); ?>css/styles.css" rel="stylesheet" />

        <script type="text/javascript">
        	var baseURL = '<?php echo base_url(); ?>'
        </script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form class="login">
                                        	<!-- alert -->
                                        	<!-- alert -->
											<div class="alert alert-danger alert-dismissible fade show alert-login text-center text-uppercase" role="alert">
											  <small id="alert-message"></small>
											</div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="username">Username</label>
                                                <input class="form-control py-4" name="username" id="username" type="text" placeholder="Enter username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Password</label>
                                                <input class="form-control py-4" name="password" id="password" type="password" placeholder="Enter password" />
                                            </div>
                                            <!-- <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div> -->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <button type="button" class="btn btn-primary btn-block" id="btn-login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <!-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!--===============================================================================================-->
		<script src="<?php echo base_url('assets/plugins-login/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="<?php echo base_url('assets/plugins-login/') ?>vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="<?php echo base_url('assets/plugins-login/') ?>vendor/bootstrap/js/popper.js"></script>
		<script src="<?php echo base_url('assets/plugins-login/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/admin-temp/'); ?>js/scripts.js"></script>
		<!-- Plugin MNBTricks -->
	  	<script src="<?php echo base_url(); ?>assets/js/plugin-mnbtricks/login.js"></script>
    </body>
</html>
