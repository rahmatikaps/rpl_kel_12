<!-- Dashboard Graph starts -->
						<div class="row">
							<div class="col-md-12">
								<!-- Widget -->
								<div class="widget wlightblue">
									<!-- Widget head -->
									<div class="widget-head">
									  <div class="pull-left">Jenis Surat</div>
									  <div class="clearfix"></div>
									</div>             
									<!-- Widget content -->
									<div class="widget-content">
									  <div class="padd">
										<!-- Bar chart (Blue color). jQuery Flot plugin used. -->
                                        <div class="profile">
                                          <!-- Edit profile form (not working)-->
                                          <form action="control/proses.php?do=simpan" method="post" class="form-horizontal">
                                              <!-- Title -->
                                              <div class="form-group">
                                                <label class="control-label col-lg-3" for="title">ID Jenis Surat</label>
                                                <div class="col-lg-9"> 
                                                  <input type="text" class="form-control" name="id_jenissurat" id="title">
                                                </div>
                                              </div>   
                                              <div class="form-group">
                                                <label class="control-label col-lg-3" for="title">Jenis Surat</label>
                                                <div class="col-lg-9"> 
                                                  <input type="text" class="form-control" name="jenis_surat" id="title">
                                                </div>
                                              </div>
                                              <!-- Buttons -->
                                              <div class="form-group">
                                                 <!-- Buttons -->
                                                 <div class="col-lg-offset-3 col-lg-9">
                                                    <button type="submit" class="btn btn-success" name="simpan">Save</button>
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                 </div>
                                              </div>
                                          </form>
                                        </div>
										<!--<div id="bar-chart"></div>-->
									  </div>
									</div>
									<!-- Widget ends -->

								</div>
							</div>
							<!--<div class="col-md-4">
								<div class="widget wblue">
									<div class="widget-head">
									  <div class="pull-left">Today Status</div>
									  <div class="clearfix"></div>
									</div>             
									<div class="widget-content">
									  <div class="padd">

									  </div>
									</div>
								</div>
							</div>-->
						</div>
						
						<!-- Dashboard graph ends -->
						<div class="widget wviolet">
									<div class="widget-head">
										<div class="pull-left">Jenis Surat</div>
										<div class="clearfix"></div>
									</div>
									<div class="widget-content">
										<table class="table table-bordered ">
											<thead>
												<tr>
												  <th>#</th>
												  <th>ID Jenis Surat</th>
												  <th>Jenis Surat</th>
												  <th>Action</th>
												</tr>
											</thead>
											<tbody>
                                              <?php
											    require_once('lib/mainClass.php');
												$listsurat = new jenissurat();
												$x=1;
												$data = $listsurat->listjenissurat();
												foreach($data as $datajenis)
												  { 
												  if((isset($_GET['id']))&&($datajenis['id']==$_GET['id']))
												  
												    {
														if((isset($_GET['acc']))&&($_GET['acc']=='edit'))
														  { ?>
                                                 <tr>
                                                   <form action="control/proses.php?do=update_jenis" method="post">
												  <td><?php echo $x; $x++; ?></td>
												  <td><input type="text" name="id_jenissurat" value="<?php echo $datajenis['id_jenissurat']; ?>" /></td>
												  <td><input type="text" name="jenis_surat" value="<?php echo $datajenis['jenis_surat']; ?>" /></td>
												  <td>
                                                      <input type="hidden" name="id" value="<?php echo $datajenis['id']; ?>" />
													  <input type="submit" name="update" class="btn btn-sm btn-warning" value="Update" />					  
												  </td>
                                                    </form>
												</tr>
                                                          <?php
														  }
													}
												  else
												    {
											  ?>
												<tr>
												  <td><?php echo $x; $x++; ?></td>
												  <td><?php echo $datajenis['id_jenissurat']; ?></td>
												  <td><?php echo $datajenis['jenis_surat']; ?></td>
												  <td>
													  <a href="?layout=jenis_surat&acc=edit&id=<?php echo $datajenis['id']; ?>"><button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> </button></a>
													  <a href="control/proses.php?do=delete_jenis&id=<?php echo $datajenis['id']; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button></a>
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
						
							</div>            
						</div>