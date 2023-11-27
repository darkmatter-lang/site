<link rel="stylesheet" type="text/css" href="/assets/css/homepage.css">
<script src="/assets/js/homepage.js" defer></script>
<script src="/assets/js/rgb-raster.js" defer></script>
<script src="/assets/js/constellation.js" defer></script>

<section id="main" class="hero is-fullheight stars clip">
	<div class="is-overlay">
		<div id="main-bg-particles"></div>
		<div id="constellation-container">
			<canvas id="rgb-raster" width="0" height="0"></canvas>
			<canvas id="constellation" width="0" height="0"></canvas>
		</div>
	</div>
	<div class="hero-body main-text">
		<div style="margin:0 auto;">
			<!-- DESKTOP -->
			<div class="is-hidden-mobile">
				<div class="columns">
					<div class="column is-3 is-hidden-mobile hero-body">
						<figure class="image no-select">
							<img src="/assets/img/logo.png" alt="Darkmatter Logo" class="logo">
						</figure>
					</div>
					<div class="column is-9">
						<h1 class="title is-1 is-white"><b><span id="phrase">A programming language from another universe.</span><span class="cursor"></span></b></h1>

						<div class="container">
							<p class="subtitle is-4 is-white">
								<b class="glow">Darkmatter</b> is an open-source platform agnostic modern Programming Language.
								It is syntatically similar to Java/C# with the performance and power of C/C++.
								<br>
								<br>
								Darkmatter compiles directly to a <abbr title="AoT (Ahead-of-Time) via LLVM">native</abbr> platform/architecture binary or <abbr title="JIT (Just-in-Time)">JVM</abbr> byte-code.
								<br>
							</p>
							<br>
							<p class="subtitle is-5">
								<a class="button is-medium is-white is-outlined" href="#learn-more"><b><i class="fa fa-rocket"></i>&nbsp;Learn More</b></a>
								&nbsp;
								<a class="button is-medium is-white is-outlined" href="https://github.com/darkmatter-lang/"><b><i class="fa fa-github"></i>&nbsp;See our GitHub</b></a>
							</p>
						</div>
					</div>
				</div>
			</div>

			<!-- MOBILE -->
			<div class="column is-4 is-hidden-desktop">
				<figure class="image no-select">
					<img src="/assets/img/logo.png" alt="Darkmatter Logo" class="logo">
				</figure>
				<h4 class="title is-4 is-white">A programming language from another universe</h4>
				<br>
				<p class="subtitle is-5 is-white">
					<b class="glow">Darkmatter</b> is an open-source platform agnostic modern Programming Language.
					It is syntatically similar to Java/C# with the performance and power of C/C++.
					<br>
					<br>
					Darkmatter compiles directly to a <abbr title="AoT (Ahead-of-Time) via LLVM">native</abbr> platform/architecture binary or <abbr title="JIT (Just-in-Time)">JVM</abbr> byte-code.
					<br>
				</p>
				<br>
				<p class="subtitle is-5 has-text-centered">
					<a class="button is-medium is-white is-outlined" href="https://github.com/darkmatter-lang/"><b><i class="fa fa-github"></i>&nbsp;See our GitHub</b></a>
					<br><br>
					<a class="button is-medium is-white is-outlined" href="#learn-more"><b><i class="fa fa-rocket"></i>&nbsp;Learn More</b></a>
				</p>
			</div>

		</div>
	</div>
</section>

<section id="learn-more" class="hero is-fullheight">
	<div class="homepage-container">
		<h1 class="title is-1 is-white has-text-left">Why Darkmatter?</h1>

		<div class="homepage-container"></div>

		<div class="columns">
			<div class="column is-4">
				<div class="homepage-column-content">
					<h2 class="title is-2 is-white has-text-centered"><i class="fa fa-desktop fa-2x"></i></h2>
					<h2 class="title is-2 is-white has-text-centered">Platform Agnostic</h2>
					<div class="content">
						<p>
							Darkmatter is not owned by a large tech monopoly, it is an indepdendent community-developed language.
						</p>
						
						<br>
						
						<p>
							<h5 class="title is-5 is-white">Unlike C#, Darkmatter:</h5>
							<ul>
								<li>
									Does <b>not</b> require a bloated and platform-exclusive .NET CLR to function.
								</li>
								<li>
									Is <b>not</b> bias toward any platform or architecture.
								</li>
								<li>
									Is happy to support your platform or achitecture, the more the merrier.
								</li>
							</ul>
						</p>
					</div>
				</div>
			</div>
			<div class="column is-4">
				<div class="homepage-column-content">
					<h2 class="title is-2 is-white has-text-centered"><i class="fa fa-bolt fa-2x"></i></h2>
					<h2 class="title is-2 is-white has-text-centered">Lightspeed Execution</h2>
					<div class="content">
						<p>
							Unlike other languages like Java, Kotlin, C# or any interpreted langauge like Python,
							Darkmatter is focused on being a fast, efficient, and effective core-language.
							Effectivly fast enough to replace your C# and C++ projects.
						</p>

						<br>

						<p>
							<h5 class="title is-5 is-white">LLVM AoT compilation:</h5>
							<ul>
								<li>
									Darkmatter compiler parses/tokenizes/lints source-code into an <abbr title="Abstract Syntax Tree">AST</abbr>.
								</li>
								<li>
									AST is analyzed and depending on the compiler flags goes through an initial optimization stage.
								</li>
								<li>
									AST is then converted to <abbr title="LLVM Intermediate Representation">LLVM-IR</abbr> assembly files (<code>.ll</code>).
								</li>
								<li>
									Finally, LLVM-IR is then optimized and assembled into a binary of your choice.
									Whether that be a native library, native executable, or a cross-compiled binary for another platform/architecture.
								</li>
							</ul>
						</p>

						<br>

						<p>
						<h5 class="title is-5 is-white">JVM JIT compilation:</h5>
							<ul>
								<li>
									Fast for debugging large projects without having to change the source-code.
								</li>
								<li>
									Expect 1:1 LLVM AoT to JVM JIT behavior.
								</li>
							</ul>
						</p>
					</div>
				</div>
			</div>
			<div class="column is-4">
				<div class="homepage-column-content">
					<h2 class="title is-2 is-white has-text-centered"><i class="fa fa-cog fa-2x"></i></h2>
					<h2 class="title is-2 is-white has-text-centered">Simple but Powerful</h2>
					<div class="content">
						<p>
							Darkmatter has the leverage of a lower-level language like C while having the syntax of a high-level langauge.
						</p>
						<p>
							Here are just a few of the components within Darkmatter's Standard Libary:
						</p>
						<p>
							<ul>
								<li>
									<b>Core &ndash;</b>
									Low-level System API/ABI bindings, Console, Process.
								</li>
								<li>
									<b>Types &ndash;</b>
									Primitive data-types (scalars, booleans, string) and Object data-structures.
								</li>
								<li>
									<b>FFI &ndash;</b>
									Foreign Function Interface bindings to other languages, such as C.
								</li>
								<li>
									<b>Filesystem &ndash;</b>
									API bindings to the underlying file-system (if applicable).
								</li>
								<li>
									<b>Network &ndash;</b>
									Networking with sockets, epoll, kqueue, etc.
								</li>
								<li>
									<b>Graphics &ndash;</b>
									Vulkan and OpenGL bindings along with high-level abstract windowing toolkits/libraries.
								</li>
								<li>
									<b>Audio &ndash;</b>
									Audio bindings.
								</li>
							</ul>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="hero is-halfheight">
	<div class="homepage-container"></div>
<section>

<section class="hero is-halfheight">
	<div class="homepage-container">
		<h1 class="title is-1 is-white has-text-centered">Under Development</h1>
		<h3 class="subtitle is-3 is-white has-text-centered">Check back with us soon!</h3>
	</div>
</section>

<!--
<section id="contributors" class="hero is-fullheight">
	<div class="homepage-container">
		<h1 class="title is-1 is-white has-text-centered">Project Contributors</h1>

		<div class="homepage-container has-text-centered">
			<div class="contributors">
				<div class="tile">
					<a href="https://github.com/anthonywww" target="_blank">
						<img src="https://github.com/anthonywww.png?size=128" alt="Anthony Waldsmith">
					</a>
					<p>Anthony Waldsmith</p>
				</div>
				<div class="tile">
					<a href="https://github.com/mjovanc" target="_blank">
						<img src="https://github.com/mjovanc.png?size=128" alt="Marcus Cvjeticanin">
					</a>
					<p>Marcus Cvjeticanin</p>
				</div>
			</div>
		</div>
	</div>
</section>
-->
