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
                                    <tr class="tableheader">
                                        <td>Temos ID</td>
                                        <td>Temos Pavadinimas</td>
                                        <td>Apibūdinimas</td>
                                        <td>
                                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Ieškoti">
                                        </td>
                                  </tr>
                                  <tbody id='myTable'>
									<?php
                                    $result = get_posts();
                                        if($result['totalResult']>0){
                                
                                            foreach($result['allData'] as $data){
                                             
                                                echo "<tr><td>" .$data['post_id']. "</td><td>" .$data['title']. "</td><td> " .$data['description']. "</td>
                                                <td><a href='./update_post.php?id=".$data['post_id']."'class='btn btn-warning'/>redaguoti
                                                <a href='../garbagephp/delete_post.php?id=".$data['post_id']."'<input type='submit' class='btn btn-danger'/>Ištrinti</td></tr>";
                                        }        
                                        }
                                    ?>
                                  </tbody>
                                    </table>
                                </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>

            <script>
    function myFunction() {
  // Declare variables
  var input, filter, tbody, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  tbody = document.getElementById("myTable");
  tr = tbody.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
    
    </script>
			
<?php include('common/footer.php');} ?>