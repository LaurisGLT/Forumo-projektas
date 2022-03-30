<?php if(!isset($_SESSION['userData'])){
    header("location:index.php");
}elseif($_SESSION['userData']['role']!= 1){
    header("location:index.php");
}else{
	?>
<div class="list-group">
	<a href="UserChanges.php" class="list-group-item">Vartotojų Valdymas</a>
	<a href="PostChanges.php" class="list-group-item">Temų Valdymas</a>
	<a href="CommentChanges.php" class="list-group-item">Komentarų Valdymas</a>
	<a href="contactRequests.php" class="list-group-item">Susisiekimo prašymai</a>
	<a href="reports.php" class="list-group-item">Klaidų pranešimai</a>
	<a href="innerjoin.php" class="list-group-item">Įrašų valdymas</a>
</div>
<?php } ?>