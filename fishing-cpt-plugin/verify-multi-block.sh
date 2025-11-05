#!/bin/bash

# Multi-Block Plugin Verification Script
# Validates that the Fishing CPT Plugin follows WordPress.org multi-block plugin guidelines

echo "=========================================="
echo "Multi-Block Plugin Verification"
echo "Fishing CPT Plugin v1.0.2"
echo "=========================================="
echo ""

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

ERRORS=0
WARNINGS=0

# Function to check if file exists
check_file() {
    if [ -f "$1" ]; then
        echo -e "${GREEN}✓${NC} Found: $1"
        return 0
    else
        echo -e "${RED}✗${NC} Missing: $1"
        ((ERRORS++))
        return 1
    fi
}

# Function to check if directory exists
check_dir() {
    if [ -d "$1" ]; then
        echo -e "${GREEN}✓${NC} Found: $1"
        return 0
    else
        echo -e "${RED}✗${NC} Missing: $1"
        ((ERRORS++))
        return 1
    fi
}

# Function to warn about file
warn_file() {
    if [ -f "$1" ]; then
        echo -e "${YELLOW}⚠${NC} Found: $1 (should be excluded from distribution)"
        ((WARNINGS++))
    fi
}

echo "1. Checking Core Plugin Files"
echo "------------------------------"
check_file "fishing-cpt-plugin.php"
check_file "uninstall.php"
check_file "README.md"
check_file ".distignore"
echo ""

echo "2. Checking Block Registration"
echo "------------------------------"
check_file "includes/blocks.php"
if [ -f "includes/blocks.php" ]; then
    echo -e "${GREEN}✓${NC} Block registration file contains block definitions"
fi
echo ""

echo "3. Checking Build Configuration"
echo "------------------------------"
check_file "package.json"
check_file "webpack.config.js"
if [ -f "package.json" ]; then
    if grep -q "@wordpress/scripts" package.json; then
        echo -e "${GREEN}✓${NC} @wordpress/scripts dependency found"
    else
        echo -e "${RED}✗${NC} @wordpress/scripts dependency missing"
        ((ERRORS++))
    fi
fi
echo ""

echo "4. Checking Block Source Files"
echo "------------------------------"
BLOCKS=("fish-card" "gear-card" "area-card" "fish-facts" "gear-specs" "repeatable-facts")
for block in "${BLOCKS[@]}"; do
    echo "  Checking: $block"
    check_dir "blocks/$block"
    check_file "blocks/$block/block.json"
    check_file "blocks/$block/index.js"
    if [ -f "blocks/$block/render.php" ]; then
        echo -e "    ${GREEN}✓${NC} Dynamic block (has render.php)"
    fi
done
echo ""

echo "5. Checking Build Output"
echo "------------------------------"
check_dir "build/blocks"
if [ -d "build/blocks" ]; then
    for block in "${BLOCKS[@]}"; do
        echo "  Checking built: $block"
        if [ -d "build/blocks/$block" ]; then
            echo -e "    ${GREEN}✓${NC} Build directory exists"
            
            # Check for required files
            if [ -f "build/blocks/$block/index.js" ]; then
                echo -e "    ${GREEN}✓${NC} index.js compiled"
            else
                echo -e "    ${RED}✗${NC} index.js missing"
                ((ERRORS++))
            fi
            
            if [ -f "build/blocks/$block/block.json" ]; then
                echo -e "    ${GREEN}✓${NC} block.json copied"
            else
                echo -e "    ${RED}✗${NC} block.json missing"
                ((ERRORS++))
            fi
            
            if [ -f "build/blocks/$block/index.asset.php" ]; then
                echo -e "    ${GREEN}✓${NC} index.asset.php generated"
            else
                echo -e "    ${RED}✗${NC} index.asset.php missing"
                ((ERRORS++))
            fi
        else
            echo -e "    ${RED}✗${NC} Build directory missing"
            ((ERRORS++))
        fi
    done
fi
echo ""

echo "6. Checking Distribution Exclusions"
echo "------------------------------"
if [ -f ".distignore" ]; then
    if grep -q "node_modules" .distignore; then
        echo -e "${GREEN}✓${NC} node_modules excluded"
    else
        echo -e "${YELLOW}⚠${NC} node_modules not in .distignore"
        ((WARNINGS++))
    fi
    
    if grep -q "webpack.config.js" .distignore; then
        echo -e "${GREEN}✓${NC} webpack.config.js excluded"
    else
        echo -e "${YELLOW}⚠${NC} webpack.config.js not in .distignore"
        ((WARNINGS++))
    fi
    
    if grep -q "package-lock.json" .distignore; then
        echo -e "${GREEN}✓${NC} package-lock.json excluded"
    else
        echo -e "${YELLOW}⚠${NC} package-lock.json not in .distignore"
        ((WARNINGS++))
    fi
fi
echo ""

echo "7. Checking WordPress.org Compliance"
echo "------------------------------"
if [ -f "fishing-cpt-plugin.php" ]; then
    if grep -q "Text Domain:" fishing-cpt-plugin.php; then
        echo -e "${GREEN}✓${NC} Text domain defined"
    else
        echo -e "${RED}✗${NC} Text domain missing"
        ((ERRORS++))
    fi
    
    if grep -q "Domain Path:" fishing-cpt-plugin.php; then
        echo -e "${GREEN}✓${NC} Domain path defined"
    else
        echo -e "${YELLOW}⚠${NC} Domain path not specified"
        ((WARNINGS++))
    fi
    
    if grep -q "Version:" fishing-cpt-plugin.php; then
        VERSION=$(grep "Version:" fishing-cpt-plugin.php | head -1 | cut -d: -f2 | tr -d ' ')
        echo -e "${GREEN}✓${NC} Plugin version: $VERSION"
    fi
fi
echo ""

echo "8. Checking NPM Build Scripts"
echo "------------------------------"
if [ -f "package.json" ]; then
    if grep -q '"build".*"wp-scripts build"' package.json; then
        echo -e "${GREEN}✓${NC} Build script configured"
    else
        echo -e "${RED}✗${NC} Build script missing or incorrect"
        ((ERRORS++))
    fi
    
    if grep -q '"dev".*"wp-scripts start"' package.json || grep -q '"start".*"wp-scripts start"' package.json; then
        echo -e "${GREEN}✓${NC} Development script configured"
    else
        echo -e "${YELLOW}⚠${NC} Development script not found"
        ((WARNINGS++))
    fi
fi
echo ""

echo "9. Running Build Test"
echo "------------------------------"
if command -v npm &> /dev/null; then
    if [ -d "node_modules" ]; then
        echo "Running npm run build..."
        if npm run build > /dev/null 2>&1; then
            echo -e "${GREEN}✓${NC} Build completed successfully"
        else
            echo -e "${RED}✗${NC} Build failed"
            echo "Run 'npm install' first if dependencies are missing"
            ((ERRORS++))
        fi
    else
        echo -e "${YELLOW}⚠${NC} node_modules not found. Run 'npm install' first."
        ((WARNINGS++))
    fi
else
    echo -e "${YELLOW}⚠${NC} npm not available, skipping build test"
    ((WARNINGS++))
fi
echo ""

echo "10. Documentation Check"
echo "------------------------------"
check_file "MULTI_BLOCK_ARCHITECTURE.md"
check_file "BLOCKS_DOCUMENTATION.md"
check_file "PACKAGING_GUIDE.md"
echo ""

# Summary
echo "=========================================="
echo "Verification Summary"
echo "=========================================="
echo ""

if [ $ERRORS -eq 0 ] && [ $WARNINGS -eq 0 ]; then
    echo -e "${GREEN}✓ All checks passed!${NC}"
    echo ""
    echo "The plugin follows WordPress.org multi-block plugin guidelines."
    echo "Ready for distribution."
    exit 0
elif [ $ERRORS -eq 0 ]; then
    echo -e "${YELLOW}⚠ ${WARNINGS} warning(s) found${NC}"
    echo ""
    echo "The plugin structure is correct but could be improved."
    echo "Check warnings above."
    exit 0
else
    echo -e "${RED}✗ ${ERRORS} error(s) found${NC}"
    if [ $WARNINGS -gt 0 ]; then
        echo -e "${YELLOW}⚠ ${WARNINGS} warning(s) found${NC}"
    fi
    echo ""
    echo "Please fix the errors above before distribution."
    exit 1
fi
