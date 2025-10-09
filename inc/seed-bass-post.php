<?php

/**
 * Seeds (creates or updates) the "How to Catch a Bass" blog post.
 *
 * This file can be removed after the post is successfully created.
 * It embeds the content directly (since the markdown source file is not present).
 *
 * @package lsx-demo-theme
 */

if (! function_exists('lsx_demo_theme_seed_bass_post')) {
	function lsx_demo_theme_seed_bass_post(): void
	{
		// Only run in admin or CLI to avoid front-end overhead.
		if (! (is_admin() || (defined('WP_CLI') && WP_CLI))) {
			return;
		}

		$option_key = 'lsx_demo_theme_seeded_bass_post_v2';
		if (get_option($option_key)) {
			return;
		}

		$slug       = 'how-to-catch-a-bass';
		$post_title = 'How to Catch a Bass';

		$content = <<<HTML
<h1>How to Catch a Bass</h1>
<p>Bass (both Largemouth <em>Micropterus salmoides</em> and Smallmouth <em>Micropterus dolomieu</em>) are among the most popular freshwater sportfish. This guide focuses on practical, ethical, and adaptable methods for consistently finding and catching bass in rivers, dams, and impoundments.</p>
<h2>Quick Start (TL;DR)</h2>
<ul>
<li>Dawn and dusk = prime feeding windows.</li>
<li>Start with a 6'6"–7' Medium or Medium-Heavy spinning or baitcasting setup.</li>
<li>Confidence lures: soft plastic worms, spinnerbaits, jigs, topwater (early/late), crankbaits (search).</li>
<li>Locate structure: weed edges, submerged timber, rocks, contour breaks, current seams (smallmouth).</li>
<li>Stealth matters: quiet approach, accurate casts, controlled retrieve.</li>
<li>Adjust depth or speed before changing lure colour.</li>
</ul>
<h2>Understanding Bass Behaviour</h2>
<h3>Seasonal Patterns</h3>
<table>
<thead><tr><th>Season</th><th>Water Temp (°C)</th><th>Behaviour Focus</th><th>Key Zones</th><th>Go-To Approaches</th></tr></thead>
<tbody>
<tr><td>Late Summer</td><td>22–28</td><td>Metabolic peak, chase bait</td><td>Weed lines, shade pockets</td><td>Fast spinnerbaits, walking topwater</td></tr>
<tr><td>Autumn</td><td>18–22</td><td>Feeding up, schooling bait</td><td>Points, wind-blown banks</td><td>Medium crankbaits, jerkbaits</td></tr>
<tr><td>Winter</td><td>8–14</td><td>Sluggish, tight to cover</td><td>Deep ledges, rock transitions</td><td>Finesse plastics, jigs, slow roll</td></tr>
<tr><td>Pre-Spawn</td><td>14–18</td><td>Staging females</td><td>Secondary points, channel swings</td><td>Suspending jerkbaits, lipless cranks</td></tr>
<tr><td>Spawn</td><td>16–22</td><td>Territorial on beds</td><td>Protected flats</td><td>Ethical avoidance when possible</td></tr>
<tr><td>Post-Spawn</td><td>18–24</td><td>Recovering, scattered</td><td>Shade, shallow cover</td><td>Weightless plastics, subtle topwater</td></tr>
</tbody></table>
<h3>Daily Movement</h3>
<p>Bass often shift between feeding flats (low light), travel lanes (mid-morning), and deeper holding areas (bright sun). Smallmouth lean on current: tailouts, riffle edges, mid‑river boulders.</p>
<h2>Habitat & Location Strategy</h2>
<ol>
<li>Map Study: Mark points, creek arms, depth changes, inflows.</li>
<li>Seasonal Layering: Overlay water temp + bait presence.</li>
<li>Structure vs Cover: Structure = contours (points, humps, channels); Cover = objects (grass, timber, rock, docks).</li>
<li>Position Heuristics: Largemouth = edge-oriented ambushers; Smallmouth = current-facing cruisers.</li>
<li>Wind: Concentrates plankton → bait → predators (work windward first).</li>
<li>Water Clarity: Stained = shallower + power baits; clear = natural colours + longer casts.</li>
</ol>
<h2>Gear & Tackle</h2>
<h3>Rod & Reel</h3>
<table>
<thead><tr><th>Technique</th><th>Rod</th><th>Reel</th><th>Line</th><th>Notes</th></tr></thead>
<tbody>
<tr><td>Finesse Plastics</td><td>7' ML Fast Spinning</td><td>2500–3000</td><td>10–15 lb braid + 6–8 lb fluoro leader</td><td>Sensitivity & light presentations</td></tr>
<tr><td>General Purpose</td><td>7' M Fast Spin/Cast</td><td>3000 / Low-Profile</td><td>15–20 lb braid + 8–12 lb leader</td><td>Versatile</td></tr>
<tr><td>Jigs / Texas Rigs</td><td>7'2" MH Fast Casting</td><td>Low-Profile</td><td>30–40 lb braid OR 15–17 lb fluoro</td><td>Power for cover</td></tr>
<tr><td>Crankbaits</td><td>7' M Moderate Casting</td><td>Low-Profile</td><td>10–12 lb mono/fluoro</td><td>Keeps trebles pinned</td></tr>
<tr><td>Topwater</td><td>6'10"–7' M Fast</td><td>2000–3000 / Low-Profile</td><td>30–40 lb braid (no stretch)</td><td>Walkers, poppers, frogs</td></tr>
</tbody></table>
<h3>Terminal & Lures</h3>
<ul>
<li>Soft Plastics: Stick worms, finesse worms, creature baits, paddle tails.</li>
<li>Reaction: Spinnerbaits, bladed jigs, squarebills, lipless cranks.</li>
<li>Jigs: 3/8–1/2 oz arkie/football + craw trailer.</li>
<li>Topwater: Walking baits, poppers, frogs, buzzbaits.</li>
<li>Finesse: Ned rigs, tubes, hair jigs (cold), drop shots.</li>
</ul>
<h2>Core Presentations & When to Use Them</h2>
<table>
<thead><tr><th>Situation</th><th>Conditions</th><th>Presentation</th><th>Why It Works</th></tr></thead>
<tbody>
<tr><td>Searching New Water</td><td>Mild stain, 1–2 m vis</td><td>Medium diving crankbait</td><td>Covers water & deflects for reaction bites</td></tr>
<tr><td>Cold Front</td><td>Bluebird, high pressure</td><td>Finesse worm (drop shot)</td><td>Subtle & suspends in strike zone</td></tr>
<tr><td>Heavy Cover</td><td>Thick grass / timber</td><td>Texas-rig creature / jig</td><td>Penetrates & imitates craw/bluegill</td></tr>
<tr><td>Schooling Baitfish</td><td>Surface chasing</td><td>Compact swimbait / jerkbait</td><td>Matches fleeing bait profile</td></tr>
<tr><td>Low Light Explosive Bites</td><td>Dawn / dusk slick water</td><td>Walking topwater</td><td>Audible + visual draw</td></tr>
<tr><td>Suspended Fish</td><td>Mid-depth roamers</td><td>Suspecting jerkbait</td><td>Pause triggers reaction</td></tr>
</tbody></table>
<h2>Retrieve Principles</h2>
<ul>
<li>Contact = Clarity: Feel bottom (mud vs rock vs shell).</li>
<li>Change = Trigger: Pauses, speed surges, directional deflections.</li>
<li>Line: Semi‑slack on finesse; controlled tension on reaction.</li>
<li>Hookset: Reel down + sweep (trebles); firm snap (single hooks).</li>
</ul>
<h2>Reading Conditions</h2>
<h3>Water Clarity</h3>
<ul>
<li>Clear (>2.5 m): Natural greens/browns, translucent shad.</li>
<li>Stained (1–2 m): White/chartreuse, gold blades, rattling cranks.</li>
<li>Muddy (<1 m): Black/blue jigs, loud lipless, Colorado thump.</li>
</ul>
<h3>Weather & Pressure</h3>
<ul>
<li>Falling / Pre‑Storm: Power fish.</li>
<li>Post‑Front: Downsize + slow + vertical breaks.</li>
<li>Overcast: Extends shallow bite window.</li>
<li>High Sun: Shade lines or deeper edges.</li>
</ul>
<h2>Common Mistakes (And Fixes)</h2>
<table>
<thead><tr><th>Mistake</th><th>Consequence</th><th>Fix</th></tr></thead>
<tbody>
<tr><td>Constant colour changes</td><td>Wasted time</td><td>Adjust depth/speed first</td></tr>
<tr><td>Fishing too fast in cold water</td><td>Missed bites</td><td>Slow retrieve & longer pauses</td></tr>
<tr><td>Ignoring wind</td><td>Fewer quality fish</td><td>Start on windward structure</td></tr>
<tr><td>Neglecting line condition</td><td>Break-offs</td><td>Re‑tie after abrasion</td></tr>
<tr><td>Early topwater hookset</td><td>Missed hookups</td><td>Wait until weight is felt</td></tr>
</tbody></table>
<h2>Ethical & Conservation Practices</h2>
<ul>
<li>Release quality spawners (selective harvest).</li>
<li>Wet hands; support fish horizontally.</li>
<li>Limit bed fishing; protect reproduction.</li>
<li>Remove litter; dispose of line safely.</li>
<li>Follow size/bag/season regulations.</li>
</ul>
<h2>Adaptive Decision Flow</h2>
<ol>
<li>Identify season + recent weather shift.</li>
<li>Check water temp + clarity.</li>
<li>Start with a search reaction bait.</li>
<li>Log productive depth/structure.</li>
<li>Shift to finesse if bites taper.</li>
<li>Change casting angles before relocating.</li>
</ol>
<h2>Beginner Progression Path</h2>
<ol>
<li>Weightless stick worm (confidence).</li>
<li>Feel bottom (Texas rig, jig).</li>
<li>Add moving search baits (spinnerbait, crankbait).</li>
<li>Introduce topwater (timing & patience).</li>
<li>Adopt baitcasting for heavier techniques.</li>
<li>Refine mapping + seasonal pattern reading.</li>
</ol>
<h2>Sample Bank Load-Out</h2>
<ul>
<li>7' M spinning (15 lb braid + 8 lb fluoro leader)</li>
<li>5" stick worms, 1/4 oz jig + craw trailer</li>
<li>White/chartreuse spinnerbait, 90 mm jerkbait, paddle tail swimbaits</li>
<li>Pliers, cutters, scale, polarized glasses</li>
</ul>
<h2>Troubleshooting Guide</h2>
<table>
<thead><tr><th>Symptom</th><th>Likely Cause</th><th>Adjustment</th></tr></thead>
<tbody>
<tr><td>Short strikes</td><td>Too fast / profile off</td><td>Downsize or add pauses</td></tr>
<tr><td>Follows no commit</td><td>Predictable path</td><td>Directional change / burst</td></tr>
<tr><td>Lost fish mid‑fight</td><td>Dull hook / wrong rod action</td><td>Sharpen / moderate action for trebles</td></tr>
<tr><td>Only small fish</td><td>Wrong depth or timing</td><td>Move deeper or low light</td></tr>
<tr><td>No bites after front</td><td>High pressure slump</td><td>Downsize + vertical + finesse</td></tr>
</tbody></table>
<h2>Glossary</h2>
<ul>
<li><strong>Staging</strong>: Transitional holding before spawn.</li>
<li><strong>Primary / Secondary Points</strong>: Main lake to creek entry (primary); interior bends (secondary).</li>
<li><strong>Pendulum Fall</strong>: Controlled arc on semi‑slack line.</li>
</ul>
<h2>FAQ</h2>
<h3>What is the single best lure for beginners?</h3>
<p>A weightless 5" stick worm—slow shimmy, versatile, forgiving.</p>
<h3>How do I know if I’m fishing too fast?</h3>
<p>No bottom feel on bottom techniques or no deliberate pauses on jerk/topwater = slow down.</p>
<h3>Are bass line‑shy?</h3>
<p>In clear water, yes. Use longer fluorocarbon leaders (2–3 m) + natural colours.</p>
<h2>Final Thoughts</h2>
<p>Bass fishing rewards pattern recognition, patience, and iteration more than constant tackle swaps. Log conditions, refine confidence presentations, and expand only when you can explain why a pattern worked.</p>
<p><em>Generated with accessibility considerations; please still review headings, links, and contrast in the editor.</em></p>
HTML;

		// Check for existing post by slug.
		$existing = get_page_by_path($slug, OBJECT, 'post');

		$post_args = [
			'post_title'   => $post_title,
			'post_name'    => $slug,
			'post_content' => $content,
			'post_status'  => 'publish',
			'post_type'    => 'post',
		];

		if ($existing) {
			$post_args['ID'] = $existing->ID;
			$post_id         = wp_update_post($post_args, true);
		} else {
			$post_id = wp_insert_post($post_args, true);
		}

		if (is_wp_error($post_id)) {
			return; // Silent fail in prod; optionally log.
		}

		// Basic tags (ignore failures silently).
		if (taxonomy_exists('post_tag')) {
			wp_set_post_terms($post_id, ['bass', 'fishing', 'techniques'], 'post_tag', false);
		}

		update_option($option_key, 1, false);
	}
	add_action('init', 'lsx_demo_theme_seed_bass_post', 25);
}

if (! function_exists('lsx_demo_theme_redirect_old_bass_variants')) {
	function lsx_demo_theme_redirect_old_bass_variants(): void
	{
		if (is_admin()) {
			return;
		}
		$legacy_slugs = ['how-to-catch-smallmouth-yellowfish', 'how-to-catch-smallmouth-yellowfish-guide'];
		$request_path = trim(strtok($_SERVER['REQUEST_URI'] ?? '', '?'), '/');
		foreach ($legacy_slugs as $legacy) {
			if ($request_path === $legacy) {
				wp_safe_redirect(home_url('/how-to-catch-a-bass/'), 301);
				exit;
			}
		}
	}
	add_action('template_redirect', 'lsx_demo_theme_redirect_old_bass_variants');
}
