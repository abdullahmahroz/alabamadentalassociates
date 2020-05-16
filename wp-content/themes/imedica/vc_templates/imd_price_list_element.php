<?php

$imd_pr_list_elm_name = $imd_pr_list_elm_price = '';

extract( shortcode_atts( array(
	"imd_pr_list_elm_name"  => "",
	"imd_pr_list_elm_price" => "",
), $atts ) );

global $imd_arr;

$imd_arr[] = array(
	"elm_name"  => $imd_pr_list_elm_name,
	"elm_price" => $imd_pr_list_elm_price
);
