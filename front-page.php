<?php
    get_header(); ?>

	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
            <?php
                $sliderHomePage = new WP_Query( array(
                    'posts_per_page' => 3,
                    'post_type' => 'slide',
                    'order' => 'ASC') );
                    
                if($sliderHomePage->have_posts()) {
                    while($sliderHomePage->have_posts()) {
                        $firstItem = true; 
                        $sliderHomePage->the_post();
                            $slides = (get_field('slide'));
                            ?>
                            <?php foreach ($slides as $slide): ?>
                            <div class="carousel-item <?php echo $firstItem ? 'active' : ''; ?>">
                                <div id="home" class="first-section" style="background-image:url(<?php echo esc_url($slide['image_background']['url']); ?>);">
                                    <div class="dtab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 text-right">
                                                    <div class="big-tagline">
                                                        <h2><?php echo esc_html($slide['title']); ?></h2>
                                                        <p class="lead"><?php echo esc_html($slide['sub_title']); ?>.</p>
                                                        <a href="<?php echo esc_url($slide['link_one']); ?>" class="hover-btn-new"><span>Contact Us</span></a>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a href="<?php echo esc_url($slide['link_two']); ?>" class="hover-btn-new"><span>Read More</span></a>
                                                    </div>
                                                </div>
                                            </div><!-- end row -->
                                        </div><!-- end container -->
                                    </div>
                                </div><!-- end section -->
                            </div>
                            <?php 
                                $firstItem = false;
                                endforeach; 
                            ?>
                        <?php
                    }
                }
            ?>    
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>About</h3>
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
                </div>
            </div><!-- end title -->

            <?php
                $aboutHomePage = new WP_Query( array(
                    'posts_per_page' => 1, 
                    'post_type' => 'about',
                    'order' => 'ASC') );
                if($aboutHomePage->have_posts()) {
                    while($aboutHomePage->have_posts()) {
                        $aboutHomePage->the_post();
                        ?>
                        
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="message-box">
                                    <h4><?php the_field('explain') ?></h4>
                                    <h2> <?php the_title() ?> </h2>
                                    <p><?php echo wp_trim_words( get_the_content( ), 20 ) ?></p>
                                    <a href="<?php the_permalink(); ?>" class="hover-btn-new orange"><span>Learn More</span></a>
                                </div><!-- end messagebox -->
                            </div><!-- end col -->
                            
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="post-media wow fadeIn">
                                    <img src="<?php $imageAboutPage = get_field("image_content"); echo $imageAboutPage['url']; ?>" alt="" class="img-fluid img-rounded">
                                </div><!-- end media -->
                            </div><!-- end col -->
			            </div>
                        <?php
                    }
                }
            ?>
            <?php
                $aboutHomePage = new WP_Query( array(
                    'posts_per_page' => 1, 
                    'post_type' => 'about',
                    'order' => 'ASC',
                    'offset' => 1
                ),
                );
                if($aboutHomePage->have_posts()) {
                    while($aboutHomePage->have_posts()) {
                        $aboutHomePage->the_post();
                        ?>
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="post-media wow fadeIn">
                                    <img src="<?php $imageAboutPage = get_field("image_content"); echo $imageAboutPage['url']; ?>" alt="" class="img-fluid img-rounded">
                                </div><!-- end media -->
                            </div><!-- end col -->
                            
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="message-box">
                                    <h4><?php the_field('explain') ?></h4>
                                    <h2><?php the_title() ?></h2>
                                    <p><?php echo wp_trim_words( get_the_content( ), 20 ) ?></p>

                                    <a href="<?php the_permalink(); ?>" class="hover-btn-new orange"><span>Learn More</span></a>
                                </div><!-- end messagebox -->
                            </div><!-- end col -->
                        </div>
                        <?php
                    }
                }
            ?>

        </div><!-- end container -->
    </div><!-- end section -->

    <section class="section lb page-section">
		<div class="container">
			 <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Our history</h3>
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
                </div>
            </div><!-- end title -->

			<div class="timeline">
				<div class="timeline__wrap">
					<div class="timeline__items">
                    <?php
                        $historyHomePgae = new WP_Query(
                            array(
                            'posts_per_page' => 10, 
                            'post_type' => 'our-history',
                            'order' => 'ASC',
                            )
                            );
                        if($historyHomePgae->have_posts()) {
                            while($historyHomePgae->have_posts()) {
                                $historyHomePgae->the_post();
                                ?>
                            <div class="timeline__item">
    						    <div class="timeline__content img-bg-01">
    						        <h2><?php the_title() ?></h2>
    						        <p><?php echo wp_trim_words( get_the_content( ), 20 ) ?></p>
    						    </div>
    						</div>
                                <?php
                            }
                        }
                    ?>
					</div>
				</div>
			</div>
		</div>
	</section>

        <section class="section lb page-section">
		<div class="container">
			 <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Events</h3>
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
                </div>
            </div><!-- end title -->

            <div class="d-flex items-center flex-column">
                <?php
                    $today = date("Ymd");
                    $eventHomePgae = new WP_Query(
                        array(
                        'posts_per_page' => 2, 
                        'post_type' => 'event',
                        'meta_key' => 'events_date',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                        'meta_query' => array ( array(
                            'key' => 'events_date',
                            'compare' => '>=',
                            'value' => $today,
                            'type' => 'numeric'
                        ) )
                        )
                        );
                    if($eventHomePgae->have_posts()) {
                        while($eventHomePgae->have_posts()) {
                            $eventHomePgae->the_post();
                            get_template_part("template_part/content", "event");
                        }
                    }
                ?>
            </div>
		</div>
	</section>

	<div class="section cl">
		<div class="container">
			<div class="row text-left stat-wrap">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-study"></i></span>
					<p class="stat_count">12000</p>
					<h3>Students</h3>
				</div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-online"></i></span>
					<p class="stat_count">240</p>
					<h3>Courses</h3>
				</div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-years"></i></span>
					<p class="stat_count">55</p>
					<h3>Years Completed</h3>
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->

    <div id="testimonials" class="parallax section db parallax-off" style="background-image:url('');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Testimonials</h3>
                <p>Lorem ipsum dolor sit aet, consectetur adipisicing lit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="testi-carousel owl-carousel owl-theme">
                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <!-- <img src="images/testi_01.png" alt="" class="img-fluid"> -->
                                <h4>James Fernando </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
                                <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <!-- <img src="images/testi_02.png" alt="" class="img-fluid"> -->
                                <h4>Jacques Philips </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Awesome Services!</h3>
                                <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <!-- <img src="images/testi_03.png" alt="" class="img-fluid "> -->
                                <h4>Venanda Mercy </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
                                <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->
                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <!-- <img src="images/testi_01.png" alt="" class="img-fluid"> -->
                                <h4>James Fernando </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
                                <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <!-- <img src="images/testi_02.png" alt="" class="img-fluid"> -->
                                <h4>Jacques Philips </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Awesome Services!</h3>
                                <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->

                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <!-- <img src="images/testi_03.png" alt="" class="img-fluid"> -->
                                <h4>Venanda Mercy </h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
                                <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                            </div>
                            <!-- end testi-meta -->
                        </div><!-- end testimonial -->
                    </div><!-- end carousel -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="parallax section dbcolor">
        <div class="container">
            <div class="row logos">
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <!-- <a href="#"><img src="images/logo_01.png" alt="" class="img-repsonsive"></a> -->
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <!-- <a href="#"><img src="images/logo_02.png" alt="" class="img-repsonsive"></a> -->
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <!-- <a href="#"><img src="images/logo_03.png" alt="" class="img-repsonsive"></a> -->
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <!-- <a href="#"><img src="images/logo_04.png" alt="" class="img-repsonsive"></a> -->
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <!-- <a href="#"><img src="images/logo_05.png" alt="" class="img-repsonsive"></a> -->
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <!-- <a href="#"><img src="images/logo_06.png" alt="" class="img-repsonsive"></a> -->
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

<?php 
get_footer();
?>