<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="mx-auto">
	<form class="woocommerce-cart-form" action="@php echo esc_url( wc_get_cart_url() ); @endphp" method="post">
		@php do_action( 'woocommerce_before_cart_table' ); @endphp

		<section class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" aria-labelledby="cart-heading">
			<h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

			<ul role="list" class="border-b border-gray-200 divide-y divide-gray-200">
				@foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
					@php
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
					@endphp

					@if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ))
						@php
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						@endphp
						<li class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
							<div class="flex-shrink-0">
								<img src="{{ has_post_thumbnail($_product->get_id()) ? get_the_post_thumbnail_url($_product->get_id()) : wc_placeholder_img_src() }}" alt="Product Image" class="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48">
							</div>

							<div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
								<div class="relative pr-9 sm:grid sm:grid-cols-12 sm:gap-x-6 sm:pr-0 space-y-4 sm:space-y-0">
									<div class="sm:col-span-5">
										<div class="flex justify-between">
											<h3 class="text-sm">
												@if (!$product_permalink)
													<a href="#" class="font-medium text-gray-700 hover:text-gray-800">{{ $_product->get_name() }}</a>
												@else
													<a href="{{ esc_url( $product_permalink ) }}" class="font-medium text-gray-700 hover:text-gray-800">{{ $_product->get_name() }}</a>
												@endif
											</h3>
										</div>
										<div class="mt-1 flex text-sm">
											<p class="text-gray-500">
												@php echo wc_get_formatted_cart_item_data( $cart_item ); @endphp
											</p>
										</div>
									</div>

									<div class="product-quantity sm:col-span-3">
										<div class="relative z-0 inline-flex shadow-sm rounded-md">
											<!--<button type="button" class="minus relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500">-</button>
											<input type="number" name="cart[{{$cart_item_key}}][qty]" class="quantity -ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 w-14" value="{{ $cart_item['quantity'] }}">
											<button type="button" class="plus -ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500">+</button>-->
											@php
												if ( $_product->is_sold_individually() ) {
													$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
												} else {
													$product_quantity = woocommerce_quantity_input(
														array(
															'input_name'   => "cart[{$cart_item_key}][qty]",
															'input_value'  => $cart_item['quantity'],
															'max_value'    => $_product->get_max_purchase_quantity(),
															'min_value'    => '0',
															'product_name' => $_product->get_name(),
														),
														$_product,
														false
													);
												}

												echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
											@endphp
										</div>
									</div>

									<div class="product-subtotal sm:col-span-3">
										<div>
											<p class="text-left sm:text-center">
												@php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); @endphp
											</p>
										</div>
									</div>
									<div class="product-remove">
										<div class="absolute top-0 right-0">
											@php
												echo apply_filters(
													'woocommerce_cart_item_remove_link',
													sprintf(
														'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">
																<span class="sr-only">Remove</span>
																<!-- Heroicon name: solid/x -->
																<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
																	<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
																</svg>
															</a>',
														esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
														esc_html__( 'Remove this item', 'woocommerce' ),
														esc_attr( $product_id ),
														esc_attr( $_product->get_sku() )
													),
													$cart_item_key
												);
											@endphp
										</div>
									</div>
								</div>
							</div>
						</li>
					@endif
				@endforeach
			</ul>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<div class="actions flex space-x-4 justify-between sm:justify-end mt-5">
				<div>
					<a type="button" href="{{ get_permalink( wc_get_page_id( 'shop' ) ) }}" class="flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
					</svg>
					Continue Shopping</a>
				</div>
				<div>
					<button type="submit" name="update_cart" class="button w-full">Update Cart</button>
				</div>

				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
			</div>
		</section>

		<!-- Order summary -->
		@include('woocommerce.cart.cart-totals')
	</form>
</div>

<!-- Form Here -->