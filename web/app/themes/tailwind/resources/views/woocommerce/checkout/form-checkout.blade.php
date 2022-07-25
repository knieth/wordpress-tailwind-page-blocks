<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form');
add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form' );
?>

<main>
    <div class="checkout max-w-2xl mx-auto lg:max-w-none space-y-4">
      <h1 class="sr-only">Checkout</h1>

		<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
		<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
			<div class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
				<div>
					@include('woocommerce.checkout.form-billing')
					@include('woocommerce.checkout.form-shipping')
				</div>

				<!-- Order summary -->
				<div class="mt-10 lg:mt-0 row-span-2">
					<h2 class="text-lg font-medium text-gray-900">Order summary</h2>

					<div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
						<h3 id="order_review_heading" class="sr-only">Items in your cart</h3>

						<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

						<div id="order_review" class="woocommerce-checkout-review-order divide-y divide-gray-200">
							@php do_action( 'woocommerce_checkout_order_review' ); @endphp
						</div>

						<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
					</div>
				</div>
			</div>
		</form>
    </div>
</main>
