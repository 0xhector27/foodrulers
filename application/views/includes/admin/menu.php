<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
	<i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
	<!-- BEGIN: Aside Menu -->
	<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-dark " data-menu-vertical="true"
		data-menu-scrollable="false" data-menu-dropdown-timeout="500">
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
			<!--Dashboard-->
			<li class="m-menu__item <?php if($pmenu == 'dashboard') echo 'm-menu__item--active'?>">
				<a href="<?=base_url()?>admin/dashboard" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-text">
						<?=$this->lang->line('dashboard')?>
					</span>
				</a>
			</li>
			<!--Admin-->
			<li class="m-menu__item m-menu__item--submenu <?php if($pmenu == 'account' && !empty($submenu)) echo 'm-menu__item--open m-menu__item--expanded'?>" data-menu-submenu-toggle="hover">
				<a class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-profile-1"></i>
					<span class="m-menu__link-text">
						<?=$this->lang->line('admin')?>
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item <?php echo $submenu == 'add_admin' ? 'm-menu__item--active' : '' ?>">
							<a  href="<?=base_url()?>admin/account/add_admin" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('add_admin')?>
								</span>
							</a>
						</li>
						<li class="m-menu__item <?php echo $submenu == 'admin_list' ? 'm-menu__item--active' : '' ?>">
							<a  href="<?=base_url()?>admin/account/admin_list" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('admin_list')?>
								</span>
							</a>
						</li>
						<li class="m-menu__item <?php echo $submenu == 'admin_group' ? 'm-menu__item--active' : '' ?>">
							<a href="<?=base_url()?>admin/account/admin_group" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('admin_group')?>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<!--Member-->
			<li class="m-menu__item m-menu__item--submenu <?php if($pmenu == 'member' && !empty($submenu)) echo 'm-menu__item--open m-menu__item--expanded'?>" data-menu-submenu-toggle="hover">
				<a class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-users"></i>
					<span class="m-menu__link-text">
						<?=$this->lang->line('member')?>
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item <?php echo $submenu == 'add_member' ? 'm-menu__item--active' : '' ?>">
							<a href="<?=base_url()?>admin/member/add_member" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('add_member')?>
								</span>
							</a>
						</li>
						<li class="m-menu__item <?php echo $submenu == 'member_list' ? 'm-menu__item--active' : '' ?>">
							<a href="<?=base_url()?>admin/member/member_list" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('member_list')?>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<!--Restaurant-->
			<li class="m-menu__item <?php if($pmenu == 'restaurant') echo 'm-menu__item--active'?>">
				<a href="<?=base_url()?>admin/restaurant" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-tool"></i>
					<span class="m-menu__link-text">
						<?=$this->lang->line('restaurant')?>
					</span>
				</a>
			</li>
			<!--Food-->
			<li class="m-menu__item <?php if($pmenu == 'food') echo 'm-menu__item--active'?>">
				<a href="<?=base_url()?>admin/food" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-tea-cup"></i>
					<span class="m-menu__link-text">
						<?=$this->lang->line('food')?>
					</span>
				</a>
			</li>
			<!--Food Mission-->
			<li class="m-menu__item m-menu__item--submenu <?php if($pmenu == 'mission' && !empty($submenu)) echo 'm-menu__item--open m-menu__item--expanded'?>" data-menu-submenu-toggle="hover">
				<a class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-location"></i>
					<span class="m-menu__link-text">
						<?=$this->lang->line('food_mission')?>
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item <?php echo $submenu == 'create_mission' ? 'm-menu__item--active' : '' ?>">
							<a href="<?=base_url()?>admin/mission/create_mission" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('create_mission')?>
								</span>
							</a>
						</li>
						<li class="m-menu__item <?php echo $submenu == 'mission_list' ? 'm-menu__item--active' : '' ?>">
							<a href="<?=base_url()?>admin/mission/mission_list" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('mission_list')?>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<!--Food Challenge-->
			<li class="m-menu__item m-menu__item--submenu <?php if($pmenu == 'challenge' && !empty($submenu)) echo 'm-menu__item--open m-menu__item--expanded'?>" data-menu-submenu-toggle="hover">
				<a class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-share"></i>
					<span class="m-menu__link-text">
						<?=$this->lang->line('food_challenge')?>
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item <?php echo $submenu == 'create_challenge' ? 'm-menu__item--active' : '' ?>">
							<a href="<?=base_url()?>admin/challenge/create_challenge" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('create_challenge')?>
								</span>
							</a>
						</li>
						<li class="m-menu__item <?php echo $submenu == 'challenge_list' ? 'm-menu__item--active' : '' ?>">
							<a href="<?=base_url()?>admin/challenge/challenge_list" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('challenge_list')?>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<!--Request-->
			<li class="m-menu__item m-menu__item--submenu <?php if($pmenu == 'request' && !empty($submenu)) echo 'm-menu__item--open m-menu__item--expanded'?>" data-menu-submenu-toggle="hover">
				<a class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-bell"></i>
					<span class="m-menu__link-text">
						<?=$this->lang->line('request')?>
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item <?php echo $submenu == 'mission' ? 'm-menu__item--active' : '' ?>">
							<a href="<?=base_url()?>admin/request/mission" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('mission')?>
								</span>
							</a>
						</li>
						<li class="m-menu__item <?php echo $submenu == 'challenge' ? 'm-menu__item--active' : '' ?>">
							<a href="<?=base_url()?>admin/request/challenge" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('challenge')?>
								</span>
							</a>
						</li>
						<li class="m-menu__item <?php echo $submenu == 'blog' ? 'm-menu__item--active' : '' ?>">
							<a href="#" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('blog')?>
								</span>
							</a>
						</li>
						<li class="m-menu__item <?php echo $submenu == 'wallet' ? 'm-menu__item--active' : '' ?>">
							<a href="#" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('wallet')?>
								</span>
							</a>
						</li>
						<li class="m-menu__item <?php echo $submenu == 'restaurant' ? 'm-menu__item--active' : '' ?>">
							<a href="#" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									<?=$this->lang->line('restaurant')?>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<!--Deal-->
			<li class="m-menu__item <?php echo $pmenu == 'deal' ? 'm-menu__item--active' : '' ?>">
				<a href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-folder-2"></i>
					<span class="m-menu__link-text">
						<?=$this->lang->line('deal')?>
					</span>
				</a>
			</li>
		</ul>
	</div>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<input type="hidden" id="base_url" value="<?=base_url();?>" />