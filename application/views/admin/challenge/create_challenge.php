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
	<div class="row">
		<div class="col-lg-12">
			<!--begin::Portlet-->
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon m--hide">
								<i class="la la-gear"></i>
							</span>
							<h2 class="m-portlet__head-text">
								<?=$header_data['subtitle']?>
							</h2>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<form id="challenge_add_form" class="m-form" action="<?=site_url('admin/challenge/save_challenge')?>" method="POST">
					<div class="m-portlet__body">
						<div class="m-form__section m-form__section--first">
							<div class="m-form__group row">
								<div class="form-group col-lg-6">
									<label>
										<?=$this->lang->line('name')?>:
									</label>
									<input type="text" class="form-control m-input" name="name" placeholder="Enter Challenge Name" required>
								</div>
								<div class="form-group col-lg-3">
									<label>
										<?=$this->lang->line('reward_point')?>:
									</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon2">
												$
											</span>
										</div>
										<input type="number" class="form-control m-input" placeholder="99" required>
									</div>
								</div>
								<div class="form-group col-lg-3">
									<label>
										<?=$this->lang->line('num_rewards')?>
									</label>
									<input type="number" class="form-control m-input" name="reward_num" placeholder="99" required>
								</div>
							</div>
							<div class="m-form__group">
								<label>
									<?=$this->lang->line('description')?>
								</label>
								<textarea class="form-control m-input" name="description" placeholder="Enter Description" row="3"></textarea>
							</div>
							<div class="m-form__group row">
								<div class="form-group col-lg-6">
									<label>
										<?=$this->lang->line('start_time')?>:
									</label>
									<div class="input-group date">
										<input type="text" class="form-control m-input" readonly placeholder="Select start time" id="start_time" name="start_time" required/>
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="la la-calendar-check-o glyphicon-th"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group col-lg-6">
									<label>
										<?=$this->lang->line('end_time')?>:
									</label>
									<div class="input-group date">
										<input type="text" class="form-control m-input" readonly placeholder="Select end time" id="end_time" name="end_time" required/>
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="la la-calendar-check-o glyphicon-th"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="m-form__group">
								<label>
									Multiple Images Upload
								</label>
								<div class="form-control col-lg-12">
									<div class="m-dropzone dropzone m-dropzone--primary" action="<?=base_url()?>admin/challenge/upload_images" id="challenge-image">
										<div class="m-dropzone__msg dz-message needsclick">
											<h3 class="m-dropzone__msg-title">
												Drop Files here or click to upload.
											</h3>
											<span class="m-dropzone__msg-desc">
												Upload up to 10 files
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="m-form__group">
								<label>
									Video Upload
								</label>
								<div class="form-control col-lg-12">
									<div class="m-dropzone dropzone m-dropzone--primary" action="<?=base_url()?>admin/challenge/upload_video" id="challenge-video">
										<div class="m-dropzone__msg dz-message needsclick">
											<h3 class="m-dropzone__msg-title">
												Drop Video here or click to upload.
											</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions">
							<button type="reset" class="btn btn-primary" id="save_btn">
								<?=$this->lang->line('submit_btn')?>
							</button>
							<button type="reset" class="btn btn-secondary" onclick="javascript:window.location.href='<?=site_url()?>admin/challenge/challenge_list'">
								<?=$this->lang->line('cancel_btn')?>
							</button>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Portlet-->
		</div>
	</div>
</div>