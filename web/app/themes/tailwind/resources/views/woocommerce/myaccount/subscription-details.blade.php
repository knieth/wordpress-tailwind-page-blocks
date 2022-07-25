<?php
/**
 * Subscription details table
 *
 * @author  Prospress
 * @package WooCommerce_Subscription/Templates
 * @since 2.2.19
 * @version 2.6.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div>
	<div class="-mx-4 flex flex-col sm:-mx-6 md:mx-0">
		<table class="shop_table subscription_details">
			<tbody>
				<tr class="border-b border-gray-200">
					<td class="py-4 pl-4 pr-3 text-sm sm:pl-6">
						<div class="font-medium text-gray-900">
							<?php esc_html_e( 'Status', 'woocommerce-subscriptions' ); ?>
						</div>
					</td>
					<td class="py-4 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-6">
						<?php echo esc_html( wcs_get_subscription_status_name( $subscription->get_status() ) ); ?>
					</td>
				</tr>

				@php do_action( 'wcs_subscription_details_table_before_dates', $subscription ); 
					$dates_to_display = apply_filters( 'wcs_subscription_details_table_dates_to_display', array(
						'start_date'              => _x( 'Start date', 'customer subscription table header', 'woocommerce-subscriptions' ),
						'last_order_date_created' => _x( 'Last order date', 'customer subscription table header', 'woocommerce-subscriptions' ),
						'next_payment'            => _x( 'Next payment date', 'customer subscription table header', 'woocommerce-subscriptions' ),
						'end'                     => _x( 'End date', 'customer subscription table header', 'woocommerce-subscriptions' ),
						'trial_end'               => _x( 'Trial end date', 'customer subscription table header', 'woocommerce-subscriptions' ),
					), $subscription );
				@endphp

				
				@foreach ($dates_to_display as $date_type => $date_title)
					@php $date = $subscription->get_date( $date_type ); @endphp
					@if (!empty($date))
						<tr class="border-b border-gray-200">
							<td class="py-4 pl-4 pr-3 text-sm sm:pl-6">
								<div class="font-medium text-gray-900">
									<?php echo esc_html( $date_title ); ?>
								</div>
							</td>
							<td class="py-4 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-6">
								<?php echo esc_html( $subscription->get_date_to_display( $date_type ) ); ?>
							</td>
						</tr>
					@endif
				@endforeach

				@php do_action( 'wcs_subscription_details_table_after_dates', $subscription ); @endphp

				@if (WCS_My_Account_Auto_Renew_Toggle::can_user_toggle_auto_renewal( $subscription ))
					<tr class="border-b border-gray-200">
						<td class="py-4 pl-4 pr-3 text-sm sm:pl-6">
							<div class="font-medium text-gray-900">
								<?php esc_html_e( 'Auto renew', 'woocommerce-subscriptions' ); ?>
							</div>
						</td>
						<td class="py-4 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-6">
							<?php

							$toggle_classes = array( 'subscription-auto-renew-toggle', 'subscription-auto-renew-toggle--hidden' );

							if ( $subscription->is_manual() ) {
								$toggle_label     = __( 'Enable auto renew', 'woocommerce-subscriptions' );
								$toggle_classes[] = 'subscription-auto-renew-toggle--off';

								if ( WCS_Staging::is_duplicate_site() ) {
									$toggle_classes[] = 'subscription-auto-renew-toggle--disabled';
								}
							} else {
								$toggle_label     = __( 'Disable auto renew', 'woocommerce-subscriptions' );
								$toggle_classes[] = 'subscription-auto-renew-toggle--on';
							}?>
							<a href="#" class="<?php echo esc_attr( implode( ' ' , $toggle_classes ) ); ?>" aria-label="<?php echo esc_attr( $toggle_label ) ?>"><i class="subscription-auto-renew-toggle__i" aria-hidden="true"></i></a>
							<?php if ( WCS_Staging::is_duplicate_site() ) : ?>
									<small class="subscription-auto-renew-toggle-disabled-note"><?php echo esc_html__( 'Using the auto-renewal toggle is disabled while in staging mode.', 'woocommerce-subscriptions' ); ?></small>
							<?php endif; ?>
						</td>
					</tr>
				@endif

				@php do_action( 'wcs_subscription_details_table_before_payment_method', $subscription ); @endphp

				@if ($subscription->get_time( 'next_payment' ) > 0)
					<tr class="border-b border-gray-200">
						<td class="py-4 pl-4 pr-3 text-sm sm:pl-6">
							<div class="font-medium text-gray-900">
								<?php esc_html_e( 'Payment', 'woocommerce-subscriptions' ); ?>
							</div>
						</td>
						<td class="py-4 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-6">
							<span data-is_manual="<?php echo esc_attr( wc_bool_to_string( $subscription->is_manual() ) ); ?>" class="subscription-payment-method"><?php echo esc_html( $subscription->get_payment_method_to_display( 'customer' ) ); ?></span>
						</td>
					</tr>
				@endif
				
				@php do_action( 'woocommerce_subscription_before_actions', $subscription ); @endphp

				@php $actions = wcs_get_all_user_actions_for_subscription( $subscription, get_current_user_id() ); @endphp

				@if (!empty($actions))
					<tr class="border-b border-gray-200">
						<td class="py-4 pl-4 pr-3 text-sm sm:pl-6">
							<div class="font-medium text-gray-900">
								<?php esc_html_e( 'Actions', 'woocommerce-subscriptions' ); ?>
							</div>
						</td>
						<td class="py-4 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-6 space-x-4">
							@foreach ($actions as $key => $action)
								<a href="<?php echo esc_url( $action['url'] ); ?>" class="button <?php echo sanitize_html_class( $key ) ?>"><?php echo esc_html( $action['name'] ); ?></a>
							@endforeach
						</td>
					</tr>
				@endif

				@php do_action( 'woocommerce_subscription_after_actions', $subscription ); @endphp
			</tbody>
		</table>
	</div>
</div>

<?php if ( $notes = $subscription->get_customer_order_notes() ) : ?>
	<h2><?php esc_html_e( 'Subscription updates', 'woocommerce-subscriptions' ); ?></h2>
	<ol class="woocommerce-OrderUpdates commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="woocommerce-OrderUpdate comment note">
			<div class="woocommerce-OrderUpdate-inner comment_container">
				<div class="woocommerce-OrderUpdate-text comment-text">
					<p class="woocommerce-OrderUpdate-meta meta"><?php echo esc_html( date_i18n( _x( 'l jS \o\f F Y, h:ia', 'date on subscription updates list. Will be localized', 'woocommerce-subscriptions' ), wcs_date_to_time( $note->comment_date ) ) ); ?></p>
					<div class="woocommerce-OrderUpdate-description description">
						<?php echo wp_kses_post( wpautop( wptexturize( $note->comment_content ) ) ); ?>
					</div>
	  				<div class="clear"></div>
	  			</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
<?php endif; ?>