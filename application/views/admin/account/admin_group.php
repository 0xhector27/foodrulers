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
						</div>
					</div>
					<div class="col-xl-4 order-1 order-xl-2 m--align-right">
						<a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" data-toggle="modal" data-target="#add_modal">
							<span>
								<i class="la la-user-plus"></i>
								<span>
									<?=$this->lang->line('add_group')?>
								</span>
							</span>
						</a>
						<div class="m-separator m-separator--dashed d-xl-none"></div>
					</div>
				</div>
			</div>
			<!--end: Search Form -->
			<!--begin: Datatable -->
			<table class="m-datatable" id="admin_group" width="100%">
				<thead>
					<tr>
						<th>Group Name</th>
						<th>Number of Admin</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($admin_group as $key=>$admin) {
							echo '<td>'.$admin['group_name'].'</td>';
							echo '<td>'.$admin['admin_count'].'</td>';
							echo '<td><a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit_btn" title="Edit" data-group_name="'.$admin['group_name'].'" data-id="'.$admin['id'].'"><i class="la la-edit"></i></a>
								<a class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete_btn" data-id="'.$admin['id'].'" title="Delete"><i class="la la-trash"></i></a></td></tr>';
						}
					?>
				</tbody>
			</table>
			<!--end: Datatable -->
		</div>
	</div>
</div>
<!--Add Group Modal-->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					<?=$this->lang->line('add_group')?>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form" id="add_form">
					<div class="row">
						<div class="form-group col-md-12">
							<label for="group_name" class="form-control-label">
								Group Name*
							</label>
							<input type="text" class="form-control" id="new_group" name="new_group" placeholder="Enter Group Name">
						</div>
					</div>
					<div class="row" style="float:right">
						<div class="form-group col-md-12">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								<?=$this->lang->line('cancel_btn')?>
							</button>
							<button type="button" class="btn btn-primary" id="save_btn">
								<?=$this->lang->line('save_btn')?>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--Edit Group Modal-->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					<?=$this->lang->line('edit_group')?>
				</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form" id="edit_form">
					<input type="hidden" id="group_id" name="group_id"/>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="group_name" class="form-control-label">
								Group Name*
							</label>
							<input type="text" class="form-control" name="edit_group" id="edit_group" placeholder="Enter Group Name">
						</div>
					</div>
					<div class="row" style="float:right">
						<div class="form-group col-md-12">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								<?=$this->lang->line('cancel_btn')?>
							</button>
							<button type="button" class="btn btn-primary" id="update_btn">
								<?=$this->lang->line('update_btn')?>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>