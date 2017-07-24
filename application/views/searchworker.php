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
								<div class="bbxh-left">List Worker</div>
								<div class="bbxh-right">
									<!--<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>worker/printbychecklist">Print by Checklist Today</a></div>
									<div class="bbxhr-toogle"><a href="<?php echo base_url(); ?>member/addmember"><img src="<?php echo base_url(); ?>assets/images/add.png" /></a></div>
									<div class="bbxhr-toogle"><a href="#" id="button-tootle1"><img src="<?php echo base_url(); ?>assets/images/toogle.png" /></a></div>
									<div class="bbxhr-close"><a href="#" id="button-close1"><img src="<?php echo base_url(); ?>assets/images/close.png" /></a></div>
									<div class="clear"></div>-->
								</div>
								<div class="clear"></div>
							</div> 
							<div class="bbox-cont" id="box-cont1">
								<div class="formsearch">
								<form method="post" action="<?php echo base_url(); ?>worker/searchworker" autocomplete="off">
									<label>Filter : </label>
									<input type="text" name="searchkey" class="input-select" placeholder="Worker Email"/>
									<input type="submit" name="submit" value="Search" />
								</form>
								</div>
								<!--<form action='<?php echo base_url(); ?>worker/showitemsworker' method='post' target="_blank">
								
								<div class="formsearch">
									<input type='submit' name='submit' value='Cetak semua faktur yang dipilih' />
									<input type='submit' name='submit' value='Cetak berdasarkan abjad' />
									<input type='submit' name='submit' value='Cetak berdasarkan nomor urut order' />
									<input type='submit' name='submit' value='Cetak 1 faktur saja yang dipilih' />
									<input type='submit' name='submit' value='Kirim AWB JNE yang dipilih' />
								</div>-->
								<table cellpadding="0" cellspacing="0" >
									<tr>
										<!--<th><input type='checkbox' name=pilih onClick='ceksemua()' id='cekbox'></th>-->
										<th>No</th>
										<th>Barcode ID</th>
										<th>Fullname</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Tgl Masuk</th>
										<th>Tgl Keluar</th>
										<th>Jabatan</th>
										<th>Gaji</th>
										<th>Create Date</th>
										<th>Status</th>
										<th class="lastTH">Action</th>
									</tr>
									<?php
									$indexcek = 0;
									foreach($getworker as $nwo) :
									if($no % 2 == 0) { ?>
										<tr style="background-color:#ffffff;" id='tr<?php echo $indexcek; ?>'>
									<?php } else { ?>
										<tr style="background-color:#fafafa;" id='tr<?php echo $indexcek; ?>'>
									<?php } ?>
										<!--<td valign=top align=center><input type=checkbox name=inbox[] value='<?php echo $nwo->orderid; ?>' id='bukuid<?php echo $indexcek; ?>' /></td>-->
										<td valign=top align=center><?php echo $no; ?></td>
										<td valign=top>
											<?php echo $nwo->worker_barcodeid; ?>
										</td>
										<td valign=top>
											<?php echo $nwo->worker_fullname; ?>
										</td>
										<td valign=top>
											<?php echo $nwo->worker_address; ?>
										</td>
										<td valign=top>
											<?php echo $nwo->worker_phone; ?>
										</td>
										<td valign=top>
											<?php echo $nwo->worker_email; ?>
										</td>
										<td valign=top>
											<?php echo $nwo->worker_startdate; ?>
										</td>
										<td valign=top>
											<?php echo $nwo->worker_enddate; ?>
										</td>
										<td valign=top align=center>
											<?php echo $nwo->worker_position; ?>
										</td>
										<td valign=top align=center>
											Rp. <?php echo number_format($nwo->worker_salary, 0, '.', '.'); ?>
										</td>
										<td valign=top align=center>
											<?php echo $nwo->worker_createdate; ?>
										</td>
										<td valign=top align=center>
											<a href="<?php echo base_url(); ?>worker/updateworker/<?php echo $nwo->id_worker_record; ?>"><?php echo $nwo->worker_status; ?></a>
										</td>
										<td valign=top align=center class="lastTD">
											<a href="<?php echo base_url(); ?>worker/editworker/<?php echo $nwo->id_worker_record; ?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png" alt="Edit" title="Edit" width="13px"/></a>
											<a href="<?php echo base_url(); ?>worker/deleteworker/<?php echo $nwo->id_worker_record; ?>" onClick="return confirm('Are you sure want to delete?');"><img src="<?php echo base_url(); ?>assets/images/cross.png" alt="Delete" title="Delete" width="13px"/></a>
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
								<div class="bb-pagination">&nbsp;</div>
								<div class="bb-button">
									<a href="<?php echo base_url(); ?>worker/addworker"><input type="button" name="show-all" value="Add Worker" /></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div> <!-- End of cr-bottom -->
