# Tech Context

## Repositories

- `lightspeedwp/ls-theme` - WordPress block theme.
- `lightspeedwp/ls-plugin` - LightSpeed site plugin.

## Theme tooling

- PHP 8.1+
- WordPress 6.4+
- Node.js 20+
- Composer 2.x
- Sass build for authored effects CSS
- theme.json schema validation

## Plugin tooling

- PHP 8.0+
- WordPress 6.4+
- Node.js 20+
- Composer
- `@wordpress/scripts`
- block.json-based custom block registration

## Quality commands

Theme:
- `npm run schema:validate`
- `npm run theme:validate`
- `npm run patterns:escape`
- `npm run security:scan`
- `composer run phpcs`

Plugin:
- `npm run plugin:validate`
- `npm run schema:validate`
- `npm run security:scan`
- `npm run lint`
- `composer run phpcs`
