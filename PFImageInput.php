<?php
/**
 * Initialization file for the Page Forms Image Input extension.
 *
 * @file PFImageInput.php
 * @ingroup PFII
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 * @author Klaus Rothenhäusler < rothenha@gmail.com >
 */

/**
 * This documentation group collects source code files belonging to Page Forms Image Input.
 *
 * @defgroup PFII PageForms Image Input
 */

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'PFImageInput' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['PFImageInput'] = __DIR__ . '/i18n';
	$wgExtensionMessagesFiles['FooBarAlias'] = __DIR__ . '/FooBar.alias.php';
	wfWarn(
		'Deprecated PHP entry point used for the FooBar extension. ' .
		'Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	);
	return;
} else {
	die( 'This version of the FooBar extension requires MediaWiki 1.29+' );
}
