<?php
/**
 * Link Twitter mentions in posts to twitter profile
 */

if ( ! function_exists( 'whimsy_link_twitter_mention' ) ) :

    
    function whimsy_link_twitter_mention($content) {
        return preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/', "$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>", $content);
    }

    add_filter('the_content', 'whimsy_link_twitter_mention');   
    add_filter('comment_text', 'whimsy_link_twitter_mention');
    
endif;