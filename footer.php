    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>About US</h3>
                        </div>
                        <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>   
						<div class="footer-right">
							<ul class="footer-links-soi">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul><!-- end links -->
						</div>						
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Information Link</h3>
                        </div>

                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'themeLocationOne',
                                'menu_class'=> 'footer-links', 
                            ));
                            ?>
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">info@yoursite.com</a></li>
                            <li><a href="#">www.yoursite.com</a></li>
                            <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                            <li>+61 3 8376 6284</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">SmartEDU</a> Design By : <a href="https://html.design/">html design</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <div class="search-overlay__wrapper search-overlay">
        <div class="search-overlay__top">
            <div class="container">
                <i class="fa fa-search search-overlay__icon mr-5" aria-hidden="true"></i>
                <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
                <i class="fa fa-window-close search-overlay__close search-overlay__icon ml-5" aria-hidden="true"></i>
            </div>
        </div>
        <div class="container">
            <div id="search-overlay__results"></div>
        </div>
    </div>


    <!-- ALL JS FILES -->
    <!-- <script src="<?php echo get_theme_file_uri() . '/assets/js/bootstrap.min.js' ?>"></script> -->
    <!-- <script src="<?php echo get_theme_file_uri() . '/assets/js/all.js' ?>"></script> -->
    <!-- ALL PLUGINS -->
    <!-- <script src="<?php echo get_theme_file_uri() . '/assets/js/custom.js'?>"></script> -->
	<script src="<?php  echo get_theme_file_uri() . '/assets/js/timeline.min.js'?>"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
    <?php wp_footer() ?>
</body>
</html>