                        <div class="widget wviolet">
									<div class="widget-head">
										<div class="pull-left">Pencarian Surat Masuk</div>
										<div class="clearfix"></div>
									</div>
									<div class="widget-content">
									<form enctype="multipart/form-data" class="form-horizontal" role="form" action="control/proses.php?do=cari&tipe=sm" method="post">
                                       <div class="form-group">
                                          <label class="control-label col-lg-2" for="telephone">Tanggal Registrasi Surat</label>
                                          <div class="col-lg-6">
                                            <input type="date" name="tgl_input" class="form-control"  /><input type="submit" name="cari_tgl_input" class="btn btn-default" value="Search" />
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-lg-2" for="telephone">Tanggal Pada Surat</label>
                                          <div class="col-lg-6">
                                            <input type="date" name="tgl_surat" class="form-control"  /><input type="submit" name="cari_tgl_surat" class="btn btn-default" value="Search" />
                                          </div>
                                        </div>                                
									</form>
							</div>
                            
						</div>
                        <?php 
						  if(($_SESSION['tipe_user']=='1')||($_SESSION['tipe_user']=='3'))
						    {
						?>
                                                <div class="widget wviolet">
									<div class="widget-head">
										<div class="pull-left">Pencarian Surat Keluar</div>
										<div class="clearfix"></div>
									</div>
									<div class="widget-content">
									<form enctype="multipart/form-data" class="form-horizontal" role="form" action="control/proses.php?do=cari&tipe=sk" method="post">
                                       <div class="form-group">
                                          <label class="control-label col-lg-2" for="telephone">Tanggal Registrasi Surat</label>
                                          <div class="col-lg-6">
                                            <input type="date" name="tgl_input" class="form-control"  /><input type="submit" name="cari_tgl_input" class="btn btn-default" value="Search" />
                                          </div>
                                        </div>                               
									</form>
							</div>
                            
						</div>
                        <?php } ?>