# Dependency Map

```text
Evidence baseline
  -> PRD approval
    -> IA/content approval
      -> Redirect and schema planning
    -> Token map approval
      -> Theme foundation
        -> Templates and patterns
          -> Content population
            -> Figma parity QA
    -> Plugin audit
      -> Plugin changes/regression QA
    -> Measurement plan
      -> GTM/GA4 implementation QA
  -> Launch QA plan approval
    -> Final QA
      -> Go/no-go
        -> Launch
          -> Post-launch monitoring
```

## Critical dependencies

| Depends on | Needed before | Reason |
|---|---|---|
| Figma Make/source screenshots | Figma parity implementation | Missing visual evidence can cause rework. |
| IA approval | Redirect map and template planning | URLs and page families drive scope. |
| Token map approval | Theme implementation | Prevents hard-coded design drift. |
| Claim register | Final copy | Avoids unsupported marketing claims. |
| Dev site access | Launch QA | Browser checks require environment access. |
| Plugin audit | Template integration | Templates may depend on filters, style switching, carousel or SCF data. |
