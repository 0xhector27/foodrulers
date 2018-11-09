				</div>
			</div>
			<!-- end:: Body -->
		</div>

		<!--Edit Modal-->
		<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<?=$this->lang->line('profile');?>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
					</div>
					<div class="modal-body">
						<form role="form" id="update_form">
							<input type="hidden" name="id" value="<?=$user_data['id']?>">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="f_name" class="form-control-label">
										First Name*
									</label>
									<input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter First Name" value="<?=$user_data['f_name']?>">
								</div>
								<div class="form-group col-md-6">
									<label for="l_name" class="form-control-label">
										Last Name*
									</label>
									<input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter Last Name" value="<?=$user_data['l_name']?>">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="user_id" class="form-control-label">
										User ID*
									</label>
									<input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter User ID" value="<?=$user_data['user_id']?>">
								</div>
								<div class="form-group col-md-6">
									<label for="email" class="form-control-label">
										Email*
									</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?=$user_data['email']?>">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="country_id" class="form-control-label">
										Country*
									</label>
									<select id="country_id" class="form-control" name="country_id">
										<?php
										foreach ($country_list as $key => $country) {
											echo '<option value="'.$country['id'].'" data-code="'.$country['code'].'" '.($country['id']==$user_data['country_id']?'selected':'').'>'.$country['full_name'].'</option>';
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
												+65
											</span>
										</div>
										<input type="hidden" name="country_code" id="country_code" value="<?=$user_data['country_code']?>">
										<input type="text" class="form-control m-input" name="phone_number" id="phone_number" value="<?=$user_data['phone_number']?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="city" class="form-control-label">
										City:
									</label>
									<input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name" value="<?=$user_data['city']?>">
								</div>
								<div class="form-group col-md-6">
									<label for="address" class="form-control-label">
										Address:
									</label>
									<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?=$user_data['address']?>">
									<input type="hidden" name="group_id" id="group_id" value="<?=$user_data['group_id']?>">
								</div>
							</div>
							<div class="row" style="float:right">
								<div class="form-group col-md-12">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">
										Close
									</button>
									<button type="button" class="btn btn-primary" id="update_btn">
										Update
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--end-->

		<!--Edit Modal-->
		<div class="modal fade" id="password_modal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<?=$this->lang->line('change_password');?>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
					</div>
					<div class="modal-body">
						<form role="form" id="password_form">
							<input type="hidden" name="id" value="<?=$user_data['id']?>">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="old_password" class="form-control-label">
										Old Password
									</label>
									<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<label for="password" class="form-control-label">
										New Password
									</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<label for="password_confirm" class="form-control-label">
										Confirm Password
									</label>
									<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Enter Confirm Password">
								</div>
							</div>
							<div class="row" style="float:right">
								<div class="form-group col-md-12">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">
										Close
									</button>
									<button type="button" class="btn btn-primary" id="update_password_btn">
										Update
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--end-->

		<!-- end:: Page -->
		<!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->
    	<!--begin::Base Scripts -->
		<script src="<?=base_url()?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?=base_url()?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Snippets -->
		<script src="<?=base_url()?>assets/custom/js/global.js" type="text/javascript"></script>
		<script src="<?=base_url()?>assets/custom/js/admin/<?=$jslink?>.js" type="text/javascript"></script>
		<script src="<?=base_url()?>assets/custom/js/admin/profile.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
	</body>
	<!-- end::Body -->
</html>