<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

?>

<main class="relative">
    <div class="max-w-screen-xl mx-auto">
		<div class="bg-white rounded-lg shadow overflow-hidden">
			<div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
				<aside class="px-4 py-6 lg:col-span-3">
					@include('woocommerce.myaccount.navigation')
				</aside>

				<div class="woocommerce-MyAccount-content">
					<div class="py-6 px-4 sm:p-6 lg:pb-8">
						@php do_action( 'woocommerce_account_content' ); @endphp
					</div>
				</div>
			</div>
		</div>
    </div>
</main>