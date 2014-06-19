<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="widget wgreen">
              						<div class="widget-head">
									  <div class="pull-left">Form Registrasi Surat Keluar</div>
									  <div class="clearfix"></div>
									</div>
									<div class="widget-content">
									  <div class="padd">
										<?php require_once('lib/mainClass.php'); ?>
										<h6>Form Registrasi Surat Keluar</h6>
										<hr />
										<!-- Form starts.  -->
											<form enctype="multipart/form-data" class="form-horizontal" role="form" action="control/proses.php?do=save_sk" method="post">
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
													<input type="text" class="form-control" name="no_reg_sk" placeholder="" value="">
												  </div>
												</div>
                                                <div class="form-group">
												  <label class="col-md-2 control-label">Tujuan</label>
												  <div class="col-md-8">
													<input type="text" class="form-control" name="asal" placeholder="">
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