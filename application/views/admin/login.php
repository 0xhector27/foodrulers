<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			<?php echo $this->lang->line('login_title') ;?>
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="<?=base_url()?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?=base_url()?>assets/demo/default/media/img/logo/favicon.ico" />
		<style>
			.login-title {
				color: white;
				text-align: center;
			}

			.login-foot {
				color: #f9f5ff;
				text-align: center;
				font-size: 12px;
				margin-top: 20px;
			}

			.login-foot a {
				color: #55f308;
			}
		</style>
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url(<?=base_url()?>assets/app/media/img//bg/bg-1.jpg);">
				<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
					<!-- <div class="row clearfix">
						<div class="form-group m-form__group">
							<select class="form-control m-bootstrap-select m_selectpicker" id="lang_select">
								<option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
								<option value="chinese" <?php if($this->session->userdata('site_lang') == 'chinese') echo 'selected="selected"'; ?>>中文</option>
							</select>
						</div>
					</div> -->
					<div class="row">
						<div class="m-login__container">
							<div class="m-login__logo">
								<a href="#">
									<img src="<?=base_url()?>assets/app/media/img//logos/logo-1.png">
								</a>
							</div>
							<div class="m-login__signin">
								<h2 class="login-title">
									<strong>Foodrulers</strong>
								</h2>
								<form class="m-login__form m-form" id="login_form" action="<?=base_url()?>admin/auth/login" method="POST">
									<?php if($this->session->flashdata('error_msg')) {
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
												<strong>'.$this->session->flashdata('error_msg').'</strong></div>';
									} ?>
									<div class="form-group m-form__group">
										<input class="form-control m-input" type="text" placeholder="<?php echo $this->lang->line('user_id');?>" name="userid" autocomplete="off">
										<?php echo form_error('userid'); ?>
									</div>
									<div class="form-group m-form__group">
										<input class="form-control m-input m-login__form-input--last" type="password" placeholder="<?php echo $this->lang->line('pwd');?>" name="password">
										<?php echo form_error('password'); ?>
									</div>
									<div class="m-login__form-action">
										<button class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
											<?php echo $this->lang->line('login_btn') ;?>
										</button>
									</div>
								</form>
							</div>
							<div class="login-foot">
								EzyMLM powered by <a href="http://www.sgcoders.com"><strong>SGCoders</strong></a>. &copy; 2012 <a href="http://www.sgcoders.com"><strong>SGCoders Pte Ltd</strong></a>. All rights reserved.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
    	<!--begin::Base Scripts -->
		<script src="<?=base_url()?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?=base_url()?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->   
		<script src="<?=base_url()?>assets/demo/default/custom/components/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
        <!--begin::Page Snippets -->
		<!-- <script src="<?php echo base_url();?>assets/custom/js/admin/login.js" type="text/javascript"></script> -->
		<!--end::Page Snippets -->
		<script type="text/javascript">
			$(document).ready(function() {
				/*$("#lang_select").on('change', function(){
					window.location = '<?=site_url()?>lang_switcher/switch_language/' + this.value;
				});*/

		        $('#login_form').keydown(function(event) {
		            if (event.keyCode == 13) {
		               this.submit();
		            }
		        });
		    })
		</script>
	</body>
	<!-- end::Body -->
</html>
