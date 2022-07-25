<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account space-y-6" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 lg:gap-x-4">
		<div class="space-y-2">
			<label class="block text-sm font-medium text-gray-700" for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required text-red-600">*</span></label>
			<input type="text" class="py-3 px-4 block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 border-gray-300 rounded-md" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
		</div>

		<div class="space-y-2">
			<label class="block text-sm font-medium text-gray-700" for="account_first_name" for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required text-red-600">*</span></label>
			<input type="text" class="py-3 px-4 block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 border-gray-300 rounded-md" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
		</div>

		<div class="space-y-2">
			<label class="block text-sm font-medium text-gray-700" for="account_first_name" for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required text-red-600">*</span></label>
			<input type="text" class="py-3 px-4 block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 border-gray-300 rounded-md" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />
			<p class="text-sm italic text-gray-500"><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></p>
		</div>

		<div class="space-y-2">
			<label class="block text-sm font-medium text-gray-700" for="account_first_name" for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required text-red-600">*</span></label>
			<input type="email" class="py-3 px-4 block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 border-gray-300 rounded-md" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
		</div>
	</div>

	<fieldset class="grid grid-cols-1 sm:grid-cols-3 gap-y-6 lg:gap-x-4 space-y-4">
		<legend><?php esc_html_e( 'Password change (leave blank to leave unchanged)', 'woocommerce' ); ?></legend>

		<div class="space-y-2">
			<label class="block text-sm font-medium text-gray-700" for="account_first_name" for="password_current"><?php esc_html_e( 'Current password', 'woocommerce' ); ?></label>
			<input type="password" class="py-3 px-4 block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 border-gray-300 rounded-md" name="password_current" id="password_current" autocomplete="off" />
		</div>

		<div class="space-y-2">
			<label class="block text-sm font-medium text-gray-700" for="account_first_name" for="password_1"><?php esc_html_e( 'New password', 'woocommerce' ); ?></label>
			<input type="password" class="py-3 px-4 block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 border-gray-300 rounded-md" name="password_1" id="password_1" autocomplete="off" />
		</div>

		<div class="space-y-2">
			<label class="block text-sm font-medium text-gray-700" for="account_first_name" for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
			<input type="password" class="py-3 px-4 block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 border-gray-300 rounded-md" name="password_2" id="password_2" autocomplete="off" />
		</div>
	</fieldset>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<div class="flex flex-row-reverse">
			<div>
				<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
				<button type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
				<input type="hidden" name="action" value="save_account_details" />
			</div>
		</div>
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
