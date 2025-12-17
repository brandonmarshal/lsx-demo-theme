<?php

/**
 * Title: Connected Information Section
 * Slug: fishing-theme/connected-info
 * Categories: featured, text
 * Keywords: fishing, connected, cards, cpt, species, gear, areas
 * Block Types: core/group, core/columns
 * Viewport Width: 1600
 * Description: Premium section with headline, subheadline, and three enhanced cards for Fish, Gear, and Area content types with icons, counters, and CTAs.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"very-dark-gray","textColor":"white","className":"connected-info-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-very-dark-gray-background-color has-text-color has-background connected-info-section" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"3rem","fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.05em"}}} -->
		<h3 class="wp-block-heading has-text-align-center" style="font-size:3rem;font-weight:700;letter-spacing:0.05em;text-transform:uppercase">EVERYTHING YOU NEED, CONNECTED.</h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.3rem"}}} -->
		<p class="has-text-align-center" style="font-size:1.3rem">We connect fragmented fishing information into one clear system for smarter angling.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--60)">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"2rem","right":"2rem"},"blockGap":"1.5rem"},"border":{"radius":"12px"}},"backgroundColor":"black","className":"connected-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group connected-card has-black-background-color has-background" style="border-radius:12px;padding-top:3rem;padding-right:2rem;padding-bottom:3rem;padding-left:2rem">
				<!-- wp:image {"width":120,"height":120,"sizeSlug":"full","linkDestination":"none","className":"card-icon"} -->
				<figure class="wp-block-image size-full is-resized card-icon"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIwIiBoZWlnaHQ9IjEyMCIgdmlld0JveD0iMCAwIDEyMCAxMjAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik0xMDAgNjBjMCAxMS0xMCAyMC0yMCAyMEg0MGMtMTEgMC0yMC0xMC0yMC0yMHYtNDBjMC0xMSAxMC0yMCAyMC0yMGg0MGMxMSAwIDIwIDEwIDIwIDIwdjQwWiIgZmlsbD0iIzMzMzMzMyIvPjxwYXRoIGQ9Ik00MCA2MGgzNHYtNDBINDB2NDBaIiBmaWxsPSIjZmZmZmZmIi8+PC9zdmc+" alt="Fish Species Icon" style="width:120px;height:120px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":4} -->
				<h4 class="wp-block-heading has-text-align-center">FISH</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">We connect fragmented species info into one clear system for smarter angling.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2.5rem","fontWeight":"800"}},"className":"count-up"} -->
				<p class="has-text-align-center count-up" style="font-size:2.5rem;font-weight:800">42<br>Species</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link">Explore Fish</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"2rem","right":"2rem"},"blockGap":"1.5rem"},"border":{"radius":"12px"}},"backgroundColor":"black","className":"connected-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group connected-card has-black-background-color has-background" style="border-radius:12px;padding-top:3rem;padding-right:2rem;padding-bottom:3rem;padding-left:2rem">
				<!-- wp:image {"width":120,"height":120,"sizeSlug":"full","linkDestination":"none","className":"card-icon"} -->
				<figure class="wp-block-image size-full is-resized card-icon"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIwIiBoZWlnaHQ9IjEyMCIgdmlld0JveD0iMCAwIDEyMCAxMjAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik02MCA2MGMxMSAwIDIwLTEwIDIwLTIwUzcxIDAgNjAgMHMtMjAgMTAtMjAgMjAgMTAgMjAgMjAgMjBaIiBmaWxsPSIjMzMzMzMzIi8+PGNpcmNsZSBjeD0iNjAiIGN5PSI2MCIgcj0iMTUiIGZpbGw9IiNmZmZmZmYiLz48L3N2Zz4=" alt="Gear Icon" style="width:120px;height:120px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":4} -->
				<h4 class="wp-block-heading has-text-align-center">GEAR</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">One-line tagline here for gear recommendations, unbiased.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2.5rem","fontWeight":"800"}},"className":"count-up"} -->
				<p class="has-text-align-center count-up" style="font-size:2.5rem;font-weight:800">128<br>Items</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link">Browse Gear</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"2rem","right":"2rem"},"blockGap":"1.5rem"},"border":{"radius":"12px"}},"backgroundColor":"black","className":"connected-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group connected-card has-black-background-color has-background" style="border-radius:12px;padding-top:3rem;padding-right:2rem;padding-bottom:3rem;padding-left:2rem">
				<!-- wp:image {"width":120,"height":120,"sizeSlug":"full","linkDestination":"none","className":"card-icon"} -->
				<figure class="wp-block-image size-full is-resized card-icon"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIwIiBoZWlnaHQ9IjEyMCIgdmlld0JveD0iMCAwIDEyMCAxMjAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik02MCAxMGMxMSAwIDIwIDEwIDIwIDIwczEwIDIwIDIwIDIwIDIwLTEwIDIwLTIwLTEwLTIwLTIwLTIwUzQ5IDEwIDYwIDEwWiIgZmlsbD0iIzMzMzMzMyIvPjxjaXJjbGUgY3g9IjYwIiBjeT0iNDAiIHI9IjE1IiBmaWxsPSIjZmZmZmZmIi8+PC9zdmc+" alt="Area Icon" style="width:120px;height:120px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":4} -->
				<h4 class="wp-block-heading has-text-align-center">AREA</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">One-line tagline for the best fishing areas in the region.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2.5rem","fontWeight":"800"}},"className":"count-up"} -->
				<p class="has-text-align-center count-up" style="font-size:2.5rem;font-weight:800">35<br>Areas</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link">Browse Areas</a></div>
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