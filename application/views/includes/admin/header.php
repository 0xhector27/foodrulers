<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			<?php 
				if(empty($subtitle)) echo $title;
			    else echo $subtitle;
	      	?>
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
		<link href="<?=base_url()?>assets/custom/flag-icon/css/flag-icon.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?=base_url()?>assets/custom/images/favicon.ico" />
	</head>
	<!-- end::Head -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<header class="m-grid__item m-header " data-minimize-offset="200" data-minimize-mobile-offset="200">
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="<?=base_url()?>admin" class="m--font-light"><h3><strong>Foodrulers</strong></h3></a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
										">
										<span></span>
									</a>
									<!-- END -->
									<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
								<i class="la la-close"></i>
							</button>
							<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
							</div>
							<!-- END: Horizontal Menu -->
							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<!--begin: Dropdown-->
										<div class="m-dropdown m-dropdown--small m-dropdown--inline m-dropdown--align-right m--margin-right-20" data-dropdown-toggle="click" aria-expanded="true">
											<a href="#" class="m-dropdown__toggle dropdown-toggle">
												<span class="flag-icon <?=$this->session->userdata('flag')?>"></span>
												<?php
													$lang_abbrev = $this->session->userdata('abbrev');
													if($lang_abbrev != 'EN') echo $this->lang->line($lang_abbrev);
													else echo 'EN';
												?>
											</a>
											<div class="m-dropdown__wrapper" style="width: 150px">
												<div class="m-dropdown__inner">
													<div class="m-dropdown__body">
														<ul class="m-nav">
															<li class="m-nav__item">
																<a href="<?=site_url()?>lang_switcher/switch_language" class="m-nav__link">
																	<span class="flag-icon flag-icon-gb"></span>
																	English
																</a>
															</li>
															<li class="m-nav__item">
																<a href="<?=site_url()?>lang_switcher/switch_language/chinese/flag-icon-cn/CN" class="m-nav__link">
																	<span class="flag-icon flag-icon-cn"></span>
																	简体中文
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!--end: Dropdown-->
										<li class="m-nav__item m-dropdown m-dropdown--small m-dropdown--align-right m-dropdown--skin-light" data-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-text m--font-focus">
													<i class="flaticon-user"></i>	
													<?=$username?>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<div class="m-dropdown__inner">
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__item">
																	<a href="#" data-toggle="modal" data-target="#edit_modal" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-text">
																				<?=$this->lang->line('profile');?>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="#" data-toggle="modal" data-target="#password_modal" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-lock-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-text">
																				<?=$this->lang->line('change_password');?>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="<?=base_url()?>admin/auth/logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																		Logout
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">