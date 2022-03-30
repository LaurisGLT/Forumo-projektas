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
									<?php include('AdminPanel.php');
                                    ?>
								</div>
								<div class="col-md-9">
                                <div>
                                <table class='table table-bordered table-striped'>
                                        <td>Klaida</td>
                                        <td>Aprašymas</td>
                                        <td>Vartotojas</td>
									<?php
                                    $result = get_reports();
                                        if($result['totalResult']>0){
            
                                            foreach($result['allData'] as $data){
                                             
                                                echo "<tr><td>" .$data['title']. "</td><td> " .$data['description']. "</td><td><a href='./user-detail.php?userid=".$data['added_by']."'>" .$data['added_by']. "</a></td>
                                
                                                <td><a href='../garbagephp/delete_report.php?id=".$data['id']."'<input type='submit' class='btn btn-danger'/>Ištrinti</td></tr>";
                                        }        
                                        }
                                    ?>
                                    </table>
                                </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
<?php include('common/footer.php'); }?>