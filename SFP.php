<?php include('common/header.php');
if(isset($_SESSION['userData'])){
?>

<div class="row">
				<div class="col-md-12">
                <?php
					$con=mysqli_connect('localhost','root','','forum');
					
                    if(isset($_POST['search'])){

                                $model=$_POST['model'];
                                $year=$_POST['year'];
                                $engine=$_POST['engine'];

                                if($model == "E9X" && $year == "2005" && $engine == "145"){
                                    $answer = 1;
                                    header("location:products.php?id=1");
                                }elseif($model == "E6X" && $year == "2003" && $engine == "170"){
                                    $answer = 2;
                                    header("location:products.php?id=2");
                                }else{
                                    echo _warning('Apgailestaujame, tokio modelio nėra arba jo nėra sistemoje');
                                }
                        }

                    
                    
					?>
					<div class="panel panel-success">
						<div class="panel-heading">Pasirinkti norimą automobilį <span class="badge"></span></div>
						<div class="panel-body">
                        <div class="row">
                        <form class="form-inline" method = "POST">
							<table class="table table-bordered table-striped">
								<tr>
									<td>
                    
                                    <label for="model" class="col-sm-2 control-label">Modelis</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name="model">
                                                         <option value="E9X" > E90/E91/E92/E93</option>
                                                    <option value="E6X">E60/E61</option>
                                        </select>        
                                  
                                    </td>
                                    <td>

                                        <label for="year" class="col-sm-2 control-label">Metai</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name="year">
                                                         <option value="2005">2005–2011</option>
                                                    <option value="2003">2003-2010</option>
                                        </select>

                                    </td>
                                    <td>    

                                        <label for="engine" class="col-sm-2 control-label">Variklis</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name="engine">
                                                         <option value="145">3.0Dzl 145kW</option>
                                                    <option value="170">3.0Dzl 170kW</option>
                                        </select>
                                        
                                    </td>
                                    <td>
                                    <button type="submit" name="search" class="btn btn-default">Ieškoti</button>
                                    
                                    </td>
								</tr>
							</table>
                        </form>
                        </div>
						</div>
					</div>
				</div>
			</div>
		
<?php }else{echo _warning('Apgailestaujame, naudotis funkcija reikia prisiregistruoti');}

include('common/footer.php'); ?>