<?php

/**
 * Version details
 *
 * @package    local_slider
 * @author     Víctor M. Sanchez
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

// Ensure the configurations for this site are set
if ( $hassiteconfig ){
 
	// Create the new settings page
	// - in a local plugin this is not defined as standard, so normal $settings->methods will throw an error as
	// $settings will be NULL
	$settings = new admin_settingpage( 'local_slider', 'Ajustes de slider' );
 
	// Create 
	$ADMIN->add( 'localplugins', $settings );
 
	// Add update url field to the settings
	$settings->add( new admin_setting_configtext(
 
		// This is the reference you will use to your configuration
		'local_slider/updateurl',
 
		// This is the friendly title for the config, which will be displayed
		'Update service URL:',
 
		// This is helper text for this config field
		'This is the URL to access the External uldate service',
 
		// This is the default value
		'No Key Defined',
 
		// This is the type of Parameter this config is
		PARAM_TEXT
 
	) );

	// Add API key url field to the settings
	$settings->add( new admin_setting_configtext(
 
		// This is the reference you will use to your configuration
		'local_slider/apikey',
 
		// This is the friendly title for the config, which will be displayed
		'External API: Key',
 
		// This is helper text for this config field
		'This is the key used to access the External API',
 
		// This is the default value
		'No Key Defined',
 
		// This is the type of Parameter this config is
		PARAM_TEXT
 
	) );
 
}