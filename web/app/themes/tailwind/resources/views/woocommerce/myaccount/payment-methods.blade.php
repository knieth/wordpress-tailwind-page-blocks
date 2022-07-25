<?php
/**
 * Payment methods
 *
 * Shows customer payment methods on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/payment-methods.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;

$saved_methods = wc_get_customer_saved_methods_list( get_current_user_id() );
$has_methods   = (bool) $saved_methods;
$types         = wc_get_account_payment_methods_types();

do_action( 'woocommerce_before_account_payment_methods', $has_methods ); ?>


<div class="flex flex-col space-y-4">
	<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
		<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 space-y-6">
			<div class="overflow-hidden sm:rounded-lg">
				@if ($has_methods)
					<table class="min-w-full divide-y divide-gray-200">
						<thead class="bg-gray-50">
							<tr>
								@foreach (wc_get_account_payment_methods_columns() as $column_id => $column_name)
									<th class="woocommerce-PaymentMethod woocommerce-PaymentMethod--{{ $column_id }} payment-method-{{ $column_id }}">
										<span class="nobr">
											@php echo esc_html($column_name) @endphp
										</span>
									</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@foreach ($saved_methods as $type => $methods)
								@foreach ($methods as $method)
									<tr class="payment-method {{ !empty($method['is_default']) ? 'default-payment-method' : '' }}">
										@foreach (wc_get_account_payment_methods_columns() as $column_id => $column_name)
											<td class="woocommerce-PaymentMethod woocommerce-PaymentMethod--{{ $column_id }} payment-method-{{ $column_name }}">
												@if (has_action('woocommerce_account_payment_methods_column_' . $column_id))
													@php do_action( 'woocommerce_account_payment_methods_column_' . $column_id, $method ); @endphp
												@elseif ('method' === $column_id)
													@if (!empty($method['method']['last4']))
														@php echo sprintf( esc_html__( '%1$s ending in %2$s', 'woocommerce' ), esc_html( wc_get_credit_card_type_label( $method['method']['brand'] ) ), esc_html( $method['method']['last4'] ) ); @endphp
													@else
														@php echo esc_html( wc_get_credit_card_type_label( $method['method']['brand'] ) ); @endphp
													@endif
												@elseif ('expires' === $column_id)
													@php echo esc_html( $method['expires'] ); @endphp
												@elseif ('actions' === $column_id)
													<div class="space-x-6">
														@foreach ($method['actions'] as $key => $action)
															<a href="{{ esc_url($action['url']) }}" class="button {{ sanitize_html_class( $key ) }} {{ strtolower($action['name']) == 'delete' ? 'text-red-600 hover:text-red-700' : '' }}">{{ $action['name'] }}</a>
														@endforeach
													</div>
												@endif
											</td>
										@endforeach
									</tr>
								@endforeach
							@endforeach
						</tbody>
					</table>
				@else
					<p class="woocommerce-Message woocommerce-Message--info woocommerce-info">@php esc_html_e( 'No saved methods found.', 'woocommerce' ); @endphp</p>
				@endif

				<?php do_action( 'woocommerce_after_account_payment_methods', $has_methods ); ?>

			</div>
		</div>
	</div>
	<div class="flex flex-row-reverse">
		<div>
			<?php if ( WC()->payment_gateways->get_available_payment_gateways() ) : ?>
				<a type="button" class="button" href="<?php echo esc_url( wc_get_endpoint_url( 'add-payment-method' ) ); ?>"><?php esc_html_e( 'Add payment method', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>
