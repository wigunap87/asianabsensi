<?php foreach($getsingle as $gsing) : ?>
					<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Edit Absensi - <?php echo $gsing->worker_fullname; ?></div>
								<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<?php echo $this->session->flashdata('errorabsensi'); ?>
							<form method="post" action="<?php echo base_url(); ?>absensi/editabsensi_process" name="add-province" id="add-province" enctype="multipart/form-data" data-toggle="validator">
							<div class="bbox-cont" id="box-cont1">
								<input type="hidden" name="getid" <option value="<?php echo $gsing->id_absensi_record; ?>" />
								<div class="fieldspage">
									<div class="fieldpage-title">Pegawai</div>
									<div class="fieldpage-info">
										<select name="worker" class="input-select">
											<option value="<?php echo $gsing->id_worker_record; ?>"><?php echo $gsing->worker_fullname.' - '.$gsing->worker_barcodeid; ?></option>
											<option value="<?php echo $gsing->id_worker_record; ?>">-- Pilih</option>
											<?php foreach($getworker as $gw) : 
												echo '<option value="'.$gw->id_worker_record.'">'.$gw->worker_fullname.' - '.$gw->worker_barcodeid.'</option>';
												endforeach; ?>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Tanggal</div>
									<div class="fieldpage-info">
										<input type="text" name="tanggal" class="input-form" value="<?php echo $gsing->absensi_date;  ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Jam Masuk</div>
									<div class="fieldpage-info">
										<input type="text" name="morningtime" class="input-form" value="<?php echo $gsing->absensi_morningtime; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Jam Istirahat</div>
									<div class="fieldpage-info">
										<input type="text" name="restout" class="input-form" value="<?php echo $gsing->absensi_restout; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Jam Masuk Setelah Istirahat</div>
									<div class="fieldpage-info">
										<input type="numeric" name="restin" class="input-form" value="<?php echo $gsing->absensi_restin; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Setting Jam Masuk Istirahat<font color="red">*</font></div>
									<div class="fieldpage-info">
										<input type="text" name="srest" class="input-form" value="<?php echo $gsing->absensi_setafterrest; ?>" required />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Jam Pulang</div>
									<div class="fieldpage-info">
										<input type="text" name="gohome" class="input-form" value="<?php echo $gsing->absensi_gohome; ?>" />
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Notes</div>
									<div class="fieldpage-info">
										<textarea rows="5" name="notes" class="input-form"><?php echo $gsing->absensi_notes; ?></textarea>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldspage">
									<div class="fieldpage-title">Telat Status<font color="red">*</font></div>
									<div class="fieldpage-info">
										<select name="tstatus" class="input-select" required>
											<option value="<?php echo $gsing->absensi_tstatus; ?>"><?php echo $gsing->absensi_tstatus; ?></option>
											<option value="<?php echo $gsing->absensi_tstatus; ?>">-- Choose</option>
											<option value="Telat">Telat</option>
											<option value="Tepat Waktu">Tepat Waktu</option>
										</select>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="fieldpage">
									<div class="fieldpage-title">Status</div>
									<div class="fieldpage-info">
										<select name="status" class="input-select">
											<option value="<?php echo $gsing->absensi_status; ?>"><?php echo $gsing->absensi_status; ?></option>
											<option value="<?php echo $gsing->absensi_status; ?>">-- Choose</option>
											<option value="Masuk">Masuk</option>
											<option value="Sakit">Sakit</option>
											<option value="Alpha">Alpha</option>
											<option value="Izin">Izin</option>
											<option value="Telat">Telat</option>
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