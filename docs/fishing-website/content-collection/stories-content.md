# **Stories Content Framework**

## *Brandons Fishing Adventures*

*Guidelines for structured, evergreen entries in the Stories CPT*

This framework ensures that each Story CPT entry is consistent, narrative-driven, AI-friendly, and optimized for WordPress template integration.

---

## **0\. Deliverables**

- [ ] Template for featured image, story summary, narrative body, gallery, and trip metadata

- [ ] Taxonomy for Fish species and Gear used

- [ ] AI prompt guidance for generating authentic, conversational entries

- [ ] Archive and single post template readiness

---

## **1\. Purpose**

* Preserve personal stories while maintaining structured metadata

* Support filtering by species, gear, or location

* Enable AI-assisted generation of new stories or expansions

* Ensure evergreen content that complements Fish and Gear CPTs

---

## **2\. Base Structure & Fields**

* **Title** – Story headline

* **Excerpt** – 25–50 word summary

* **Featured Image** – File, alt text, description

* **Trip Date / Season** – Optional: YYYY-MM-DD or seasonal note

* **Fish Species Involved** – Link to Fish CPT entries

* **Gear Used** – Link to Gear CPT entries

* **Location / Region** – River, dam, or waterbody

* **Story / Narrative Body** – 200–500 words

* **Gallery** – Optional supporting images

* **Videos** – Optional trip footage or highlights

* **Prompt Notes** – AI guidance for expanding or creating new stories

---

## **3\. Naming Convention**

* Images: story-\[title\].jpg

* Gallery Images: story-\[title\]-1.jpg, story-\[title\]-2.jpg

* Taxonomy Terms: Species, Gear, Region

* Slugs: lowercase, hyphenated → story-\[title\]

---

## **4\. Usage**

* **Excerpt** → Archives, teasers

* **Story Body** → Main content, personal narrative, instructional tips

* **Gallery / Video** → Visual reinforcement, highlights

* **Metadata** → Filterable by species, gear, region

---

## **5\. Responsive Rules**

* Featured image and gallery scale to all devices

* Text flows naturally with headings and highlights

* Video embeds are mobile-friendly

---

## **6\. Implementation**

* Map fields into WordPress CPT template (e.g., single-story.php)

* Use ACF or Gutenberg meta fields for structured content

* Alt text and ARIA labels for accessibility

* Taxonomy links for filtering and related species/gear

---

## **7\. Content Strategy for Stories**

Each story should include:

* Highlighted fish species and gear

* Descriptive narrative of catch, location, and experience

* Optional instructional tips

* Optional media to support storytelling

**Example Entries**

**“Morning Bass Run in Huttenspruit”**

* Featured image: story-huttenspruit-bass.jpg

* Trip Date: 2025-03-15

* Fish Species: Smallmouth Bass

* Gear Used: Spinning Rod 6’6” Medium Action, Live Bait Reel 4000

* Location: Huttenspruit River

* Story: “Early morning mist on the river as I cast my spinner into the current. Within minutes, a fierce Smallmouth Bass struck. The fight was exhilarating…”

* Gallery: story-huttenspruit-bass-1.jpg, story-huttenspruit-bass-2.jpg

* Videos: [https://example.com/huttenspruit-bass-trip](https://example.com/huttenspruit-bass-trip)

* Prompt Notes: “Generate a lively, narrative fishing story emphasizing species, gear, and experience, suitable for blog post format.”

**“Yellowfish Adventure on Tugela”**

* Featured image: story-tugela-yellowfish.jpg

* Trip Date: 2025-02-20

* Fish Species: Smallmouth Yellowfish, Largemouth Yellowfish

* Gear Used: Topwater Surface Popper, Live Bait Reel 4000

* Location: Tugela River

* Story: “The Tugela’s rapids roared as I approached the pool. Casting my popper, the water exploded as a Yellowfish attacked. It was a true adrenaline rush…”

---

## **8\. Fact Box Schema (Story Example)**

| Field | Example Placeholder | Notes |
| ----- | ----- | ----- |
| Trip Date | 2025-03-15 | Optional date or season note |
| Fish Species | Smallmouth Bass | Links to Fish CPT |
| Gear Used | Spinning Rod 6’6”, Reel 4000 | Links to Gear CPT |
| Location | Huttenspruit River | Optional additional notes |
| Weather / Conditions | Morning mist, calm | Optional |
| Media | story-huttenspruit-bass-1.jpg | Gallery or video |

---

## **9\. Example JSON Partial (Story Structure)**

| {  "post\_type": "story",  "title": "Morning Bass Run in Huttenspruit",  "excerpt": "Early morning on Huttenspruit River \- a thrilling encounter with a fierce Smallmouth Bass using topwater techniques.",  "featured\_image": {    "file": "story-huttenspruit-bass.jpg",    "alt": "Angler landing smallmouth bass",    "description": "Early morning mist, Smallmouth Bass fight"  },  "trip\_date": "2025-03-15",  "fish\_species": \["Smallmouth Bass"\],  "gear\_used": \["Spinning Rod 6'6" Medium Action", "Live Bait Reel 4000"\],  "location": "Huttenspruit River",  "story\_body": "Early morning mist on the river as I cast my spinner into the current. Within minutes, a fierce Smallmouth Bass struck. The fight was exhilarating...",  "gallery": \[    {"file": "story-huttenspruit-bass-1\.jpg", "alt": "Angler holding bass"},    {"file": "story-huttenspruit-bass-2\.jpg", "alt": "Bass underwater view"}  \],  "videos": \["https://example.com/huttenspruit-bass-trip"\],  "prompt\_notes": "Generate narrative-driven fishing stories emphasizing species, gear, and location."} |
| :---- |

---

## **10\. Why This Works**

* Repeatable, scalable structure for every story post

* AI-ready for generating engaging, authentic content

* Integrates with Fish and Gear CPTs for filtering and cross-linking

* Supports WordPress block templates and JSON import

* Ensures consistent, SEO-friendly, and accessible content

---

