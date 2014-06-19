<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="widget wgreen">
              						<div class="widget-head">
									  <div class="pull-left">Detail Surat Masuk</div>
									  <div class="clearfix"></div>
									</div>
									<div class="widget-content">
									  <div class="padd">
										<?php require_once('lib/mainClass.php'); 
										  if(isset($_GET['id']))
										    {
												$detail_sm = new suratmasuk();
												$data = $detail_sm->cari_sm($_GET['id']);
												
												$status = new disposisi();
												$status->read_disposisi($_GET['notif']);
												
												foreach($data as $list)
												  {
													  if($list['id_user']==$_SESSION['id_user'])
													    { ?>
															<a href="index.php?layout=input_sm&id=<?php echo $_GET['id']; ?>&notif=<?php echo $_GET['notif']; ?>&edit=true" class="btn btn-primary">Edit</a>
                                                            <a href="control/proses.php?do=delete_sm&id=<?php echo $_GET['id']; ?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-primary">Delete</a>
														<?php }
										?>
										<h6>Detail Surat Masuk</h6>
                                        <hr />
										<!-- Form starts.  -->
											<form enctype="multipart/form-data" class="form-horizontal" role="form" action="control/proses.php?do=disposisi" method="post">
												<div class="form-group">
												  <label class="col-md-2 control-label">Jenis Surat</label>
												  <div class="col-md-8">
													<!--<select class="form-control" name="jenis_surat">
                                                      
                                                    </select>-->
                                                    <?php
													    $listsurat = new jenissurat();
														$x=1;
														$data = $listsurat->cari_listjenissurat($list['id_jenissurat']);
														foreach($data as $datajenis)
														  {
															 // echo '<option value="'.$datajenis['id'].'">'.$datajenis['jenis_surat'].'</option>'; 
															 echo $datajenis['jenis_surat'];
														  }
													  ?>
                                                    <?php //echo $list['id_jenissurat']; ?>
                                                    
												  </div>
												</div>
												<div class="form-group">
												  <label class="col-md-2 control-label">No Registrasi Surat</label>
												  <div class="col-md-8">
													<?php echo $list['no_register']; ?>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">No Surat Pengirim</label>
												  <div class="col-md-8">
													<?php echo $list['no_suratpengirim']; ?>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Asal / Tujuant</label>
												  <div class="col-md-8">
													<?php echo $list['asal']; ?>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tanggal Surat</label>
												  <div class="col-md-8">
                                                    <?php echo $list['tgl_surat']; ?>
												  </div>
												</div>
												<div class="form-group">
												  <label class="col-md-2 control-label">Perihal</label>
												  <div class="col-md-8">
													<?php echo $list['perihal']; ?>
												  </div>
												</div> 
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Keterangan</label>
												  <div class="col-md-8">
                                                    <?php echo $list['keterangan']; ?>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tanda Tangan Oleh</label>
												  <div class="col-md-8">
													<?php echo $list['ttd_oleh']; ?>
												  </div>
												</div> 
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tembusan</label>
												  <div class="col-md-8">
													<?php echo $list['tembusan']; ?>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">File</label>
												  <div class="col-md-8">
                                                    <a class="btn btn-warning" target="_blank" href="<?php echo $list['file']; ?>" >Lihat Surat</a>
													
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tanggal Input</label>
												  <div class="col-md-8">
													<?php echo $list['tgl_input']; ?>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Input by</label>
												  <div class="col-md-8">
													<?php
													 $jabatan = new userControl();
													 $nama_jabatan = $jabatan->cari_user($list['id_user']);
													 foreach($nama_jabatan as $tes)
													   {
														   echo $tes['jabatan'];
													   }
													?>
												  </div>
												</div>	
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Disposisi</label>
												  <div class="col-md-8">
													<select class="form-control" name="id_user_penerima">
                                                      <?php
													    /*$listuser = new userControl();
														$x=1;
														$data = $listuser->listuser();
														foreach($data as $datauser)
														  {
															  echo '<option value="'.$datauser['id_user'].'">'.$datauser['jabatan'].'</option>'; 
														  }*/
														$jabatan = new disposisi();
													   $nama_jabatan = $jabatan->list_disposisi($list['id'],$_GET['notif']);
													   foreach($nama_jabatan as $nm)
														 {
															 echo '<option value="'.$nm['id_user'].'">'.$nm['jabatan'].'</option>';
														 }
													  ?>
                                                    </select>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Catatan</label>
												  <div class="col-md-8">
													<textarea class="form-control" name="catatan"></textarea>
												  </div>
												</div>
                                                <div class="form-group">
												  <div class="col-md-offset-2 col-md-8">
                                                    <input type="hidden" name="id_suratmasuk" value="<?php echo $list['id']; ?>" />
													<input type="submit" class="btn btn-primary" name="lanjutkan" value="Lanjutkan"/>
												  </div>
												</div>
											</form>
                                            <?php
												  }
											}
											?>
									  </div>
									</div>
								</div>  
							</div>
						</div>
					</div>