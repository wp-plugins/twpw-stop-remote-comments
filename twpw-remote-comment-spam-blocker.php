<?php
/*
Plugin Name: TWPW Stop Remote Comments
Plugin URI: http://askcharlyleetham.com
Description: Adds a nonce to the comments form in wordpress to stop comments being submitted remotely
Version: 1.0
Author: Charly Leetham
Author URI: http://askcharlyleetham.com
License: GPL

*/
function add_comment_nonce( ){
  wp_nonce_field( 'anti_spam_nonce_field' );
}
add_action( 'comment_form', 'add_comment_nonce' );

function check_comment_form_nonce_field(){
  if( !wp_verify_nonce( $_REQUEST['_wpnonce'], 'anti_spam_nonce_field') )
    die('Security check failed');
}
add_action( 'pre_comment_on_post', 'check_comment_form_nonce_field');
?>