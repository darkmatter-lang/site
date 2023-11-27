<?php
$error_msg = "An unknown error has occured";
$error_sass = "";
if ($error == 403) {
	$error_msg = "403 Forbidden";
	$error_sass = "You do not have permission to access this page";
} else if ($error == 404) {
	$error_msg = "404 Not Found";
	$error_sass = "The page you requested does not exist.";
} else if ($error == 500) {
	$error_msg = "500 Internal Server Error";
	$error_sass = "A server error has occurred";
}
?>

<section id="main" class="hero is-fullheight">
	<div class="is-overlay">
		<div id="main-bg-particles"></div>
		<div class="main-overlay"></div>
	</div>
	<div class="hero-body main-text">
		<div class="container">
			<div class="columns">
				<div class="column"></div>
				<div class="column is-5">
					<div class="transparent-card has-text-centered">
						<div class="content">
							<!--
							<h1 class="title is-1"><?php echo $error_msg;?></h1>
							<h2 class="subtitle is-4"><?php echo $error_sass;?></h2>
							-->

							<h3 class="title is-3 is-white"><?php echo $error_msg;?></h3>
							
							<p>
								<b><?php echo $error_sass;?></b>
							</p>
							
							<br>

							<p>
								<a class="button is-white is-outlined is-medium" href="/"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Return to Homepage</a>
							</p>
						</div>
					</div>
				</div>
				<div class="column"></div>
			</div>
		</div>
	</div>
</section>
