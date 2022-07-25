<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

$currency_symbol = get_woocommerce_currency_symbol( get_woocommerce_currency() );
?>

<div class="woocommerce-order">
    <div class="max-w-xl">
		<h1 class="text-sm font-semibold uppercase tracking-wide text-primary-500">Thank you!</h1>
		<p class="mt-2 text-4xl font-extrabold tracking-tight sm:text-5xl">Your order has been received!</p>
    </div>

    <div class="mt-10">
		@include('woocommerce.order.order-details',
			[
				'order_id' => $order->get_id()
			]
		)
    </div>
</div>
