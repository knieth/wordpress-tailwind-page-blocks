<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

// get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );

if (is_product_category()) {
	$category = get_queried_object();

	$query_args = array(
		'featured' => true,
		'orderby' => 'date',
		'order'   => 'desc',
		'category' => array( $category->slug ),
	);
	$featured_products = wc_get_products( $query_args );

	$main_featured_product = current($featured_products);

	$secondary_featured_products = array_slice($featured_products, 1, 2);
}

if (!isset($_REQUEST['ixwpss']) && isset($_REQUEST['s'])) {
	$_REQUEST['ixwpss'] = $_REQUEST['s'];
}

$filter = str_replace(
	'name="s"',
	'',
		do_shortcode('[woocommerce_product_filter show_clear="no" update_document_title="no" placeholder="Search..."]')
);

?>

@extends('layouts.app')

@section('content')

@if (count($_GET) > 0)
	<div class="bg-gray-50">
		<div x-data="{ showMobileFilters: false, showSale: true, showCategories: true, showPrice: true }">
			@include('woocommerce/archive-product-mobile-filter')

			<main class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 py-6 sm:py-12">
				<div class="lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4 space-y-6 lg:space-y-0">
					<aside>
						<h2 class="sr-only">Filters</h2>

						<div class="lg:hidden space-y-4">
							{!! $filter !!}

							<!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
							<button @click="showMobileFilters = !showMobileFilters" type="button" class="inline-flex items-center lg:hidden w-auto">
								<span class="text-sm font-medium">Filters</span>
								<!-- Heroicon name: solid/plus-sm -->
								<svg class="flex-shrink-0 ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
									viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
								</svg>
							</button>
						</div>

						<div class="hidden lg:block lg:sticky lg:top-16">
							<div class="divide-y divide-gray-200 space-y-8">
								<div>
									<fieldset class="space-y-4">
										{!! $filter !!}
									</fieldset>
								</div>

								<div class="pt-6">
									<fieldset class="relative space-y-4">
										@shortcode('[woocommerce_product_filter_category heading="Games" heading_no_results="No games found with your search." show_clear="no" multiple="yes" expandable_from_depth="3" exclude="uncategorized"]')
									</fieldset>
								</div>

								<div class="py-6">
									<fieldset class="space-y-4">
										<legend class="block text-sm font-medium text-gray-900">Price</legend>
										@shortcode('[woocommerce_product_filter_price show_heading="no"]')
									</fieldset>
								</div>
							</div>
						</div>
					</aside>

					<!-- Product grid -->
					<div class="lg:mt-0 lg:col-span-2 xl:col-span-3 relative">
						@shortcode('[woocommerce_product_filter_products columns="2" show_pagination="yes" per_page="12"]')

						<!-- Pagination whitespace -->
						<div class="w-full h-16"></div>
					</div>
				</div>
			</main>
		</div>
	</div>
@else
	@if (is_product_category())
		@php
			$fields = get_field('navigation_menu', $category) ?? [];
		@endphp

		@if ($fields)
			@include('partials/header-shop')
		@endif
	@endif

	<div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8 space-y-10">
		@if (is_product_category())
			@if(!empty($featured_products))
				<div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:grid-rows-2 sm:gap-x-6 lg:gap-8">
					@if(isset($main_featured_product))
					<div class="group aspect-w-2 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden sm:aspect-h-1 sm:aspect-w-1 sm:row-span-2">
						<img src="{{ has_post_thumbnail($main_featured_product->get_id()) ? get_the_post_thumbnail_url($main_featured_product->get_id()) : wc_placeholder_img_src() }}" class="object-center object-cover group-hover:opacity-75">
						<div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50"></div>
						<div class="p-6 flex items-end">
							<div>
								<h3 class="font-semibold text-white">
								<a href="{{ get_permalink($main_featured_product->get_id()) }}" class="text-white hover:text-white">
									<span class="absolute inset-0"></span>
									{{ $main_featured_product->get_title() }}
								</a>
								</h3>
								<p aria-hidden="true" class="mt-1 text-sm text-white">View Product</p>
							</div>
						</div>
					</div>
					@endif

					@if(!empty($secondary_featured_products))
						@foreach($secondary_featured_products as $secondary_featured_product)
							<div class="group aspect-w-2 aspect-h-1 rounded-lg overflow-hidden sm:relative sm:aspect-none sm:h-full">
								<img src="{{ has_post_thumbnail($secondary_featured_product->get_id()) ? get_the_post_thumbnail_url($secondary_featured_product->get_id()) : wc_placeholder_img_src() }}" class="object-center object-cover group-hover:opacity-75 sm:absolute sm:inset-0 sm:w-full sm:h-full">
								<div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0"></div>
								<div class="p-6 flex items-end sm:absolute sm:inset-0">
									<div>
										<h3 class="font-semibold text-white">
										<a href="{{ get_permalink($secondary_featured_product->get_id()) }}" class="text-white hover:text-white">
											<span class="absolute inset-0"></span>
											{{ $secondary_featured_product->get_title() }}
										</a>
										</h3>
										<p aria-hidden="true" class="mt-1 text-sm text-white">View Product</p>
									</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			@endif

			@if (woocommerce_product_loop())
				@if (wc_get_loop_prop( 'total' ))
					<div class="sm:flex sm:items-baseline sm:justify-between">
						<h2>Products</h2>
					</div>

					<div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:grid-cols-3 lg:gap-x-8">
						@while (have_posts())
							@php
								the_post();
								do_action('woocommerce_shop_loop');
							@endphp
								@include('woocommerce.content-product')
						@endwhile
					</div>
				@endif

				@php woocommerce_product_loop_end(); @endphp

				@php do_action( 'woocommerce_after_shop_loop' ); @endphp
			@else
				@php do_action( 'woocommerce_no_products_found' ); @endphp
			@endif
		@elseif (is_shop())
			@php
				$all_categories = get_categories(['taxonomy' => 'product_cat']);
			@endphp

			<div class="py-2">
				<div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
					@foreach ($all_categories as $category)
						<a href="{{ get_term_link($category) }}"
							class="relative w-full xl:w-56 h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75">
							<span aria-hidden="true" class="absolute inset-0">
								<img src="{{ wp_get_attachment_url(get_term_meta( $category->term_id, 'thumbnail_id', true )) }}"
									alt="" class="w-full h-full object-center object-cover">
							</span>
							<span aria-hidden="true"
								class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
							<span class="relative mt-auto text-center text-xl font-bold text-white">
								{{ $category->name }}
							</span>
						</a>
					@endforeach
				</div>
			</div>
		@endif
	</div>
@endif

@endsection
