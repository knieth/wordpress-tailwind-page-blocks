<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
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

defined( 'ABSPATH' ) || exit;
?>

@php do_action( 'woocommerce_review_order_before_cart_contents' ); @endphp
<div class="shop_table woocommerce-checkout-review-order-table">
	@foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
		@php
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		@endphp

		@if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) )
			<div class="flex flex-col sm:flex-row py-6 px-4 sm:px-6 space-y-4 sm:space-y-0">
				<div class="flex-shrink-0 w-auto">
					<img src="{{ has_post_thumbnail($_product->get_id()) ? get_the_post_thumbnail_url($_product->get_id()) : wc_placeholder_img_src() }}" alt="Product Image" class="w-auto sm:w-20 rounded-md">
				</div>

				<div class="text-center sm:text-left ml-0 sm:ml-6 flex-1 flex flex-col">
					<div class="flex">
						<div class="min-w-0 flex-1">
						<h4 class="text-sm">
							@php
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ) . '&nbsp;';
								echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key );
							@endphp
						</h4>
						<p class="mt-1 text-sm text-gray-500">
							@php echo wc_get_formatted_cart_item_data( $cart_item ); @endphp
						</p>
						</div>
					</div>

				</div>

				<div class="flex justify-center sm:justify-end">
					<p class="text-sm font-medium text-gray-900">
						@php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); @endphp
					</p>
				</div>
			</div>
		@endif
	@endforeach
	@php do_action( 'woocommerce_review_order_after_cart_contents' ); @endphp

	<dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
		@if (wc_coupons_enabled())
			@include('woocommerce.checkout.form-coupon')
		@endif
		<div class="cart-subtotal flex items-center justify-between">
			<dt class="text-sm">Subtotal</dt>
			<dd class="text-sm font-medium text-gray-900">
				{{ wc_cart_totals_subtotal_html() }}
			</dd>
		</div>
		@foreach (WC()->cart->get_coupons() as $code => $coupon)
			<div class="fee cart-discount coupon-{{ sanitize_title( $code ) }}">
				<dt class="text-sm text-gray-600">Coupon:
					<span>{{ $coupon->get_code() }}</span>
				</dt>
				<dd class="text-sm font-medium text-gray-900" data-title="{{ wc_cart_totals_coupon_label( $coupon, false ) }}">{{ wc_cart_totals_coupon_html( $coupon ) }}</dd>
			</div>
		@endforeach
		@foreach (WC()->cart->get_fees() as $fee)
			<div class="flex items-center justify-between">
				<dt class="text-sm">{{ esc_html($fee->name) }}</dt>
				<dd class="text-sm font-medium text-gray-900">
					@php wc_cart_totals_fee_html($fee); @endphp
				</dd>
			</div>
		@endforeach
		@php do_action( 'woocommerce_review_order_before_order_total' ); @endphp
		<div class="order-total flex items-center justify-between border-t border-gray-200 pt-6">
			<dt class="text-base font-medium">Total</dt>
			<dd class="text-base font-medium text-gray-900">
				{{ wc_cart_totals_order_total_html() }}
			</dd>
		</div>
		@php do_action( 'woocommerce_review_order_after_order_total' ); @endphp
	</dl>
</div>
