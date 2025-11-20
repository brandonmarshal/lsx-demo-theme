#!/bin/bash

# Fishing CPT Plugin Packaging Script
# Prepares the plugin for testing on a fresh WordPress installation

echo "🐟 Fishing CPT Plugin - Packaging for Testing"
echo "=============================================="

# Check if we're in the right directory
if [ ! -f "fishing-cpt-plugin.php" ]; then
    echo "❌ Error: Not in plugin directory. Run from fishing-cpt-plugin/"
    exit 1
fi

# Build assets
echo "🔨 Building plugin assets..."
npm run build

if [ $? -ne 0 ]; then
    echo "❌ Build failed!"
    exit 1
fi

echo "✅ Build completed successfully"

# Create zip package
echo "📦 Creating plugin package..."
cd ..
zip -r fishing-cpt-plugin-test.zip fishing-cpt-plugin/ -x "*.git*" "*node_modules*" "*.DS_Store*" "*build.log*"

if [ $? -eq 0 ]; then
    echo "✅ Package created: fishing-cpt-plugin-test.zip"
    echo ""
    echo "🚀 Ready for testing!"
    echo ""
    echo "Next steps:"
    echo "1. Copy fishing-cpt-plugin-test.zip to your test WordPress site"
    echo "2. Install and activate Advanced Custom Fields (ACF)"
    echo "3. Upload and activate the Fishing CPT Plugin"
    echo "4. Check that Fish, Gear, and Areas appear in admin menu"
    echo ""
    echo "Use TESTING_CHECKLIST.md for detailed testing steps"
else
    echo "❌ Failed to create package"
    exit 1
fi