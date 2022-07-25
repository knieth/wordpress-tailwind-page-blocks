<?php
/**
 * Related Orders table on the View Subscription page
 *
 * @author   Prospress
 * @category WooCommerce Subscriptions/Templates
 * @version  2.6.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div>
	<div class="sm:flex sm:items-center">
		<div class="sm:flex-auto">
			<h3><?php esc_html_e( 'Related orders', 'woocommerce-subscriptions' ); ?></h3>
		</div>
	</div>
	<div class="mt-8 flex flex-col space-y-4">
		<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
			<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
				<div class="sm:rounded-lg">
					<table class="shop_table shop_table_responsive my_account_orders woocommerce-orders-table woocommerce-MyAccount-orders woocommerce-orders-table--orders min-w-full">
						<thead class="bg-gray-50">
							<tr>
								<th class="order-number woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr"><?php esc_html_e( 'Order', 'woocommerce-subscriptions' ); ?></span></th>
								<th class="order-date woocommerce-orders-table__header woocommerce-orders-table__header-order-date woocommerce-orders-table__header-order-date"><span class="nobr"><?php esc_html_e( 'Date', 'woocommerce-subscriptions' ); ?></span></th>
								<th class="order-status woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr"><?php esc_html_e( 'Status', 'woocommerce-subscriptions' ); ?></span></th>
								<th class="order-quantity woocommerce-orders-table__header woocommerce-orders-table__header-order-quantity"><span class="nobr"><?php echo esc_html_x( 'Quantity', 'table heading', 'woocommerce-subscriptions' ); ?></span></th>
								<th class="order-total woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr"><?php echo esc_html_x( 'Total', 'table heading', 'woocommerce-subscriptions' ); ?></span></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($subscription_orders as $subscription_order)
								@php 
									$order = wc_get_order( $subscription_order );

									if ( ! $order ) {
										continue;
									}

									$item_count = $order->get_item_count();
									$order_date = $order->get_date_created();
								@endphp

								<tr class="order woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?>">
									<td class="order-number woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="<?php esc_attr_e( 'Order Number', 'woocommerce-subscriptions' ); ?>">
										<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
											<?php echo sprintf( esc_html_x( '#%s', 'hash before order number', 'woocommerce-subscriptions' ), esc_html( $order->get_order_number() ) ); ?>
										</a>
									</td>
									<td class="order-date woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="<?php esc_attr_e( 'Date', 'woocommerce-subscriptions' ); ?>">
										<time datetime="<?php echo esc_attr( $order_date->date( 'Y-m-d' ) ); ?>" title="<?php echo esc_attr( $order_date->getTimestamp() ); ?>"><?php echo wp_kses_post( $order_date->date_i18n( wc_date_format() ) ); ?></time>
									</td>
									<td class="order-status woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="<?php esc_attr_e( 'Status', 'woocommerce-subscriptions' ); ?>" style="white-space:nowrap;">
										<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
									</td>
									<td class="order-quantity woocommerce-orders-table__cell woocommerce-orders-table__cell-order-quantity" data-title="<?php esc_attr_e( 'Status', 'woocommerce-subscriptions' ); ?>" style="white-space:nowrap;">
										{{ $item_count }}
									</td>
									<td class="order-total woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="<?php echo esc_attr_x( 'Total', 'Used in data attribute. Escaped', 'woocommerce-subscriptions' ); ?>">
										@php
											echo wp_kses_post($order->get_formatted_order_total());
										@endphp
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_subscription_details_after_subscription_related_orders_table', $subscription ); ?>