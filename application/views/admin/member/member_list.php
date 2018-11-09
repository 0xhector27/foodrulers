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
		<div class="m-portlet__body">
			<!--begin: Search Form -->
			<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
				<div class="row align-items-center">
					<div class="col-xl-8 order-2 order-xl-1">
						<div class="form-group m-form__group row align-items-center">
							<div class="col-md-4">
								<div class="m-input-icon m-input-icon--left">
									<input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
									<span class="m-input-icon__icon m-input-icon__icon--left">
										<span>
											<i class="la la-search"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="m-form__group m-form__group--inline">
									<div class="m-form__label">
										<label>
											<?=$this->lang->line('status')?>:
										</label>
									</div>
									<div class="m-form__control">
										<select class="form-control m-bootstrap-select" id="account_status">
											<option value="">
												All
											</option>
											<option value="0">
												Inactive
											</option>
											<option value="1">
												Active
											</option>
										</select>
									</div>
								</div>
								<div class="d-md-none m--margin-bottom-10"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end: Search Form -->
			<!--begin: Datatable -->
			<div class="m_datatable" id="member_list"></div>
			<!--end: Datatable -->
		</div>
	</div>
</div>

<!--Edit Modal-->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <?=$this->lang->line('edit_member')?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="edit_form">
                    <input type="hidden" id="id" name="id">
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
                                Password
                            </label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirm" class="form-control-label">
                                Confirm Password
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
										+65
									</span>
                                </div>
                                <input type="hidden" name="country_code" id="country_code">
                                <input type="text" class="form-control m-input" name="phone_number" id="phone_number">
                            </div>
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