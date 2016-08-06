<?php
function nyi_add_custom_metabox() {
	add_meta_box(
		'nyi_meta',
		__( 'Organisation Details' ),
		'nyi_meta_callback',
		'organisation',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'nyi_add_custom_metabox' );
function nyi_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'nyi_orgs_nonce' );
	$nyi_stored_meta = get_post_meta( $post->ID ); ?>

	<div>
		<div class="meta-row">
			<div class="meta-th">
				<label for="email" class="nyi-row-title"> Email </label>
			</div>
			<div class="meta-td">
				<input type="text" class="nyi-row-content" name="email" id="email"
				value="<?php if ( ! empty ( $nyi_stored_meta['email'] ) ) {
					echo esc_attr( $nyi_stored_meta['email'][0] );
				} ?>"/>
			</div>
		</div>
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="phone" class="nyi-row-title"> Phone </label>
			</div>
			<div class="meta-td">
				<input type="text" class="nyi-row-content" name="phone" id="phone"
				value="<?php if ( ! empty ( $nyi_stored_meta['phone'] ) ) {
					echo esc_attr( $nyi_stored_meta['phone'][0] );
				} ?>"/>
			</div>
		</div>

		<div class="meta-row">
			<div class="meta-th">
				<label for="address_1" class="nyi-row-title"> Address </label>
			</div>
			<div class="meta-td">
				<input type="text" class="nyi-row-content" name="address_1" id="address_1"
				value="<?php if ( ! empty ( $nyi_stored_meta['address_1'] ) ) {
					echo esc_attr( $nyi_stored_meta['address_1'][0] );
				} ?>"/>
			</div>
		</div>

		<div class="meta-row">
			<div class="meta-td">
				<input type="text" class="nyi-row-content" name="address_2" id="address_2"
				value="<?php if ( ! empty ( $nyi_stored_meta['address_2'] ) ) {
					echo esc_attr( $nyi_stored_meta['address_2'][0] );
				} ?>"/>
			</div>
		</div>

		<div class="meta-row">
			<div class="meta-th">
				<label for="city" class="nyi-row-title"> City </label>
			</div>
			<div class="meta-td">
				<input type="text" class="nyi-row-content" name="city" id="city"
				value="<?php if ( ! empty ( $nyi_stored_meta['city'] ) ) {
					echo esc_attr( $nyi_stored_meta['city'][0] );
				} ?>"/>
			</div>
		</div>

		<div class="meta-row">
			<div class="meta-th">
				<label for="zip" class="nyi-row-title"> Zip Code </label>
			</div>
			<div class="meta-td">
				<input type="text" class="nyi-row-content" name="zip" id="zip"
				value="<?php if ( ! empty ( $nyi_stored_meta['zip'] ) ) {
					echo esc_attr( $nyi_stored_meta['zip'][0] );
				} ?>"/>
			</div>
		</div>

		<div class="meta-row">
			<div class="meta-th">
				<label for="state" class="nyi-row-title"> State </label>
			</div>
			<div class="meta-td">
				<input type="text" class="nyi-row-content" name="state" id="state"
				value="<?php if ( ! empty ( $nyi_stored_meta['state'] ) ) {
					echo esc_attr( $nyi_stored_meta['state'][0] );
				} ?>"/>
			</div>
		</div>

		<div class="meta-row">
			<div class="meta-th">
				<label for="country" class="nyi-row-title"> Country </label>
			</div>
			<div class="meta-td">
				<input type="text" class="nyi-row-content" name="country" id="country"
				value="<?php if ( ! empty ( $nyi_stored_meta['country'] ) ) {
					echo esc_attr( $nyi_stored_meta['country'][0] );
				} ?>"/>
			</div>
		</div>

		<div class="meta-row">
			<div class="meta-th">
				<label for="website" class="nyi-row-title"> Website </label>
			</div>
			<div class="meta-td">
				<input type="text" class="nyi-row-content" name="website" id="website"
				value="<?php if ( ! empty ( $nyi_stored_meta['website'] ) ) {
					echo esc_attr( $nyi_stored_meta['website'][0] );
				} ?>"/>
			</div>
		</div>

		<div class="meta">
			<div class="meta-th">
				<span>Description</span>
			</div>
		</div>
		<div class="meta-editor"></div>
		<?php
		$content = get_post_meta( $post->ID, 'org_description', true );
		$editor = 'org_description';
		$settings = array(
			'textarea_rows' => 8,
			'media_buttons' => false,
		);
		wp_editor( $content, $editor, $settings); ?>
		</div>
	</div>	
	<?php
}
function nyi_meta_save( $post_id ) {
	// Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'nyi_jobs_nonce' ] ) && wp_verify_nonce( $_POST[ 'nyi_jobs_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'email' ] ) ) {
    	update_post_meta( $post_id, 'email', sanitize_text_field( $_POST[ 'email' ] ) );
    }
    if ( isset( $_POST[ 'phone' ] ) ) {
    	update_post_meta( $post_id, 'phone', sanitize_text_field( $_POST[ 'phone' ] ) );
    }
    if ( isset( $_POST[ 'address_1' ] ) ) {
    	update_post_meta( $post_id, 'address_1', sanitize_text_field( $_POST[ 'address_1' ] ) );
    }
    if ( isset( $_POST[ 'address_2' ] ) ) {
    	update_post_meta( $post_id, 'address_2', sanitize_text_field( $_POST[ 'address_2' ] ) );
    }
    if ( isset( $_POST[ 'city' ] ) ) {
    	update_post_meta( $post_id, 'city', sanitize_text_field( $_POST[ 'city' ] ) );
    }
    if ( isset( $_POST[ 'zip' ] ) ) {
    	update_post_meta( $post_id, 'zip', sanitize_text_field( $_POST[ 'zip' ] ) );
    }
    if ( isset( $_POST[ 'state' ] ) ) {
    	update_post_meta( $post_id, 'state', sanitize_text_field( $_POST[ 'state' ] ) );
    }
    if ( isset( $_POST[ 'country' ] ) ) {
    	update_post_meta( $post_id, 'country', sanitize_text_field( $_POST[ 'country' ] ) );
    }
    if ( isset( $_POST[ 'website' ] ) ) {
    	update_post_meta( $post_id, 'website', sanitize_text_field( $_POST[ 'website' ] ) );
    }
    if ( isset( $_POST[ 'org_description' ] ) ) {
    	update_post_meta( $post_id, 'org_description', sanitize_text_field( $_POST[ 'org_description' ] ) );
    }
}
add_action( 'save_post', 'nyi_meta_save' );