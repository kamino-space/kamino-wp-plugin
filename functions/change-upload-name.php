<?php

function git_upload_filter($file) {
    $file['name'] = time() . "" . mt_rand(10, 99) . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
    return $file;
}

add_filter('wp_handle_upload_prefilter', 'git_upload_filter');
