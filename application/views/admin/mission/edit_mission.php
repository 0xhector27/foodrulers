<style type="text/css">
	video {
		width: 100%;
		height: auto;
	}
</style>
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
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h2 class="m-portlet__head-text">
						<?=$mission_data['name']?>
					</h2>
				</div>
			</div>
		</div>
		<form id="edit_form" class="m-form m-form--label-align-right" method="POST">
            <input hidden name="id" value="<?=$mission_data['id']?>">
			<div class="m-portlet__body">
				<div class="m-form__section m-form__section--first">
					<div class="m-form__heading">
						<h3 class="m-form__heading-title">
							<?=$this->lang->line('edit_mission')?>
						</h3>
					</div>
					<!--begin::Form-->
					<form class="m-form">
						<div class="m-portlet__body">
							<div class="row">
								<div class="form-group col-lg-6">
									<label for="mission_name">
										Mission Name:
									</label>
									<input type="text" class="form-control m-input" name="name" placeholder="Enter mission name" value="<?=$mission_data['name']?>">
								</div>
								<div class="form-group col-lg-6">
									<label>
										Reward Point
									</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon2">
												$
											</span>
										</div>
										<input name="reward_point" type="number" class="form-control m-input" placeholder="100" value="<?=$mission_data['reward_point']?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="description">
									Description:
								</label>
								<textarea class="form-control m-input" name="description" placeholder="Enter description" rows="4"><?=$mission_data['description']?></textarea>
							</div>
							<div class="form-group">
								<label for="status">
									Status:
								</label>
								<select name="status" class="form-control m-input" id="status">
									<option value="0" <?php if($mission_data['status'] == '0') echo 'selected'?>>
										New Mission
									</option>
									<option value="1" <?php if($mission_data['status'] =='1') echo 'selected'?>>
										Half Mission
									</option>
									<option value="2" <?php if($mission_data['status'] =='2') echo 'selected'?>>
										Completed Mission
									</option>
								</select>
							</div>						
						</div>
					</form>
					<!--end::Form-->
				</div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <div class="m-form__section m-form__section--last">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">
                            Images
                        </h3>
                    </div>
                    <div class="m-form m-form--label-align-right m--margin-top-30 m--margin-bottom-30">
                        <?php
                        {
                            $json_data = json_decode($mission_data['image']);
                            $image_path = base_url().'upload/image/';
                            foreach((array)$json_data as $item)
                            {
                                echo '<img src="'.$image_path.$item.'" alt="ThumbnailImage" width="100px" height="100px" style="margin:20px;">';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <?php
                    $json_data = json_decode($mission_data['video']);
                    if(count($json_data)) {
                        $video_path = base_url().'upload/video/';
                ?>
                <div class="m-form__section m-form__section--last">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">
                            Video
                        </h3>
                    </div>
                    <div class="m-form m-form--label-align-right m--margin-top-30 m--margin-bottom-30">
                        <?php
                            foreach((array)$json_data as $item)
                            {
                                echo '<video width="200px" height="150px" controls><source src="'.$video_path.$item.'"></video>';
                            }
                        ?>
                    </div>
                </div>
				<div class="m-form__seperator m-form__seperator--dashed"></div>
                <?php
                    }
                ?>
				<div class="m-form__section m-form__section--last">
					<div class="m-form__heading">
						<h3 class="m-form__heading-title">
							Trip Details
						</h3>
					</div>
					<!--begin: Search Form -->
					<div class="m-form m-form--label-align-right m--margin-top-30 m--margin-bottom-30">
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
								</div>
							</div>
							<div class="col-xl-4 order-1 order-xl-2 m--align-right">
								<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
									<span>
										<i class="la la-plus-circle"></i>
										<span>
											<?=$this->lang->line('add_trip')?>
										</span>
									</span>
								</a>
								<div class="m-separator m-separator--dashed d-xl-none"></div>
							</div>
						</div>
					</div>
					<!--end: Search Form -->
					<!--begin: Datatable -->
					<table class="m-datatable" id="edit_mission" width="100%">
						<thead>
							<tr>
								<th>Trip Name</th>
								<th>Image</th>
								<th>Video</th>
								<th>Short Description</th>
								<th>Reward Point</th>
								<th>Address</th>
								<th>Date Created</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($trip_list as $key=>$trip) {
									$array_images = explode(',', $trip['image']);
									$image_path = base_url().'upload/image/'.$array_images[0];
									$array_videos = explode(',', $trip['video']);
									$video_path = base_url().'upload/video/'.$array_videos[0];
									echo '<td>'.$trip['name'].'</td>';
									echo '<td><a target="_blank" href="'.$image_path.'"><img src="'.$image_path.'" alt="ThumbnailImage" width="100px" height="100px"></a></td>';
									echo '<td><video width="200px" height="150px" controls><source src="'.$video_path.'"></video></td>';
									echo '<td>'.$trip['description'].'</td>';
									echo '<td>'.$trip['reward_point'].'</td>';
									echo '<td>'.$trip['address'].'</td>';
									echo '<td>'.$trip['created_at'].'</td>';
									echo '<td>'.$trip['is_completed'].'</td>';
									echo '<td><a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Trip"><i class="la la-edit"></i></a>
										<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"><i class="la la-trash"></i></a></td></tr>';
								}
							?>
						</tbody>
					</table>
					<!--end: Datatable -->
				</div>
			</div>
		</form>
		<div class="m-portlet__foot">
			<div class="m-form__actions m-form__actions">
				<button type="reset" class="btn btn-primary" id="save_btn">
                    <?=$this->lang->line('update_btn')?>
				</button>
				<button onclick="location.href='<?=site_url('admin/mission/mission_list')?>';" class="btn btn-secondary">
                    <?=$this->lang->line('cancel_btn')?>
				</button>
			</div>
		</div>
	</div>
</div>