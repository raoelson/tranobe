<script>
	var where= new Array();
	<?php if(isset($where)):?>
	<?php  list($key,$val) = each($where) ?>
	where[0] = "<?php echo $key ?>";
	where[1] = "<?php echo $val ?>";
	<?php endif ?>
</script>

<div class="main-inner">
	<div class="container">
		<div class="row">
			<div class="span12">
				<span class="span5 btn-toolbar btn-group" style="margin-left:  0">
				          <a class="btn btn-primary" href="#"><i class="icon-edit"></i> Pour la séléction</a>
				          <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="icon-caret-down"></span></a>
				          <ul class="dropdown-menu">
					            <li><a href="javascript: user.action('active')"><i class="icon-ok"></i> Activer</a></li>
					            <li><a href="javascript: user.action('inactive')"><i class="icon-ban-circle"></i> Désactiver</a></li>
					             <li><a href="javascript: user.action('delete')"><i class="icon-trash"></i> Delete</a></li>
					           <!--  <li class="divider"></li>
					            <li><a href="#"><i class="i"></i> Make admin</a></li>--> 
				          </ul>
				</span>
				<?php if (empty($where)) :?>
				<span class="span5 btn-toolbar pull-right" style="text-align: right;">
					<a class="btn btn-primary" href="<?php echo base_url()?>admin.php/op/op/import"><i class="icon-upload"></i>
						Importer</a>
				</span>
				<?php endif ?>
				<div class="widget widget-table action-table">
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>
							<?php echo empty($div_title)?ucfirst($active):ucfirst($div_title) ?>
						</h3>
					</div>
					<!-- /widget-header -->
					
					<div class="widget-content">
						<table class="table table-striped table-bordered" id="main-table">
							<thead>
								<tr>
									<th><input type="checkbox" id="check_all"></th>
									<th>Région</th>
									<th>Ditrict</th>
									<th>Commune</th>
									<th>Fokontany</th>
									<th>Nom OP</th>
									<th>Filière prioritaire</th>
									<th class="td-actions"></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>

						<div class="well well-large well-transparent lead"
							id="loading-table" style="display: none">
							<i class="icon-spinner icon-spin icon-2x pull-left"></i> loading
							content...
						</div>

					</div>
					<!-- /widget-content -->
					
					<div class="pagination pull-right">
						
					</div>
					
				</div>
				<!-- /widget -->

			</div>
			<!-- /span12 -->

		</div>
		<!-- /row -->

		<div class="row" id="main-form" style="display: none">
			<div class="span8">
            	<div id="ancre"></div>
				<div class="widget ">
					<div class="widget-header">
						<i class="icon-user"></i>
						<h3>Edition d'un utilisateur</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#profile" data-toggle="tab">Profile</a>
								</li>
								<!-- <li><a href="#settings" data-toggle="tab">Settings</a> </li>-->

							</ul>
							<br>
							<div class="tab-content">
								<div class="tab-pane active" id="profile">
									<div class="alert" id="alert" style="display: none;">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<p></p>
									</div>
									<form id="edit-profile" class="form-horizontal">
										<input type="hidden" id="iduser" value="null">
										<fieldset>
											<div class="control-group">
												<label class="control-label" for="username">Login</label>
												<div class="controls">
													<input type="text" class="input-medium disabled" id="login"
														value="goideate" disabled="disabled">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="firstname">Nom</label>
												<div class="controls">
													<input type="text" class="input-medium" id="username"
														value="">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="lastname">Num&eacute;ro
													t&eacute;lephone</label>
												<div class="controls">
													<input type="text" class="input-medium" id="numtel"
														value="+261">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="email">Adresse Email</label>
												<div class="controls">
													<input type="text" class="input-large" id="email"
														placeholder="user@host.com">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->
											<div class="control-group">
												<label class="control-label" for="code_district">District</label>
												<div class="controls">
													<?php $current = 0 ?>
													<select name="code_district" id=code_district >
														<option></option>
														<?php foreach ($districts as $district) : ?>
														<?php
														if ($district->idregion > $current) {
								                            $current = $district->idregion;
								                            echo '</optgroup><optgroup label="' . strtoupper($district->nom_region) . '">';
								                        }
								                        ?>
														<option value="<?php echo $district->code_district ?>">
															<?php echo ucwords(strtolower($district->nom_district)) ?>
														</option>
														<?php endforeach ?>
														</optgroup>
													</select>
												</div>
											</div>

											<br> <br>
											<div class="control-group">
												<label class="control-label" for="password1">Password</label>
												<div class="controls">
													<input type="password" class="input-medium" id="password"
														value="">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="password2">Confirm</label>
												<div class="controls">
													<input type="password" class="input-medium"
														id="password-confirm" value="">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<br>
											<div class="form-actions">
												<a class="btn btn-primary" href="javascript: user.save()">Save</a>
												<a class="btn" href="javascript: user.cancel()">Cancel</a>
											</div>
											<!-- /form-actions -->
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /widget-content -->
				</div>
				<!-- /widget -->
			</div>
			<!-- /span8 -->
			<div class="span4">
				<div class="widget widget-box">
					<div class="widget-header">
						<h3>Groupes</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<div class="control-group">
								<?php foreach($groups as $group) :?>
								<div class="controls" style="padding-top: 10px">
									<input type="checkbox" class="groupclass" id="group_<?php echo $group->idgroup ?>" value="<?php echo $group->groupname ?>">
									&nbsp;&nbsp;<?php echo $group->groupname ?>
								</div>
								<?php endforeach ?>
								<!-- /controls -->
						</div>
											<!-- /control-group -->
					</div>
					<!-- /widget-content -->

				</div>
				<!-- /widget-box -->

			</div>
			<!-- /span4 -->

		</div>
	</div>
	<!-- /container -->

</div>
<!-- /main-inner -->

