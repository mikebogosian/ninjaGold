<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ninja Gold Game - MVC</title>
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">	
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<div class="container">
	
		<div class="gold">
			<span>Your Gold:</span>
			<input type="text" name="your-gold" value="<?php echo ($this->session->userdata('gold_count') != false) ? $this->session->userdata('gold_count') : '' ?>" disabled>
		</div>
		<div class="restart">
			<form id="restart-form" action="/home/process" method="post">
				<input type="hidden" name="action" value="restart_form" />
				<input type="submit" class="btn btn-success" value="Start Over">
			</form>
		</div>
		<div class="clear"></div>
		<div class="building">
			<h3>Farm</h3>
			<p>(earns 10-20 golds)</p>
			<form action="/home/process" method="post">
				<input type="hidden" name="building" value="farm" />
				<input type="submit" class="btn btn-default" value="Find Gold!"/>
			</form>
		</div>

		<div class="building">
			<h3>Cave</h3>
			<p>(earns 5-10 golds)</p>
			<form action="/home/process" method="post">
				<input type="hidden" name="building" value="cave" />
				<input type="submit" class="btn btn-default" value="Find Gold!"/>
			</form>
		</div>

		<div class="building">
			<h3>House</h3>
			<p>(earns 2-5 golds)</p>
			<form action="/home/process" method="post">
				<input type="hidden" name="building" value="house" />
				<input type="submit" class="btn btn-default" value="Find Gold!"/>
			</form>
		</div>

		<div class="building">
			<h3>Casino!</h3>
			<p>(earns/takes 0-50 golds)</p>
			<form action="/home/process" method="post">
				<input type="hidden" name="building" value="casino" />
				<input type="submit" class="btn btn-default" value="Find Gold!"/>
			</form>
		</div>
		<div class="clear"></div>
		<div class="log">
			<span>Activities:</span>
			<div id="log">
<?php 			if ($this->session->userdata('activity'))
				{
					foreach ($this->session->userdata('activity') as $activity) {
						if(strpos($activity,'Ouch'))
							echo "<span class='red'>" . $activity . "</span>";
						else
							echo "<span class='green'>" . $activity . "</span>";
					}
				}
?>
			</div>	
		</div>
	</div>
</body>
</html>