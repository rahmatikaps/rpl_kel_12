<?php
  session_start();
  require_once('../lib/mainClass.php');
  
  $do = $_GET['do'];
  if(empty($do))
    {
		header('location:../');
	}
  else
    {
		if($do == 'simpan')
		  {
			  $jenis_surat = new jenissurat();
			  $jenis_surat->regjenissurat($_POST['id_jenissurat'],$_POST['jenis_surat']);
		  }
		
		elseif($do == 'login')
		  {
			  $user = new userControl();
			  $user->userlogin($_POST['username'],$_POST['password']);
		  }
		elseif($do =='cari')
		  {
			  if($_GET['tipe']=='sm')
			    {
					if(isset($_POST['cari_tgl_input']))
					  {
						  //$tgl_surat = new suratmasuk();
						  //$tgl_surat->tgl_input_sm($_POST['cari_tgl_input']);
						  $tgl = $_POST['tgl_input'];
						  header("location:../index.php?layout=list_sm&acc=tgl_input&tgl=$tgl");
					  }
					elseif(isset($_POST['cari_tgl_surat']))
					  {
						  $tgl = $_POST['tgl_surat'];
						  header("location:../index.php?layout=list_sm&acc=tgl_surat&tgl=$tgl");
					  }
				}
			  elseif($_GET['tipe']=='sk')
			    {
					if(isset($_POST['cari_tgl_input']))
					  {
						  //$tgl_surat = new suratmasuk();
						  //$tgl_surat->tgl_input_sm($_POST['cari_tgl_input']);
						  $tgl = $_POST['tgl_input'];
						  header("location:../index.php?layout=list_sk&acc=tgl_input&tgl=$tgl");
					  }
				}
		  }
		elseif($do == 'update_jenis')
		  {
			  $jenis_surat = new jenissurat();
			  $jenis_surat->update_jnssurat($_POST['id'],$_POST['id_jenissurat'],$_POST['jenis_surat']);
		  }
		elseif($do=='disposisi')
		  {
			  /*echo $_POST['id_suratmasuk']." ";
			  echo $_SESSION['id_user']." ";
			  echo $_POST['id_user_penerima']." ";
			  echo $_POST['catatan'];*/
			  $disposisi = new disposisi();
			  $disposisi->do_forward($_SESSION['id_user'],$_POST['id_user_penerima'],$_POST['id_suratmasuk'],$_POST['catatan']);
		  }
		
		elseif($do == 'edit_sm')
		  {
			 $update_surat = new suratmasuk();
			 $update_surat->update_sm($_POST['id_surat'],$_POST['jenis_surat'],$_POST['no_reg_sm'],$_POST['no_surat_pengirim'],$_POST['asal'],$_POST['tgl_surat'],$_POST['perihal'],$_POST['keterangan'],$_POST['ttd_oleh'],$_POST['tembusan'],$_POST['nama_file'],$_POST['tgl_input'],$_POST['input_by']);  
		  }
		elseif($do == 'delete_sk')
		  {
			  $id_surat = $_GET['id'];
			  $hapus = new suratkeluar();
			  $hapus->delete_sk($id_surat);
		  }
		elseif($do == 'delete_sm')
		  {
			  $id_surat = $_GET['id'];
			  $hapus = new suratmasuk();
			  $hapus->delete_sm($id_surat);
		  }
		elseif($do == 'save_sm')
		  {
			  if(isset($_POST['save']))
			    {
				  $surat_masuk = new suratmasuk();
				  $dir ='surat_masuk/';
				  $id_surat = new suratmasuk();
				  $nama_temp = $id_surat->reg_id_surat();//$_FILES['nama_file']['name'];
				  $name = str_replace('/','',$nama_temp);
				  $type = end(explode('.',$_FILES['nama_file']['name']));
				  $gambar = $dir.basename(date('Ymd').$name.'.'.$type);
				  $tempat = "../".$gambar;
				  
				  if($_SESSION['tipe_user']=='1')
				  {
				    $disposisi = $_SESSION['id_user'];
				  }
				  if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $tempat)) 
					{
					  $surat_masuk->save_sm($_POST['jenis_surat'],$_POST['no_surat_pengirim'],$_POST['asal'],$_POST['tgl_surat'],$_POST['perihal'],$_POST['keterangan'],$_POST['ttd_oleh'],$_POST['tembusan'],$gambar,$_POST['tgl_input'],$_POST['input_by'],$disposisi);
					}
				}
		  }
		elseif($do == 'save_sk')
		  {
			  if(isset($_POST['save']))
			    {
				  $surat_keluar = new suratkeluar();
				  $dir ='surat_keluar/';
				  $name = $_POST['no_reg_sk'];
				  $tipe = end(explode('.',$_FILES['nama_file']['name']));
				  $gambar = $dir.basename(date('Ymd').$name.'.'.$tipe);
				  $tempat = "../".$gambar;
				  if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $tempat)) 
					{
				  		$surat_keluar->save_sk($_POST['jenis_surat'],$_POST['no_reg_sk'],$_POST['asal'],$_POST['perihal'],$_POST['keterangan'],$_POST['ttd_oleh'],$_POST['tembusan'],$gambar,$_POST['tgl_input'],$_POST['input_by']);
					}
				}
		  }
		elseif($do == 'delete_jenis')
		  {
			  $jenis_surat = new jenissurat();
			  $jenis_surat->delete_jenis($_GET['id']);
		  }
		elseif($do == 'logout')
		  {
			  $user = new userControl();
			  $user->userlogout();
		  }
		elseif($do == 'reg_user')
		  {
			  $user = new userControl();
			  $user->reguser($_POST['nip'],$_POST['username'],$_POST['password'],$_POST['jenis_user'],$_POST['nama_depan'],$_POST['nama_tengah'],$_POST['nama_belakang'],$_POST['jabatan'],$_POST['no_telp'],$_POST['email']);
		  }
		elseif($do == 'edit')
		  {
			  $user = new userControl();
			  $user->edituser($_POST['id'],$_POST['nip'],$_POST['username'],$_POST['password'],$_POST['jenis_user'],$_POST['nama_depan'],$_POST['nama_tengah'],$_POST['nama_belakang'],$_POST['jabatan'],$_POST['no_telp'],$_POST['email']);
		  }
		elseif($do = 'delete')
		  {
			  $user = new userControl();
			  $user->deleteuser($_GET['id']);
		  }
		
	}
?>