                        <div class="widget wviolet">
									
									<div class="widget-head">
										<div class="pull-left">List Surat Masuk</div>
										<div class="clearfix"></div>
									</div>
									<div class="widget-content">
										<table class="table table-bordered ">
											<thead>
												<tr>
												  <th>#</th>
												  <th>No Registrasi</th>
                                                  <th>No Surat</th>
												  <th>Asal Surat</th>
												  <th>Tanggal Surat</th>
												  <th>Perihal</th>
												  <th>Sejarah Penerima Surat</th>
                                                  <th>Catatan</th>
												  <th>Status</th>
												  <th>Control</th>
												</tr>
											</thead>
											<tbody>
                                            <?php
											  require_once("lib/mainClass.php");
											  $listsm = new suratmasuk();
											  
											  if(isset($_GET['acc']))
											    {
													if($_GET['acc']=='tgl_input')
													  {
														  $tgl_surat = new suratmasuk();
						 								  $data = $tgl_surat->tgl_input_sm($_GET['tgl'],$_SESSION['id_user']);
													  }
													elseif($_GET['acc']=='tgl_surat')
													  {
														  $tgl_surat = new suratmasuk();
						 								  $data = $tgl_surat->tgl_surat_sm($_GET['tgl'],$_SESSION['id_user']);
													  }
												}
											  else
											    {
													$data = $listsm->list_sm($_SESSION['id_user']);
												}
											  
											  $x = 1;
											  if($data==null)
											    {
													?>
                                                      <tr>
                                                        <td colspan="9"><center>Data Surat Masuk Belum Ada</center></td>
                                                      </tr>
													<?php
												}
											  else
											    {
											  foreach($data as $datasurat)
											     {
												 
											?>
												<tr>
												  <td><?php echo $x; $x++; ?></td>
												  <td><?php echo $datasurat['no_register']; ?></td>
                                                  <td><?php echo $datasurat['no_suratpengirim']; ?></td>
												  <td><?php echo $datasurat['asal']; ?></td>
												  <td><?php echo $datasurat['tgl_surat']; ?></td>
												  <td><?php echo $datasurat['perihal']; ?></td>
												  <td>
                                                    <ul>
                                                    <?php 
													  $list_history = new disposisi();
													  $detail = $list_history->history($datasurat['id']);
													  if ($detail==null)
													  {
														  echo "-";
											
													   }
													  else 
													     {
													       foreach($detail as $dt)
															{
																echo "<li>".$dt['id']."</li>";
															}
														}
													?>
                                                      </ul>
                                                  </td>
                                                  <td>
                                                     <?php
													  $catatan = new disposisi();
													  $cat = $catatan->catatan($datasurat['id_notif']);
													  foreach($cat as $note)
													    {
															echo $note['catatan'];
														}
													 ?>
                                                  </td>
												  <td><?php if($datasurat['status_baca']==0) { ?> 
													  <span class="label label-important">Belum Di Baca</span> </a> <?php } else { ?><span class="label label-success">Sudah Di Baca</span><?php } ?></td>
												  <td>
													  <!--<button class="btn btn-sm btn-success"><i class="fa fa-check"></i> </button>
													  <button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> </button>
													  <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button>-->
													  <a href="index.php?layout=detail_sm&id=<?php echo $datasurat['id']; ?>&notif=<?php echo $datasurat['id_notif']; ?>"><button class="btn btn-sm btn-info">Detail</button></a>
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