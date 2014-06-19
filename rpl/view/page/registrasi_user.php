<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="widget wred">
									<div class="widget-head">
									  <div class="pull-left">Registrasi User</div>
									  <div class="clearfix"></div>
									</div>

									<div class="widget-content">
										<div class="padd">
											<!-- Profile form -->
											<div class="form profile">
												<!-- Edit profile form (not working)-->
												<form method="post" action="control/proses.php?do=reg_user" class="form-horizontal">
												  <!-- Nomor Induk Pegawai -->
												  <div class="form-group">
                                                    <label class="control-label col-lg-2" for="telephone">Nomor Induk Pegawai</label>
												    <div class="col-lg-6">
													  <input type="text" class="form-control" name="nip" id="name1">
													</div>
												  </div>   
												  <!-- Username -->
												  <div class="form-group">
                                                    <label class="control-label col-lg-2" for="telephone">Username</label>
												    <div class="col-lg-6">
													  <input type="text" class="form-control" name="username" id="username1">
													</div>
												  </div>
												  <!-- Password -->
												  <div class="form-group">
													<label class="control-label col-lg-2" for="telephone">Password</label>
													<div class="col-lg-6">
													  <input type="text" class="form-control" name="password" id="telephone">
													</div>
												  </div>  
                                                  <!-- Jenis User -->
												  <div class="form-group">
													<label class="control-label col-lg-2">Jenis User</label>
													<div class="col-lg-6">                               
														<select name="jenis_user" class="form-control">
															<option value=""> --- Please Select --- </option>
															<option value="1">Administrator</option>
															<option value="2">Staf</option>
                                                            <option value="3">Pimpinan</option>
														</select>  
													</div>
												  </div>
                                                  <!-- Nama Depan -->
												  <div class="form-group">
													<label class="control-label col-lg-2" for="telephone">Nama Depan</label>
													<div class="col-lg-6">
													  <input type="text" class="form-control" name="nama_depan" id="telephone">
													</div>
												  </div>
                                                  <!-- Name Tengah -->
												  <div class="form-group">
													<label class="control-label col-lg-2" for="telephone">Nama Tengah</label>
													<div class="col-lg-6">
													  <input type="text" class="form-control" name="nama_tengah" id="telephone">
													</div>
												  </div>
                                                  <!-- Nama Akhir -->
												  <div class="form-group">
													<label class="control-label col-lg-2" for="telephone">Nama Belakang</label>
													<div class="col-lg-6">
													  <input type="text" class="form-control" name="nama_belakang" id="telephone">
													</div>
												  </div>
                                                  <!-- Jabatan -->
												  <div class="form-group">
													<label class="control-label col-lg-2" for="telephone">Jabatan</label>
													<div class="col-lg-6">
													  <input type="text" class="form-control" name="jabatan" id="telephone">
													</div>
												  </div>
                                                  <!-- Telephone -->
												  <div class="form-group">
													<label class="control-label col-lg-2" for="telephone">No Telephone</label>
													<div class="col-lg-6">
													  <input type="text" class="form-control" name="no_telp" id="telephone">
													</div>
												  </div>
                                                  <!-- Email -->
												  <div class="form-group">
													<label class="control-label col-lg-2" for="telephone">E - mail</label>
													<div class="col-lg-6">
													  <input type="text" name="email" class="form-control" id="telephone">
													</div>
												  </div>                          
												  
												  <!-- Buttons -->
												  <div class="form-group">
													 <!-- Buttons -->
													 <div class="col-lg-6 col-lg-offset-2">
														<button type="submit" name="simpan" class="btn btn-success">Save</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												  </div>
												</form>
											</div>
										</div>
									</div>
								</div>  
							</div>
						</div>
					</div>