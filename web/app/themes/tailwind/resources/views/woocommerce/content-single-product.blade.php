<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<div class="mx-auto px-4 py-6 sm:px-6 lg:max-w-7xl lg:px-8 space-y-10">
		<!-- Product -->
		
		<div>{{ woocommerce_breadcrumb() }}</div>
		<div class="lg:grid lg:grid-rows-1 lg:grid-cols-7 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
			<!-- Product image -->
			<div class="lg:row-end-1 lg:col-span-4 space-y-4">
				<div class="aspect-h-3 rounded-lg bg-gray-100 overflow-hidden">
					<img src="{{ has_post_thumbnail($product->get_id()) ? get_the_post_thumbnail_url($product->get_id()) : wc_placeholder_img_src() }}" class="w-full object-center object-contain">
				</div>

				<div class="w-full space-y-2">
					@if (wc_get_product_category_list($product->get_id()))
						<div>Categories: @php echo wc_get_product_category_list($product->get_id()); @endphp</div>
					@endif

					@if (wc_get_product_tag_list($product->get_id()))
						<div>Tags: @php echo wc_get_product_tag_list($product->get_id()); @endphp</div>
					@endif
				</div>
			</div>

			<!-- Product details -->
			<div class="max-w-2xl mx-auto mt-14 sm:mt-16 lg:max-w-none lg:mt-0 lg:row-end-2 lg:row-span-2 lg:col-span-3 w-full">
				<div class="flex flex-col-reverse">
					<div class="product-header">
						@include('woocommerce.single-product.title')
						@include('woocommerce.single-product.price')
						@if (is_user_logged_in())
							@shortcode('[yith_wcwl_add_to_wishlist wishlist_url="/my-account/my-wishlist"]')
						@endif
					</div>
				</div>

				<div class="border-t border-gray-200 mt-5 pt-5">
					@include('woocommerce.single-product.add-to-cart.simple')
				</div>
			</div>

			<div class="w-full max-w-2xl mx-auto mt-16 lg:max-w-none lg:mt-0 lg:col-span-4">
				<div>
					<div>
						<div class="-mb-px space-x-8" aria-orientation="horizontal" role="tablist">
							@php woocommerce_output_product_data_tabs(); @endphp
						</div>
					</div>
				</div>
			</div>
		</div>

		@php do_action( 'woocommerce_after_single_product_summary' ); @endphp
		<?php do_action( 'woocommerce_after_single_product' ); ?>

		@php 
		woocommerce_related_products( array(
			'posts_per_page' => 3,
			'columns'        => 3,
			'orderby'        => 'rand'
		));
		@endphp
		@include('woocommerce.loop.pagination')
	</div>
</div>


