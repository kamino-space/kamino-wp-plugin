<?php

function bilivideo( $atts, $content = null ) {
    $cid = 0;
    extract( shortcode_atts( array( 'cid' => null ), $atts ) );
    $return = '<div class="video-container"><iframe width="640" height="400" src="//player.bilibili.com/player.html?aid=';
    $return .= $content;
    $return .= '&cid=';
    $return .= $cid;
    $return .= '&page=1" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true"> </iframe></div>';
    return $return;
}
