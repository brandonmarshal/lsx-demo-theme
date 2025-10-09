# **Website Structure**

## *Brandon’s Fishing Adventures*

**Purpose:** Consolidated website structure for Brandon’s Fishing Adventures, aligned with block theme, AI prompts, and FSE usage. This document provides **template layouts, archive descriptions, sidebar contents, and CTA guidance** for AI-driven content creation.

---

## **0\. Deliverables**

**Design Assets:**

- [ ] Logo pack (light, dark, with/without tagline)

- [ ] Colour palette, typography, spacing sheets

**Content:**

- [ ] Pages: Home, About, Contact, 404, Search

- [ ] CPT entries: Fish, Gear, Stories

- [ ] Blog posts, taxonomy entries

**Technical:**

- [ ] Block theme repo

- [ ] `theme.json` design tokens

- [ ] Templates & template parts

- [ ] Patterns & reusable layouts

**Documentation:**

- [ ] README, CONTRIBUTING.md, style guide, AI prompt guidelines

---

## **1\. Project Overview**

**Project Name:** Brandon’s Fishing Adventures

**Objective:** Showcase fish species, fishing gear, and stories in KwaZulu-Natal rivers via a block theme WordPress site. Focus on discoverability, performance, accessibility, and AI-ready content workflows.

**Approach:** Full Site Editing (FSE), semantic design tokens, lightweight, responsive, SEO-optimised.

---

## **2\. Objectives & Goals**

* Present structured fish species guides (Fish CPT)

* Share gear recommendations and usage tips (Gear CPT)

* Publish fishing stories (Stories CPT) in a narrative style

* Support discoverability via SEO, AEO, SGO

* Enable easy AI-driven content generation and template-based editing

* Ensure mobile-first, performance-optimized, accessible design

---

## **3\. Design System**

* **Colours:** Neutral river rocks, olive vegetation, blue-green water, burnt orange sunset accents

* **Typography:** Playfair Display (headings) \+ Inter (body/UI)

* **Spacing:** 4px → 96px (spacing-10 → spacing-100)

* **Imagery:** Fish species, river landscapes, Brandon’s portraits, gear images

* **Logos:** Light & dark variants, with/without tagline

---

## **4\. Information Architecture (Core Pages)**

| Page | Purpose | Layout / Notes | Sidebar | CTA Guidance |
| ----- | ----- | ----- | ----- | ----- |
| **Home (/)** | Overview & entry point | Hero image, intro, featured Fish, featured Stories, featured Gear, CTA banners | Optional: Recent posts, featured Fish/Stories | Links to Fish archive, Stories archive, Gear archive |
| **About (/about/)** | Brandon’s story | Portraits, story blocks, gallery | Optional: Related posts | CTA: “Explore the Fish of KZN” |
| **Fish Archive (/fish/)** | Field guide index | Grid/list of species cards (image \+ name \+ teaser), filters | Sidebar: Habitat filter, recent posts, CTA blocks | CTA: Single Fish pages \+ related Stories & Gear |
| **Species Taxonomy Archive (/species/{species-name}/)** | Species family grouping | Taxonomy title \+ intro, grid of child species | Sidebar: Habitat filter, recent posts | CTA: Single Fish pages \+ related Stories & Gear |
| **Single Fish (/fish/{slug}/)** | Fish profile | Featured image header, fact box (Habitat, Season, Size, Bait), description, Brandon’s notes, optional gallery, Related Fish links | Sidebar: Habitat taxonomy links, related Stories, featured Gear | CTA: Related Fish, Stories, Gear |
| **Gear Archive (/gear/)** | Gear index | Grid/list of gear cards (image \+ name \+ short description), categories (bait, rods, reels) | Sidebar: Recent posts, featured Fish/Stories | CTA: Single Gear page \+ related Fish & Stories |
| **Single Gear (/gear/{slug}/)** | Gear profile | Featured image, description, usage tips, species suitability, optional gallery | Sidebar: Related Fish, related Stories | CTA: Related Fish & Stories |
| **Stories Archive (/blog/)** | Story hub | Chronological list/grid, featured story top | Sidebar: Categories, tags, recent posts, featured Fish | CTA: Related Fish & Gear |
| **Category Archive (/category/{slug}/)** | Topic cluster | Category title \+ description, posts chronological | Sidebar: Categories, recent posts | CTA: Related Fish & Gear |
| **Tag Archive (/tag/{slug}/)** | Micro-topic grouping | Tag title, simple list/grid | Sidebar: Tags, recent posts | CTA: Related Fish & Gear |
| **Author Archive (/author/{username}/)** | Shows posts by author | Author bio/photo, chronological list | Sidebar: Recent posts, categories | CTA: Related Fish & Gear |
| **Single Blog Post (/blog/{slug}/)** | Story entry | Featured image, post body, storytelling style, related Fish/Gear links | Sidebar: Related Fish, Gear, recent posts | CTA: Related Fish & Gear |
| **Contact (/contact/)** | Contact page | Form, Brandon’s photo, optional map | N/A | CTA: Newsletter / contact form |
| **404 (/404/)** | Page not found | Friendly error message, suggested links | Sidebar: Popular posts | CTA: Links to homepage & archives |
| **Search (/search/)** | Search results | Results grid/list | Sidebar: Filters (Fish species, Gear, Stories) | CTA: Suggest relevant Fish, Gear, Stories |

---

## **5\. Templates & Template Parts**

**Templates:**

* `index.html`, `archive.html`, `singular.html`, `page.html`

* `category.html`, `tag.html`, `author.html`, `404.html`, `search.html`

* `archive-fish.html`, `single-fish.html`, `archive-gear.html`, `single-gear.html`, `archive-stories.html`, `single-stories.html`

**Template Parts:**

* Header, Footer, Sidebar, Comments

* Sidebar usage: all archives & single posts/pages except Home/About/Contact (optional for Home)

**Patterns:**

* Hero section, Fact box, CTA banners, Grid cards, Details panels, Related content loops

---

## **6\. Content Model (CPTs)**

### **Fish CPT**

* Fields: Featured Image, Description, Quick Facts, Habitat (taxonomy), Fishing Season, Average Size, Preferred Bait, Conservation Status, Fun Fact, Personal Story, Related Fish

* Templates: `single-fish.html`, `archive-fish.html`

### **Gear CPT**

* Fields: Featured Image, Name, Description, Usage Tips, Fish suitability (taxonomy), Gallery, Related Gear, Related Stories

* Templates: `single-gear.html`, `archive-gear.html`

### **Stories CPT (Blog)**

* Fields: Title, Featured Image, Body, Structured Headings, Related Fish, Related Gear, Suggested Posts

* Templates: `single-stories.html`, `archive-stories.html`

---

## **7\. Homepage Layout**

* **Hero Section:** Featured river/fishing image \+ headline \+ primary CTA

* **Intro Section:** Brandon’s story teaser

* **Featured CPTs:** Fish, Gear, Stories — 3–4 items each

* **CTA Banner:** “Explore the Fish of KZN” → /fish/, “Discover Gear” → /gear/, “Read Stories” → /blog/

* **About Preview:** Brandon portrait \+ teaser

* **Contact Teaser:** Map \+ contact link

---

## **8\. Calls-to-Action**

* **Primary:** Explore CPT entries (Fish, Gear, Stories)

* **Secondary:** Read related content (Fish ↔ Stories, Gear ↔ Stories)

* **Sidebar CTAs:** Highlight featured Fish, Gear, or Stories

---

## **9\. Content Checklist**

* Logos (light/dark, with/without tagline)

* Hero/banner images

* Fish CPT entries (≥10)

* Gear CPT entries (≥10, placeholders allowed)

* Stories CPT posts (≥10, placeholders allowed)

* Homepage featured items

* Contact page media

---

## **10\. Technical Implementation**

* Parent theme: Modern block starter (Ollie or similar)

* `theme.json`: Colours, typography, spacing, block settings

* Patterns: Hero, CTA, Section layouts

* Assets: `/assets/css`, `/assets/js`, `/assets/images`

* Functions.php: Enqueue scripts, register template parts

* Accessibility: WCAG AA+, semantic HTML, alt text for images

* Performance: Core Web Vitals, lazy loading

---

## **11\. Workflow**

* Local Dev: WordPress Studio \+ VS Code \+ GitHub Desktop

* Version Control: GitHub repo with issues, branches, CONTRIBUTING.md

* Testing: WP Theme Unit Test, Gutenberg Test Data

* CI/CD: Linting, PHPCS, PHPUnit

* Staging & Deployment: All-in-One WP Migration plugin, optional staging URL

---

## **12\. SEO, AEO & SGO**

* SEO: Optimised slugs, Yoast, meta titles/descriptions, H1 per page

* AEO: FAQ schema where relevant

* SGO: Conversational, entity-rich copy, cross-link CPTs

---

## **13\. FAQs (Per Page)**

| Page | Sample Questions |
| ----- | ----- |
| Home | Who is Brandon? What is this site about? |
| About | Why fishing in KwaZulu-Natal? How long has Brandon fished? |
| Fish Archive | Which species are listed? How are they categorized? |
| Single Fish | Best season to fish? Typical size? Conservation status? |
| Gear Archive | Which gear types are recommended? For which fish? |
| Single Gear | How to use this gear? Tips/tricks? |
| Stories Archive | How often is content updated? Can readers submit stories? |
| Single Story | Which fish/gear are featured? Related posts? |
| Contact | How to get in touch? Can I book a guided trip? |
| 404 | Where should I go next? Popular links? |
| Search | How to filter results? Which CPTs are included? |

---

✅ **Notes for AI Prompting:**

* Use template structure to generate content dynamically

* CTAs should link related CPTs where appropriate

* Sidebars always include filters, categories, tags, recent posts

* Maintain style consistency (colours, fonts, spacing)

* Fish → Species taxonomy → Habitat as secondary filter

---

