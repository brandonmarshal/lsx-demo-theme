# Week 40, Day 3 Log 2026-06-17

## Today's Progress

### What have you accomplished today?

---

**GPT Agents — Skills Investigation**

-   Reviewed and read the Google Doc and GPT chats provided for context on the investigation
-   Continued investigating why agents fail when invoking skills despite skills working correctly in normal chat
-   Established key facts:
    -   Skill is visible and works in a normal chat on the Team account
    -   Agent fails specifically when invoking the skill
    -   Admin account shows skill as "Installed for everyone at LightSpeed"; Team account shows the same skill as "Invite Only"
    -   Changing sharing settings on the Admin account does not reflect on the Team account
    -   Admin account intermittently fails to load the skill file (`SKILL.md`)
-   Identified the core unresolved question: why does the Team account see different sharing metadata for the same skill than the Admin account
-   Agreed on next test: build a one-skill Test Agent to isolate whether the issue is agent-level, skill-level, workspace sync, or a platform bug

---

**GPT Agents — Testing & Rollout Review**

-   Explored testing the Linear Agent starter prompts and began putting together a structured testing criteria framework covering 12 starter prompts
-   After further review, identified that the correct starting point for agent testing is the rollout file in the GPT agent directory — this defines the proper testing process and criteria that should be followed
-   Reviewed the rollout file to understand the correct testing approach before proceeding with any further testing
-   Setup the google sheets testing handbook for the Zendesk agent testing
-   Started testing the starter prompts and reporting feedback to the testing handbook
-   Catchup meeting with Ash. 

---

## Time Logs

-   3.0 hrs - Reviewing the Google Docs shared with me and troubleshooting GPT Agents.
-   2.40 hrs - Created testing criteria and test 2 starter prompts, then I got corrected in what I am supposed to do and started reviewing the rollout file for instructions.
-   3.0 hrs - Properly reviewed the rollout instructions and setup the testing handbook to do my testing. I then started testing the starter prompts

---

## Notes

-   App connections have not been tested yet and cannot be tested at this stage. Skills must be called before apps — if the skills are failing, the agent never reaches the point of calling the apps. The skills issue must be resolved first before app connection testing is possible.
-   The core permissions inconsistency: on the Admin account, the skill permissions are set to "Everyone at LightSpeed", but when logged into the LightSpeed Team account, the same skill shows permissions as "Invite Only". This mismatch is the primary blocker and the focus of the investigation going forward.
