<?php

/**
 * Localization of CSS Optimiser Interface of CSSTidy
 *
 * Copyright 2005, 2006, 2007 Florian Schmitz
 *
 * This file is part of CSSTidy.
 *
 *  CSSTidy is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU Lesser General Public License as published by
 *  the Free Software Foundation; either version 2.1 of the License, or
 *   (at your option) any later version.
 *
 *   CSSTidy is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Lesser General Public License for more details.
 *
 *   You should have received a copy of the GNU Lesser General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @license http://opensource.org/licenses/lgpl-license.php GNU Lesser General Public License
 * @package csstidy
 * @author Florian Schmitz (floele at gmail dot com) 2005-2007
  * @author Brett Zamir (brettz9 at yahoo dot com) 2007
 */

if ( isset( $_GET['lang'] ) ) {
	$l = $_GET['lang'];
} elseif ( isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ) {
	$l = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	$l = strtolower( substr( $l, 0, 2 ) );
} else {
	$l = '';
}

$l = ( in_array( $l, array( 'de', 'fr', 'zh' ) ) ) ? $l : 'en';

// note 5 in all but French, and 40 in all are orphaned

$lang = array();
$lang['en'][0] = 'CSS Formatter and Optimiser/Optimizer (based on CSSTidy ';
$lang['en'][1] = 'CSS Formatter and Optimiser';
$lang['en'][2] = '(based on';
$lang['en'][3] = '(plaintext)';
$lang['en'][4] = 'Important Note:';
$lang['en'][6] = 'Your code should be well-formed. This is <strong>not a validator</strong> which points out errors in your CSS code. To make sure that your code is valid, use the <a >W3C Validator</a>.';
$lang['en'][7] = 'all comments are removed';
$lang['en'][8] = 'CSS Input:';
$lang['en'][9] = 'CSS-Code:';
$lang['en'][10] = 'CSS from URL:';
$lang['en'][11] = 'Code Layout:';
$lang['en'][12] = 'Compression&#160;(code&#160;layout):';
$lang['en'][13] = 'Highest (no readability, smallest size)';
$lang['en'][14] = 'High (moderate readability, smaller size)';
$lang['en'][15] = 'Standard (balance between readability and size)';
$lang['en'][16] = 'Low (higher readability)';
$lang['en'][17] = 'Custom (enter below)';
$lang['en'][18] = 'Custom <a href="">template</a>';
$lang['en'][19] = 'Options';
$lang['en'][20] = 'Sort Selectors (caution)';
$lang['en'][21] = 'Sort Properties';
$lang['en'][22] = 'Regroup selectors';
$lang['en'][23] = 'Optimise shorthands';
$lang['en'][24] = 'Compress colors';
$lang['en'][25] = 'Lowercase selectors';
$lang['en'][26] = 'Case for properties:';
$lang['en'][27] = 'Lowercase';
$lang['en'][28] = 'No or invalid CSS input or wrong URL!';
$lang['en'][29] = 'Uppercase';
$lang['en'][30] = 'lowercase elementnames needed for XHTML';
$lang['en'][31] = 'Remove unnecessary backslashes';
$lang['en'][32] = 'convert !important-hack';
$lang['en'][33] = 'Output as file';
$lang['en'][34] = 'Bigger compression because of smaller newlines (copy &#38; paste doesn\'t work)';
$lang['en'][35] = 'Process CSS';
$lang['en'][36] = 'Compression Ratio';
$lang['en'][37] = 'Input';
$lang['en'][38] = 'Output';
$lang['en'][39] = 'Language';
$lang['en'][41] = 'Attention: This may change the behaviour of your CSS Code!';
$lang['en'][42] = 'Remove last ;';
$lang['en'][43] = 'Discard invalid properties';
$lang['en'][44] = 'Only safe optimisations';
$lang['en'][45] = 'Compress font-weight';
$lang['en'][46] = 'Save comments';
$lang['en'][47] = 'Do not change anything';
$lang['en'][48] = 'Only separate selectors (split at ,)';
$lang['en'][49] = 'Merge selectors with the same properties (fast)';
$lang['en'][50] = 'Merge selectors intelligently (slow)';
$lang['en'][51] = 'Preserve CSS';
$lang['en'][52] = 'Save comments, hacks, etc. Most optimisations can *not* be applied if this is enabled.';
$lang['en'][53] = 'None';
$lang['en'][54] = 'Don\'t optimise';
$lang['en'][55] = 'Safe optimisations';
$lang['en'][56] = 'All optimisations';
$lang['en'][57] = 'Add timestamp';
$lang['en'][58] = 'Copy to clipboard';
$lang['en'][59] = 'Back to top';
$lang['en'][60] = 'Your browser doesn\'t support copy to clipboard.';
$lang['en'][61] = 'For bugs and suggestions feel free to';
$lang['en'][62] = 'contact me';
$lang['en'][63] = 'Output CSS code as complete HTML document';
$lang['en'][64] = 'Code';
$lang['en'][65] = 'CSS to style CSS output';
$lang['en'][66] = 'You need to go to about:config in your URL bar, select \'signed.applets.codebase_principal_support\' in the filter field, and set its value to true in order to use this feature; however, be aware that doing so increases security risks.';