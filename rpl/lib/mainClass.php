<?php
  class myApp {
	  public function mainView() {
		  if(empty($_SESSION['status']))
		    {
				 include('view/login.php');
			}
		  elseif((isset($_SESSION['status']))&&($_SESSION['status']=='masuk'))
		    {
				if((isset($_GET['page']))&&($_GET['page']=='index'))
				  {
					include('view/login.php');  
				  }
				else
				  {
					include('view/index.php');
				  }
			}			
	  }
  }
  class indexcontrol {
	  function pagecontrol()
	    {
			if(!empty($_GET['layout']))
			  {
				$page = $_GET['layout'];
			  }
			else
			  {
				$page = 'home';
			  }
			$layout = "view/page/".$page.".php";
			include($layout);
		}
  }
  class dbController {
        private $host="localhost";
        private $user="root";
        private $pass="";
        private $dbname="eletter";
        protected $conn;
        
        protected function dbOpen(){
            $this->conn = mysqli_connect("$this->host", "$this->user", "$this->pass", "$this->dbname");
            if(mysqli_connect_error()){
                echo "Koneksi ke database MySQL gagal: ".  mysqli_connect_error();
            }      
        }
        
        protected function dbClose(){
            mysqli_close($this->conn);
        }
    }
  class userControl extends dbController {
	  public function userlogin($username,$password)
	    {
			$this->dbOpen();
			$username= mysqli_real_escape_string($this->conn, $username);
            $pass= mysqli_real_escape_string($this->conn, $password);
            //$pass= md5($pass);
            $sql="SELECT * FROM user WHERE username='$username' AND password='$pass'";
            $query=mysqli_query($this->conn, $sql);
			if(mysqli_num_rows($query)==1)
			  {
				  while($record = mysqli_fetch_array($query))
				    {
						$_SESSION['status']='masuk';
						$_SESSION['id_user']=$record['id_user'];
						$_SESSION['username']=$record['username'];
						$_SESSION['jabatan']=$record['jabatan'];
						$_SESSION['tipe_user'] = $record['tipe_user'];
						header('location:../');
					}
			  }
			else
			  {
				  header('location:../?status=error');
			  }
		}
	  public function userlogout()
		{
			session_destroy();
			header('location:../');
		}
	  public function reguser($nip, $username, $password, $jenis_user, $nama_depan, $nama_tengah, $nama_belakang, $jabatan, $no_telp, $email )
	    {
			$this->dbOpen();
			$nip= mysqli_real_escape_string($this->conn,$nip);
			$username = mysqli_real_escape_string($this->conn,$username);
			$password = mysqli_real_escape_string($this->conn,$password);
			$jenis_user = mysqli_real_escape_string($this->conn, $jenis_user);
			$nama_depan = mysqli_real_escape_string($this->conn, $nama_depan);
			$nama_tengah = mysqli_real_escape_string($this->conn, $nama_tengah);
			$nama_belakang = mysqli_real_escape_string($this->conn, $nama_belakang);
			$jabatan = mysqli_real_escape_string($this->conn, $jabatan);
			$no_telp = mysqli_real_escape_string($this->conn,$no_telp);
			$email = mysqli_real_escape_string($this->conn,$email);
			
			$sql = "insert into user(nip , username , password, tipe_user, nama_depan, nama_tengah, nama_belakang, jabatan, no_telp, email ) values ('$nip','$username','$password','$jenis_user','$nama_depan','$nama_tengah','$nama_belakang','$jabatan','$no_telp','$email')";
			$query = mysqli_query($this->conn, $sql);
			
			if($query)
			  {
				  $_SESSION['notif'] = 'success';
				  $this->dbClose();
				  header('location:../index.php?layout=list_user');
			  }
			else
			  {
				  $_SESSION['notif'] = 'fail';
			  }
		}
	  public function listuser()
	    {
			$this->dbOpen();
			$sql = "select * from user";
			$query = mysqli_query($this->conn, $sql);
			if($query)
			  {
				  if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  $data[$i]['id_user'] = $record['id_user'];
							  $data[$i]['nip'] = $record['nip'];
							  $data[$i]['username'] = $record['username'];
							  $data[$i]['password'] = $record['password'];
							  $data[$i]['tipe_user'] = $record['tipe_user'];
							  $data[$i]['nama_depan'] = $record['nama_depan'];
							  $data[$i]['nama_tengah'] = $record['nama_tengah'];
							  $data[$i]['nama_belakang'] = $record['nama_belakang'];
							  $data[$i]['jabatan'] = $record['jabatan'];
							  $data[$i]['no_telp'] = $record['no_telp'];
							  $data[$i]['email'] = $record['email'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			  }
		}
	  public function cari_user($id_user)
	    {
			$this->dbOpen();
			$sql = "select * from user where id_user = $id_user";
			$query = mysqli_query($this->conn, $sql);
			if($query)
			  {
				  if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  $data[$i]['id_user'] = $record['id_user'];
							  $data[$i]['nip'] = $record['nip'];
							  $data[$i]['username'] = $record['username'];
							  $data[$i]['password'] = $record['password'];
							  $data[$i]['tipe_user'] = $record['tipe_user'];
							  $data[$i]['nama_depan'] = $record['nama_depan'];
							  $data[$i]['nama_tengah'] = $record['nama_tengah'];
							  $data[$i]['nama_belakang'] = $record['nama_belakang'];
							  $data[$i]['jabatan'] = $record['jabatan'];
							  $data[$i]['no_telp'] = $record['no_telp'];
							  $data[$i]['email'] = $record['email'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			  }
		}
	  public function edituser($id, $nip, $username, $password, $jenis_user, $nama_depan, $nama_tengah, $nama_belakang, $jabatan, $no_telp, $email)
		{
			$this->dbOpen();
			$id= mysqli_real_escape_string($this->conn,$id);
			$nip= mysqli_real_escape_string($this->conn,$nip);
			$username = mysqli_real_escape_string($this->conn,$username);
			$password = mysqli_real_escape_string($this->conn,$password);
			$jenis_user = mysqli_real_escape_string($this->conn, $jenis_user);
			$nama_depan = mysqli_real_escape_string($this->conn, $nama_depan);
			$nama_tengah = mysqli_real_escape_string($this->conn, $nama_tengah);
			$nama_belakang = mysqli_real_escape_string($this->conn, $nama_belakang);
			$jabatan = mysqli_real_escape_string($this->conn, $jabatan);
			$no_telp = mysqli_real_escape_string($this->conn,$no_telp);
			$email = mysqli_real_escape_string($this->conn,$email);
			
			$sql = "update user set nip='$nip', username='$username', tipe_user='$jenis_user',nama_depan='$nama_depan',nama_tengah='$nama_tengah', nama_belakang='$nama_belakang', jabatan='$jabatan', no_telp='$no_telp', email='$email' where id_user ='$id' ";
			//$sql = "insert into user(nip , username , password, tipe_user, nama_depan, nama_tengah, nama_belakang, jabatan, no_telp, email ) values ('$nip','$username','$password','$jenis_user','$nama_depan','$nama_tengah','$nama_belakang','$jabatan','$no_telp','$email')";
			$query = mysqli_query($this->conn, $sql);
			
			if($query)
			  {
				  $_SESSION['notif'] = 'success';
				  $this->dbClose();
				  header('location:../index.php?layout=list_user');
			  }
			else
			  {
				  $_SESSION['notif'] = 'fail';
			  }
		}
	  public function deleteuser($id_user)
	    {
			$this->dbOpen();
			$id_user =  mysqli_real_escape_string($this->conn,$id_user);
			
			$sql = "delete from user where id_user='$id_user'";
			$query = mysqli_query($this->conn,$sql);
			if($query)
			  {
				  $_SESSION['notif'] = 'success';
				  $this->dbClose();
				  header('location:../index.php?layout=list_user');
			  }
			else
			  {
				  $_SESSION['notif'] = 'fail';
			  }
		}
  }
  class jenissurat extends dbController 
    {
		public function regjenissurat($id_jenissurat,$jenis_surat)
		  {
			  $this->dbOpen();
			  $id_jenissurat = mysqli_escape_string($this->conn,$id_jenissurat);
			  $jenis_surat = mysqli_escape_string($this->conn,$jenis_surat);
			  
			  $sql = "insert into jenis_surat(id_jenissurat, jenis_surat) values ('$id_jenissurat','$jenis_surat')";
			  $query = mysqli_query($this->conn, $sql);
			  if($query)
				{
					$_SESSION['notif'] = 'success';
					$this->dbClose();
					header('location:../index.php?layout=jenis_surat');
				}
			  else
				{
					$_SESSION['notif'] = 'fail';
				}
		  }
		public function listjenissurat()
		  {
			$this->dbOpen();
			$sql = "select * from jenis_surat";
			$query = mysqli_query($this->conn, $sql);
			if($query)
			  {
				  if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  $data[$i]['id'] = $record['id'];
							  $data[$i]['id_jenissurat'] = $record['id_jenissurat'];
							  $data[$i]['jenis_surat'] = $record['jenis_surat'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			  }  
		  }
		public function cari_listjenissurat($id_jenissurat)
		  {
			$this->dbOpen();
			$sql = "select * from jenis_surat where id = '$id_jenissurat'";
			$query = mysqli_query($this->conn, $sql);
			if($query)
			  {
				  if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  $data[$i]['id'] = $record['id'];
							  $data[$i]['id_jenissurat'] = $record['id_jenissurat'];
							  $data[$i]['jenis_surat'] = $record['jenis_surat'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			  }  
		  }
		public function update_jnssurat($id,$id_jenissurat,$jenis_surat)
		  {
			  $this->dbOpen();
			  $id = mysqli_escape_string($this->conn,$id);
			  $id_jenissurat = mysqli_escape_string($this->conn,$id_jenissurat);
			  $jenis_surat = mysqli_escape_string($this->conn,$jenis_surat);
			  
			  $sql = "update jenis_surat set id_jenissurat = '$id_jenissurat', jenis_surat = '$jenis_surat' where id='$id'";
			  $query = mysqli_query($this->conn, $sql);
			  if($query)
				{
					$_SESSION['notif'] = 'success';
					$this->dbClose();
					header('location:../index.php?layout=jenis_surat');
				}
			  else
				{
					$_SESSION['notif'] = 'fail';
				}
		  }
	    public function delete_jenis($id) 
		 {
			$this->dbOpen();
			$id= mysqli_escape_string($this->conn,$id);
			
			$sql = "delete from jenis_surat where id='$id'";
			$query = mysqli_query($this->conn,$sql);
			if($query)
			  {
				  $_SESSION['notif'] = 'success';
				  $this->dbClose();
				  header('location:../index.php?layout=jenis_surat');
			  }
			else
			  {
				  $_SESSION['notif'] = 'fail';
			  }
		 }
	}
	class suratmasuk extends dbController 
	  {
		  public function update_sm($id_surat,$jenis_surat, $no_sm ,$no_suratpengirim, $asal, $tgl_srt, $perihal, $keterangan, $ttd, $tembusan, $nama_file, $tgl_input, $id_user )
		    {
				$this->dbOpen();
				
				$sql = " UPDATE surat_masuk SET id_jenissurat = '$jenis_surat' , no_register = '$no_sm', no_suratpengirim = '$no_suratpengirim', asal = '$asal', tgl_surat='$tgl_srt', perihal='$perihal', keterangan='$keterangan', ttd_oleh='$ttd', tembusan='$tembusan', file = '$nama_file', tgl_input='$tgl_input', id_user='$id_user' WHERE id_suratmasuk = '$id_surat'"; 
				
				$query = mysqli_query($this->conn,$sql);
				if($query)
				  {
					  $this->dbClose();
							header('location:../index.php?layout=list_sm');
				  }
			
			}
		  public function delete_sm($id_surat)
		    {
				$this->dbOpen();
				$id_surat = mysqli_escape_string($this->conn,$id_surat);
				$sql = "delete from surat_masuk where id_suratmasuk = $id_surat";
				$query = mysqli_query($this->conn,$sql);
				if($query)
				  {
					  $this->dbClose();
					  header('location:../index.php?layout=list_sm');
				  }
				else
				  {
					  header('location:../index.php?layout=list_sm&status=failed');
				  }
			}
		  public function move_file($nama_file)
		    {
			  $nama_folder = "../surat_masuk";
			  	
			}
		  public function reg_id_surat() {
			  $this->dbOpen();
			  $sqlreg = "select id_suratmasuk from surat_masuk order by id_suratmasuk DESC limit 0,1 ";
			  $queryreg = mysqli_query($this->conn, $sqlreg);
			  if($queryreg)
				{
					if(mysqli_num_rows($queryreg)>0)
					  {
						  while($rec = mysqli_fetch_array($queryreg))
							{
								$reg= $rec['id_suratmasuk'];
							}
					  }
					else
					  {
						  $reg = 0;
					  }
				}
			$this->dbClose();
			$reg = $reg + 1;
			$no_register = "SM/".date('m/d')."/".$reg;
			return $no_register;
		  }
		  public function save_sm($jenis_surat, $no_sm , $asal, $tgl_srt, $perihal, $keterangan, $ttd, $tembusan, $nama_file, $tgl_input, $id_user,$disposisi )
		    {
				$this->dbOpen();
				
				echo $jenis_surat= mysqli_escape_string($this->conn,$jenis_surat." ");
				//$no_reg_sm= mysqli_escape_string($this->conn,$no_reg_sm);
				echo $no_sm = mysqli_escape_string($this->conn,$no_sm)." ";
				echo $asal = mysqli_escape_string($this->conn, $asal)." ";
				echo $tgl_srt = mysqli_escape_string($this->conn, $tgl_srt)." ";
				echo $perihal = mysqli_escape_string($this->conn, $perihal)." ";
				echo $keterangan = mysqli_escape_string($this->conn, $keterangan)." ";
				echo $ttd = mysqli_escape_string($this->conn, $ttd)." ";
				echo $tembusan = mysqli_escape_string($this->conn, $tembusan)." ";
				echo $nama_file = mysqli_escape_string($this->conn, $nama_file)." ";
				//echo $nama_file = $dir.$nama_file_tmp;
				echo $tgl_input = mysqli_escape_string($this->conn, $tgl_input)." ";
				echo $id_user = mysqli_escape_string($this->conn, $id_user);
				
				
				  
				$no_register=$this->reg_id_surat();
				$this->dbOpen();
				$sqlreg = "select id_suratmasuk from surat_masuk order by id_suratmasuk DESC limit 0,1 ";
				$queryreg = mysqli_query($this->conn, $sqlreg);
				if($queryreg)
				  {
					  if(mysqli_num_rows($queryreg)>0)
						{
							while($rec = mysqli_fetch_array($queryreg))
							  {
								  $reg= $rec['id_suratmasuk'];
							  }
						}
					  else
						{
							$reg = 0;
						}
				  }
				  $reg = $reg + 1;
				  $no_register = "SM/".date('m/d')."/".$reg;
				
				$sql = "insert into surat_masuk(id_jenissurat, no_register, no_suratpengirim, asal, tgl_surat, perihal, keterangan, ttd_oleh, tembusan, disposisi, file, tgl_input, id_user) values ('$jenis_surat','$no_register','$no_sm','$asal','$tgl_srt','$perihal','$keterangan','$ttd','$tembusan','$disposisi','$nama_file','$tgl_input','$id_user')";
			  $query = mysqli_query($this->conn, $sql);
			  if($query)
				{
					
					//$pemberitahuan_sm = new disposisi();
					//$pemberitahuan_sm->do_forward('$id_user','$id_user','$reg','asa');
					$sql_dis = " insert into pemberitahuan_sm(id_suratmasuk, id_user_penerima, id_user_pengirim, catatan, status_baca) values ('$reg','$id_user','$id_user','$catatan', 0)";
					$reg_dis = mysqli_query($this->conn,$sql_dis);
					  if($reg_dis)
						{
							$_SESSION['notif'] = 'success';
							$this->dbClose();
							header('location:../index.php?layout=list_sm');
						}
				}
			  else
				{
					$_SESSION['notif'] = 'fail';
				}
			}
	     public function list_sm($id_user) {
			 $this->dbOpen();
			 $id_user = mysqli_escape_string($this->conn,$id_user);
			 $sql = "select * from surat_masuk,pemberitahuan_sm where pemberitahuan_sm.id_suratmasuk = surat_masuk.id_suratmasuk and pemberitahuan_sm.id_user_penerima = '$id_user' order by surat_masuk.id_suratmasuk DESC";
			 //$sql = "select * from surat_masuk,pemberitahuan_sm where pemberitahuan_sm.id_suratmasuk = surat_masuk.id_suratmasuk and surat_masuk.id_user = '$id_user' order by surat_masuk.id_suratmasuk DESC";
			 $query = mysqli_query($this->conn,$sql);
			 
			 if($query)
			   {
				   if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  $data[$i]['id'] = $record['id_suratmasuk'];
							  $data[$i]['no_register']= $record['no_register'];
							  $data[$i]['no_suratpengirim']= $record['no_suratpengirim'];
							  $data[$i]['asal']= $record['asal'];
							  $data[$i]['tgl_surat']= $record['tgl_surat'];
							  $data[$i]['perihal'] = $record['perihal'];
							  $data[$i]['tgl_input'] = $record['tgl_input'];
							  $data[$i]['status_baca']=$record['status_baca'];
							  $data[$i]['id_notif'] = $record['id_pemberitahuan'];
							  //$data[$i]['status'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			   }
		 }
	  public function cari_sm($id_surat) {
			 $this->dbOpen();
			 $id_surat = mysqli_escape_string($this->conn,$id_surat);
			 $sql = "select * from surat_masuk where id_suratmasuk ='$id_surat' order by id_suratmasuk DESC";
			 $query = mysqli_query($this->conn,$sql);
			 
			 if($query)
			   {
				   if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  $data[$i]['id'] = $record['id_suratmasuk'];
							  $data[$i]['id_jenissurat']=$record['id_jenissurat'];
							  $data[$i]['no_register']= $record['no_register'];
							  $data[$i]['no_suratpengirim']= $record['no_suratpengirim'];
							  $data[$i]['asal']= $record['asal'];
							  $data[$i]['tgl_surat']= $record['tgl_surat'];
							  $data[$i]['perihal'] = $record['perihal'];
							  $data[$i]['keterangan'] = $record['keterangan'];
							  $data[$i]['ttd_oleh'] = $record['ttd_oleh'];
							  $data[$i]['tembusan'] = $record['tembusan'];
							  $data[$i]['tgl_input'] = $record['tgl_input'];
							  $data[$i]['id_user'] = $record['id_user'];
							  $data[$i]['file'] = $record['file'];
							  //$data[$i]['status'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			   }
		 }
		 public function tgl_input_sm($tgl_input,$id_penerima) {
			 $this->dbOpen();
			 $tgl_input = mysqli_escape_string($this->conn,$tgl_input);
			 $sql = "select * from surat_masuk,pemberitahuan_sm where pemberitahuan_sm.id_suratmasuk = surat_masuk.id_suratmasuk and surat_masuk.tgl_input = '$tgl_input' and pemberitahuan_sm.id_user_penerima = '$id_penerima' order by surat_masuk.id_suratmasuk DESC";
			 $query = mysqli_query($this->conn,$sql);
			 
			 if($query)
			   {
				   if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  $data[$i]['id'] = $record['id_suratmasuk'];
							  $data[$i]['no_register']= $record['no_register'];
							  $data[$i]['no_suratpengirim']= $record['no_suratpengirim'];
							  $data[$i]['asal']= $record['asal'];
							  $data[$i]['tgl_surat']= $record['tgl_surat'];
							  $data[$i]['perihal'] = $record['perihal'];
							  $data[$i]['tgl_input'] = $record['tgl_input'];
							  $data[$i]['status_baca']=$record['status_baca'];
							  $data[$i]['id_notif'] = $record['id_pemberitahuan'];
							  //$data[$i]['status'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			   }
		 }
		 public function tgl_surat_sm($tgl_surat,$id_penerima) {
			 $this->dbOpen();
			 $tgl_surat = mysqli_escape_string($this->conn,$tgl_surat);
			 $sql = "select * from surat_masuk,pemberitahuan_sm where pemberitahuan_sm.id_suratmasuk = surat_masuk.id_suratmasuk and surat_masuk.tgl_surat = '$tgl_surat' and pemberitahuan_sm.id_user_penerima = '$id_penerima' order by surat_masuk.id_suratmasuk DESC";
			 $query = mysqli_query($this->conn,$sql);
			 
			 if($query)
			   {
				   if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  $data[$i]['id'] = $record['id_suratmasuk'];
							  $data[$i]['no_register']= $record['no_register'];
							  $data[$i]['no_suratpengirim']= $record['no_suratpengirim'];
							  $data[$i]['asal']= $record['asal'];
							  $data[$i]['tgl_surat']= $record['tgl_surat'];
							  $data[$i]['perihal'] = $record['perihal'];
							  $data[$i]['tgl_input'] = $record['tgl_input'];
							  $data[$i]['status_baca']=$record['status_baca'];
							  $data[$i]['id_notif'] = $record['id_pemberitahuan'];
							  //$data[$i]['status'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			   }
		 }
	  }
   class suratkeluar extends dbController 
	  {
		  public function delete_sk($id_surat)
		    {
				$this->dbOpen();
				$id_surat = mysqli_escape_string($this->conn,$id_surat);
				$sql = "delete from surat_keluar where id_suratkeluar = $id_surat";
				$query = mysqli_query($this->conn,$sql);
				if($query)
				  {
					  $this->dbClose();
					  header('location:../index.php?layout=list_sk');
				  }
				else
				  {
					  header('location:../index.php?layout=list_sk&status=failed');
				  }
			}
		  public function save_sk($jenis_surat,$no_reg_sk, $asal, $perihal, $keterangan, $ttd, $tembusan, $nama_file, $tgl_input, $id_user )
		    {
				$this->dbOpen();
				$dir ='../surat_keluar/';
				$jenis_surat= mysqli_escape_string($this->conn,$jenis_surat);
				//$no_reg_sm= mysqli_escape_string($this->conn,$no_reg_sm);
				$no_sk = mysqli_escape_string($this->conn,$no_reg_sk);
				$asal = mysqli_escape_string($this->conn, $asal);
				$perihal = mysqli_escape_string($this->conn, $perihal);
				$keterangan = mysqli_escape_string($this->conn, $keterangan);
				$ttd = mysqli_escape_string($this->conn, $ttd);
				$tembusan = mysqli_escape_string($this->conn, $tembusan);
				$nama_file = mysqli_escape_string($this->conn, $nama_file);
				//$nama_file = $dir.$nama_file_tmp;
				$tgl_input = mysqli_escape_string($this->conn, $tgl_input);
				$id_user = mysqli_escape_string($this->conn, $id_user);
				$sqlreg = "select id_suratkeluar from surat_keluar order by id_suratkeluar DESC limit 0,1 ";
				$queryreg = mysqli_query($this->conn, $sqlreg);
				if($queryreg)
				  {
					  if(mysqli_num_rows($queryreg)>0)
					    {
							while($rec = mysqli_fetch_array($queryreg))
							  {
								  $reg= $rec['id_suratkeluar'];
							  }
						}
					  else
					    {
							$reg = 0;
						}
				  }
				 echo $reg;
				$reg = $reg + 1;
				$no_register = "SK/".date('m/d')."/".$reg;
				
				$sql = "insert into surat_keluar(id_jenissurat, no_register, asal, perihal, keterangan, ttd_oleh, tembusan, file, tgl_input, id_user) values ('$jenis_surat','$no_sk','$asal','$perihal','$keterangan','$ttd','$tembusan','$nama_file','$tgl_input','$id_user')";
			  $query = mysqli_query($this->conn, $sql);
			  if($query)
				{
					$_SESSION['notif'] = 'success';
					$this->dbClose();
					header('location:../index.php?layout=list_sk');
				}
			  else
				{
					$_SESSION['notif'] = 'fail';
				}
			}
	     public function list_sk() {
			 $this->dbOpen();
			 $sql = "select * from surat_keluar order by id_suratkeluar DESC";
			 $query = mysqli_query($this->conn,$sql);
			 
			 if($query)
			   {
				   if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  $data[$i]['id'] = $record['id_suratkeluar'];
							  $data[$i]['no_register']= $record['no_register'];
							  $data[$i]['asal']= $record['asal'];
							  $data[$i]['perihal'] = $record['perihal'];
							  $data[$i]['keterangan']= $record['keterangan'];
							  $data[$i]['ttd_oleh']= $record['ttd_oleh'];
							  $data[$i]['tgl_input'] = $record['tgl_input'];
							  //$data[$i]['status'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			   }
		 }
	    public function cari_sk($id_surat) {
			 
			 $this->dbOpen();
			 $id_surat = mysqli_escape_string($this->conn,$id_surat);
			 $sql = "select * from surat_keluar where id_suratkeluar = '$id_surat' order by id_suratkeluar DESC";
			 $query = mysqli_query($this->conn,$sql);
			 
			 if($query)
			   {
				   if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  $data[$i]['id'] = $record['id_suratkeluar'];
							  $data[$i]['id_jenissurat']= $record['id_jenissurat'];
							  $data[$i]['no_register']= $record['no_register'];
							  $data[$i]['asal']= $record['asal'];
							  $data[$i]['perihal'] = $record['perihal'];
							  $data[$i]['keterangan']= $record['keterangan'];
							  $data[$i]['ttd_oleh']= $record['ttd_oleh'];
							  $data[$i]['tembusan']= $record['tembusan'];
							  $data[$i]['file']= $record['file'];
							  $data[$i]['tgl_input'] = $record['tgl_input'];
							  $data[$i]['id_user']= $record['id_user'];
							  //$data[$i]['status'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			   }
		 }
	public function tgl_input_sk($tgl_input) {
			 
			 $this->dbOpen();
			 $tgl_input = mysqli_escape_string($this->conn,$tgl_input);
			 $sql = "select * from surat_keluar where tgl_input = '$tgl_input' order by id_suratkeluar DESC";
			 $query = mysqli_query($this->conn,$sql);
			 
			 if($query)
			   {
				   if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  $data[$i]['id'] = $record['id_suratkeluar'];
							  $data[$i]['id_jenissurat']= $record['id_jenissurat'];
							  $data[$i]['no_register']= $record['no_register'];
							  $data[$i]['asal']= $record['asal'];
							  $data[$i]['perihal'] = $record['perihal'];
							  $data[$i]['keterangan']= $record['keterangan'];
							  $data[$i]['ttd_oleh']= $record['ttd_oleh'];
							  $data[$i]['tembusan']= $record['tembusan'];
							  $data[$i]['file']= $record['file'];
							  $data[$i]['tgl_input'] = $record['tgl_input'];
							  $data[$i]['id_user']= $record['id_user'];
							  //$data[$i]['status'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			   }
		 }
	  }
	class disposisi extends dbController
	  {
		  public function catatan($id_notif)
		    {
				$this->dbOpen();
				$id_notif = mysqli_escape_string($this->conn,$id_notif);
				
				$sql = " select * from pemberitahuan_sm where id_pemberitahuan = '$id_notif'";
				$query = mysqli_query($this->conn,$sql);
				
				if($query)
				  {
					  if(mysqli_num_rows($query)>0)
					    {
						   $i=0;
							while($record = mysqli_fetch_array($query))
							  {
								  $data[$i]['catatan'] = $record['catatan'];
								  $i++;
							  }
						}
					  else
					    {
							$data = null;
						}
				     unset($i);
					 $this->dbClose();
					 return $data;
				  }
			}
		  public function history($id_suratmasuk)
		    {
				$this->dbOpen();
				
				$id_suratmasuk = mysqli_escape_string($this->conn,$id_suratmasuk);
				$sql = "SELECT * FROM pemberitahuan_sm,user WHERE pemberitahuan_sm.id_suratmasuk='$id_suratmasuk' and pemberitahuan_sm.id_user_penerima=user.id_user order by id_pemberitahuan ASC";
				
				$query = mysqli_query($this->conn,$sql);
				if($query)
				  {
					  if(mysqli_num_rows($query)>0)
					    {
							$i=0;
						    while($record = mysqli_fetch_array($query))
							  {
								  $data[$i]['id'] = $record['jabatan'];
								  $data[$i]['catatan'] = $record['catatan'];
								  $i++;
							  }	
						}
					  else
					    {
							$data = null;
						}
				  }
				unset($i);
				 $this->dbClose();
				 return $data;
			}
		  public function do_forward($id_user, $id_user_penerima, $id_suratmasuk, $catatan)
		    {
				$this->dbOpen();
				$id_suratmasuk= mysqli_escape_string($this->conn,$id_suratmasuk);
				$id_user = mysqli_escape_string($this->conn,$id_user);
				$id_user_penerima = mysqli_escape_string($this->conn,$id_user_penerima);
				$catatan = mysqli_escape_string($this->conn,$catatan);
				
				$sql = " insert into pemberitahuan_sm(id_suratmasuk, id_user_penerima, id_user_pengirim, catatan, status_baca) values ('$id_suratmasuk','$id_user_penerima','$id_user','$catatan', 0)";
				
				$query = mysqli_query($this->conn,$sql);
				if($query)
				  {
					$_SESSION['notif'] = 'success';
					$this->dbClose();
					header('location:../index.php?layout=list_sm');
				}
			  else
				{
					$_SESSION['notif'] = 'fail';
				}
			}
	     public function read_disposisi($id_notif)
		   {
			   $this->dbOpen();
			   $id_notif= mysqli_escape_string($this->conn,$id_notif);
			   
			   $sql = "UPDATE pemberitahuan_sm SET status_baca = 1 WHERE id_pemberitahuan = '$id_notif'";
			   $query= mysqli_query($this->conn,$sql);
			   if($query)
			     {
					 $this->dbClose();
				 }
		   }
		 
		 public function list_disposisi($id_suratmasuk,$id_notif)
		   {
			   $this->dbOpen();
			   $user = $_SESSION['id_user'];
			   $id_suratmasuk = mysqli_escape_string($this->conn,$id_suratmasuk);
			   $id_notif = mysqli_escape_string($this->conn,$id_notif);
			   //$sql = "select * from user where id_user != $user ";
			   $sql = "select * from pemberitahuan_sm, user where pemberitahuan_sm.id_user_penerima != user.id_user and pemberitahuan_sm.id_suratmasuk = '$id_suratmasuk' and pemberitahuan_sm.id_pemberitahuan = '$id_notif'";
			   $query = mysqli_query($this->conn,$sql);
			   
			   if($query)
			   {
				   if(mysqli_num_rows($query)>0)
				    {
						$i=0;
						while($record = mysqli_fetch_array($query))
						  {
							  /*$tes = "select * from pemberitahuan_sm where id_suratmasuk =$id_suratmasuk";
							  $qtes = mysqli_query($this->conn,$tes);
							  if($qtes)
							    {
									if(mysqli_num_rows($qtes)>0)
									  {
										  while($rec = mysqli_fetch_array($qtes))
										    {
											  if($rec['id_user_penerima']==$record['id_user'])
												{
													$data[$i]['id_user'] = $record['id_user'];
													$data[$i]['jabatan']= $record['jabatan'];
												}
											}
									  }
									else
									  {  
										  $data[$i]['id_user'] = $record['id_user'];
										  $data[$i]['jabatan']= $record['jabatan'];
									  }
								}*/
								$data[$i]['id_user'] = $record['id_user'];
										  $data[$i]['jabatan']= $record['jabatan'];
							  $i++;
						  }
					}
				 else
				   {
					   $data = null;
				   }
				 unset($i);
				 $this->dbClose();
				 return $data;
			   }
		   }
	  }
?>