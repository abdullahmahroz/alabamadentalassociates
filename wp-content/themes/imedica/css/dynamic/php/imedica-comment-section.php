<?php
global $vars;
imedica_less_vars();
ob_start();
?>
/*
Table Of contents - 
1. Comments Section
*/

.imedica-highlight-text {
  background-color: <?php echo $vars['highlight-text-background']; ?>;
  color: <?php echo $vars['highlight-text-color']; ?>;
  padding: 1px 8px;
  font-size: 13px;
  border-radius: 2px;
}

input#submit,
input[type="submit"], 
input[type="button"],
button {
  background-color: <?php echo $vars['imedica-theme-color']; ?>;
  color: <?php echo $vars['highlight-text-color']; ?>;
  border-radius: 0;
  padding: 13px;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  font-family: <?php echo $vars['body-text-font']; ?>;
  border: 0;
  line-height: 1.2;
}
<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;