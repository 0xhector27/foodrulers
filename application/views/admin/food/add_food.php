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
				<form class="m-form" id="food_form">
					<div class="m-portlet__body">
						<div class="m-form__section m-form__section--first">
							<div class="m-form__group row m--padding-20">
                                <input hidden value="<?=isset($food_data) ? $food_data['id'] : ''?>" name="id">
								<div class="form-group col-lg-6">
									<label>
										<?=$this->lang->line('name')?>:
									</label>
									<input type="text" class="form-control m-input" name="name" placeholder="Enter Food Name" required <?=isset($food_data) ? 'value="'.$food_data['name'].'"' : ''?>>
                                    <input type="file" accept="image/*" onchange="add_to_dz(this)">
								</div>
								<div class="form-group col-lg-3">
									<label>
										<?=$this->lang->line('price')?>:
									</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon2">
												$
											</span>
										</div>
										<input type="number" class="form-control m-input" name="price" placeholder="99" required <?=isset($food_data) ? 'value="'.$food_data['price'].'"' : ''?>>
									</div>
								</div>
								<div class="form-group col-lg-3">
									<label>
										<?=$this->lang->line('rating')?>:
									</label>
									<div class="input-group">
										<input type="number" class="form-control m-input" name="rating" placeholder="99" required <?=isset($food_data) ? 'value="'.$food_data['rating'].'"' : ''?>>
									</div>
								</div>
							</div>
							<div class="m-form__group row m--padding-20">
								<div class="form-group col-lg-12">
									<label>
										<?=$this->lang->line('description')?>
									</label>
									<textarea class="form-control m-input" name="description" placeholder="Enter Description" row="3"><?=isset($food_data) ? $food_data['description'] : ''?></textarea>
								</div>
							</div>
							<div class="m-form__group row m--padding-20">
								<div class="form-group col-lg-6">
									<label for="restaurant_id">
										<?=$this->lang->line('restaurant')?>:
									</label>
									<div class="m-form__control">
										<select class="form-control m-input" id="restaurant_id" name="restaurant_id" required>
											<option value="">Select a restaurant</option>
											<?php
											foreach ($restaurant_list as $key => $restaurant) {
												echo '<option value="'.$restaurant['id'].'"';
												if (isset($food_data) && $food_data['restaurant_id'] == $restaurant['id'])
												    echo ' selected';
												echo '>'.$restaurant['rest_name'].'</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group col-lg-6">
									<label for="type">
										<?=$this->lang->line('type')?>:
									</label>
									<select class="form-control m-input" name="type" id="type" required>
										<option value="">Select a food type...</option>
										<option value="1">Fast Food</option>
									</select>
								</div>
							</div>
							<div class="m-form__group row m--padding-20">
								<div class="form-group col-lg-3">
									<label>
									Thumbnail Image Upload
									</label>
									<div class="m-dropzone dropzone m-dropzone--info" action="<?=site_url('admin/food/upload_images')?>" id="thumbnail-dropzone">
										<div class="m-dropzone__msg dz-message needsclick">
											<span class="m-dropzone__msg-desc">
												Upload up to 1 files
											</span>
										</div>
									</div>
								</div>
								<div class="form-group col-lg-9">
									<label>
									Multiple Images Upload
									</label>
									<div class="m-dropzone dropzone m-dropzone--primary" action="<?=site_url('admin/food/upload_video')?>" id="multi-dropzone">
										<div class="m-dropzone__msg dz-message needsclick">
											<h3 class="m-dropzone__msg-title">
												Drop files here or click to upload.
											</h3>
											<span class="m-dropzone__msg-desc">
												Upload up to 10 files
											</span>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions">
							<button type="reset" class="btn btn-primary" id="save_btn">
                                <?=isset($food_data) ? $this->lang->line('update_btn') : $this->lang->line('save_btn')?>
							</button>
							<button type="reset" class="btn btn-secondary" onclick="location.href='<?=site_url('admin/food')?>';">
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