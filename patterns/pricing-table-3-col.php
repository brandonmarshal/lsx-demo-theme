<?php
/**
 * Title: Pricing Table, 3 columns with icons
 * Slug: fishing-theme/pricing-table-3-col
 * Categories: fishing_theme_pricing, call-to-action, services
 * Keywords: pricing, table, columns, subscription, plan, icon
 * Description: A three-column pricing table with icons, descriptions, and call-to-action buttons.
 * ViewportWidth: 1200
 *
 * @package WordPress
 * @subpackage LSX_Demo_Theme
 * @since Fishing Theme 1.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-light-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--60)">
        <!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
        <h2 class="wp-block-heading has-text-align-center has-x-large-font-size"><?php esc_html_e( 'Choose Your Perfect Plan', 'fishing-theme' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php esc_html_e( 'Select the subscription plan that best fits your needs and budget.', 'fishing-theme' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"border":{"radius":"8px"}},"borderColor":"neutral"} -->
        <div class="wp-block-column has-border-color has-neutral-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:html -->
                <div style="width:48px;height:48px;background-color:var(--wp--preset--color--accent-1);border-radius:100%;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.42 4.58a5.4 5.4 0 0 0-7.65 0l-.77.78-.77-.78a5.4 5.4 0 0 0-7.65 0C1.46 6.7 1.33 10.28 4 13l8 8 8-8c2.67-2.72 2.54-6.3.42-8.42z"></path></svg>
                </div>
                <!-- /wp:html -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
                <h3 class="wp-block-heading has-text-align-center has-large-font-size"><?php esc_html_e( 'Basic', 'fishing-theme' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}}},"fontSize":"x-large"} -->
                <h4 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--40)">$19<span style="font-size:var(--wp--preset--font-size--small)">/month</span></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
                <p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e( 'Perfect for individuals and small projects looking for essential features.', 'fishing-theme' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:list {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"},"padding":{"left":"var:preset|spacing|40"}}}} -->
                <ul style="margin-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
                    <li><?php esc_html_e( '5 projects', 'fishing-theme' ); ?></li>
                    <li><?php esc_html_e( '20GB storage', 'fishing-theme' ); ?></li>
                    <li><?php esc_html_e( 'Basic support', 'fishing-theme' ); ?></li>
                </ul>
                <!-- /wp:list -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"base","textColor":"light","width":100,"style":{"border":{"width":"1px"}},"borderColor":"base"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-light-color has-base-background-color has-text-color has-background has-border-color has-base-border-color wp-element-button" style="border-width:1px"><?php esc_html_e( 'Choose Basic', 'fishing-theme' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"border":{"width":"2px"},"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"border":{"radius":"8px"}},"borderColor":"accent-1","backgroundColor":"base"}} -->
        <div class="wp-block-column has-border-color has-accent-1-border-color has-base-background-color has-background" style="border-width:2px;border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:html -->
                <div style="width:48px;height:48px;background-color:var(--wp--preset--color--accent-2);border-radius:100%;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                </div>
                <!-- /wp:html -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
                <h3 class="wp-block-heading has-text-align-center has-large-font-size"><?php esc_html_e( 'Professional', 'fishing-theme' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}}},"fontSize":"x-large"} -->
                <h4 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--40)">$49<span style="font-size:var(--wp--preset--font-size--small)">/month</span></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
                <p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e( 'Ideal for growing businesses needing advanced features and priority support.', 'fishing-theme' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:list {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"},"padding":{"left":"var:preset|spacing|40"}}}} -->
                <ul style="margin-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
                    <li><?php esc_html_e( '20 projects', 'fishing-theme' ); ?></li>
                    <li><?php esc_html_e( '50GB storage', 'fishing-theme' ); ?></li>
                    <li><?php esc_html_e( 'Priority support', 'fishing-theme' ); ?></li>
                    <li><?php esc_html_e( 'Advanced analytics', 'fishing-theme' ); ?></li>
                </ul>
                <!-- /wp:list -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"accent-1","width":100} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-accent-1-background-color has-background wp-element-button"><?php esc_html_e( 'Choose Professional', 'fishing-theme' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"border":{"radius":"8px"}},"borderColor":"neutral"}} -->
        <div class="wp-block-column has-border-color has-neutral-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:html -->
                <div style="width:48px;height:48px;background-color:var(--wp--preset--color--accent-3);border-radius:100%;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1v22"></path><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
                <!-- /wp:html -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
                <h3 class="wp-block-heading has-text-align-center has-large-font-size"><?php esc_html_e( 'Enterprise', 'fishing-theme' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}}},"fontSize":"x-large"} -->
                <h4 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--40)">$99<span style="font-size:var(--wp--preset--font-size--small)">/month</span></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
                <p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e( 'Complete solution for large organizations requiring maximum capabilities.', 'fishing-theme' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:list {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"},"padding":{"left":"var:preset|spacing|40"}}}} -->
                <ul style="margin-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
                    <li><?php esc_html_e( 'Unlimited projects', 'fishing-theme' ); ?></li>
                    <li><?php esc_html_e( '200GB storage', 'fishing-theme' ); ?></li>
                    <li><?php esc_html_e( '24/7 dedicated support', 'fishing-theme' ); ?></li>
                    <li><?php esc_html_e( 'Custom integrations', 'fishing-theme' ); ?></li>
                    <li><?php esc_html_e( 'White-label options', 'fishing-theme' ); ?></li>
                </ul>
                <!-- /wp:list -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"base","textColor":"light","width":100,"style":{"border":{"width":"1px"}},"borderColor":"base"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-light-color has-base-background-color has-text-color has-background has-border-color has-base-border-color wp-element-button" style="border-width:1px"><?php esc_html_e( 'Choose Enterprise', 'fishing-theme' ); ?></a></div>
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
