const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
    ...defaultConfig,
    entry: {
        'blocks/fish-card/index': './blocks/fish-card/index.js',
        'blocks/gear-card/index': './blocks/gear-card/index.js',
        'blocks/area-card/index': './blocks/area-card/index.js',
        'blocks/repeatable-facts/index': './blocks/repeatable-facts/index.js',
    },
};
