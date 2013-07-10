<?php
	if(isset($_SESSION['USERID'])) {
		$id = $_SESSION['USERID'];
		header("location: index.php?view=profile&id=$id");
	}
?>


<div class="row-fluid">
	<div class="span12 hero-unit">
		<h1>MarkCMS - The Most Secured CMS!</h1>
		<p>Built with the power and features of the Model-View-Controller Architecture.</p>

		<a href="#" class="btn btn-primary btn-large">Learn More</a>
	</div>
</div>

<div class="row-fluid">
	<h3 class="span12">Hear from other developers</h3>
</div>

<div class="row-fluid">
	<div class="carousel slide span12" id="artists">

		<div class="carousel-inner">

			<div class="item">
		      <img src="includes/img/smith.jpg" alt="Constance Smith.">
		      <div class="carousel-caption">
		        <h4>Constance Smith</h4>
		        <p>This CMS framework saves me alot of time. From development up to maintenance, great framework!</p>
		      </div>
		    </div>

		    <div class="item">
		      <img src="includes/img/larue.jpg" alt="LaVonne LaRue. ">
		      <div class="carousel-caption">
		        <h4>Lavonne Larue</h4>
		        <p>MarkCMS is the best CMS framewrok I've used. Alot of useful features!</p>
		      </div>
		    </div>
		    
		    <div class="item active">
		      <img src="includes/img/ta.jpg" alt="Xhou Ta.">
		      <div class="carousel-caption">
		        <h4>Xhou Ta</h4>
		        <p>As a Chinese Developer, I handle multiple projects with tough deadline. But no worries since I'm a MarkCMS user!</p>
		      </div>
		    </div>

		</div>


		<a href="#artists" class="left carousel-control" data-slide="prev">&lsaquo;</a> 
		<a href="#artists" class="right carousel-control" data-slide="next">&rsaquo;</a> 

	</div>
</div>