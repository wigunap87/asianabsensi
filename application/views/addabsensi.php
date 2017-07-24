					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Add Absensi</div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<?php echo $this->session->flashdata('errorabsensi'); ?>
							<form method="post" action="<?php echo base_url(); ?>absensi/addabsensi_process" name="add-province" id="add-province" enctype="multipart/form-data" data-toggle="validator">
							<div class="bbox-cont" id="box-cont1">
								
								<div class="fieldspage">
									<div class="fieldpage-title">Pegawai<font color="red">*</font></div>
									<div class="fieldpage-info">
										<select name="worker" class="input-select" required>
											<option value="">-- Pilih</option>
											<?php foreach($getworker as $gw) : 
												echo '<option value="'.$gw->id_worker_record.'">'.$gw->worker_fullname.' - '.$gw->worker_barcodeid.'</option>';
												endforeach; ?>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Tanggal<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="tanggal" class="input-form" value="<?php echo date('Y-m-d'); ?>" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Jam Masuk<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="morningtime" class="input-form" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Jam Istirahat<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="restout" class="input-form" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Jam Masuk Setelah Istirahat<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="numeric" name="restin" class="input-form" required/>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Jam Pulang</div>
									<div class="fieldpage-info">
										<input type="text" name="gohome" class="input-form" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Setting Jam Masuk Istirahat<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="srest" class="input-form" required />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Notes</div>
									<div class="fieldpage-info">
										<textarea rows="5" name="notes" class="input-form"></textarea>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Telat Status<font color="red">*</font></div>
									<div class="fieldpage-info">
										<select name="tstatus" class="input-select" required>
											<option value="Telat">Telat</option>
											<option value="Tepat Waktu">Tepat Waktu</option>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Status<font color="red">*</font></div>
									<div class="fieldpage-info">
										<select name="status" class="input-select" required>
											<option value="Masuk">Masuk</option>
											<option value="Sakit">Sakit</option>
											<option value="Alpha">Alpha</option>
											<option value="Izin">Izin</option>
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