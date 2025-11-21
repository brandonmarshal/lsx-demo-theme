const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
    ...defaultConfig,
    entry: {
        'blocks/fish-card/index': './blocks/fish-card/index.js',
        'blocks/gear-card/index': './blocks/gear-card/index.js',
        'blocks/area-card/index': './blocks/area-card/index.js',
        'blocks/repeatable-facts/index': './blocks/repeatable-facts/index.js',
        'blocks/fish-facts/index': './blocks/fish-facts/index.js',
        'blocks/gear-specs/index': './blocks/gear-specs/index.js',
        'blocks/fishing-gallery/index': './blocks/fishing-gallery/index.js',
        'single-fish': './src/scss/single-fish.scss',
    },
    plugins: [
        ...defaultConfig.plugins,
        new CopyPlugin({
            patterns: [
                // Copy block.json and render.php files to build directories
                {
                    from: 'blocks/*/block.json',
                    to: '[path][name][ext]',
                    context: '.',
                },
                {
                    from: 'blocks/*/render.php',
                    to: '[path][name][ext]',
                    context: '.',
                },
            ],
        }),
    ],
};
