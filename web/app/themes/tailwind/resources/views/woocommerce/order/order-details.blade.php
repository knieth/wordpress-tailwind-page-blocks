<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.6.0
 */

defined( 'ABSPATH' ) || exit;

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if ( ! $order ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}
?>

<div class="grid grid-cols-2 sm:grid-cols-3">
	<dl class="mt-12 text-sm font-medium">
		<dt class="text-gray-900">Billing Address</dt>
		<dd class="text-gray-500 mt-2">
			@php echo wp_kses_post( $order->get_formatted_billing_address( esc_html__( 'N/A', 'woocommerce' ) ) ); @endphp
		</dd>
	</dl>
	<dl class="mt-12 text-sm font-medium">
		<dt class="text-gray-900">Payment Method</dt>
		<dd class="text-gray-500 mt-2">
			@php echo wp_kses_post( $order->get_payment_method_title() ); @endphp
		</dd>
	</dl>
	<dl class="mt-12 text-sm font-medium">
		<dt class="text-gray-900">Order Number</dt>
		<dd class="text-gray-500 mt-2">{{ $order->get_order_number() }}</dd>
	</dl>
</div>

<div class="border-b border-gray-200 pb-10 grid grid-cols-1">
	<dl class="mt-12 text-sm font-medium">
		<dt class="text-gray-900">Note</dt>
		<dd class="text-gray-500 mt-2 w-full">
			{{ $order->get_customer_note() ? $order->get_customer_note() : 'No note entered.' }}
		</dd>
	</dl>
</div>

@foreach ($order_items as $item_id => $item)
	@php $product = $item->get_product(); @endphp

	@include('woocommerce.order.order-details-item',
		[
			'order'              => $order,
			'item_id'            => $item_id,
			'item'               => $item,
			'show_purchase_note' => $show_purchase_note,
			'purchase_note'      => $product ? $product->get_purchase_note() : '',
			'product'            => $product,
		]
	)
@endforeach


<div class="sm:ml-40 sm:pl-6">
	<h3 class="sr-only">Your information</h3>

	<h3 class="sr-only">Summary</h3>

	<dl class="space-y-6 border-t border-gray-200 text-sm pt-10">
		<div class="flex justify-between">
			<dt class="font-medium text-gray-900">Subtotal</dt>
			<dd class="text-gray-700">
				@php echo wc_price($order->get_subtotal()) @endphp
			</dd>
		</div>
		<div class="flex justify-between">
			<dt class="flex font-medium text-gray-900">
			Discount
			</dt>
			<dd class="text-gray-700">
				-@php echo wc_price($order->get_discount_total()) @endphp
			</dd>
		</div>
		@foreach ($order->get_items('fee') as $fee)
		<div class="flex justify-between">
			<dt class="font-medium text-gray-900">{{ esc_html($fee->get_name()) }}</dt>
			<dd class="text-gray-700">
				@php echo wc_price($fee->get_total()) @endphp
			</dd>
		</div>
		@endforeach
		<div class="flex justify-between">
			<dt class="font-medium text-gray-900">Total</dt>
			<dd class="text-gray-900">
				@php echo wp_kses_post( $order->get_formatted_order_total() ); @endphp
			</dd>
		</div>
	</dl>
</div>