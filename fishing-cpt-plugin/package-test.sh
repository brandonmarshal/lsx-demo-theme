#!/bin/bash

# Package and Test Multi-Block Plugin
# Creates a distribution ZIP and validates its contents

echo "=========================================="
echo "Fishing CPT Plugin - Package & Test"
echo "Multi-Block Plugin Distribution"
echo "=========================================="
echo ""

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

# Get plugin directory
PLUGIN_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PLUGIN_NAME="fishing-cpt-plugin"

# Get version from main plugin file
VERSION=$(grep "Version:" "$PLUGIN_DIR/fishing-cpt-plugin.php" | head -1 | cut -d: -f2 | tr -d ' ')
echo "Plugin Version: $VERSION"
echo ""

# Step 1: Check dependencies
echo "Step 1: Checking Dependencies"
echo "------------------------------"
if ! command -v npm &> /dev/null; then
    echo -e "${RED}Error: npm is not installed${NC}"
    exit 1
fi
echo -e "${GREEN}✓${NC} npm is available"

if ! command -v zip &> /dev/null; then
    echo -e "${RED}Error: zip command is not available${NC}"
    exit 1
fi
echo -e "${GREEN}✓${NC} zip command is available"

if ! command -v rsync &> /dev/null; then
    echo -e "${RED}Error: rsync is not installed${NC}"
    echo "Please install rsync to use this script"
    exit 1
fi
echo -e "${GREEN}✓${NC} rsync is available"
echo ""

# Step 2: Install npm dependencies
echo "Step 2: Installing NPM Dependencies"
echo "------------------------------"
if [ ! -d "$PLUGIN_DIR/node_modules" ]; then
    echo "Installing npm packages..."
    cd "$PLUGIN_DIR"
    npm install --quiet
    if [ $? -ne 0 ]; then
        echo -e "${RED}Error: npm install failed${NC}"
        exit 1
    fi
    echo -e "${GREEN}✓${NC} NPM packages installed"
else
    echo -e "${GREEN}✓${NC} NPM packages already installed"
fi
echo ""

# Step 3: Build assets
echo "Step 3: Building Assets"
echo "------------------------------"
cd "$PLUGIN_DIR"
echo "Running: npm run build"
npm run build > /dev/null 2>&1
if [ $? -ne 0 ]; then
    echo -e "${RED}Error: Build failed${NC}"
    exit 1
fi
echo -e "${GREEN}✓${NC} Build completed successfully"
echo ""

# Step 4: Verify build output
echo "Step 4: Verifying Build Output"
echo "------------------------------"
BLOCKS=("fish-card" "gear-card" "area-card" "fish-facts" "gear-specs" "repeatable-facts")
BUILD_OK=true
for block in "${BLOCKS[@]}"; do
    if [ ! -d "$PLUGIN_DIR/build/blocks/$block" ]; then
        echo -e "${RED}✗${NC} Missing: build/blocks/$block"
        BUILD_OK=false
    elif [ ! -f "$PLUGIN_DIR/build/blocks/$block/index.js" ]; then
        echo -e "${RED}✗${NC} Missing: build/blocks/$block/index.js"
        BUILD_OK=false
    else
        echo -e "${GREEN}✓${NC} Block built: $block"
    fi
done

if [ "$BUILD_OK" = false ]; then
    echo -e "${RED}Error: Build verification failed${NC}"
    exit 1
fi
echo ""

# Step 5: Create package
echo "Step 5: Creating Distribution Package"
echo "------------------------------"
cd "$PLUGIN_DIR/.."
ZIP_NAME="${PLUGIN_NAME}-v${VERSION}.zip"
ZIP_PATH="$PLUGIN_DIR/../$ZIP_NAME"

# Remove old zip if exists
if [ -f "$ZIP_PATH" ]; then
    rm "$ZIP_PATH"
    echo "Removed existing ZIP file"
fi

echo "Creating: $ZIP_NAME"

# Create zip using .distignore
if [ -f "$PLUGIN_DIR/.distignore" ]; then
    echo "Using .distignore exclusions..."
    
    # Create temporary directory for clean copy
    TEMP_DIR=$(mktemp -d)
    TEMP_PLUGIN="$TEMP_DIR/$PLUGIN_NAME"
    
    echo "Creating clean copy for packaging..."
    mkdir -p "$TEMP_PLUGIN"
    
    # Use rsync to copy files, excluding patterns from .distignore
    rsync -a \
        --exclude-from="$PLUGIN_DIR/.distignore" \
        "$PLUGIN_DIR/" \
        "$TEMP_PLUGIN/"
    
    # Create the zip from temp directory
    cd "$TEMP_DIR"
    zip -r -q "$ZIP_PATH" "$PLUGIN_NAME"
    
    # Cleanup
    cd "$PLUGIN_DIR/.."
    rm -rf "$TEMP_DIR"
else
    # Fallback to manual exclusions
    echo "No .distignore found, using manual exclusions..."
    zip -r -q "$ZIP_PATH" "$PLUGIN_NAME" \
        -x "*/node_modules/*" \
        -x "*/package-lock.json" \
        -x "*/webpack.config.js" \
        -x "*/.git/*" \
        -x "*/.github/*" \
        -x "*/tests/*" \
        -x "*/*.log"
fi

if [ $? -eq 0 ] && [ -f "$ZIP_PATH" ]; then
    ZIP_SIZE=$(du -h "$ZIP_PATH" | cut -f1)
    echo -e "${GREEN}✓${NC} Package created: $ZIP_NAME ($ZIP_SIZE)"
else
    echo -e "${RED}Error: Failed to create ZIP package${NC}"
    exit 1
fi
echo ""

# Step 6: Verify package contents
echo "Step 6: Verifying Package Contents"
echo "------------------------------"

# List contents
TEMP_LIST=$(mktemp)
unzip -l "$ZIP_PATH" > "$TEMP_LIST"

# Check for required files
echo "Checking required files..."

# Core plugin files
REQUIRED_FILES=(
    "fishing-cpt-plugin.php"
    "uninstall.php"
    "README.md"
    "CHANGELOG.md"
    "includes/blocks.php"
)

# Add all block files dynamically
BLOCKS=(
    "fish-card"
    "gear-card"
    "area-card"
    "fish-facts"
    "gear-specs"
    "repeatable-facts"
)

for block in "${BLOCKS[@]}"; do
    REQUIRED_FILES+=(
        "build/blocks/$block/index.js"
        "build/blocks/$block/block.json"
        "build/blocks/$block/index.asset.php"
        "build/blocks/$block/render.php"
        "build/blocks/$block/style-index.css"
        "build/blocks/$block/index.css"
    )
done

VERIFY_OK=true
for file in "${REQUIRED_FILES[@]}"; do
    if grep -q "$PLUGIN_NAME/$file" "$TEMP_LIST"; then
        echo -e "${GREEN}✓${NC} Included: $file"
    else
        echo -e "${RED}✗${NC} Missing: $file"
        VERIFY_OK=false
    fi
done

echo ""
echo "Checking excluded files..."
EXCLUDED_FILES=(
    "node_modules"
    "package-lock.json"
    "webpack.config.js"
    ".git"
)

for file in "${EXCLUDED_FILES[@]}"; do
    if grep -q "$file" "$TEMP_LIST"; then
        echo -e "${RED}✗${NC} Incorrectly included: $file"
        VERIFY_OK=false
    else
        echo -e "${GREEN}✓${NC} Correctly excluded: $file"
    fi
done

rm "$TEMP_LIST"

if [ "$VERIFY_OK" = false ]; then
    echo ""
    echo -e "${RED}Error: Package verification failed${NC}"
    exit 1
fi
echo ""

# Step 7: Summary
echo "=========================================="
echo "Package Summary"
echo "=========================================="
echo ""
echo -e "Package Name:    ${GREEN}$ZIP_NAME${NC}"
echo -e "Package Size:    ${GREEN}$ZIP_SIZE${NC}"
echo -e "Package Path:    ${GREEN}$ZIP_PATH${NC}"
echo ""
echo -e "Plugin Version:  ${GREEN}$VERSION${NC}"
echo -e "Blocks Included: ${GREEN}6${NC}"
echo ""
echo "Contents:"
unzip -l "$ZIP_PATH" | tail -n 1
echo ""
echo -e "${GREEN}✓ Package ready for distribution${NC}"
echo ""
echo "Installation Instructions:"
echo "1. Upload ZIP via WordPress Admin > Plugins > Add New > Upload"
echo "2. Click 'Install Now' then 'Activate Plugin'"
echo "3. Configure settings at Fish > Settings"
echo ""
echo "Testing Instructions:"
echo "1. Install on a fresh WordPress site"
echo "2. Activate the plugin"
echo "3. Check that all 6 blocks appear in the block inserter"
echo "4. Test each block in the appropriate post type context"
echo ""

exit 0
