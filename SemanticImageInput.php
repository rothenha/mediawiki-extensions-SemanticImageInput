<?php
/**
 * Initialization file for the Semantic Image Input extension.
 *
 * @file SemanticImageInput.php
 * @ingroup SII
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

/**
 * This documentation group collects source code files belonging to Semantic Image Input.
 *
 * @defgroup SII Semantic Image Input
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

if ( version_compare( $wgVersion, '1.17c', '<' ) ) { // Needs to be 1.17c because version_compare() works in confusing ways
	die( '<b>Error:</b> Semantic Image Input requires MediaWiki 1.17 or above.' );
}

// Show an error if Semantic MediaWiki is not loaded.
if ( ! defined( 'SMW_VERSION' ) ) {
	die( '<b>Error:</b> You need to have <a href="https://www.semantic-mediawiki.org/wiki/Semantic_MediaWiki">Semantic MediaWiki</a> installed in order to use Semantic Image Input.<br />' );
}

// Show an error if Semantic MediaWiki is not loaded.
if ( ! defined( 'PF_VERSION' ) ) {
	die( '<b>Error:</b> You need to have <a href="https://www.mediawiki.org/wiki/Extension:Page_Forms">Page Forms</a> installed in order to use Semantic Image Input.<br />' );
}

define( 'SII_VERSION', '0.3.0 alpha' );

$wgExtensionCredits['semantic'][] = array(
	'path' => __FILE__,
	'name' => 'Semantic Image Input',
	'version' => SII_VERSION,
	'author' => array(
		'[https://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]',
	),
	'url' => 'https://www.mediawiki.org/wiki/Extension:Semantic_Image_input',
	'descriptionmsg' => 'sii-desc',
	'license-name' => 'GPL-3.0+'
);

// i18n
$wgMessagesDirs['SemanticImageInput'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['SemanticImageInput'] = __DIR__ . '/SemanticImageInput.i18n.php';

// Autoloading
$wgAutoloadClasses['SIISettings'] = __DIR__ . '/SemanticImageInput.settings.php';
$wgAutoloadClasses['InstantImageInput']	= __DIR__ . '/includes/InstantImageInput.php';
$wgExtensionFunctions[] = 'efSIISetup';

// Resource loader modules
$moduleTemplate = array(
	'localBasePath' => __DIR__ . '/resources',
	'remoteExtPath' => 'SemanticImageInput/resources'
);

$wgResourceModules['sii.image'] = $moduleTemplate + array(
	'scripts' => array(
		'jquery.instantImage.js',
		'sii.instantImage.js'
	),
);

unset( $moduleTemplate );

$egSIISettings = array();

function efSIISetup() {

	global $wgPageFormsFormPrinter;
	$wgPageFormsFormPrinter->registerInputType( 'InstantImageInput' );
}
