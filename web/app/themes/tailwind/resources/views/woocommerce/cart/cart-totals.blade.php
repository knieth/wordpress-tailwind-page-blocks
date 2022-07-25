<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>

<section class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
	<h2 id="summary-heading" class="text-lg font-medium text-gray-900">Order summary</h2>

	<dl class="mt-6 space-y-4">
		<div class="flex items-center justify-between">
			<dt class="text-sm text-gray-600">Subtotal</dt>
			<dd class="text-sm font-medium text-gray-900">{{ wc_cart_totals_subtotal_html() }}</dd>
		</div>
		@foreach (WC()->cart->get_coupons() as $code => $coupon)
			<div class="cart-discount coupon-{{ sanitize_title( $code ) }}">
				<dt class="text-sm text-gray-600">Coupon:
					<span>{{ $coupon->get_code() }}</span>
				</dt>
				<dd class="text-sm font-medium text-gray-900" data-title="{{ wc_cart_totals_coupon_label( $coupon, false ) }}">{{ wc_cart_totals_coupon_html( $coupon ) }}</dd>
			</div>
		@endforeach
		@foreach (WC()->cart->get_fees() as $fee)
			<div class="border-t border-gray-200 pt-4 flex items-center justify-between">
				<dt class="flex items-center text-sm text-gray-600">{{ esc_html($fee->name) }}</span></dt>
				<dd class="text-sm font-medium text-gray-900">@php wc_cart_totals_fee_html($fee); @endphp</dd>
			</div>
		@endforeach
		<div class="border-t border-gray-200 pt-4 flex items-center justify-between">
			<dt class="text-base font-medium text-gray-900">Order total</dt>
			<dd class="text-base font-medium text-gray-900">{{ wc_cart_totals_order_total_html() }}</dd>
		</div>
	</dl>

	<div class="mt-6 w-full">
		@include('woocommerce.cart.proceed-to-checkout-button')
	</div>

	<div class="mt-6 pt-6 w-full border-t border-gray-200">
		@include('woocommerce.checkout.form-coupon')
	</div>
</section>
