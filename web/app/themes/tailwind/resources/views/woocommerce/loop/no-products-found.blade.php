<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="woocommerce-info col-span-2 text-center">
    @if (is_shop())
        <p>
            <?php esc_html_e( 'No results were found for the given search criteria, please click below to clear your search criteria and try again.', 'woocommerce' ); ?>
        </p>

        <div class="inline-flex">
            <a type="button" href="/?post_type=product" class="flex items-center">
                Clear All Search Criteria
            </a>
        </div>
    @else
        <p>
            <?php esc_html_e( 'No products were found.', 'woocommerce' ); ?>
        </p>
        <div class="inline-flex">
            <a type="button" href="/shop" class="flex items-center">
                Go Back To Shop
            </a>
        </div>
    @endif
</div>