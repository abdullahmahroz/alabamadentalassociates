<?php
$brainstrom_products = ( get_option( 'brainstrom_products' ) ) ? get_option( 'brainstrom_products' ) : array();
$bsf_product_themes  = array();
if ( ! empty( $brainstrom_products ) ) :
	$bsf_product_themes = ( isset( $brainstrom_products['themes'] ) ) ? $brainstrom_products['themes'] : array();
endif;
$imedica_bsf['status'] = '';
if ( isset( $bsf_product_themes['10395942'] ) ) {
	$imedica_bsf = $bsf_product_themes['10395942'];
}

?>
<div class="wrap about-wrap bend">
	<div class="wrap-container">
		<?php if ( ! array_key_exists( 'status', $imedica_bsf ) || $imedica_bsf['status'] !== 'registered' ): ?>
			<!-- When Theme is not registered -->
			<div class="bend-heading-section imedica-about-header">
				<h1><?php _e( 'Welcome to iMedica!', 'imedica' ); ?></h1>

				<h3><?php _e( 'iMedica is now installed. To get started, please follow the steps below and register yourself, which unlocks instant access to our support portal, one click updates, extensions and more!', 'imedica' ); ?></h3>

				<div class="bend-head-logo">
					<?php /*<img src="<?php echo get_template_directory_uri().'/css/img/brainstorm-logo.png' ?>" /> */ ?>
					<div class="bend-product-ver"><?php _e( 'Version ', 'imedica' );
						echo IMEDICA_VERSION; ?></div>
				</div>
			</div>    <!--heading section-->
			<div class="bend-content-wrap">
				<hr class="bsf-extensions-lists-separator" style="margin: 22px 0px 30px 0px;"></hr>
				<div class="container imedica-welcome-content">
					<div class="col-md-4">
						<div class="imedica-wrap-content">
							<div class="imedica-wrap-left-digit">
								<span class="bsf-numbers-uni31"></span>
							</div>
							<!--imedica-wrap-lefticon-->
							<div class="imedica-wrap-right-content">
								<h3><?php _e( 'Register', 'imedica' ); ?></h3>
							</div>
							<!--imedica-wrap-right-content-->
							<div class="imedica-wrap-bottom-content">
								<p class="imedica-wrap-discription"><?php _e( 'Register with your email address which instantly creates your account on our support portal.', 'imedica' ); ?></p>
							</div>
							<!--imedica-wrap-right-content-->
						</div>
						<!--imedica wrap content-->
					</div>
					<div class="col-md-4">
						<div class="imedica-wrap-content">
							<div class="imedica-wrap-left-digit">
								<span class="bsf-numbers-uni32"></span>
							</div>
							<!--imedica-wrap-lefticon-->
							<div class="imedica-wrap-right-content">
								<h3><?php _e( 'Validate Purchase', 'imedica' ); ?></h3>
							</div>
							<!--imedica-wrap-right-content-->
							<div class="imedica-wrap-bottom-content">
								<p class="imedica-wrap-discription"><?php _e( 'Once registered, enter your purchase code and validate your license to get eligible for one click updates.', 'imedica' ); ?></p>
							</div>
							<!--imedica-wrap-right-content-->
						</div>
						<!--imedica wrap content-->
					</div>
					<div class="col-md-4">
						<div class="imedica-wrap-content">
							<div class="imedica-wrap-left-digit">
								<span class="bsf-numbers-uni33"></span>
							</div>
							<!--imedica-wrap-lefticon-->
							<div class="imedica-wrap-right-content">
								<h3><?php _e( 'Install Extensions', 'imedica' ); ?></h3>
							</div>
							<!--imedica-wrap-right-content-->
							<div class="imedica-wrap-bottom-content">
								<p class="imedica-wrap-discription"><?php _e( "Finally, explore the library of premium plugins & extensions which are available to every verified buyer.", 'imedica' ); ?></p>
							</div>
							<!--imedica-wrap-right-content-->
						</div>
						<!--imedica wrap content-->
					</div>
				</div>
				<hr class="bsf-extensions-lists-separator" style="margin: 22px 0px 30px 0px;"></hr>
				<div class="container imedica-welcome-bottom-content">
					<div class="col-md-4 col-md-offset-4">
						<a target="_blank" class="button-primary imedica-welcome-started"
						   href="<?php echo BSF_REGISTRATION_URL; ?>"
						   style="display: block;"><?php _e( "LET'S GET STARTED", 'imedica' ); ?></a>
					</div>
				</div>
				<div class="container">
					<div class="col-md-12 text-center" style="margin-bottom: 50px;">
						<?php _e( 'Thank you for choosing iMedica. We are thrilled and committed to make your WordPress experience better.', 'imedica' ); ?>
					</div>
				</div>
			</div><!--bend-content-wrap-->
		<?php else: ?>
			<!-- When theme is registered -->
			<div class="bend-heading-section imedica-about-header">
				<h1><?php _e( 'Thank you for choosing iMedica!', 'imedica' ); ?></h1>

				<h3><?php _e( 'iMedica is now installed. To get started, please follow the steps below and register yourself, which unlocks instant access to our support portal, one click updates, extensions and more!', 'imedica' ); ?></h3>

				<div class="bend-head-logo">
					<?php /*<img src="<?php echo get_template_directory_uri().'/css/img/brainstorm-logo.png' ?>" /> */ ?>
					<div class="bend-product-ver"><?php _e( 'Version ', 'imedica' );
						echo IMEDICA_VERSION; ?></div>
				</div>
			</div>    <!--heading section-->
			<div class="bend-content-wrap">
				<hr class="bsf-extensions-lists-separator" style="margin: 22px 0px 30px 0px;"></hr>
				<div class="container imedica-welcome-content">
					<div class="col-md-4">
						<div class="imedica-wrap-content">
							<div class="imedica-wrap-left-digit">
								<span class="bsf-numbers-uni31"></span>
							</div>
							<!--imedica-wrap-lefticon-->
							<div class="imedica-wrap-right-content">
								<h3><?php _e( 'Register', 'imedica' ); ?></h3>
							</div>
							<!--imedica-wrap-right-content-->
							<div class="imedica-wrap-bottom-content">
								<p class="imedica-wrap-discription"><?php _e( 'Register with your email address which instantly creates your account on our support portal.', 'imedica' ); ?></p>
							</div>
							<!--imedica-wrap-right-content-->
						</div>
						<!--imedica wrap content-->
					</div>
					<div class="col-md-4">
						<div class="imedica-wrap-content">
							<div class="imedica-wrap-left-digit">
								<span class="bsf-numbers-uni32"></span>
							</div>
							<!--imedica-wrap-lefticon-->
							<div class="imedica-wrap-right-content">
								<h3><?php _e( 'Validate Purchase', 'imedica' ); ?></h3>
							</div>
							<!--imedica-wrap-right-content-->
							<div class="imedica-wrap-bottom-content">
								<p class="imedica-wrap-discription"><?php _e( 'Once registered, enter your purchase code and validate your license to get eligible for one click updates.', 'imedica' ); ?></p>
							</div>
							<!--imedica-wrap-right-content-->
						</div>
						<!--imedica wrap content-->
					</div>
					<div class="col-md-4">
						<div class="imedica-wrap-content">
							<div class="imedica-wrap-left-digit">
								<span class="bsf-numbers-uni33"></span>
							</div>
							<!--imedica-wrap-lefticon-->
							<div class="imedica-wrap-right-content">
								<h3><?php _e( 'Install Extensions', 'imedica' ); ?></h3>
							</div>
							<!--imedica-wrap-right-content-->
							<div class="imedica-wrap-bottom-content">
								<p class="imedica-wrap-discription"><?php _e( "Finally, explore the library of premium plugins & extentions that's available to every verified buyer.", 'imedica' ); ?></p>
							</div>
							<!--imedica-wrap-right-content-->
						</div>
						<!--imedica wrap content-->
					</div>
				</div>
				<hr class="bsf-extensions-lists-separator" style="margin: 22px 0px 30px 0px;"></hr>
				<div class="container imedica-welcome-bottom-content">
					<div class="col-md-4 col-md-offset-4">
						<a target="_blank" class="button-primary imedica-welcome-started"
						   href="<?php echo bsf_exension_installer_url( '10395942' ); ?>"><?php _e( "LET'S INSTALL FREE EXTENSIONS", 'imedica' ); ?></a>
					</div>
				</div>
				<div class="container">
					<div class="col-md-12 text-center" style="margin-bottom: 50px;">
						<?php _e( 'Thank you for choosing iMedica. We are thrilled and committed to make your WordPress experience better.', 'imedica' ); ?>
					</div>
				</div>
			</div><!--bend-content-wrap-->
		<?php endif ?>
	</div>
</div>
