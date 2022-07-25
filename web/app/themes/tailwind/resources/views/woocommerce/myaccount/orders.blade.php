<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<div class="flex flex-col space-y-4">
	<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
		<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
			<div class="sm:rounded-lg">
				@if ($has_orders)
				<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table min-w-full">
					<thead class="bg-gray-50">
						<tr>
							@php
								unset(wc_get_account_orders_columns()['order-actions']);
							@endphp


							@foreach (wc_get_account_orders_columns() as $column_id => $column_name)
								<th class="woocommerce-orders-table__header woocommerce-orders-table__header-{{ $column_id }}">
									<span class="nobr">{{ $column_name }}</span>
								</th>
							@endforeach
						</tr>
					</thead>
					<tbody>
						@foreach ($customer_orders->orders as $customer_order)
							@php
								$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
								$item_count = $order->get_item_count() - $order->get_item_count_refunded();
							@endphp

							<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-{{ $order->get_status() }} order">
								@foreach (wc_get_account_orders_columns() as $column_id => $column_name)
									<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-{{ $column_id }}" data-title="{{ $column_name }}">
										@if (has_action('woocommerce_my_account_my_orders_column_' . $column_id))
											@php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); @endphp
										@elseif ('order-number' === $column_id)
											<a href="{{ $order->get_view_order_url() }}" class="woocommerce-button button {{ sanitize_html_class( $key ) }}">
												@php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); @endphp
											</a>
										@elseif ('order-date' === $column_id)
											<time datetime="{{ $order->get_date_created()->date( 'c' ) }}">{{ wc_format_datetime( $order->get_date_created() ) }}</time>
										@elseif ('order-status' === $column_id)
											{{ ucwords($order->get_status()) }}
										@elseif ('order-quantity' === $column_id)
											{{ $item_count }}
										@elseif ('order-total' === $column_id)
											@php
												echo wp_kses_post($order->get_formatted_order_total());
											@endphp
										@endif
									</td>
								@endforeach
							</tr>
						@endforeach
					</tbody>
				</table>

				@else
					<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
						<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php esc_html_e( 'Browse products', 'woocommerce' ); ?></a>
						<?php esc_html_e( 'No order has been made yet.', 'woocommerce' ); ?>
					</div>
				@endif
			</div>
		</div>
	</div>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination flex items-center border-none">
			<div>
				<?php if ( 1 !== $current_page ) : ?>
					<a type="button" class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</div>

			<div>
				<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
					<a type="button" class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
</div>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
