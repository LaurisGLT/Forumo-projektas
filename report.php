<?php include('common/header.php'); ?>
<?php
						// Pridėti atsakymą
						if(isset($_POST['contact'])){
							$title=$_POST['title'];
								$description=$_POST['description'];
							if(empty($title) || empty($description)){
								echo _warning('Užpildykite privalomus laukus!');
							}else{
								$data=array();
								$data['title']=$title;
								$data['description']=$description;
								$data['added_by']=$_SESSION['userData']['user_id'];
								$res=report($data);
								if($res['bool']==true){
									echo _success($res['msg']);
								}else{
									echo _error($res['msg']);
								}
                            }
                        }

							
						
					?>
                    <div class="row" id="reply">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">Praneškite klaidą</div>
						<div class="panel-body">
							<?php if(isset($_SESSION['userData'])){ ?>
							<form action="" method="post">
								<table class="table table-bordered">
									<tr>
										<th>Klaida trumpai</th>
										<td><input type="text" name="title" class="form-control" /></td>
									</tr>
									<tr>
										<th>Detalus aprašymas</th>
										<td><textarea class="form-control" name="description"></textarea></td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="submit" name="contact" class="btn btn-warning" value="Susisiekti" />
										</td>
									</tr>
								</table>
							</form>
							<?php } else{
								?>
								<p class="text-inverse">Reikia <a href="login.php">Prisijungti</a> Jei norite susisiekti</p>
								<?php
							}	
							?>
						</div>
					</div>
				</div>
			
			</div>
            <?php include('common/footer.php'); ?>