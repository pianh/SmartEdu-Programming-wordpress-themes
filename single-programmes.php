<!-- Layout đè lên trang chi tiết programmese-->
<?php get_header(); ?>
	
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
            </div><!-- end row -->
            <hr />
            <!-- In ra cac giang vien cua chuong trinh hien tai -->
            <div class="row">
                <div class="col col-12">
                    <?php
                    $professorProgram = new WP_Query(
                            array(
                                'post_type' => 'professors',
                                'orderby' => 'title',
                                'order' => 'ASC',
                                'meta_query' => array ( 
                                    array (
                                    'key' => 'related_programs',
                                    'compare' => 'LIKE',
                                    'value' => '"' . get_the_ID() . '"'
                                    )
                                )
                            )
                        );
                    ?>
                    <?php if($professorProgram->have_posts()): ?>
                        <h1 class="col col-12 pl-0">Upcoming <?php echo get_the_title(); ?> Programmes</h1>
                    <?php endif; ?>
                    <ul class="professor-cards pl-0">
                        <?php while($professorProgram->have_posts()): $professorProgram->the_post(); ?>
                            <li class="professor-card__list-item">
                            <a class="professor-card" href="<?php the_permalink(); ?>">
                                <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape'); ?>" alt="">
                                <span class="professor-card__name"><?php the_title(); ?></span>
                            </a>
                        </li>
                        <?php wp_reset_postdata(); endwhile; ?>
                    </ul>
                </div>
            </div>


            <hr />
            <div class="row">  
                <div class="col col-12">
                    <?php
                        $today = date("Ymd");
                        $eventHomePgae = new WP_Query(
                            array(
                            'posts_per_page' => 2, 
                            'post_type' => 'event',
                            'meta_key' => 'events_date',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => array ( 
                                array(
                                'key' => 'events_date',
                                'compare' => '>=',
                                'value' => $today,
                                'type' => 'numeric'
                                ),
                                array (
                                'key' => 'related_programs',
                                'compare' => 'LIKE',
                                'value' => '"' . get_the_ID() . '"'
                                )
                            )
                            )
                            );
                        if($eventHomePgae->have_posts()) {
                            echo "<h1 class='col col-12 pl-0'>Upcoming " . get_the_title() . " Events</h1>";
                            while($eventHomePgae->have_posts()) {
                                $eventHomePgae->the_post();
                                ?>
                        <div class="message-box">
                            <h4><?php the_field('explain') ?></h4>
                            <h2> <?php the_title() ?> </h2>
                            <p><?php echo wp_trim_words( get_the_content( ), 20 ) ?></p>
                            <div class="event-date mb-2">
                                <?php  $eventsDate = new DateTime(get_field('events_date')); ?>
                                <div class="event__month">Posted tháng <strong><?php echo $eventsDate->format('M'); ?></strong></div>
                                <div class="event__day">&nbsp Ngày <strong><?php echo $eventsDate->format('d'); ?></strong></div>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="hover-btn-new orange"><span>Learn More</span></a>
                        </div><!-- end messagebox -->
                    <?php
                                    }
                                }
                            ?>
                </div>
            </div>

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