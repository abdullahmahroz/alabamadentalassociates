<?php
global $vars;
imedica_less_vars();
ob_start();
?>
/*Table Of contents - 

1. Next / Prev. Post navigation

*/

/* Next / Prev. Post navigation */
.nav-single a {
  font-size: 16px;
  color: <?php echo $vars['imedica-theme-color']; ?>;
  text-decoration: none;
  width: 28px;
  height: 28px;
  line-height: 26px;
  display: block;
  transition: all 0.2s ease-In;
}

.nav-single .nav-previous, .nav-single .nav-next {
  font-size: 15px;
  text-align: center;
  height: 28px;
  width: 28px;
  line-height: 28px;
  padding: 0;
  border: 1px solid <?php echo $vars['imedica-theme-color']; ?>;
}

.nav-single a:hover {
  color: #FFF;
  background: <?php echo $vars['imedica-theme-color']; ?>;
  transition: all 0.2s ease-In;
}

.imedica-pagination span.current, .imedica-pagination > span {
  padding: 8px 12px;
  background: <?php echo $vars['imedica-theme-color']; ?>;
  color: white;
  margin: 0 3px;
  border: 1px solid <?php echo $vars['imedica-theme-color']; ?>;
}

.imedica-pagination a.inactive,
.imedica-pagination a.paginate-next,
.imedica-pagination a.paginate-prev,
.imedica-pagination a.paginate-last,
.imedica-pagination a.paginate-first,
.imedica-pagination a > span {
  padding: 8px 12px;
  margin: 0 2px;
  color: <?php echo $vars['imedica-theme-color']; ?>;
  background: white;
  margin: 0 2px;
  border: 1px solid <?php echo $vars['imedica-theme-color']; ?>;
  transition: all 0.2s ease-In;
}

.imedica-pagination a.inactive:hover,
a.paginate-next:hover,
a.paginate-last:hover {
  background: <?php echo $vars['imedica-theme-color']; ?>;
  color: white;
  border: 1px solid <?php echo $vars['imedica-theme-color']; ?>;
}
<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;