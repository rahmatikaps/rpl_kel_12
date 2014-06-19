                        <div class="widget wviolet">
									
									<div class="widget-head">
										<div class="pull-left">List Surat Keluar</div>
										<div class="clearfix"></div>
									</div>
									<div class="widget-content">
										<table class="table table-bordered ">
											<thead>
												<tr>
												  <th>#</th>
												  <th>No Registrasi</th>
												  <th>Tujuan</th>
												  <th>Perihal</th>
												  <th>Keterangan</th>
												  <th>Tanda Tangan</th>
												  <th>Tanggal Input</th>
												  <th>Detail</th>
												</tr>
											</thead>
											<tbody>
												<?php
												  require_once("lib/mainClass.php");
												  $listsk = new suratkeluar();
												  
												  if(isset($_GET['acc']))
											    {
													if($_GET['acc']=='tgl_input')
															{
																$tgl_surat = new suratkeluar();
																$datask = $tgl_surat->tgl_input_sk($_GET['tgl'],$_SESSION['id_user']);
															}
													  }
													else
													  {
														$datask = $listsk->list_sk();
													  }
												  $x = 1;
												  if($datask==null)
											    {
													?>
                                                      <tr>
                                                        <td colspan="9"><center>Data Surat Masuk Belum Ada</center></td>
                                                      </tr>
													<?php
												}
												else
												  {
												  foreach($datask as $datasurat)
													 {
													 
												?>
													<tr>
													  <td><?php echo $x; $x++; ?></td>
													  <td><?php echo $datasurat['no_register']; ?></td>
													  <td><?php echo $datasurat['asal']; ?></td>
													  <td><?php echo $datasurat['perihal']; ?></td>
													  <td><?php echo $datasurat['keterangan']; ?></td>
													  <td><?php echo $datasurat['ttd_oleh']; ?></td>
													  <td><?php echo $datasurat['tgl_input']; ?></td>
													  <td>
														  <!--<button class="btn btn-sm btn-success"><i class="fa fa-check"></i> </button>
														  <button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> </button>
														  <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button>-->
														  <button class="btn btn-sm btn-info"><a href="index.php?layout=detail_sk&id=<?php echo $datasurat['id']; ?>">Detail</a></button>
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