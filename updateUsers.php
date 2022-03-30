<?php include('common/header.php');

if(!isset($_SESSION['userData'])){
	header("location:login.php");
}elseif($_SESSION['userData']['role']!= 1){
	header("location:index.php");
}else{
?>
<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">Administravimo įrankiai</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<?php include('./AdminPanel.php');
                                    ?>
								</div>
								<div class="col-md-9">
                                <div>
                                <div class="col-md-9">
									<?php
                                        $id = $_GET['id'];
										if(isset($_POST['useradmin'])){
											$fname=$_POST['fname'];
											$user=$_POST['username'];
                                            $role=$_POST['role'];
											$email=$_POST['email'];
											// Pridėti data į DB
											$data=array();
											$data['fname']=$fname;
											$data['user']=$user;
                                            $data['role']=$role;
											$data['email']=$email;
											$result=update_admin($id,$data);
											if($result['bool']==true){
												echo _success($result['msg']);
											}else{
												echo _warning($result['msg']);
											}
                                        }
										$userData=get_user_by_id($id);
									?>
									<form method="post" action="">
										<table class="table table-bordered">
											<tr>
												<th>Vardas Pavardė</th>
												<td><input type="text" name="fname" class="form-control" value="<?php echo $userData['allData']['fname']; ?>" /></td>
											</tr>
											<tr>
												<th>Slapyvardis</th>
												<td><input type="text" name="username" class="form-control" value="<?php echo $userData['allData']['username']; ?>" /></td>
											</tr>
                                            <tr>
												<th>Rolė</th>
												<td><input type="text" name="role" class="form-control" value="<?php echo $userData['allData']['role']; ?>" /></td>
											</tr>
											<tr>
												<th>El.paštas</th>
												<td><input type="text" name="email" class="form-control" value="<?php echo $userData['allData']['email']; ?>" /></td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<input type="submit" class="btn btn-warning" value="Atnaujinti" name="useradmin" />
												</td>
											</tr>
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
<?php include('common/footer.php'); }?>