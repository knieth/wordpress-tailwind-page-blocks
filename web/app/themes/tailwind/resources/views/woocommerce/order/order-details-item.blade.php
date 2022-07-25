<?php
/**
 * Order Item Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-item.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
	return;
}
?>

<div class="py-10 border-b border-gray-200 flex space-x-6">
	<img src="{{ esc_url( get_the_post_thumbnail_url($product->get_id()) ) }}" class="flex-none w-20 h-20 object-center object-cover bg-gray-100 rounded-lg sm:w-40 sm:h-40">
	<div class="flex-auto flex flex-col">
		<div>
			<h4>
				<a href="#" class="font-medium text-gray-900">{{ $item->get_name() }}</a>
			</h4>
			<p class="mt-2 text-sm text-gray-600">
				@php echo wc_display_item_meta( $item ); @endphp
			</p>
		</div>
		<div class="mt-6 flex-1 flex items-end">
			<dl class="w-full flex flex-col sm:flex-row text-sm sm:divide-x divide-gray-200 sm:space-x-6 space-y-6 sm:space-y-0">
			<div class="flex justify-between">
				@php
					$qty          = $item->get_quantity();
					$refunded_qty = $order->get_qty_refunded_for_item( $item_id );
				@endphp

				<dt class="font-medium text-gray-900">Quantity</dt>
				<dd class="ml-2 text-gray-700">
					@if ($refunded_qty)
						@php
							$qty_display = $qty - ( $refunded_qty * -1 )
						@endphp
					@else
						@php
							$qty_display = $qty;
						@endphp
					@endif

					@php
						echo apply_filters( 'woocommerce_order_item_quantity_html', ' <span class="product-quantity">' . sprintf( '&times;%s', $qty_display ) . '</span>', $item );
					@endphp
				</dd>
			</div>
			<div class="flex sm:pl-6 justify-between">
				<dt class="font-medium text-gray-900">Price</dt>
				<dd class="ml-2 text-gray-700">
					@php echo $order->get_formatted_line_subtotal( $item ) @endphp
				</dd>
			</div>
			</dl>
		</div>
	</div>
</div>