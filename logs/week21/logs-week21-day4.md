# Week 21, Day 4 Log 2026-02-05

## Today's Progress

### What have you accomplished today?

-   Testing my extraction and governor agents.
-   Editing my extractor agent instructions.
-   Quick catchup with Ash
-   Catchup with Zared
-   Tested the first extraction of colour tokens, got a few inconsistencies.
-   Refined my AI agent prompt further. 

## Time Logs

-   2.0 hrs – Working with my AI agents, extracted primitive colours and ran governor on the result, got errors and adjusting the extractor now to avoid those errors.
-   1.5 hrs - Catchup with Zared and testing/adjusting my extraction agent.
-   1.0 hrs - Working on my AI agent. Researching and refining the instructions for good colour extraction for theme.json

---

## Notes

-   I am feeling better and better about this Agent I am building, it did a good extraction for its first run, but Governor found problems, multiple actually, which is exactly what it should do. Now with those problems I can identify what is causing them and if its in my variables I can fix it, but if its the Extractor agent getting confused then I can edit the instructions.
-   I had some issues with GPT 5.2, I feel like it does not listen to instructions at all, I struggled for a while and then switched to 5.1 and it worked instantly, so I will be aware of this going forward.
-   Zared shared some really useful agent skills with me that I can look into for proper pattern extraction.
-   My extraction agent gets confused when looking at the Primitives - Colours, it want to look for Tokens but does not realise I am doing Primitives first then Tokens, so I updated the prompt to include this understanding. 
