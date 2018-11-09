<!-- BEGIN: Subheader -->
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<i class="m-nav__link-icon la la-home"></i>
			<h3 class="m-subheader__title m-subheader__title--separator m--margin-left-20">
				<?=$header_data['title']?>
			</h3>
		</div>
	</div>
</div>
<!-- END: Subheader -->
<div class="m-content">
	<div class="row">                                                                                                                      
        <div class="col-lg-6">
            <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h1>
                                <b class="counter"><span id="admin_count"><?=$admin_count?></span></b>
                            </h1>
                            <h2 class="m-portlet__head-label m-portlet__head-label--danger">
                                <span class="flaticon-profile-1">
                                    <a style="color:#fff;" href="<?=base_url()?>admin/account/admin_list"><?=$this->lang->line('total_admins')?></a>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h1>
                                <b class="counter"><span id="member_count"><?=$member_count?></span></b>
                            </h1>
                            <h2 class="m-portlet__head-label m-portlet__head-label--warning">
                                <span class="flaticon-users">
                                    <a style="color:#fff;" href="<?=base_url()?>admin/member/member_list"><?=$this->lang->line('total_members')?></a>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h5><b class="counter m--font-info"><span>New Missions&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;</span><span id="new_count"><?=$new_mission_count?></span></b></h5><br>
                            <h5><b class="counter m--font-warning"><span>Half Missions&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;</span><span id="half_count"><?=$half_mission_count?></span></b></h5><br>
                            <h5><b class="counter m--font-danger"><span>Completed Missions&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;</span><span id="completed_count"><?=$completed_mission_count?></span></b></h5><br>
                            <h2 class="m-portlet__head-label m-portlet__head-label--accent">
                                <span class="flaticon-location">
                                    <a style="color:#fff;" href="<?=base_url()?>admin/mission/mission_list"><?=$this->lang->line('total_missions')?></a>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h5><b class="counter m--font-info"><span>New Challenges&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;</span><span id="new_count"><?=$new_challenge_count?></span></b></h5><br>
                            <h5><b class="counter m--font-danger"><span>Completed Challenges&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;</span><span id="completed_count"><?=$completed_challenge_count?></span></b></h5><br>
                            <h2 class="m-portlet__head-label m-portlet__head-label--info">
                                <span class="flaticon-share">
                                    <a style="color:#fff;" href="<?=base_url()?>admin/challenge/challenge_list"><?=$this->lang->line('total_challenges')?></a>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
