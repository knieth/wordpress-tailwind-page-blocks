<?php
/**
 * Subscription details table
 *
 * @author  Prospress
 * @package WooCommerce_Subscription/Templates
 * @since 2.6.0
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="-mx-4 mt-8 flex flex-col sm:-mx-6 md:mx-0">
	<table class="shop_table order_details">
		<thead class="bg-gray-50">
			<tr>
				<th scope="col" class="product-name py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"><?php echo esc_html_x( 'Product', 'table headings in notification email', 'woocommerce-subscriptions' ); ?></th>
				<th scope="col" class="product-total py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-6"><?php echo esc_html_x( 'Totals', 'table headings in notification email', 'woocommerce-subscriptions' ); ?></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($subscription->get_items() as $item_id => $item)
				@php $_product  = apply_filters( 'woocommerce_subscriptions_order_item_product', $item->get_product(), $item ); @endphp

				@if (apply_filters('woocommerce_order_item_visible', true, $item))
					<tr class="border-b border-gray-200">
						<td class="product-name py-4 pl-4 pr-3 text-sm sm:pl-6">
							<div class="font-medium text-gray-900">
								<?php
									if ( $_product && ! $_product->is_visible() ) {
										echo wp_kses_post( apply_filters( 'woocommerce_order_item_name', $item['name'], $item, false ) );
									} else {
										echo wp_kses_post( apply_filters( 'woocommerce_order_item_name', sprintf( '<a href="%s">%s</a>', get_permalink( $item['product_id'] ), $item['name'] ), $item, false ) );
									}

									echo wp_kses_post( apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '&times; %s', $item['qty'] ) . '</strong>', $item ) );

									/**
									* Allow other plugins to add additional product information here.
									*
									* @param int $item_id The subscription line item ID.
									* @param WC_Order_Item|array $item The subscription line item.
									* @param WC_Subscription $subscription The subscription.
									* @param bool $plain_text Wether the item meta is being generated in a plain text context.
									*/
									do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $subscription, false );

									wcs_display_item_meta( $item, $subscription );

									/**
									* Allow other plugins to add additional product information here.
									*
									* @param int $item_id The subscription line item ID.
									* @param WC_Order_Item|array $item The subscription line item.
									* @param WC_Subscription $subscription The subscription.
									* @param bool $plain_text Wether the item meta is being generated in a plain text context.
									*/
									do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $subscription, false );
								?>
							</div>
						</td>
						<td class="product-total py-4 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-6 align-top">
							<?php echo wp_kses_post( $subscription->get_formatted_line_subtotal( $item ) ); ?>
						</td>
					</tr>
				@endif
			@endforeach

		</tbody>
		<tfoot>
			@foreach ($totals as $key => $total)
				<tr>
					<th scope="row" class="hidden pl-6 pr-3 pt-6 text-right text-sm font-normal text-gray-500 sm:table-cell"><?php echo esc_html( $total['label'] ); ?></th>
					<th scope="row" class="pl-4 pr-3 pt-6 text-left text-sm font-normal text-gray-500 sm:hidden"><?php echo esc_html( $total['label'] ); ?></th>
					<td class="pl-3 pr-4 pt-6 text-right text-sm text-gray-500 sm:pr-6 "><?php echo wp_kses_post( $total['value'] ); ?></td>
				</tr>
			@endforeach
      </tfoot>
	</table>
</div>