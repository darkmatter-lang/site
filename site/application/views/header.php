<!DOCTYPE html>
<html>
	<head>
		<title><?php echo empty($title) ? (empty($this->lang->line("title")) ? "**title**" : $this->lang->line("title")) : "$title - " . (empty($this->lang->line("title")) ? "**title**" : $this->lang->line("title"));?></title>
		<meta charset="UTF-8">
		<meta name="title" content="<?php echo empty($title) ? (empty($this->lang->line("title")) ? "**title**" : $this->lang->line("title")) : "$title - " . (empty($this->lang->line("title")) ? "**title**" : $this->lang->line("title"));?>">
		<meta name="author" content="<?php echo (empty($this->lang->line("title")) ? "**title**" : $this->lang->line("title"))?>">
		<meta name="description" content="<?php echo empty($description) ? (empty($this->lang->line("description")) ? "**description**" : $this->lang->line("description")) : "$description";?>">
		<meta name="tags" content="<?php $this->config->item("meta_tags", "darkmatter");?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="og:title" content="<?php echo empty($title) ? (empty($this->lang->line("title")) ? "**title**" : $this->lang->line("title")) : "$title - " . (empty($this->lang->line("title")) ? "**title**" : $this->lang->line("title"));?>">
		<meta name="og:description" content="<?php echo empty($description) ? (empty($this->lang->line("description")) ? "**description**" : $this->lang->line("description")) : "$description";?>">
		<meta name="og:image" content="/favicon.png">
		<meta name="theme-color" content="#00FFFF">
		<meta name="background-color" content="#000000">
		<link rel="icon" href="/favicon.png" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link type="application/json+oembed" href="/oembed.json">
		<!-- Begin CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.4/css/bulma.min.css" integrity="sha512-HqxHUkJM0SYcbvxUw5P60SzdOTy/QVwA1JJrvaXJv4q7lmbDZCmZaqz01UPOaQveoxfYRv1tHozWGPMcuTBuvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.21.0/video-js.min.css" integrity="sha512-kCCb9I/QM9hw+hm+JlN2ounNo2bRFZ4r9guSBv0BYk7RezWV2H8eI1unYnpJrU8+2g773WW1qNG+fSQ0X7M3Tg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/show-your-terms/1.1.1/show-your-terms.min.css" integrity="sha512-+279nwKfD71B9iAEZqRAZEVAdgb7W0NqrDGKMG3I7l8dPAEw2qSMBpZ2ITLj4ieaAIkrDH+QjR7scM15n16yCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="/assets/css/progress-bar-colors.css">
		<link rel="stylesheet" type="text/css" href="/assets/css/videojs-theme-darkmatter.css">
		<!-- End CSS -->
	</head>
	<body>
		<!-- Begin Main Container -->
		<div id="main-container">
			<span id="top"></span>
			<!-- Begin Body Head -->
			<div id="main-head" class="no-select">

				<?php if(empty($disable_navbar)):?>
				<!-- Begin Nav -->
				<nav class="navbar is-black" role="navigation"> <!-- is-fixed-top -->
					<div class="navbar-brand">
						<a class="navbar-item" href="/">
							<img src="/assets/img/logo.png">
							&nbsp;
							<span><b><?php echo empty($this->lang->line("title")) ? "**title**" : $this->lang->line("title");?></b></span>
						</a>

						<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="main-navbar">
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						</a>
					</div>



					<div id="main-navbar" class="navbar-menu">
						<div class="navbar-start">

							<div class="navbar-item has-dropdown is-hoverable">
								<a class="navbar-item" href="/members">
									<span class="icon">
										<i class="fa fa-users" aria-hidden="true"></i>&nbsp;
									</span>
									<span>Members</span>
								</a>
								<div class="navbar-dropdown">
									<a class="navbar-item" href="/members/top-posters">
										<span class="icon">
											<i class="fa fa-diamond" aria-hidden="true"></i>&nbsp;
										</span>
										<span>Top Posters</span>
									</a>
									<a class="navbar-item" href="/members/latest-posts">
										<span class="icon">
											<i class="fa fa-bolt" aria-hidden="true"></i>&nbsp;
										</span>
										<span>Latests Posts</span>
									</a>
									<a class="navbar-item" href="/members/top-violators">
										<span class="icon">
											<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;
										</span>
										<span>Top Violators</span>
									</a>
									<a class="navbar-item" href="/members/latest-violations">
										<span class="icon">
											<i class="fa fa-history" aria-hidden="true"></i>&nbsp;
										</span>
										<span>Latest Violations</span>
									</a>
								</div>
							</div>


							<div class="navbar-item has-dropdown is-hoverable">
								<a class="navbar-item" href="/metrics">
									<span class="icon">
										<i class="fa fa-area-chart" aria-hidden="true"></i>&nbsp;
									</span>
									<span>Metrics</span>
								</a>
								<div class="navbar-dropdown">
									<a class="navbar-item" href="/metrics/posts">
										<span class="icon">
											<i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
										</span>
										<span>Posts</span>
									</a>
									<a class="navbar-item" href="/metrics/violations">
										<span class="icon">
											<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;
										</span>
										<span>Violations</span>
									</a>
								</div>
							</div>

							<a class="navbar-item" href="/embeds">
								<span class="icon">
									<i class="fa fa-object-group" aria-hidden="true"></i>&nbsp;
								</span>
								<span>Embeddings</span>
							</a>

							<a class="navbar-item" href="/logs">
								<span class="icon">
									<i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
								</span>
								<span>Logs</span>
							</a>
						</div>

						<div class="navbar-end">
							<?php if (!empty($_SESSION["logged_in"])):?>
								<div class="navbar-item has-dropdown is-hoverable">
									<a class="navbar-item">
										<span class="icon">
											<?php if (empty($_SESSION["avatar"])):?>
												<i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;
											<?php else:?>
												<img src="<?php echo $_SESSION["avatar"];?>" alt="Profile Picture" style="border-radius:100%;vertical-align:middle">&nbsp;&nbsp;
											<?php endif;?>
										</span>
										<span><?php echo $_SESSION["username"];?></span>
									</a>
									<div class="navbar-dropdown">
										<a class="navbar-item" href="/user">
											<span class="icon">
												<i class="fa fa-gear" aria-hidden="true"></i>&nbsp;
											</span>
											<span>Settings</span>
										</a>
										<a class="navbar-item" href="/logout">
											<span class="icon">
												<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
											</span>
											<span>Logout</span>
										</a>
									</div>
								</div>
								
							<?php else:?>
								<a class="navbar-item" href="/login">
									<span class="icon">
										<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
									</span>
									<span>Login</span>
								</a>
						<?php endif;?>
						</div>
					</div>
				</nav>
				<?php endif;?>
				<!-- End Nav -->
			</div>
			<!-- End Main Head -->
			<!-- Begin Main Body -->
			<div id="main-body" class="content">
