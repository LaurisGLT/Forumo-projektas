<?php include('common/header.php');

if(!isset($_SESSION['userData'])){
    header("location:index.php");
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
                                        $res = select_reply($id);
										if(isset($_POST['updatereply'])){
											$title=$_POST['title'];
											$description=$_POST['description'];
											// Pridėti data į DB
											$data=array();
											$data['title']=$title;
											$data['description']=$description;
											$result=update_reply($id,$data);
											if($result['bool']==true){
												echo _success($result['msg']);
											}else{
												echo _warning($result['msg']);
											}
                                        }
                                        if($res['totalResult']>0){
                                            foreach($res['allData'] as $data){
                                                
									?>
									<form method="post" action="">
										<table class="table table-bordered">
											<tr>
												<th>Komentaro Pavadinimas</th>
												<td><input type="text" name="title" class="form-control" value="<?php echo $data['title']; ?>" /></td>
											</tr>
											<tr>
												<th>Komentaras</th>
												<td><input type="text" name="description" class="form-control" value="<?php echo $data['description']; ?>" /></td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<input type="submit" class="btn btn-warning" value="Atnaujinti" name="updatereply" />
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
			
<?php include('common/footer.php'); }} }?>