<!-- Layout đè lên trang chi tiết programmese-->
<?php
    get_header(); ?>
	
	<?php getBanner(); ?>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <!-- <div class="col-md-8 offset-md-2">
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
                </div> -->
            </div><!-- end title -->

            <hr class="invis"> 

            <div class="row"> 
				<?php
					while(have_posts()) {
						the_post();
						?>
						<div class="col-lg-12 col-md-12 col-12">
                            <?php the_content() ?>
						</div><!-- end col -->
						<?php
					}
				?>
                <hr />
                <?php $relatedProgram = get_field('related_programs'); ?>
                <?php if($relatedProgram): ?>
                    <div class="col col-12 single-event-wrapper">
                        <h3 class="headline headline--medium">
                            Related Program
                        </h3>
                        <ul class="link-list min-list">
                            <?php foreach ($relatedProgram as $program): ?>
                                <li><a href="<?php echo get_the_permalink($program ); ?>"><?php echo get_the_title($program); ?></a></li>
                            <?php endforeach; ?>
                        </ul>   
                    </div>
                <?php endif; ?>
            </div><!-- end row -->

            <hr class="hr3"> 
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