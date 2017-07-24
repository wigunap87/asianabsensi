<?php foreach($getsingle as $gsing) : ?>
					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Edit Worker - <?php echo $gsing->worker_fullname; ?></div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<?php echo $this->session->flashdata('errorworker'); ?>
							<form method="post" action="<?php echo base_url(); ?>worker/editworker_process" name="add-province" id="add-province" enctype="multipart/form-data" data-toggle="validator">
							<div class="bbox-cont" id="box-cont1">
								<input type="hidden" name="getid" value="<?php echo $gsing->id_worker_record; ?>" />
								<div class="fieldpage">
									<div class="fieldpage-title">Barcode ID<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="barcodeid" class="input-form" value="<?php echo $gsing->worker_barcodeid; ?>" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Fullname<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="fullname" class="input-form" value="<?php echo $gsing->worker_fullname; ?>" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Address<font color="red">*</font></div>
									<div class="fieldpage-info">
										<textarea name="address" cols=20 rows=5 class="input-form" required><?php echo $gsing->worker_address; ?></textarea>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Phone<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="numeric" name="phone" class="input-form" value="<?php echo $gsing->worker_phone; ?>" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Email<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="email" name="email" class="input-form" value="<?php echo $gsing->worker_email; ?>" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Tanggal Masuk</div>
									<div class="fieldpage-info">
										<input type="text" name="startdate" class="input-form" value="<?php echo $gsing->worker_startdate; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Tanggal Keluar</div>
									<div class="fieldpage-info">
										<input type="text" name="enddate" class="input-form" value="<?php echo $gsing->worker_enddate; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Jabatan</div>
									<div class="fieldpage-info">
										<input type="text" name="position" class="input-form" value="<?php echo $gsing->worker_position; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Salary</div>
									<div class="fieldpage-info">
										<input type="text" name="salary" class="input-form" value="<?php echo $gsing->worker_salary; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Status<font color="red">*</font></div>
									<div class="fieldpage-info">
										<select name="status" class="input-select" required>
											<option value="<?php echo $gsing->worker_status; ?>"><?php echo $gsing->worker_status; ?></option>
											<option value="Unpublish">-- Choose</option>
											<option value="Publish">Publish</option>
											<option value="Unpublish">Unpublish</option>
										</select>
									</div>
									<div class="clear"></div>
								</div>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<input type="submit" name="submit" value="Save" />
							</div>
							</form>
						</div>
						
					</div> <!-- End of cr-bottom -->
					
<?php endforeach; ?>