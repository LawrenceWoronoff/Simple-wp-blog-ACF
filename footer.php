<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->



	<!-- <footer id="colophon" class="site-footer" role="contentinfo">
		abc
	</footer>#colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<div class="py-5 bg-light mx-md-3 sec-subscribe">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="h4 fw-bold">Subscribe to newsletter</h2> </div>
		</div>
		<form action="" class="row">
			<div class="col-md-8">
				<div class="mb-3 mb-md-0">
					<input type="email" class="form-control" placeholder="Enter your email"> </div>
			</div>
			<div class="col-md-4 d-grid">
				<input type="submit" class="btn btn-primary" value="Subscribe"> </div>
		</form>
	</div>
</div>

<div class="site-footer">
	<div class="container">
		<div class="row justify-content-center copyright">
			<div class="col-lg-7 text-center">
				<div class="widget">
					<ul class="social list-unstyled">
						<li><a href="#"><span class="icon-facebook"></span></a></li>
						<li><a href="#"><span class="icon-twitter"></span></a></li>
						<li><a href="#"><span class="icon-linkedin"></span></a></li>
						<li><a href="#"><span class="icon-youtube-play"></span></a></li>
					</ul>
				</div>
				<div class="widget">
					<p>Copyright &copy;
						<script>
						document.write(new Date().getFullYear());
						</script> All rights reserved | This platform is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="../../index-1.htm" target="_blank" rel="nofollow noopener">Newspaper Team</a> </p>
					<div class="d-block"> <a href="#" class="m-2">Terms &amp; Conditions</a>/ <a href="#" class="m-2">Privacy Policy</a> </div>
				</div>
			</div>
		</div>
	</div>
	<div id="overlayer"></div>
	<div class="loader">
		<div class="spinner-border" role="status"> <span class="visually-hidden">Loading...</span> </div>
	</div>
	<script src="<?= get_template_directory_uri()?>/assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?= get_template_directory_uri()?>/assets/js/tiny-slider.js"></script>
	<script src="<?= get_template_directory_uri()?>/assets/js/glightbox.min.js aos.js navbar.js counter.js custom.js.pagespeed.jc.B7bFTsJZUK.js"></script> 

	<script>
	eval(mod_pagespeed_KpCH1a$C_m);
	</script>
	<script>
	eval(mod_pagespeed_Ej3jj9tqUo);
	</script>
	<script>
	eval(mod_pagespeed_Pkx$Oz4Gi9);
	</script>
	<script>
	eval(mod_pagespeed_9lpIcAXJZV);
	</script>
	<script>
	eval(mod_pagespeed_GIrE68D1a2);
	</script>
	<!-- <script async="" src="../../gtag/js-1.js?id=UA-23581568-13"></script> -->
	<script> 
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());
	gtag('config', 'UA-23581568-13');
	</script>
	<!-- <script defer="" src="../../beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194-1" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"724508469b1e1628","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.6.0","si":100}' crossorigin="anonymous"></script> -->
</div>


</body>
</html>
