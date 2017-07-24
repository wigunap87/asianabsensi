<script type="text/javascript">
	var jumlahnya;
	function ceksemua(){
		jumlahnya = document.getElementById("jumlahcek").value;
		if(document.getElementById("cekbox").checked==true){
			for(i=0;i<jumlahnya;i++){
				idcek = "bukuid"+i;
				idtr = "tr"+i;
				document.getElementById(idtr).style.backgroundColor = "none";
				document.getElementById(idcek).checked = true;
			}
		}else{
			for(i=0;i<jumlahnya;i++){
				idcek = "bukuid"+i;
				idtr = "tr"+i;
				document.getElementById(idtr).style.backgroundColor = "none";
				document.getElementById(idcek).checked = false;
			}
		}
	}
</script>
<div class="cr-bottom">
						<div class="crb-box" id="box-small1">
							<div class="bbox-head">
								<div class="bbxh-left">Today Absensi</div>
								<div class="bbxh-right">
									&nbsp;
								</div>
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
										<th>T Status</th>
										<th>Status</th>
										<th class="lastTH">Action</th>
									</tr>
									<?php
									$indexcek = 0;
									foreach($getabsensi as $nwo) :
									if($nwo->absensi_status == 'Masuk') { 
										if($nwo->absensi_tstatus == 'Telat') { ?>
										<tr style="background-color:#ffe1e1;" id='tr<?php echo $indexcek; ?>'>
										<?php } else { ?>
										<tr style="background-color:#e2ffe1;" id='tr<?php echo $indexcek; ?>'>
										<?php } ?>
									<?php } else if($nwo->absensi_status == 'Izin' or $nwo->absensi_status == 'Sakit') { ?>
										<tr style="background-color:#fdffe1;" id='tr<?php echo $indexcek; ?>'>
									<?php } else { ?>
										<tr style="background-color:#f3e1ff;" id='tr<?php echo $indexcek; ?>'>
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
											<?php echo $nwo->absensi_tstatus; ?>
										</td>
										<td valign=top align=center>
											<?php echo $nwo->absensi_status; ?>
										</td>
										<td valign=top align=center class="lastTD">
											<a href="<?php echo base_url(); ?>absensi/editabsensi/<?php echo $nwo->id_absensi_record; ?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png" alt="Edit" title="Edit" width="13px"/></a>
											<a href="<?php echo base_url(); ?>absensi/deleteabsensi/<?php echo $nwo->id_absensi_record; ?>" onClick="return confirm('Are you sure want to delete?');"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
										</td>
									</tr>
									<?php $indexcek++; $no++; endforeach; ?>
									
								</table>
								<input type=hidden id='jumlahcek' value='<?php echo $indexcek; ?>' name='jumlahcek'>
								<!--<div class="formsearch">
									<input type='submit' name='submit' value='Cetak semua faktur yang dipilih' />
									<input type='submit' name='submit' value='Cetak berdasarkan abjad' />
									<input type='submit' name='submit' value='Cetak berdasarkan nomor urut order' />
									<input type='submit' name='submit' value='Cetak 1 faktur saja yang dipilih' />
									<input type='submit' name='submit' value='Kirim AWB JNE yang dipilih' />
								</div>
								</form>-->
							</div>
							
							<div class="bbox-bottom" id="box-bottom1">
								<div class="bb-pagination"><?php echo $paginator; ?></div>
								<div class="bb-button">
									<a href="<?php echo base_url(); ?>absensi/addabsensi"><input type="button" name="show-all" value="Add Absensi" /></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->
