<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_reset_password_form' );
?>

<div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
	<div class="sm:mx-auto sm:w-full sm:max-w-md">
		<h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Reset Password</h2>
		<p class="mt-2 text-center text-sm text-gray-600">
			Enter a new password below.
		</p>
	</div>

	<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
		<div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
			<form class="woocommerce-ResetPassword lost_reset_password space-y-6" method="post">

				<div class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
					<label for="password_1">New password <span class="required text-red-500">*</span></label>
					<div class="mt-1">
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_1" id="password_1" autocomplete="new-password" />
					</div>
				</div>
				<div class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
					<label for="password_2">Re-enter new password <span class="required text-red-500">*</span></label>
					<div class="mt-1">
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="password_2" autocomplete="new-password" />
					</div>
				</div>

				<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
				<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

				<?php do_action( 'woocommerce_resetpassword_form' ); ?>

				<div class="woocommerce-form-row form-row">
					<input type="hidden" name="wc_reset_password" value="true" />
					<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Save', 'woocommerce' ); ?>">Save</button>
				</div>

				<?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>
			</form>
		</div>
	</div>
</div>

<?php
do_action( 'woocommerce_after_reset_password_form' );

