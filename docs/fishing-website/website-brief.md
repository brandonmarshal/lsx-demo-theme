# **Website Brief/Strategy**

## *Brandons Fishing Adventures*

---

## **0\. How to Use This Document**

This document is the **single source of truth** for Brandon’s Fishing Adventures website project. Use it to guide design, content, and technical development.

**Steps:**

1. Fill placeholders with real content/images where noted.

2. Review the structure and information architecture.

3. Confirm style guide, brand guide, and voice/tone.

4. Review content model, templates, and homepage layout.

5. Provide deliverables to developers/designers.

6. Approve each milestone before launch.

---

## **1\. Deliverables**

**Strategy Deliverables:**

- [ ] Completed website brief & questionnaire

- [ ] Sitemap diagram (tree/flowchart)

- [ ] Brand guide (values, colours, typography, mood)

- [ ] Voice & tone guide

- [ ] Logo pack \+ usage document

- [ ] Content model (CPTs: Fish, Gear, Stories)

- [ ] SEO/AEO/SGO checklist

- [ ] Content collection checklist

**Design Deliverables:**

- [ ] Style guide (colours, typography, spacing, responsive rules)

- [ ] Design assets: logo variants, imagery, icons

- [ ] Example layout patterns/templates

**Technical Deliverables:**

- [ ] Block theme repo (parent \+ child if needed)

- [ ] `theme.json` with design tokens

- [ ] Templates & template parts (header, footer, sidebar, comments)

- [ ] Patterns & reusable layouts

- [ ] Documentation: README, CONTRIBUTING, style guide, onboarding

**Content Deliverables:**

- [ ] Pages: Home, About, Contact, Blog, Fish Archive, Gear Archive, Stories Archive

- [ ] CPT entries: Fish (min 10), Gear (min 5), Stories (min 5\)

- [ ] Blog posts (min 10\)

- [ ] Example images, hero banners, CTA blocks

---

## **2\. Project Overview**

**Project Name:** Brandon’s Fishing Adventures  
**Goal:** Build a custom WordPress block theme to showcase fish species, gear, and fishing stories. The site highlights Huttenspruit & KZN rivers, using clean UX, accessible design, and SEO/AEO/SGO best practices.  
**Approach:** Full Site Editing (FSE), theme.json for global styles, semantic design tokens, performance-first.

---

## **3\. Objectives**

* Showcase fish species, fishing gear, and stories from Huttenspruit/KZN.

* Publish blog-style adventures, conservation tips, and gear guides.

* Introduce Brandon’s journey and personal story.

* Support discoverability via SEO, AEO, and SGO.

* Ensure mobile-first, performant, and accessible experience (WCAG 2.2 AA).

---

## **4\. Website Questionnaire**

* Main purpose: Showcase fish, gear, and fishing adventures.

* Primary audience: Fishing enthusiasts, beginner-to-advanced anglers, eco-tourists.

* Goals in first 6–12 months: 10+ CPT entries, 10+ blog posts, brand recognition online.

* Existing assets: Logos, brand colours, typography, imagery (placeholders can be used).

* Content types: Pages, CPTs (Fish, Gear, Stories), Blog Posts.

* Special functionality: Custom post types, hero sections, CTA blocks, gallery sections.

* SEO/marketing goals: Organic traffic via descriptive content, alt text, FAQ schema.

* Essential functionality: Contact form, newsletter signup, gallery lightbox.

* Site management: Brandon/administrator using WordPress FSE.

---

## **5\. Information Architecture**

**Pages & URLs:**

* Home `/`

* About `/about/`

* Fish Archive `/fish/`

* Fish Single `/fish/{species}/`

* Gear Archive `/gear/`

* Gear Single `/gear/{item}/`

* Stories Archive `/stories/`

* Stories Single `/stories/{title}/`

* Blog `/blog/`

* Blog Archives: Category, Tag, Author

* Contact `/contact/`

* 404, Search

**Taxonomies:**

* Fish CPT: Species (Yellowfish, Tilapia, Catfish, Tigerfish, Other River Fish)

* Gear CPT: Type (Rod, Reel, Bait, Lures, Accessories)

* Stories CPT: Tags (Adventure, Conservation, Seasonal)

* Blog: Categories (Adventures, Tips & Tricks, Conservation, Gear, Seasons), Tags (Huttenspruit, Fly Fishing, etc.)

---

## **6\. Style Guide (Design System)**

**Colours:**

* River Blue/Green: `#3A6B68` (Headings, accents)

* Olive Green: `#6B7C3A` (Buttons, hover states)

* Warm Grey/Sand: `#D9D3C7` (Backgrounds)

* Burnt Orange: `#C06028` (CTAs, highlights)

* White: `#FFFFFF` (Text backgrounds, clarity)

**Typography:**

* Headings: Playfair Display / Montserrat (bold, adventurous)

* Body: Inter / Lora (readable, warm)

* Notes / Accents: Open Sans (light, clean)

* Type Scale (rem): H1 3.0, H2 2.25, H3 1.75, Body 1.0, Small 0.875

* Line-height: 1.4–1.6; Paragraph spacing: 0.5–1em

**Spacing:**

* Base unit: 4px → 96px

* Slugged as spacing-10 → spacing-100

**Imagery:**

* Realistic fish photography, river landscapes, Brandon portraits

* Hero banners: full-width landscape images

* Icons: Simple line icons (fish, hooks, maps, pins)

**Layout:**

* Clean grids, neutral backdrops, rounded card corners

* Consistent white space for readability

---

## **7\. Brand Guide**

**Personality:** Adventurous, friendly, human, authentic, warm  
 **Mood:** Outdoor, riverbank, natural, approachable  
 **Tagline:** “Stories from the river, catches for a lifetime.”  
 **Logo Usage:**

* Primary: Wordmark \+ fish illustration \+ tagline

* Secondary: Wordmark \+ fish illustration (no tagline)

* Icon: Fish illustration only (favicon/social)

* Clear space \= height of “B” in Brandon’s

---

## **8\. Voice & Tone Guide**

**Voice:** Friendly, personal, human, warm  
 **Tone by Page:**

* Homepage: Energetic, passionate

* About: Personal storytelling, reflective

* Fish: Informative, visual, guide-like

* Gear: Instructional, concise

* Stories/Blog: Conversational, story-driven

* Contact: Simple, approachable

**Writing Rules:**

* Headlines: Value \+ verb, no filler

* Body: Short, plain sentences (8–18 words)

* Oxford comma: Yes, Contractions: OK

* UK spelling

**Microcopy Examples:**

* Forms: “Enter your email”, “Send your message”

* Validation: “Email is missing ‘@’. Add it to continue.”

* Success: “Thanks\! Brandon will get back to you soon.”

---

## **9\. Logo Brief**

* Variants: Light/dark, with/without tagline, favicon

* File types: SVG, PNG transparent

* Minimum size & clear space defined

* Works across print, web, and social

---

## **10\. Templates & Template Parts**

**Templates:**

* index.html, archive.html, singular.html

* page.html, page-no-title.html, page-with-sidebar.html

* author.html, category.html, tag.html, 404.html, search.html

**Template Parts:**

* header.html, footer.html, sidebar.html, comments.html

**Example Patterns:**

* Hero Section: Full-width river banner \+ headline \+ CTA

* Featured Fish/Gear/Story Cards: Image \+ Title \+ short description \+ CTA

* CTA Banner: Highlighted section linking to Fish/Gear/Stories archive

* Sidebar: Recent posts, categories, featured fish/gear/story

---

## **11\. Content Model**

**Fish CPT:**

* Featured Image

* Description

* Habitat

* Season

* Size

* Bait/Lure

* Conservation

* Brandon’s Notes

* Gallery

**Gear CPT (simplified):**

* Featured Image

* Type

* Description

* Best For (fish/conditions)

* Notes

**Stories CPT (simplified):**

* Title

* Featured Image

* Story content (2–3 images, headings)

* Tags

**Blog Posts:**

* Title, Featured Image, 2–3 content images, structured headings

**Pages:**

* Hero, media sections, CTAs, galleries

---

## **12\. Homepage Layout**

1. Hero: Landscape river image, headline, CTA (“Explore the Fish of Huttenspruit”)

2. Intro: Brandon’s fishing story

3. Featured Fish/Gear/Story: 3 cards each

4. Recent Blog Posts: 3–4 posts

5. About Preview: Brandon’s portrait \+ teaser

6. CTA Banner: “Learn about fish species in KZN” → /fish/

7. Contact Teaser: Link to Contact page

---

## **13\. Calls-to-Action**

* Primary: “Discover the Fish of KZN” → /fish/

* Secondary: “Read Brandon’s Stories” → /blog/

* Consistent placement in sidebar, hero banners, and footer

---

## **14\. Content Checklist**

* Logos: All variants (light/dark, tagline/no tagline)

* 10+ Fish CPT entries

* 5+ Gear CPT entries

* 5+ Stories CPT entries

* 10+ Blog posts

* Homepage hero image

* About page portraits/gallery

* Contact page media (portrait \+ scenic background/map)

---

## **15\. Technical Implementation**

* Parent Theme: Ollie or similar modern block starter

* theme.json: Colours, typography, spacing, block settings

* Patterns: Hero, CTA, Section layouts

* Post Formats: Audio, Video for Stories

* Assets Folder: `/assets/css`, `/assets/js`, `/assets/images`

* functions.php: Custom scripts, hooks, template registration

* Accessibility: WCAG 2.2 AA, Lighthouse tests, WP a11y tools

* Performance: Core Web Vitals, image compression, lazy-load

---

## **16\. Development Workflow**

* Local Dev: WordPress Studio \+ VS Code \+ GitHub Desktop

* Version Control: GitHub repo, issues, branches, CONTRIBUTING.md, CODE\_OF\_CONDUCT.md

* Testing: WP Theme Unit Test Data, Gutenberg Test Data

* CI/CD: Linting, PHPCS, PHPUnit

* Staging: All-in-One WP Migration plugin

---

## **17\. SEO, AEO & SGO**

**SEO:**

* Optimised slugs: `/fish/{species}/`, `/gear/{item}/`, `/stories/{title}/`

* H1 per page, descriptive titles/meta (55–60 chars / 150–160 chars)

* Alt text for all images

* Internal linking: Blog ↔ Fish/Gear/Stories

**AEO:** FAQ schema per page

**SGO:** Conversational, entity-rich copy

---

## **18\. FAQs (Per Page)**

* **Home:** Who is Brandon? Where is this project based?

* **About:** Why does Huttenspruit matter? How long has Brandon been fishing?

* **Fish Archive:** What entries are included? Most popular/rare species?

* **Single Fish:** How big do they get? Best season to catch?

* **Gear Archive:** What type of gear is recommended for each fish?

* **Stories Archive:** Adventure story examples? How often are they posted?

* **Contact:** How to get in touch? Does Brandon offer guided trips?

---

