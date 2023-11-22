<?php
    add_action('rest_api_init', function() {
        register_rest_route( 'smartedu/v1','np-smartedu', array(
            'methods' => 'GET',
            'callback' => 'getResults',
        ) );
    });
    function getResults($data){ //Truyền parameter
        // print_r($data);
        $smartedu = new WP_Query(
            array(
                'post_type' => 'post',
                's' => $data['term']
            )
        );
        $new_array = [];
        while($smartedu->have_posts()){
            $smartedu-> the_post();
            array_push($new_array, array(
                "title" => get_the_title(),
                "permalink" => get_the_permalink()
            ));
        }
            
        
        return $new_array;
    }
?>