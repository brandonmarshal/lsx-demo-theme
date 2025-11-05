<?php
/**
 * Tests for Repeatable Fields functionality.
 *
 * @package Fishing_CPT_Plugin
 * @since 1.0.2
 */

namespace Fishing_CPT\Tests;

/**
 * Test repeatable field groups registration.
 *
 * This test validates that:
 * 1. Field groups are properly registered
 * 2. Helper functions exist and work correctly
 * 3. Field structure matches specifications
 */
class Test_Repeatable_Fields {

/**
 * Test that field group functions are available.
 */
public function test_field_group_functions_exist() {
// Check if ACF is available.
$this->assertTrue(
function_exists( 'acf_add_local_field_group' ),
'ACF function acf_add_local_field_group should exist'
);

// Check if our field registration function exists.
$this->assertTrue(
function_exists( 'Fishing_CPT\register_repeatable_fields' ),
'Field registration function should exist'
);
}

/**
 * Test that helper functions are available.
 */
public function test_helper_functions_exist() {
$this->assertTrue(
function_exists( 'Fishing_CPT\display_gear_specifications' ),
'Gear specifications helper should exist'
);

$this->assertTrue(
function_exists( 'Fishing_CPT\display_fish_quick_facts' ),
'Fish quick facts helper should exist'
);
}

/**
 * Test that enqueue function exists.
 */
public function test_enqueue_function_exists() {
$this->assertTrue(
function_exists( 'Fishing_CPT\enqueue_repeatable_fields_assets' ),
'Asset enqueue function should exist'
);
}

/**
 * Test gear specifications field group structure.
 */
public function test_gear_specs_field_group() {
// Mock ACF get_field_group function if available.
if ( function_exists( 'acf_get_field_group' ) ) {
$group = acf_get_field_group( 'group_gear_specifications' );

$this->assertNotEmpty( $group, 'Gear specifications field group should exist' );
$this->assertEquals( 'group_gear_specifications', $group['key'] ?? '', 'Field group key should match' );
} else {
$this->markTestSkipped( 'ACF not available for testing' );
}
}

/**
 * Test fish quick facts field group structure.
 */
public function test_fish_facts_field_group() {
if ( function_exists( 'acf_get_field_group' ) ) {
$group = acf_get_field_group( 'group_fish_quick_facts' );

$this->assertNotEmpty( $group, 'Fish quick facts field group should exist' );
$this->assertEquals( 'group_fish_quick_facts', $group['key'] ?? '', 'Field group key should match' );
} else {
$this->markTestSkipped( 'ACF not available for testing' );
}
}

/**
 * Test gear specifications display with empty data.
 */
public function test_display_gear_specifications_empty() {
ob_start();
\Fishing_CPT\display_gear_specifications( 1 );
$output = ob_get_clean();

// Should produce no output if no specifications exist.
$this->assertEmpty( trim( $output ), 'Empty specifications should produce no output' );
}

/**
 * Test fish quick facts display with empty data.
 */
public function test_display_fish_quick_facts_empty() {
ob_start();
\Fishing_CPT\display_fish_quick_facts( 1 );
$output = ob_get_clean();

// Should produce no output if no facts exist.
$this->assertEmpty( trim( $output ), 'Empty quick facts should produce no output' );
}

/**
 * Mock assert methods for standalone testing.
 */
private function assertTrue( $condition, $message = '' ) {
if ( ! $condition ) {
echo "\n❌ FAIL: $message\n";
return false;
}
echo "\n✅ PASS: $message\n";
return true;
}

private function assertNotEmpty( $value, $message = '' ) {
return $this->assertTrue( ! empty( $value ), $message );
}

private function assertEquals( $expected, $actual, $message = '' ) {
return $this->assertTrue( $expected === $actual, $message );
}

private function assertEmpty( $value, $message = '' ) {
return $this->assertTrue( empty( $value ), $message );
}

private function markTestSkipped( $message ) {
echo "\n⏭️  SKIP: $message\n";
}
}

// Run tests if executed directly.
if ( defined( 'ABSPATH' ) && ! class_exists( 'PHPUnit\Framework\TestCase' ) ) {
echo "\n=== Running Repeatable Fields Tests ===\n";

$test = new Test_Repeatable_Fields();

$test->test_field_group_functions_exist();
$test->test_helper_functions_exist();
$test->test_enqueue_function_exists();
$test->test_gear_specs_field_group();
$test->test_fish_facts_field_group();
$test->test_display_gear_specifications_empty();
$test->test_display_fish_quick_facts_empty();

echo "\n=== Tests Complete ===\n\n";
}
