<?php
 /**
  * Title: Header With Cart
  * Slug: threadwears/header-with-cart
  * Categories: threadwears, header
  */
?>

<!-- wp:group {"align":"full","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:group {"align":"full","className":"wp-block-main-header","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignfull wp-block-main-header">
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dtiny)","top":"var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dspacing\u002d\u002dtiny)"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group alignfull" style="padding-top:var(--wp--custom--spacing--tiny);padding-bottom:var(--wp--custom--spacing--tiny)">
			<!-- wp:navigation {"layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"left"}} /-->
			<!-- wp:group {"className":"wp-site-logo","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group wp-site-logo">
				<!-- wp:site-logo {"width":64} /-->
				<!-- wp:group -->
				<div class="wp-block-group">
					<!-- wp:site-title {"textAlign":"center"} /-->
					<!-- wp:site-tagline {"textAlign":"center","style":{"spacing":{"margin":{"top":"4px"}}}} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {"className":"wp-header-right","layout":{"type":"flex","allowOrientation":false}} -->
			<div class="wp-block-group wp-header-right">
				<!-- wp:fse-pro/icons {"icon":"Person","iconSize":26,"url":"#","urlTitle":"Click here","className":"wp-user-account"} -->
				<div icon="Person" iconsize="26" iconcolor="inherit" iconbgcolor="inherit" iconhovercolor="inherit" iconhoverbgcolor="inherit" url="#" urltitle="Click here" borderradius="0" padding="0" style="--icons-bg-color:inherit;--icons-hover-color:inherit;--icons-hover-bg-color:inherit;--icons-padding:0px;--icons-border-radius:0%" class="wp-block-fse-pro-icons wp-user-account">
					<div class="fse-pro-icons">
						<a href="#" title="Click here">
							<svg
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="26" height="26" fill="inherit" type="Person">
								<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
							</svg>
						</a>
					</div>
				</div>
				<!-- /wp:fse-pro/icons -->
				<!-- wp:woocommerce/mini-cart {"hasHiddenPrice":true} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
