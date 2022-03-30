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
									<?php include('AdminPanel.php'); ?>
								</div>
								<div class="col-md-9">
                                <div>
									Sveikas <?php if($_SESSION['userData']['role'] == 1){ echo "Administratoriau ".$_SESSION['userData']['username']."";} else{echo "Moderatoriau ".$_SESSION['userData']['username']."";} ?>
                                    <br>
                                    Čia gali Moderuoti forumo vartotojus ir jų komentarus
                                </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
<?php include('common/footer.php');} ?>