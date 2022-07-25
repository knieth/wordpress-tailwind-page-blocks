<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$imageUrl = has_post_thumbnail(get_the_ID()) ? get_the_post_thumbnail_url(get_the_ID()) : wc_placeholder_img_src();

?>

<div class="product group relative bg-white border border-gray-200 rounded-lg flex flex-col overflow-hidden">
	<div class="bg-gray-200 group-hover:opacity-75">
		<a href="{{ $product->get_permalink() }}">
			<img src="{{ $imageUrl }}" alt="Product Image" class="object-cover h-52 sm:h-40 w-full">
		</a>
	</div>
	<div class="flex-1 p-4 space-y-2 flex flex-col">
		<h3 class="woocommerce-loop-product__title m-0">
			<a href="{{ $product->get_permalink() }}" class="text-sm">
				{{ $product->get_title() }}
			</a>
		</h3>
		@if ($product->get_short_description())
		<p class="text-sm text-gray-500">
			{{ $product->get_short_description() }}
		</p>
		@endif
		<div class="flex-1 flex flex-col justify-end">
			<!--<p class="text-sm italic text-gray-500">
				@php wc_get_template( 'loop/rating.php' ); @endphp
			</p>-->
			<p class="text-base font-medium text-gray-900 m-0">
				@php 
					echo get_post_meta(get_the_ID(), '_display_price', true) ? wc_price(get_post_meta(get_the_ID(), '_display_price', true)) : wc_price($product->get_price());
				@endphp
			</p>
			<div class="mt-2">
				<a href="{{ $product->get_permalink() }}" class="relative flex bg-gray-100 border border-transparent rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-gray-900 hover:bg-gray-200">View Product</a>
			</div>
		</div>
	</div>
</div>