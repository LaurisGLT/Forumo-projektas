<?php include('common/header.php'); ?>
			<div class="row">
				<div class="col-md-12">
					<?php
							$fname="";
							$user="";
							$email="";

						if(isset($_POST['g-recaptcha-response'])){
							$res = post_captcha($_POST['g-recaptcha-response']);
							$fname=$_POST['fname'];
							$user=$_POST['user'];
							$email=$_POST['email'];
							$pwd=$_POST['pwd'];
							$cpwd=$_POST['cpwd'];
							if($pwd==$cpwd && (!empty($pwd) && !empty($user) && !empty($email))){
								// Idėti duomenis į duombazę
								$data=array();
								$data['fname']=$fname;
								$data['user']=$user;
								$data['email']=$email;
								$data['pwd'] = password_hash($pwd, PASSWORD_DEFAULT);
								if ($res->success != true) {
									echo _warning('Neįvykdėte Captcha iššūkio');
								}else {
									$result=register_user($data);
									if($result['bool']==true){
										echo _success($result['msg']);
									}else{
										echo _warning('Registracija nepavyko');
									}
								}
							}else{
								echo _warning('Užpildykite visus laukus');
							}
						}
					?>
					<div class="panel panel-success">
						<div class="panel-heading">Registracija</div>
						<div class="panel-body">
							<form action="" method="post">
							<table class="table table-bodered">
								<tr>
									<th>Vardas ir Pavardė</th>
									<td><input type="text" class="form-control" name="fname" value ="<?php echo "".$fname.""; ?>" /></td>
								</tr>
								<tr>
									<th>Slapyvardis <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="text" class="form-control" name="user" value ="<?php echo "".$user.""; ?>"/></td>
								</tr>
								<tr>
									<th>El.paštas <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="text" class="form-control" name="email" value ="<?php echo "".$email.""; ?>" /></td>
								</tr>
								<tr>
									<th>Slaptažodis <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="password" class="form-control" name="pwd" /></td>
								</tr>
								<tr>
									<th>Patvirtinkite slaptažodį <i class="fa fa-asterisk text-danger"></i></th>
									<td><input type="password" class="form-control" name="cpwd" /></td>
								</tr>
								<tr>
									<td colspan="2">	
										<div class="g-recaptcha" data-sitekey="6LdgW2kdAAAAACJI3nXXt7EnkHxSKY8bNmdfTe3A"></div>
										<input type="submit" name="submit" class="btn btn-warning" value="Prisijungti prie bendruomenės" />
									</td>
								</tr>
								<tr>
									<td colspan="2">
										Jei esate mūsų narys galite <a href="login.php">Prisijungti čia</a>.
									</td>
								</tr>
							</table>
							</form>
						</div>
					</div>
				</div>
			</div>
			
<?php include('common/footer.php'); ?>