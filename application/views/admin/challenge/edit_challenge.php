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
                <form class="m-form" id="edit_form" method="POST">
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="m-form__group row">
                                <input value="<?=$challenge_data['id']?>" hidden name="id">
                                <div class="form-group col-lg-6">
                                    <label>
                                        <?=$this->lang->line('name')?>:
                                    </label>
                                    <input value="<?=$challenge_data['name']?>" type="text" class="form-control m-input" name="name" placeholder="Enter Challenge Name">
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
                                        <input value="<?=$challenge_data['reward_point']?>" type="number" class="form-control m-input" placeholder="99">
                                    </div>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label>
                                        <?=$this->lang->line('num_rewards')?>
                                    </label>
                                    <input value="<?=$challenge_data['reward_num']?>" type="number" class="form-control m-input" name="reward_num" placeholder="99">
                                </div>
                            </div>
                            <div class="m-form__group">
                                <label>
                                    <?=$this->lang->line('description')?>
                                </label>
                                <textarea class="form-control m-input" placeholder="Enter Description" row="3"><?=$challenge_data['description']?></textarea>
                            </div>
                            <div class="m-form__group row">
                                <div class="form-group col-lg-6">
                                    <label>
                                        <?=$this->lang->line('start_time')?>:
                                    </label>
                                    <div class="input-group date">
                                        <input value="<?=$challenge_data['start_time']?>" type="text" class="form-control m-input" readonly placeholder="Select start time" id="start_time" name="start_time" />
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
                                        <input value="<?=$challenge_data['end_time']?>" type="text" class="form-control m-input" readonly placeholder="Select end time" id="end_time" name="end_time" />
                                        <div class="input-group-append">
											<span class="input-group-text">
												<i class="la la-calendar-check-o glyphicon-th"></i>
											</span>
                                        </div>
                                    </div>
                                </div>
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
                                        $json_data = json_decode($challenge_data['image']);
                                        $image_path = base_url().'upload/image/';
                                        foreach((array)$json_data as $item)
                                        {
                                            echo '<img src="'.$image_path.$item.'" alt="ThumbnailImage" width="200px" height="200px" style="margin:20px;">';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed"></div>
                            <?php
                                $json_data = json_decode($challenge_data['video']);
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
                                            echo '<video width="720px" height="480px" controls><source src="'.$video_path.$item.'"></video>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <button type="reset" class="btn btn-primary" id="save_btn">
                                <?=$this->lang->line('update_btn')?>
                            </button>
                            <button type="reset" onclick="location.href='<?=site_url('admin/challenge/challenge_list')?>';"  class="btn btn-secondary">
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