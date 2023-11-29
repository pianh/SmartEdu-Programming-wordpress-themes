<?php
    add_action('rest_api_init', function() {
        register_rest_route( 'smartedu/v1','np-smartedu', array(
            'methods' => 'GET',
            'callback' => 'getResults',
        ) );
    });
    function getResults($data){  //Truyền parameter
        // print_r($data);
        $smartedu = new WP_Query(
            array(
                'post_type' => ["post", "page", "professors", "event", "programmes"],
                's' => $data['term']
            )
        );
        $new_array = [
            "general_info" => [],
            "professors" => [],
            "programmes" => [],
            "event" => [],
        ];
        while($smartedu->have_posts()){
            $smartedu-> the_post();
            // array_push($new_array, array(
            //     "title" => get_the_title(),
            //     "permalink" => get_the_permalink()
            // ));
            if(get_post_type() == "post" OR get_post_type() == "page") {
                array_push($new_array["general_info"], array(
                    "title" => get_the_title(),
                    "permalink" => get_the_permalink(),
                    "postType" => get_post_type(),
                    "authorName" => get_the_author()
                ));
            }

            if(get_post_type() == "professors") {
                array_push($new_array["professors"], array(
                    "title" => get_the_title(),
                    "permalink" => get_the_permalink(),
                    "postType" => get_post_type(),
                    "authorName" => get_the_author(),
                    "image" => get_the_post_thumbnail_url(),
                ));
            }

            if(get_post_type() == "programmes") {
                array_push($new_array["programmes"], array(
                    "title" => get_the_title(),
                    "permalink" => get_the_permalink(),
                    "postType" => get_post_type(),
                    "authorName" => get_the_author(),
                    "ID" => get_the_ID()
                ));
            }

            if(get_post_type() == "event") {
                $eventsDate = new DateTime(get_field('events_date'));

                if(has_excerpt()){
                    //Có toám tắt thì lấy tóm tắt
                    $description = the_excerpt();
                } else {
                    //K có tóm tắt thì lấy nội dung bài viết
                    $description = wp_trim_words( get_the_content( ), 18 );
                }
                array_push($new_array["event"], array(
                    "title" => get_the_title(),
                    "permalink" => get_the_permalink(),
                    "postType" => get_post_type(),
                    "authorName" => get_the_author(),
                    "date" => $eventsDate->format('d'),
                    "month" => $eventsDate->format('M'),
                    "description" => $description
                ));
            }
        }
        
        // Tim kiem thay/co theo mon hoc bang Custom Query
        // Thay Duy Anh -> Math, Math basic, Math advance (Toan tu OR)
        // Lan 1: meta_query -> MAth
        // Lan 2: meta_query -> Math Basic
        // Lan 3: meta_query -> Math Advance
        
        $danhSachMonHoc = $new_array['programmes'];
        foreach ($danhSachMonHoc as $item) {
            $query = array(
                array(
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . $new_array['programmes'][0]['ID'] . '"'
                )
            );
            # code...
        }

        $relatedPrograms = new WP_Query(
        array(
            "post_type" =>'professors',
            'ralation' => 'OR',
            'meta_query' => $query
        )
        );
        //Lap qua danh sach cua cac thay co day mon tuong ung
        while($relatedPrograms->have_posts()) {
            $relatedPrograms->the_post();
            array_push($new_array["professors"], array(
                    "title" => get_the_title(),
                    "permalink" => get_the_permalink(),
                    "postType" => get_post_type(),
                    "authorName" => get_the_author(),
                    "image" => get_the_post_thumbnail_url(0, 'professorLandscape')
                ));
        }
        return $new_array;
    }
?>