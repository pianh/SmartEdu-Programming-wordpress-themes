<div class="message-box">
<h4><?php the_field('explain') ?></h4>
<h2> <?php the_title() ?> </h2>
<p><?php echo wp_trim_words( get_the_content( ), 20 ) ?></p>
<div class="event-date mb-2">
    <?php
    $eventsDate = new DateTime(get_field('events_date'));
    ?>
    <div class="event__month">Posted tháng
        <strong><?php echo $eventsDate->format('M'); ?></strong></div>
    <div class="event__day">&nbsp Ngày
        <strong><?php echo $eventsDate->format('d'); ?></strong></div>
</div>
<a href="<?php the_permalink(); ?>" class="hover-btn-new orange"><span>Learn
        More</span></a>
</div><!-- end messagebox -->
