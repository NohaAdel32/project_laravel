<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		@include('includes.head')
    </head>
    <body>
	
		<!-- Preloader -->
        @include('includes.preloader')
        <!-- End Preloader -->
		
		<!-- Get Pro Button -->
		<ul class="pro-features">
			<a class="get-pro" href="#">Get Pro</a>
			<li class="big-title">Pro Version Available on Themeforest</li>
			<li class="title">Pro Version Features</li>
			<li>2+ premade home pages</li>
			<li>20+ html pages</li>
			<li>Color Plate With 12+ Colors</li>
			<li>Sticky Header / Sticky Filters</li>
			<li>Working Contact Form With Google Map</li>
			<div class="button">
				<a href="http://preview.themeforest.net/item/mediplus-medical-and-doctor-html-template/full_screen_preview/26665910?_ga=2.145092285.888558928.1591971968-344530658.1588061879" target="_blank" class="btn">Pro Version Demo</a>
				<a href="https://themeforest.net/item/mediplus-medical-and-doctor-html-template/26665910" target="_blank" class="btn">Buy Pro Version</a>
			</div>
		</ul>
	
		<!-- Header Area -->
		<header class="header" >
			<!-- Topbar -->
			@include('includes.header')
			<!--/ End Header Inner -->
		</header>
		
		@yield('content')
		
		
		@include('includes.footer')
	
		
		
        @include('includes.footerjs')
    </body>
</html>