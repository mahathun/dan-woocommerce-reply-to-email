<?php
/*
Plugin Name:  Woocommerce Reply-to-email
Plugin URI:   http://www.danmahavithana.com/
Description:  This plugin will simply makes reply-to email address of a new order email notification, to the customer email address when submitting a new order using woocommere plugin. So the admin will be able to simply hit reply button to communicate with the customer.
Version:      1.0.0
Author:       Dan Mahavithana
Author URI:   http://www.danmahavithana.com/
*/

/*
setting reply to email addres to customer email address when creating a new order
*/
function dan_reply_to_email_set_email_headers( $headers, $obj, $order ) {
    if ($obj == 'new_order') {//checking for new order email notification
    	$first_name = $order->billing_first_name;//first name of the customer
    	$last_name = $order->billing_last_name;// last name of the customer
    	$reply_to_email = $order->billing_email;//customer email address

        $headers .= "Reply-to: $first_name $last_name <$reply_to_email>\r\n";
    }

    return $headers;
}

add_filter( 'woocommerce_email_headers', 'dan_reply_to_email_set_email_headers', 10, 3);


?>
