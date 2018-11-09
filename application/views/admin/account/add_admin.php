<!-- BEGIN: Subheader -->
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				<li class="m-nav__item m-nav__item--home">
					<a href="#" class="m-nav__link m-nav__link--icon">
						<i class="m-nav__link-icon la la-home"></i>
					</a>
				</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">
							<?=$header_data['title']?>
						</span>
					</a>
				</li>
				<li class="m-nav__separator">
					/
				</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">
							<?=$header_data['subtitle']?>
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- END: Subheader -->
<div class="m-content">
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						<?=$header_data['subtitle']?>
					</h3>
				</div>
			</div>
		</div>
		<form class="m-form" id="add_form">
			<div class="m-portlet__body">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="f_name" class="form-control-label">
							First Name*
						</label>
						<input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter First Name">
					</div>
					<div class="form-group col-md-6">
						<label for="l_name" class="form-control-label">
							Last Name*
						</label>
						<input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter Last Name">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="user_id" class="form-control-label">
							User ID*
						</label>
						<input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter User ID">
					</div>
					<div class="form-group col-md-6">
						<label for="email" class="form-control-label">
							Email*
						</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="password" class="form-control-label">
							Password*
						</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
					</div>
					<div class="form-group col-md-6">
						<label for="password_confirm" class="form-control-label">
							Confirm Password*
						</label>
						<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Enter Confirm Password">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="country_id" class="form-control-label">
							Country*
						</label>
						<select id="country_id" class="form-control" name="country_id">
							<option value="">Selecte a country...</option>
							<?php
							foreach ($country_list as $key => $country) {
								echo '<option value="'.$country['id'].'" data-code="'.$country['code'].'">'.$country['full_name'].'</option>';
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="phone_number" class="form-control-label">
							Phone Number
						</label>
						<div class="input-group m-input-group">
							<div class="input-group-prepend">
								<span class="input-group-text country_code">
									
								</span>
							</div>
							<input type="hidden" name="country_code" id="country_code">
							<input type="text" class="form-control m-input" name="phone_number" id="phone_number">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="city" class="form-control-label">
							City:
						</label>
						<input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name">
					</div>
					<div class="form-group col-md-6">
						<label for="address" class="form-control-label">
							Address:
						</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="group_id" class="form-control-label">
							Group*
						</label>
						<select class="form-control" id="group_id" name="group_id">
							<option value="">Select a group...</option>
							<?php
							foreach ($group_list as $key => $group) {
								echo '<option value="'.$group['id'].'">'.$group['group_name'].'</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="row m--margin-top-20">
					<div class="form-group col-md-12">
						<button type="button" class="btn btn-primary" id="save_btn">
							Save
						</button>
						<button type="reset" class="btn btn-secondary" id="reset_btn">
							Reset
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>