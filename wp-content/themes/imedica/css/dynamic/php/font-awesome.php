<?php
global $vars;
imedica_less_vars();
ob_start();
?>

@font-face {
  font-family: 'FontAwesome';
  src: url('<?php echo $vars['imd-fonts-dir']; ?>/fontawesome-webfont.eot?v=4.6.3');
  src: url('<?php echo $vars['imd-fonts-dir']; ?>/fontawesome-webfont.eot?#iefix&v=4.6.3') format('embedded-opentype'), url('<?php echo $vars['imd-fonts-dir']; ?>/fontawesome-webfont.woff2?v=4.6.3') format('woff2'), url('<?php echo $vars['imd-fonts-dir']; ?>/fontawesome-webfont.woff?v=4.6.3') format('woff'), url('<?php echo $vars['imd-fonts-dir']; ?>/fontawesome-webfont.ttf?v=4.6.3') format('truetype'), url('<?php echo $vars['imd-fonts-dir']; ?>/fontawesome-webfont.svg?v=4.6.3#fontawesomeregular') format('svg');
  font-weight: normal;
  font-style: normal;
}


@font-face {
  font-family: 'ult-silk';
  src: url('<?php echo $vars['imd-fonts-dir']; ?>/ult-silk.eot');
  src: url('<?php echo $vars['imd-fonts-dir']; ?>/ult-silk.eot') format('embedded-opentype'), url('<?php echo $vars['imd-fonts-dir']; ?>/ult-silk.woff') format('woff'), url('<?php echo $vars['imd-fonts-dir']; ?>/ult-silk.ttf') format('truetype'), url('<?php echo $vars['imd-fonts-dir']; ?>/ult-silk.svg') format('svg');
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'imedica-extra-fonts';
  src: url('<?php echo $vars['imd-fonts-dir']; ?>/imedica-extra-fonts.eot?-ofzjm3');
  src: url('<?php echo $vars['imd-fonts-dir']; ?>/imedica-extra-fonts.eot?#iefix-ofzjm3') format('embedded-opentype'),
  url('<?php echo $vars['imd-fonts-dir']; ?>/imedica-extra-fonts.woff') format('woff'),
  url('<?php echo $vars['imd-fonts-dir']; ?>/imedica-extra-fonts.ttf') format('truetype'),
  url('<?php echo $vars['imd-fonts-dir']; ?>/imedica-extra-fonts.svg?-ofzjm3#imedica-extra-fonts') format('svg');
  font-weight: normal;
  font-style: normal;
}
<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;