<?php include('common/header.php');
if(isset($_SESSION['userData'])){
?>
		
<?php
	$con=mysqli_connect('localhost','root','','forum');
?>
<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">Kokios auto detalės norėtumėte <span class="badge"></span></div>
						<div class="panel-body">
                        <div class="row">
                        <form class="form-inline" method = "POST">
							<table class="table table-bordered table-striped">
								<tr>
									<td>
                    
                                    <label for="part" class="col-sm-2 control-label">Detalė</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name="part">
                                                         <option value="akum" >Akumuliatorius</option>
                                                    <option value="amort">Amortizatorius</option>
                                        </select>        
                                  
                                    </td>    
                                    <td>
                                    <button type="submit" name="search" class="btn btn-default">Ieškoti</button>
                                    
                                    </td>
								</tr>
							</table>
                        </form>
                        </div>
                                  
                                   <?php
                                   echo "<table class='table table-bordered table-striped'>";
					               $con=mysqli_connect('localhost','root','','forum');
                                             if(isset($_POST['search'])){

                                              $part=$_POST['part'];
                                              $id=$_GET['id'];

                                        if($id == 1){
                                        if($part == "akum"){

                                        $sql = "SELECT * FROM e90prekes WHERE type = 'akum' ORDER BY kaina ASC;";
                                        $res=mysqli_query($con,$sql);
                                         while($row = mysqli_fetch_assoc($res)){
                                              if($row['kaina'] == 0){
                                              }
                                              else{
                                                  echo "<tr><td><a href='".$row['href']."'>" .$row['product']. "</a></td><td> " . $row['kaina'] . "€</td></tr>";
                                              }  
                                        }
                                        }elseif($part == "amort"){
                                        $sql = "SELECT * FROM e90prekes WHERE type = 'amort' ORDER BY kaina ASC;";
                                        $res=mysqli_query($con,$sql);
    
                                        while($row = mysqli_fetch_assoc($res)){
                                             if($row['kaina'] == 0){
                                              }else{
                                                  echo "<tr><td><a href='".$row['href']."'>" .$row['product']. "</a></td><td> " . $row['kaina'] . "€</td></tr>";
                                              }
                                        }
                                        }
                                        }elseif($id == 2){
                                        if($part == "akum"){

                                         $sql = "SELECT * FROM e60prekes WHERE type = 'akum' ORDER BY kaina ASC;";
                                         $res=mysqli_query($con,$sql);

                                        while($row = mysqli_fetch_assoc($res)){
                                             if($row['kaina'] == 0){
                                              }else{
                                                  echo "<tr><td><a href='".$row['href']."'>" .$row['product']. "</a></td><td> " . $row['kaina'] . "€</td></tr>";
                                              }
                                        }
                                        }elseif($part == "amort"){
                                        $sql = "SELECT * FROM e60prekes WHERE type = 'amort' ORDER BY kaina ASC;";
                                        $res=mysqli_query($con,$sql);

                                        while($row = mysqli_fetch_assoc($res)){
                                             if($row['kaina'] == 0){
                                              }else{
                                                  echo "<tr><td><a href='".$row['href']."'>" .$row['product']. "</a></td><td> " . $row['kaina'] . "€</td></tr>";
                                              }
                                        }
                                        }

                                        }
                                        }
                                        echo " </table>"
                                        ?>
                                  
						</div>
					</div>
				</div>
			</div>

            <?php }else{echo _warning('Apgailestaujame, naudotis funkcija reikia prisiregistruoti');}

include('common/footer.php'); ?>