<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="widget wgreen">
              						<div class="widget-head">
									  <div class="pull-left">Detail Surat Keluar</div>
									  <div class="clearfix"></div>
									</div>
									<div class="widget-content">
									  <div class="padd">
										<?php require_once('lib/mainClass.php'); ?>
										<h6>Detail Surat Keluar</h6>
										<hr />
										<!-- Form starts.  -->
                                        <form enctype="multipart/form-data" class="form-horizontal" role="form" action="control/proses.php?do=disposisi" method="post">
                                          <?php
										    $sk = new suratkeluar();
											$skd = $sk->cari_sk($_GET['id']);
											foreach($skd as $surat_keluar)
											  {
												  if($surat_keluar['id_user']==$_SESSION['id_user'])
													    { ?>
															<!--<a href="index.php?layout=input_sk&id=<?php echo $_GET['id']; ?>&notif=<?php echo $_GET['notif']; ?>&edit=true" class="btn btn-primary">Edit</a>-->
                                                            <a href="control/proses.php?do=delete_sk&id=<?php echo $_GET['id']; ?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-primary">Delete</a>
														<?php }
										  ?>
												<div class="form-group">
												  <label class="col-md-2 control-label">Jenis Surat</label>
												  <div class="col-md-8">
													
                                                      <?php
													   $listsurat = new jenissurat();
														$x=1;
														$data = $listsurat->cari_listjenissurat($surat_keluar['id_jenissurat']);
														foreach($data as $datajenis)
														  {
															 // echo '<option value="'.$datajenis['id'].'">'.$datajenis['jenis_surat'].'</option>'; 
															 echo $datajenis['jenis_surat'];
														  }
													  ?>
												  </div>
												</div>
												<div class="form-group">
												  <label class="col-md-2 control-label">No Registrasi Surat</label>
												  <div class="col-md-8">
                                                    <?php echo $surat_keluar['no_register']; ?>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tujuan</label>
												  <div class="col-md-8">
                                                    <?php echo $surat_keluar['asal']; ?>
												  </div>
												</div>
												<div class="form-group">
												  <label class="col-md-2 control-label">Perihal</label>
												  <div class="col-md-8">
                                                    <?php echo $surat_keluar['perihal']; ?>
												  </div>
												</div> 
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Keterangan</label>
												  <div class="col-md-8">
                                                    <?php echo $surat_keluar['keterangan']; ?>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tanda Tangan Oleh</label>
												  <div class="col-md-8">
                                                    <?php echo $surat_keluar['ttd_oleh']; ?>
												  </div>
												</div> 
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tembusan</label>
												  <div class="col-md-8">
                                                    <?php echo $surat_keluar['tembusan']; ?>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">File</label>
												  <div class="col-md-8">
                                                    <a class="btn btn-warning" target="_blank" href="<?php echo $surat_keluar['file']; ?>" >Lihat Surat</a>
													
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tanggal Input</label>
												  <div class="col-md-8">
                                                     <?php echo $surat_keluar['tgl_input']; ?>
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Input by</label>
												  <div class="col-md-8">
                                                     <?php 
                                                      $jabatan = new userControl();
													 $nama_jabatan = $jabatan->cari_user($surat_keluar['id_user']);
													 foreach($nama_jabatan as $tes)
													   {
														   echo $tes['jabatan'];
													   }
                                                    ?>
												  </div>
												</div>	
                                                
                                              </form>
									  </div>
                                        <?php
											  }
											  ?>
									</div>
								</div>  
							</div>
						</div>
					</div>