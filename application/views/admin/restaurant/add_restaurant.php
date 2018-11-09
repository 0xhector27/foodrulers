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
                <li class="m-nav__separator">
                    /
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
						<span class="m-nav__link-text">
							<?=$content_name?>
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
                                <?=$content_name?>
                            </h2>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form id="restaurant_form" method="post" enctype="multipart/form-data" class="m-form">
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="row">
                                <input hidden name="id" value="<?=isset($restaurant_data) ? $restaurant_data['id'] : ''?>">
                                <div class="form-group col-lg-6">
                                    <label>
                                        <?=$this->lang->line('name')?> *
                                    </label>
                                    <input type="text" class="form-control m-input" name="rest_name" placeholder="Enter Restaurant Name" required value="<?=isset($restaurant_data) ? $restaurant_data['rest_name'] : ''?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>
                                        <?=$this->lang->line('owner')?> *
                                    </label>
                                    <select class="form-control m-input" name="owner_id" required>
                                        <option value="">Select an owner</option>
                                        <?php foreach ($owners as $owner)
                                        {?>
                                            <option value="<?=$owner['id']?>" <?=isset($restaurant_data) && $restaurant_data['owner_id'] == $owner['id'] ? ' selected' : ''?>><?=$owner['f_name']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>
                                        <?=$this->lang->line('description')?> *
                                    </label>
                                    <textarea class="form-control m-input" placeholder="Enter Short Description" name="description" row="3" required><?=isset($restaurant_data) ? $restaurant_data['description'] : ''?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>
                                        <?=$this->lang->line('address')?> *
                                    </label>
                                    <input type="text" class="form-control m-input" name="address" placeholder="Enter Address" required value="<?=isset($restaurant_data) ? $restaurant_data['address'] : ''?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>
                                        <?=$this->lang->line('website_url')?>
                                    </label>
                                    <input type="text" class="form-control m-input" name="website_url" placeholder="Enter Website Url" value="<?=isset($restaurant_data) ? $restaurant_data['website_url'] : ''?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>
                                        <?=$this->lang->line('phone_number')?> *
                                    </label>
                                    <input type="text" class="form-control m-input" name="phone_number" placeholder="Enter Phone number" required value="<?=isset($restaurant_data) ? $restaurant_data['phone_number'] : ''?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>
                                        <?=$this->lang->line('location')?> 
                                    </label>
                                    <input type="text" class="form-control m-input" id="f_location" placeholder="Enter Location">
                                    <input hidden id="f_longitude" name="longitude" value="<?=isset($restaurant_data) ? $restaurant_data['longitude'] : ''?>">
                                    <input hidden id="f_latitude" name="latitude" value="<?=isset($restaurant_data) ? $restaurant_data['latitude'] : ''?>">
                                </div>
                            </div>
                            <div class="row">
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
                                <div class="form-control col-lg-12">
                                    <div class="m-dropzone dropzone m-dropzone--primary" action="<?=base_url()?>admin/mission/upload_images" id="multi-dropzone">
                                        <div class="m-dropzone__msg dz-message needsclick">
                                            <h3 class="m-dropzone__msg-title">
                                                Drop Images here or click to upload.
                                            </h3>
                                            <span class="m-dropzone__msg-desc">
												Upload up to 5 images
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <button type="button" class="btn btn-primary" id="save_btn">
                                <?=isset($restaurant_data) ? $this->lang->line('update_btn') : $this->lang->line('submit_btn')?>
                            </button>
                            <button type="button" class="btn btn-secondary" id="cancel_btn" onclick="location.href = '<?=site_url('admin/restaurant')?>'">
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