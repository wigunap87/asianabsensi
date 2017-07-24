	
					<div class="cr-bottom">
						
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Absensi Hari Ini</div>
								<!--<div class="bbxh-right">
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/backend/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/backend/images/close.png" /></a></div>
									<div class="clear"></div>
								</div>-->
								<div class="clear"></div>
							</div> 
							<div class="bbox-cont" id="box-cont1">
								<table cellpadding="0" cellspacing="0" >
									<tr>
										<th>No</th>
										<th>Pegawai</th>
										<th>Tanggal</th>
										<th>Jam Masuk</th>
										<th>Jam Istirahat</th>
										<th>Jam Masuk setelah Istirahat</th>
										<th>Jam Pulang</th>
										<th>Notes</th>
										<th>Create Date</th>
										<th>Status</th>
										<th class="lastTH">Action</th>
									</tr>
									<?php
									foreach($todayabsensi as $nwo) :
									if($nwo->absensi_status == 'Masuk') { ?>
										<tr style="background-color:#ffffff;">
									<?php } else { ?>
										<tr style="background-color:#fafafa;">
									<?php } ?>
										<!--<td valign=top align=center><input type=checkbox name=inbox[] value='<?php echo $nwo->orderid; ?>' id='bukuid<?php echo $indexcek; ?>' /></td>-->
										<td valign=top align=center><?php echo $no; ?></td>
										<td valign=top>
											<?php echo $nwo->worker_fullname; ?>
										</td>
										<td valign=top>
											<?php echo date('D, d F Y', strtotime($nwo->absensi_date)); ?>
										</td>
										<td valign=top align=center>
											<?php echo date('H:i:s', strtotime($nwo->absensi_morningtime)); ?>
										</td>
										<td valign=top align=center>
											<?php echo date('H:i:s', strtotime($nwo->absensi_restout)); ?>
										</td>
										<td valign=top align=center>
											<?php echo date('H:i:s', strtotime($nwo->absensi_restin)); ?>
										</td>
										<td valign=top align=center>
											<?php echo date('H:i:s', strtotime($nwo->absensi_gohome)); ?>
										</td>
										<td valign=top>
											<?php echo $nwo->absensi_notes; ?>
										</td>
										<td valign=top align=center>
											<?php echo $nwo->absensi_createdate; ?>
										</td>
										<td valign=top align=center>
											<?php echo $nwo->absensi_status; ?>
										</td>
										<td valign=top align=center class="lastTD">
											<a href="<?php echo base_url(); ?>absensi/editabsensi/<?php echo $nwo->id_absensi_record; ?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png" alt="Edit" title="Edit" width="13px"/></a>
											<a href="<?php echo base_url(); ?>absensi/deleteabsensi/<?php echo $nwo->id_absensi_record; ?>" onClick="return confirm('Are you sure want to delete?');"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
										</td>
									</tr>
									<?php $no++; endforeach; ?>
								</table>
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<a href="<?php echo site_url('absensi/today'); ?>"><input type="button" name="show-all" value="More.." /></a>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->