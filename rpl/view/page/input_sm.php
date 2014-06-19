<?php
  if(isset($_GET['edit']))
    {
		if($_GET['edit']=='true')
		  { 
		  $id_suratmasuk = $_GET['id'];
		  
		  require_once('lib/mainClass.php');
		  $sm = new suratmasuk();
		  $surat_masuk = $sm->cari_sm($id_suratmasuk);
		  
		  foreach($surat_masuk as $data_surat)
		    {
				
		  ?>
          
<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="widget wgreen">
              						<div class="widget-head">
									  <div class="pull-left">Form Registrasi Surat Masuk</div>
									  <div class="clearfix"></div>
									</div>
									<div class="widget-content">
									  <div class="padd">
										<?php require_once('lib/mainClass.php'); ?>
										<h6>Form Registrasi Surat Masuk</h6>
										<hr />
										<!-- Form starts.  -->
											<form enctype="multipart/form-data" class="form-horizontal" role="form" action="control/proses.php?do=edit_sm" method="post">
												<div class="form-group">
												  <label class="col-md-2 control-label">Jenis Surat</label>
												  <div class="col-md-8">
													<select class="form-control" name="jenis_surat">
                                                      <?php
													    $listsurat = new jenissurat();
														$x=1;
														$data = $listsurat->listjenissurat();
														foreach($data as $datajenis)
														  {
															  echo '<option value="'.$datajenis['id'].'">'.$datajenis['jenis_surat'].'</option>'; 
														  }
													  ?>
                                                    </select>
												  </div>
												</div>
												<div class="form-group">
												  <label class="col-md-2 control-label">No Registrasi Surat</label>
												  <div class="col-md-8">
                                                    <?php
													  //$id_surat = new suratmasuk();
													  //$reg = $id_surat->reg_id_surat();
													?>
													<input type="text" class="form-control" name="no_reg_sm" value="<?php echo $data_surat['no_register']; ?>" readonly="readonly">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">No Surat Pengirim</label>
												  <div class="col-md-8">
													<input type="text" class="form-control" name="no_surat_pengirim" placeholder="" value="<?php echo $data_surat['no_suratpengirim']; ?>">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Asal</label>
												  <div class="col-md-8">
													<input type="text" class="form-control" name="asal" placeholder="" value="<?php 
		  echo $data_surat['asal']; ?>">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tanggal Surat</label>
												  <div class="col-md-8">
													<input type="date" class="form-control" name="tgl_surat" placeholder="" value="<?php echo $data_surat['tgl_surat']; ?>">
												  </div>
												</div>
												<div class="form-group">
												  <label class="col-md-2 control-label">Perihal</label>
												  <div class="col-md-8">
													<textarea class="form-control" rows="3" name="perihal" placeholder=""><?php echo $data_surat['perihal']; ?></textarea>
												  </div>
												</div> 
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Keterangan</label>
												  <div class="col-md-8">
													<textarea class="form-control" rows="3" name="keterangan" placeholder=""><?php echo $data_surat['keterangan']; ?></textarea>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tanda Tangan Oleh</label>
												  <div class="col-md-8">
													<input type="text" class="form-control" name="ttd_oleh" placeholder="" value="<?php echo $data_surat['ttd_oleh']; ?>">
												  </div>
												</div> 
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tembusan</label>
												  <div class="col-md-8">
													<input type="text" class="form-control" name="tembusan" placeholder="" value="<?php echo $data_surat['tembusan']; ?>">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Upload File</label>
												  <div class="col-md-8">
													<input type="file" class="" name="nama_file" placeholder="">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tanggal Input</label>
												  <div class="col-md-8">
													<input type="date" class="form-control" name="tgl_input" placeholder="" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Input by</label>
												  <div class="col-md-8">
													<input type="text" class="form-control" name="username" placeholder="<?php echo $_SESSION['jabatan']; ?>" readonly="readonly" >
                                                    <input type="hidden" name="input_by" value="<?php echo $_SESSION['id_user']; ?>"  />
												  </div>
												</div>												                                
												<div class="form-group">
												  <div class="col-md-offset-2 col-md-8">
                                                    <input type="hidden" name="id_surat" value="<?php echo $_GET['id']; ?>" />
													<input type="submit" class="btn btn-primary" name="update" value="Update"/>
												  </div>
												</div>
											</form>
									  </div>
									</div>
								</div>  
							</div>
						</div>
					</div>
		  <?php }
		  }
	}
   else
     {
?>
<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="widget wgreen">
              						<div class="widget-head">
									  <div class="pull-left">Form Registrasi Surat Masuk</div>
									  <div class="clearfix"></div>
									</div>
									<div class="widget-content">
									  <div class="padd">
										<?php require_once('lib/mainClass.php'); ?>
										<h6>Form Registrasi Surat Masuk</h6>
										<hr />
										<!-- Form starts.  -->
											<form enctype="multipart/form-data" class="form-horizontal" role="form" action="control/proses.php?do=save_sm" method="post">
												<div class="form-group">
												  <label class="col-md-2 control-label">Jenis Surat</label>
												  <div class="col-md-8">
													<select class="form-control" name="jenis_surat">
                                                      <?php
													    $listsurat = new jenissurat();
														$x=1;
														$data = $listsurat->listjenissurat();
														foreach($data as $datajenis)
														  {
															  echo '<option value="'.$datajenis['id'].'">'.$datajenis['jenis_surat'].'</option>'; 
														  }
													  ?>
                                                    </select>
												  </div>
												</div>
												<div class="form-group">
												  <label class="col-md-2 control-label">No Registrasi Surat</label>
												  <div class="col-md-8">
                                                    <?php
													  $id_surat = new suratmasuk();
													  $reg = $id_surat->reg_id_surat();
													?>
													<input type="text" class="form-control" name="no_reg_sm" placeholder="" value="<?php echo $reg; ?>" readonly="readonly">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">No Surat Pengirim</label>
												  <div class="col-md-8">
													<input type="text" class="form-control" name="no_surat_pengirim" placeholder="">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Asal</label>
												  <div class="col-md-8">
													<input type="text" class="form-control" name="asal" placeholder="">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tanggal Surat</label>
												  <div class="col-md-8">
													<input type="date" class="form-control" name="tgl_surat" placeholder="">
												  </div>
												</div>
												<div class="form-group">
												  <label class="col-md-2 control-label">Perihal</label>
												  <div class="col-md-8">
													<textarea class="form-control" rows="3" name="perihal" placeholder=""></textarea>
												  </div>
												</div> 
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Keterangan</label>
												  <div class="col-md-8">
													<textarea class="form-control" rows="3" name="keterangan" placeholder=""></textarea>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tanda Tangan Oleh</label>
												  <div class="col-md-8">
													<input type="text" class="form-control" name="ttd_oleh" placeholder="">
												  </div>
												</div> 
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tembusan</label>
												  <div class="col-md-8">
													<input type="text" class="form-control" name="tembusan" placeholder="">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Upload File</label>
												  <div class="col-md-8">
													<input type="file" class="" name="nama_file" placeholder="">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tanggal Input</label>
												  <div class="col-md-8">
													<input type="date" class="form-control" name="tgl_input" placeholder="" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Input by</label>
												  <div class="col-md-8">
													<input type="text" class="form-control" name="username" placeholder="<?php echo $_SESSION['jabatan']; ?>" readonly="readonly" >
                                                    <input type="hidden" name="input_by" value="<?php echo $_SESSION['id_user']; ?>"  />
												  </div>
												</div>												                                
												<div class="form-group">
												  <div class="col-md-offset-2 col-md-8">
													<input type="submit" class="btn btn-primary" name="save" value="Save"/>
												  </div>
												</div>
											</form>
									  </div>
									</div>
								</div>  
							</div>
						</div>
					</div>
<?php } ?>