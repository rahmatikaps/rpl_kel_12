                        <div class="widget wviolet">
									<div class="widget-head">
										<div class="pull-left">Tables</div>
										<div class="clearfix"></div>
									</div>
									<div class="widget-content">
										<table class="table table-bordered ">
											<thead>
												<tr>
												  <th>No</th>
												  <th>NIP</th>
												  <th>Username</th>
												  <th>Password</th>
												  <th>Jenis User</th>
												  <th>Nama Depan</th>
                                                  <th>Nama Tengah</th>
                                                  <th>Nama Belakang</th>
                                                  <th>Jabatan</th>
                                                  <th>No Telephone</th>
                                                  <th>E - mail</th>
												  <th>Control</th>
												</tr>
											</thead>
											<tbody>
                                            <?php 
											  require_once('lib/mainClass.php');
											  $listuser = new userControl();
											  $x= 1;
											  $data =  $listuser->listuser();
											  foreach ($data as $datauser)
											    { 
												  if((isset($_GET['id']))&&($datauser['id_user']==$_GET['id']))
												  
												    {
														if((isset($_GET['acc']))&&($_GET['acc']=='edit'))
														  { ?>
                                                            <form action="control/proses.php?do=edit" method="post">
															  <tr>
                                                                <td><?php echo $x; $x++;  ?></td>
                                                                <td> <input type="text" class="form-control" name="nip" id="username1" value="<?php echo $datauser['nip']; ?>"></td>
                                                                <td> <input type="text" class="form-control" name="username" value="<?php echo $datauser['username']; ?>" ></td>
                                                                <td> <input type="text" class="form-control" name="password" value="<?php echo $datauser['password']; ?>" ></td>
                                                                <td> <input type="text" class="form-control" name="jenis_user" value="<?php echo $datauser['tipe_user']; ?>" ></td>
                                                                <td> <input type="text" class="form-control" name="nama_depan" value="<?php echo $datauser['nama_depan']; ?>" ></td>
                                                                <td> <input type="text" class="form-control" name="nama_tengah" value="<?php echo $datauser['nama_tengah']; ?>" ></td>
                                                                <td> <input type="text" class="form-control" name="nama_belakang" value="<?php echo $datauser['nama_belakang']; ?>" ></td>
                                                                <td> <input type="text" class="form-control" name="jabatan" value="<?php echo $datauser['jabatan']; ?>" ></td>
                                                                <td> <input type="text" class="form-control" name="no_telp" value="<?php echo $datauser['no_telp']; ?>" ></td>
                                                                <td> <input type="text" class="form-control" name="email" value="<?php echo $datauser['email']; ?>" ></td>
                                                                <td>
                                                                    <input type="hidden" name="id" value="<?php echo $datauser['id_user']; ?>" />
                                                                    <input type="submit" class="btn btn-sm btn-success" name="update" value="update" />
                                                                   <!-- <a href="control/proses.php?do=edit&id=<?php echo $datauser['id_user']; ?>"><button class="btn btn-sm btn-success"><i class="fa fa-check"></i></button></a>-->
                                                                    <!-- <a href="?layout=list_user&acc=edit&id=<?php //echo $datauser['id_user']; ?>"><button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> </button></a>
                                                                    <a href="?layout=list_user&acc=delete&id=<?php //echo $datauser['id_user']; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button></a>-->
                                                                </td>
                                                              </tr> 
                                                              </form>
														 <?php  }
													}
												 else
												   {
												  if($datauser['tipe_user']==1)
												    {
														$tipe_user = 'Administrator';
													}
												  elseif($datauser['tipe_user']==3)
												    {
														$tipe_user = 'Pimpinan';
													}
												  else
												    {
														$tipe_user = 'Staf';
													}
											?>
												<tr>
												  <td><?php echo $x; $x++;  ?></td>
												  <td><?php echo $datauser['nip']; ?></td>
												  <td><?php echo $datauser['username']; ?></td>
												  <td><?php echo $datauser['password']; ?></td>
												  <td><?php echo $tipe_user; ?></td>
                                                  <td><?php echo $datauser['nama_depan']; ?></td>
												  <td><?php echo $datauser['nama_tengah']; ?></td>
                                                  <td><?php echo $datauser['nama_belakang']; ?></td>
												  <td><?php echo $datauser['jabatan']; ?></td>
                                                  <td><?php echo $datauser['no_telp']; ?></td>
												  <td><?php echo $datauser['email']; ?></td>
												  <td>
													  <a href="?layout=list_user&acc=edit&id=<?php echo $datauser['id_user']; ?>"><button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> </button></a>
													  <a href="control/proses.php?do=delete&id=<?php echo $datauser['id_user']; ?>"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i> </button></a>
												  </td>
												</tr>
                                              <?php
												   }
												}
											  ?>
											</tbody>
										</table>
									</div>
								</div>
							
						</div>