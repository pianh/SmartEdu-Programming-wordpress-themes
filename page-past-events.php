<?php
    get_header();
?>

	<div class="all-title-box">
		<div class="container text-center">
			<h1><?= the_title() ?><span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
		</div>
	</div>
	
    <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3><?= the_title() ?></h3>
                    <p class="lead"><?php wp_trim_excerpt( the_content(),5 ); ?></p>
                </div>
            </div><!-- end title -->
        
            <?php
                    $today = date("Ymd");
                    $pastEvent = new WP_Query(
                        array(
                        'paged' => get_query_var('paged', 1),
                        'posts_per_page' => 1, 
                        'post_type' => 'event',
                        'meta_key' => 'events_date',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                        'meta_query' => array ( array(
                            'key' => 'events_date',
                            'compare' => '<',
                            'value' => $today,
                            'type' => 'numeric'
                        ) )
                        )
                        );
                    while($pastEvent->have_posts()){
                    $pastEvent->the_post();
                    ?>
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <?php get_template_part("template_part/content", "event"); ?>
                            </div><!-- end col -->
                            
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="post-media wow fadeIn">
                                    <img src="<?php $imageAboutPage = get_field("image_content"); echo $imageAboutPage['url']; ?>" alt="" class="img-fluid img-rounded">
                                </div><!-- end media -->
                            </div><!-- end col -->
			            </div>
                    <?php
                }
            ?>
             <!-- end row -->
             <div class="row">
                <?php
                    echo paginate_links(array(
                    'total' => $pastEvent->max_num_pages
                ));
                ?>
             </div>

        </div><!-- end container -->

    </div><!-- end section -->
	
	<div class="hmv-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv"><i class="flaticon-achievement"></i></div>
						<h3>Mission</h3>
						<div class="tr-pa">M</div>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam eligendi expedita, provident cupiditate in excepturi.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv"><i class="flaticon-eye"></i></div>
						<h3>Vision</h3>
						<div class="tr-pa">V</div>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam eligendi expedita, provident cupiditate in excepturi.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv"><i class="flaticon-history"></i></div>
						<h3>History</h3>
						<div class="tr-pa">H</div>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam eligendi expedita, provident cupiditate in excepturi.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div id="testimonials" class="parallax section db parallax-off" style="background-image:url('images/parallax_04.jpg');">
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
                                <img src="images/testi_01.png" alt="" class="img-fluid">
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
                                <img src="images/testi_02.png" alt="" class="img-fluid">
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
                                <img src="images/testi_03.png" alt="" class="img-fluid ">
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
                                <img src="images/testi_01.png" alt="" class="img-fluid">
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
                                <img src="images/testi_02.png" alt="" class="img-fluid">
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
                                <img src="images/testi_03.png" alt="" class="img-fluid">
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
                    <a href="#"><img src="images/logo_01.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_02.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_03.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_04.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_05.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_06.png" alt="" class="img-repsonsive"></a>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->


<?php
    get_footer();
?>