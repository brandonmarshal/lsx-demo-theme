<?php

/**
 * Title: Connected Information Section
 * Slug: lsx-demo-theme/connected-info
 * Categories: featured, text
 * Keywords: fishing, connected, cards, cpt, species, gear, areas
 * Viewport Width: 1600
 * Description: Section with headline and three premium cards for Fish, Gear, and Area CPTs, including icons, manual counters, and CTAs.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"black","textColor":"white","className":"connected-info-section"} -->
<div class="wp-block-group alignfull has-white-color has-black-background-color has-text-color has-background connected-info-section">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"3.5rem","fontWeight":"900","textTransform":"uppercase","letterSpacing":"0.05em"}}} -->
		<h2 class="wp-block-heading has-text-align-center" style="font-size:3.5rem;font-weight:900;letter-spacing:0.05em;text-transform:uppercase">EVERYTHING YOU NEED, CONNECTED.</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.4rem"}}} -->
		<p class="has-text-align-center" style="font-size:1.4rem">We connect fragmented fishing information into one clear system for smarter angling.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2.5rem","right":"2.5rem"},"blockGap":"2rem"},"border":{"radius":"16px"}},"backgroundColor":"very-dark-gray","className":"connected-card"} -->
			<div class="wp-block-group connected-card has-very-dark-gray-background-color has-background" style="border-radius:16px;padding-top:4rem;padding-right:2.5rem;padding-bottom:4rem;padding-left:2.5rem">
				<!-- wp:image {"align":"center","width":"140px","height":"140px","sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://thumbs.dreamstime.com/b/fish-outline-shape-icon-vector-illustration-150315746.jpg" alt="Fish Icon" style="width:140px;height:140px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"2.2rem","fontWeight":"800"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:2.2rem;font-weight:800">FISH</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">Recommended species info, techniques, and proven catches.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"900"},"elements":{"link":{"color":{"text":"var:preset|color|cyan-bluish-gray"}}}},"textColor":"cyan-bluish-gray","className":"manual-counter"} -->
				<p class="has-text-align-center manual-counter has-cyan-bluish-gray-color has-text-color" style="font-size:3rem;font-weight:900">42<br>Species</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"border":{"radius":"6px"},"typography":{"textTransform":"uppercase"}},"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" style="border-radius:6px;text-transform:uppercase">EXPLORE FISH</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2.5rem","right":"2.5rem"},"blockGap":"2rem"},"border":{"radius":"16px"}},"backgroundColor":"very-dark-gray","className":"connected-card"} -->
			<div class="wp-block-group connected-card has-very-dark-gray-background-color has-background" style="border-radius:16px;padding-top:4rem;padding-right:2.5rem;padding-bottom:4rem;padding-left:2.5rem">
				<!-- wp:image {"align":"center","width":"140px","height":"140px","sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://www.shutterstock.com/image-vector/vector-illustration-fishing-rod-reel-260nw-2633515855.jpg" alt="Gear Icon" style="width:140px;height:140px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"2.2rem","fontWeight":"800"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:2.2rem;font-weight:800">GEAR</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">One-line recommendations based on species, conditions, not sales.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"900"},"elements":{"link":{"color":{"text":"var:preset|color|cyan-bluish-gray"}}}},"textColor":"cyan-bluish-gray","className":"manual-counter"} -->
				<p class="has-text-align-center manual-counter has-cyan-bluish-gray-color has-text-color" style="font-size:3rem;font-weight:900">128<br>Recommendations</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"border":{"radius":"6px"},"typography":{"textTransform":"uppercase"}},"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" style="border-radius:6px;text-transform:uppercase">BROWSE GEAR</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2.5rem","right":"2.5rem"},"blockGap":"2rem"},"border":{"radius":"16px"}},"backgroundColor":"very-dark-gray","className":"connected-card"} -->
			<div class="wp-block-group connected-card has-very-dark-gray-background-color has-background" style="border-radius:16px;padding-top:4rem;padding-right:2.5rem;padding-bottom:4rem;padding-left:2.5rem">
				<!-- wp:image {"align":"center","width":"140px","height":"140px","sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://thumbs.dreamstime.com/b/fish-shape-pin-map-location-logo-symbol-vector-icon-illustration-graphic-design-220300417.jpg" alt="Area Icon" style="width:140px;height:140px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"2.2rem","fontWeight":"800"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:2.2rem;font-weight:800">AREA</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">The best locations in the region.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"900"},"elements":{"link":{"color":{"text":"var:preset|color|cyan-bluish-gray"}}}},"textColor":"cyan-bluish-gray","className":"manual-counter"} -->
				<p class="has-text-align-center manual-counter has-cyan-bluish-gray-color has-text-color" style="font-size:3rem;font-weight:900">35<br>Areas</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"border":{"radius":"6px"},"typography":{"textTransform":"uppercase"}},"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" style="border-radius:6px;text-transform:uppercase">BROWSE AREAS</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->