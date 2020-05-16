<?php
global $vars;
ob_start();
imedica_less_vars();
?>
#content, address {
    display: inline-block
}

a img, hr {
    border: 0
}

pre, textarea {
    overflow: auto
}

.wp-caption, body, embed, iframe, img, object, pre {
    max-width: 100%
}

.aligncenter, .blog-default-wrapper .post-thumb.imd_has_featured_image:after, .blog-grid-masonry:after, .clear:after, .comment-content:after, .entry-content:after, .imedica-container:after, .imedica-pagination, .imedica-row:after, .page-links, .site-content:after, .site-footer:after, .site-header:after, h1, h2, h3, h4, h5, h6 {
    clear: both
}

a, abbr, acronym, address, applet, big, blockquote, body, caption, cite, code, dd, del, dfn, div, dl, dt, em, fieldset, font, form, h1, h2, h3, h4, h5, h6, html, iframe, ins, kbd, label, legend, li, object, ol, p, pre, q, s, samp, small, span, strike, strong, sub, sup, table, tbody, td, tfoot, th, thead, tr, tt, ul, var {
    border: 0;
    font-family: inherit;
    font-size: 100%;
    font-style: inherit;
    font-weight: inherit;
    margin: 0;
    outline: 0;
    padding: 0;
    vertical-align: baseline
}

address, cite, dfn, em {
    font-style: italic
}

small, sub, sup {
    font-size: 75%
}

html {
    font-size: 62.5%;
    overflow-y: scroll;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%
}

*, :after, :before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box
}

article, aside, details, figcaption, figure, footer, header, main, nav, section {
    display: block
}

caption, td, th {
    font-weight: 400;
    text-align: left
}

.gallery-item, .wp-caption-text {
    text-align: center
}

blockquote:after, blockquote:before, q:after, q:before {
    content: ""
}

blockquote, q {
    quotes: "" ""
}

a:focus {
    outline: dotted thin
}

body {
    overflow: hidden
}

#page {
    background: #fff
}

#content {
    padding-top: 0;
    width: 100%;
    word-wrap: break-word;
    -ms-word-wrap: break-word;
    vertical-align: bottom
}

body, button, input, select, textarea {
    color: #404040;
    font-size: 16px;
    font-size: 1.6rem;
    line-height: 1.5em
}

address {
    margin: 0 0 1.5em
}

pre {
    background: #eee;
    font-family: "Courier 10 Pitch", Courier, monospace;
    font-size: 15px;
    font-size: 1.5rem;
    line-height: 1.6;
    margin-bottom: 1.6em;
    padding: 1.6em
}

abbr, acronym {
    border-bottom: 1px dotted #666;
    cursor: help
}

ins, mark {
    background: #fff9c0;
    text-decoration: none
}

sub, sup {
    height: 0;
    line-height: 0;
    position: relative;
    vertical-align: baseline
}

sup {
    bottom: 1ex
}

sub {
    top: .5ex
}

big {
    font-size: 125%
}

.search.search-results h1.page-title, header.archive-header {
    display: block;
    width: 100%;
    clear: both;
    position: relative;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 4px double #ddd
}

hr {
    background-color: #ccc;
    height: 1px;
    margin-bottom: 1.5em
}

ol, ul {
    margin: 0 1.3em
}

ul {
    list-style: disc
}

ol {
    list-style: decimal
}

li > ol, li > ul {
    margin-bottom: 0;
    margin-left: 1.5em
}

dt, th {
    font-weight: 700
}

dd {
    margin: 0 1.5em 1.5em
}

img {
    height: auto
}

figure {
    margin: 0
}

table {
    border-collapse: separate;
    border-spacing: 0;
    margin: 0 0 1.5em;
    width: 100%
}

.comment-content dl, .entry-content dl {
    margin: 0 1.714285714rem
}

.comment-content dt, .entry-content dt {
    font-weight: 700
}

.comment-content dd, .entry-content dd {
    margin-bottom: 1.714285714rem
}

.comment-content table, .entry-content table {
    border-bottom: 1px solid #ededed;
    margin: 0 0 1.714285714rem;
    width: 100%
}

.comment-content table caption, .entry-content table caption {
    margin: 1.714285714rem 0
}

.comment-content td, .entry-content td {
    padding: 6px 10px 6px 0
}

.comment-content ol, .comment-content ul, .entry-content ol, .entry-content ul, .mu_register ul {
    margin: 0 0 1.714285714rem;
    line-height: 1.714285714
}

button, input, select, textarea {
    font-size: 100%;
    margin: 0;
    vertical-align: baseline
}

button, input[type=button], input[type=reset], input[type=submit] {
    border: 1px solid;
    border-color: #ccc #ccc #bbb;
    border-radius: 3px;
    background: #e6e6e6;
    color: rgba(0, 0, 0, .8);
    cursor: pointer;
    -webkit-appearance: button;
    font-size: 12px;
    font-size: 1.2rem;
    line-height: 1;
    padding: .6em 1em .4em
}

input[type=checkbox], input[type=radio] {
    padding: 0
}

input[type=search] {
    -webkit-appearance: textfield;
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box
}

input[type=search]::-webkit-search-decoration {
    -webkit-appearance: none
}

button::-moz-focus-inner, input::-moz-focus-inner {
    border: 0;
    padding: 0
}

input[type=url], input[type=password], input[type=search], input[type=text], input[type=email], textarea {
    color: #666;
    border: 1px solid #cdcdcd;
    border-radius: 0;
    resize: none;
    -webkit-box-shadow: inset 1px 2px 7px 0 rgba(240, 240, 240, .58);
    -moz-box-shadow: inset 1px 2px 7px 0 rgba(240, 240, 240, .58);
    box-shadow: inset 1px 2px 7px 0 rgba(240, 240, 240, .58);
    min-height: 30px
}

.screen-reader-text:active, .screen-reader-text:focus, .screen-reader-text:hover {
    height: auto;
    width: auto;
    padding: 15px 23px 14px;
    color: #21759b;
    border-radius: 3px;
    box-shadow: 0 0 2px 2px rgba(0, 0, 0, .6)
}

.price-table-desc .imd-price-wrap .price-plan, .price-table-desc li:nth-child(even) {
    box-shadow: inset -20px 0 22px -20px #eee;
    -webkit-box-shadow: inset -20px 0 22px -20px #eee
}

input[type=url], input[type=password], input[type=search], input[type=text], input[type=email], select  {
    padding: 6px 5px 5px 8px
}

.entry-content input[type=password] {
    padding: 8px
}

textarea {
    padding-left: 3px;
    vertical-align: top;
    width: 100%
}

.screen-reader-text {
    position: absolute !important;
    height: 1px;
    width: 1px;
    overflow: hidden
}

.screen-reader-text:active, .screen-reader-text:focus, .screen-reader-text:hover {
    background-color: #f1f1f1;
    clip: auto !important;
    display: block;
    font-size: 14px;
    font-weight: 700;
    left: 5px;
    line-height: normal;
    text-decoration: none;
    top: 5px;
    z-index: 100000
}

.screen-reader-text {
    clip: rect(1px, 1px, 1px, 1px)
}

.screen-reader-text:focus {
    background-color: #f1f1f1;
    clip: auto;
    display: block;
    font-size: 14px;
    font-weight: 700;
    line-height: normal;
    position: absolute;
    left: 5px;
    top: 5px;
    text-decoration: none;
    text-transform: none;
    z-index: 100000
}

.hide {
    display: none
}

.auto-height {
    height: auto !important
}

.alignleft {
    display: inline;
    float: left;
    margin-right: 1.5em
}

.alignright {
    display: inline;
    float: right;
    margin-left: 1.5em
}

.aligncenter {
    display: block;
    margin: 0 auto
}

.clear:after, .clear:before, .comment-content:after, .comment-content:before, .entry-content:after, .entry-content:before, .site-content:after, .site-content:before, .site-footer:after, .site-footer:before, .site-header:after, .site-header:before {
    content: "";
    display: table
}

.infinite-scroll .paging-navigation, .infinite-scroll.neverending .site-footer {
    display: none
}

.infinity-end.neverending .site-footer {
    display: block
}

.comment-content img.wp-imedicay, .entry-content img.wp-imedicay, .page-content img.wp-imedicay {
    border: none;
    margin-bottom: 0;
    margin-top: 0;
    padding: 0
}

.wp-caption {
    margin-bottom: 1.5em
}

.wp-caption img[class*=wp-image-] {
    display: block;
    margin: 0 auto
}

figcaption.wp-caption-text {
    background: #F5F5F5;
    margin: 0;
    padding: 10px 0
}

.gallery {
    margin-bottom: 1.5em
}

.gallery-item {
    display: inline-block;
    vertical-align: top;
    width: 100%
}

.gallery-columns-2 .gallery-item {
    max-width: 50%
}

.gallery-columns-3 .gallery-item {
    max-width: 33.33%
}

.gallery-columns-4 .gallery-item {
    max-width: 25%
}

.gallery-columns-5 .gallery-item {
    max-width: 20%
}

.gallery-columns-6 .gallery-item {
    max-width: 16.66%
}

.gallery-columns-7 .gallery-item {
    max-width: 14.28%
}

.gallery-columns-8 .gallery-item {
    max-width: 12.5%
}

.gallery-columns-9 .gallery-item {
    max-width: 11.11%
}

.gallery-caption {
    display: block
}

.post-gallery-box {
    display: block;
    margin-bottom: 25px;
    width: 100%
}

.container-fluid .container {
    width: 100%
}

.imedica-row {
    max-width: 1170px;
    margin: 0 auto
}

.imedica-container {
    margin: 0;
    padding: 0
}

.imedica-container:after, .imedica-container:before, .imedica-row:after, .imedica-row:before {
    content: "";
    display: table
}

html.js_active .theme-showcase > .row > .container {
    width: 100% !important
}

@media screen and (min-width: 768px) {
    .imedica-container {
        margin-left: -15px;
        margin-right: -15px;
        padding: 0
    }
}

@media (max-width: 768px) {
    .imd-scroll-top {
        height: 35px;
        width: 35px;
        line-height: 35px;
        font-size: 15px
    }
}

.single .page-summary p {
    display: block
}

.js_active body:not(.blog) #primary, 
.js_active body:not(.blog) #secondary{
    margin-bottom: 0
}

#primary, #secondary {
    margin-top: 50px
}

.imd-fluid-layout li.imedica-search.menu-search-default-head a {
    padding-right: 0
}

.imd-fluid-layout .imedica-row {
    max-width: 100%;
    width: 100%
}

.container-fluid.imedica-container {
    padding: 0 15px;
    margin: 0
}

.js_active .container-fluid.imedica-container {
    margin: 0
}

.imd-fluid-layout .imd-blog-home {
    padding-left: 0;
    padding-right: 0
}

.imd-fluid-layout .navbar-inverse1.header-default .imedica-row .imedica-container {
    padding: 0
}

.imd-fluid-layout .navbar .imd-top-social, .imd-fluid-layout .navbar .primary-navigation {
    padding: 0;
    margin: 0
}

.imd-fluid-layout .imedica-row .imedica-container {
    margin: 0;
    padding: 0 15px
}

.imd-fluid-layout .imd-footer-menu-wrap, .imd-fluid-layout .site-info, .imd-fluid-layout .theme-showcase .imedica-row .imedica-container {
    padding: 0
}

.imedica-hero-section .container-fluid.imedica-container {
    padding: 0;
}

.imd-full-layout .row.mobile-top-menu {
    margin-left: -15px;
    margin-right: -15px
}

.imd-full-layout .container.imedica-container, .imd-full-layout .row {
    margin: 0
}

.imd-full-layout .imedica-row .imedica-container, .navbar-inverse .imedica-row .container-fluid.imedica-container {
    padding: 0 15px
}

#primary.with-sidebar.right {
    padding-right: 30px
}

#primary.with-sidebar.left {
    padding-left: 30px
}

@media (max-width: 768px) {
    #primary.with-sidebar.right {
        padding-right: 0
    }

    #primary.with-sidebar.left {
        padding-left: 0
    }
}

.imd-fluid-layout .imd-contact-info-wrap, .imd-full-layout .header-default .header-main, .imd-full-layout .navbar .primary-navigation, .imd-full-layout .navbar .top-custom-html {
    padding: 0
}

.container.imd-box-layout {
    overflow: hidden;
    margin-top: <?php echo $vars['box_top_bottom_margin']; ?>px;
    margin-bottom: <?php echo $vars['box_top_bottom_margin']; ?>px;
}

.imd-box-layout .imedica-container {
    padding: 0 15px;
    margin: 0
}

.imd-box-layout .theme-showcase .imedica-container {
    padding: 0
}

.imd-box-layout .imd-top-social {
    padding: 0 15px 0 0
}

.imd-box-layout div.site-content {
    padding: 0 15px
}

.imd-box-layout .container.imedica-container {
    margin: 0
}

.imd-box-layout .header-default .container.imedica-container {
    padding: 0
}

.imd-box-layout .navbar-fixed-top .container.imedica-container {
    padding: 0 15px
}

.imd-box-layout .row.navbar .imedica-row .imedica-container {
    margin: 0;
    padding: 0
}

.imd-box-layout .imedica-footer-area .imedica-row .imedica-container {
    margin: 0
}

.imd-box-layout .imd-footer-copyright, .imd-box-layout .imd-footer-menu-wrap {
    padding: 0
}

.imd-box-layout #comments .container.imedica-container {
    margin: 0;
    padding: 0
}

.imd-box-layout .breadcrumbs .imedica-row .imedica-container, .with-sidebar .vc_row .imedica-row .imedica-container {
    padding: 0 15px
}

.site-content {
    margin-bottom: 50px
}

.paged .entry-title {
    margin-top: 0
}

.over_the_slider {
    z-index: 29;
    margin-top: -100px
}

@media screen and (max-width: 768px) {
    .over_the_slider {
        margin-top: 50px;
        z-index: 0
    }

    .over_the_slider .service-box {
        margin-bottom: 45px
    }

    .imd-box-layout .header-default .header-main {
        padding: 0 15px
    }
}

@media screen and (-ms-high-contrast: none),(-ms-high-contrast: active) {
    .carousel-inner > .item > a > img, .carousel-inner > .item > img, .img-thumbnail {
        width: 100%
    }

    input[type=checkbox], input[type=radio] {
        margin-top: 1px
    }

    .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
        margin-top: 4px
    }

    .carousel-indicators li {
        background-color: #000
    }
}

.landing-window .vc_row.wpb_row.vc_row-fluid:nth-last-child(2) {
    margin-bottom: 0
}

.transparent_header .header-layout1 .header-main, 
.transparent_header .header-main, .transparent_header .navbar-inverse1.navbar-fixed-top1.header-layout1, 
.transparent_header .primary-navigation.site-navigation, 
.transparent_header .row.navbar-inverse1.navbar-fixed-top1, 
.transparent_header .row.navbar-inverse1.navbar-fixed-top1.header-layout2, 
.transparent_header .row.site-navigation.primary-navigation.header-layout1 {
    background-color: transparent;
    border: 0;
    z-index: 30;
    position: relative
}

.transparent_header .header-search button.search-submit {
    height: 34px;
    width: 34px
}

.transparent_header .header-search .search span.text input.imd-search {
    border: 0
}

.transparent_header .navbar-default {
    background-color: transparent;
    border-bottom: 0
}

/* Transparent header fixes */

.transparent_header .site-header-main {
    position: absolute;
    width: 100%;
}

.transparent_header .imd-fluid-layout .site-header-main {
    width: 99%;
    width: calc( 100% - 30px);
}

.transparent_header .imd-box-layout .site-header-main {
    width: auto;
}

.transparent_header #page {
    position: relative;
}

.page footer.entry-meta span.edit-link a {
    background: #FFF;
    color: #9B9B9B;
    padding: .1em .5em;
    display: inline-block;
    border-radius: 0;
    transition: all .2s ease-in-out;
    border: 1px solid transparent;
    font-size: 11px;
    line-height: 1.5em
}

.page footer.entry-meta span.edit-link a:hover {
    color: #5F5F5F;
    background: #EAEAEA;
    border: 1px solid #C3C3C3
}

.page footer.entry-meta span.edit-link a:before {
    content: "\f044";
    font-family: fontAwesome;
    padding-right: 5px
}

.page footer.entry-meta span.edit-link {
    position: absolute;
    bottom: -100%
}

.page footer.entry-meta {
    position: relative
}

.entry-content-404 fieldset {
    width: 75%;
    margin: 55px auto 0
}

.entry-content-404 fieldset .imd-search {
    width: 100%;
}

.error404 .search-wrap .search {
    width: 100%;
}

.entry-content-404 button.button.search-submit {
    float: left;
    padding: 10px
}

.flexslider {
    overflow: visible !important;
    border-radius: 0 !important;
    border: none !important
}

#imedica-comments {
    margin-top: 0
}

ol.imedica-commentlist {
    margin: 0;
    word-wrap: break-word;
    -ms-word-wrap: break-word
}

.iMedica-cmt-avatar-wrap {
    margin-right: .7em;
    display: inline-block;
    vertical-align: top
}

div.comments-area {
    margin-top: 0;
    display: flex;
    width: 100%
}

section.comment-content p {
    margin-bottom: 1em
}

header.imedica-comment-meta p {
    margin-bottom: 0
}

header.imedica-comment-meta.imedica-comment-author.vcard {
    display: flex
}

.imedica-comment {
    width: 100%;
    margin-bottom: 35px
}

.iMedica-cmt-cite-wrap {
    float: left;
    margin-right: 10px
}

.iMedica-cmt-avatar-wrap img {
    width: 100%
}

.imedica-comment-data-wrap {
    display: inline-block;
    width: 75%
}

ol li .imedica-comment, ol li ol li:last-child > .imedica-comment {
    border-bottom: 1px solid #dcddde;
    padding-bottom: 25px;
    padding-top: 25px
}

ol li:last-child > .imedica-comment {
    border-bottom: none
}

.imedica-commentlist li {
    list-style: none
}

p.imedica-edit-link {
    margin-left: 10px;
    line-height: 1.5em
}

.iMedica-cmt-cite-wrap b.fn {
    text-transform: capitalize
}

p.comment-awaiting-moderation {
    margin-bottom: 0;
    margin-left: 10px
}

.iMedica-cmt-cite-wrap cite {
    font-style: normal
}

.imedica-comment-formwrap {
    width: 100%;
    float: left
}

p.comment-form-author, p.comment-form-email {
    width: 265px;
    float: left;
    margin-right: 15px
}

p.comment-form-url {
    width: 265px;
    float: left
}

fieldset.comment-form-comment {
    width: 100%;
    display: inline-block
}

div.comment-respond {
    margin-top: 40px
}

p.form-submit {
    margin-top: 1.5em
}

.comment-content a {
    word-wrap: break-word
}

.bypostauthor {
    display: block
}

.imedica-comment-formwrap p input {
    width: 100%;
    margin: 0
}

.imedica-comment-formwrap p {
    width: 32%;
    margin-right: inherit
}

.imedica-comment-formwrap p label {
    width: 100%
}

.imedica-comment-formwrap p:last-child {
    margin-right: 0
}

p.comment-form-email {
    margin-left: 2%;
    margin-right: 2%
}

.imd-full-layout #comments .imedica-row .imedica-container {
    padding: 0
}

textarea#comment {
    padding: 6px 5px 5px 8px
}

@media screen and (max-width: 480px) {
    header.imedica-comment-meta.imedica-comment-author.vcard {
        display: block
    }

    p.imedica-edit-link {
        margin: 5px 0
    }

    .iMedica-cmt-cite-wrap {
        width: 100%;
        margin: 5px 0
    }

    .imedica-comment-formwrap p {
        width: 100%;
        margin: 10px 0
    }

    fieldset.comment-form-comment {
        margin-top: 10px
    }
}

.nav-next, .nav-previous {
    display: inline-block
}

nav.nav-single {
    text-align: right;
    height: auto;
    width: auto;
    padding-right: 0;
    margin: 0 0 50px
}

.imedica-pagination {
    padding: 15px 0;
    text-align: right;
    margin: 1.3%;
    width: 100%
}

.blog-grid-masonry .imedica-pagination {
    position: relative;
    top: 100%;
    top: calc(100% + 20px);
    margin: 0 -15px;
    padding: 0;
    width: 100%
}

.comment-content ol, 
.comment-content ul,
.entry-content ol, 
.entry-content ul, 
.post-content ol, 
.post-content ul, 
article .entry-summary ol, 
article .entry-summary ul {
    padding-left: 20px
}

.blog-grid-masonry:after, 
.blog-grid-masonry:before {
    content: "";
    display: table
}

.imedica-container .without-sidebar {
    padding: 0
}

.post-content p:last-child, 
.single-post article {
    margin-bottom: 0
}

.blog-grid2 .post, .blog-grid3 .post {
    padding: 0;
    border: 1px solid #DCDDDE;
    border-bottom: 4px solid #DCDDDE
}

.blog-grid2 article .entry-title, 
.blog-grid3 article .entry-title {
    margin: 30px 30px 25px
}

.blog-grid2 article .entry-summary, 
.blog-grid3 article .entry-summary {
    margin: 0 30px;
    border-bottom: 1px solid #DCDDDE;
    padding-bottom: 20px;
    word-wrap: break-word
}

.blog-grid2 article .post-meta, 
.blog-grid3 article .post-meta,
.imd-blog-home .blog-grid3 .category-sticky .post-meta {
    padding: 20px 30px
}

.blog-grid2 .post-thumb img, .blog-grid3 .post-thumb img {
    width: 100%
}

.blog-default-wrapper {
    display: inline-block;
    position: relative;
    width: 100%
}

.blog-default-wrapper .post-thumb.imd_has_featured_image {
    display: inline-block;
    max-width: 100%
}

.blog-default-wrapper .imd_has_featured_image, 
.format-audio .post-thumb, 
.format-video .post-thumb {
    margin-bottom: 40px
}

.blog-default-wrapper .archive .entry-title, 
.blog-default-wrapper .search .entry-title, 
.blog-default-wrapper .entry-title {
    margin-bottom: 10px;
    margin-top: 0
}

.blog-default-wrapper .archive .entry-title, 
.blog-default-wrapper .post-meta, 
.blog-default-wrapper .search .entry-title {
    border-bottom: 1px solid #DCDDDE;
    word-wrap: break-word;
    padding-bottom: 15px;
    margin-bottom: 25px
}

.blog-default-wrapper .archive .entry-summary, .blog-default-wrapper .entry-summary, .blog-default-wrapper .search .entry-summary {
    margin-top: 0
}

.blog-default-wrapper .archive .entry-summary p, .blog-default-wrapper .entry-summary p, .blog-default-wrapper .search .entry-summary p {
    margin: 0
}

.blog-default-wrapper .archive .post-thumb iframe, .blog-default-wrapper .archive .post-thumb img, .blog-default-wrapper .post-thumb iframe, .blog-default-wrapper .post-thumb img, .blog-default-wrapper .search .post-thumb iframe, .blog-default-wrapper .search .post-thumb img {
    max-width: 100%
}

.blog-default-wrapper .archive .read-more-link, .blog-default-wrapper .read-more-link, .blog-default-wrapper .search .read-more-link, .blog-medium-image-wrapper .archive .read-more-link, .blog-medium-image-wrapper .read-more-link, .blog-medium-image-wrapper .search .read-more-link {
    display: block;
    margin-top: 30px
}

.search .blog-grid2 article.not-found,
.search .blog-grid3 article.not-found{
    margin: 0;
    padding: 0;
    border: none;
}

.search-no-results .blog-grid-masonry.blog-grid3.clear.masonry {
    display: inline-block;
}

.blog-med-img-content .entry-summary {
    margin-top: 15px
}

.blog-med-img-content .read-more-link {
    margin-top: 20px
}

.blog-med-img-content .read-more-link a.read-more-link {
    padding-top: 15px
}

.blog-medium-image-wrapper .post-thumb {
    margin-bottom: 30px;
    display: block
}

.blog-medium-image-wrapper .blog-med-img-content .post-meta {
    padding-top: 0
}

.blog-medium-image-wrapper .blog-medium-post-img {
    display: inline-block;
    vertical-align: top;
    padding: 0
}

.blog-medium-image-wrapper .blog-med-img-content {
    display: inline-block;
    padding-left: 20px
}

.blog-medium-image-wrapper.no_img .blog-med-img-content {
    width: 100%;
    padding: 0
}

.blog-medium-image-wrapper {
    width: 100%;
    box-sizing: border-box;
    padding-top: 30px;
    padding-bottom: 30px;
    border-top: 1px solid #ededed;
    display: inline-block
}

.blog-medium-image-wrapper:first-child {
    border-top: 0
}

.blog-medium-image-wrapper .entry-header .post-meta {
    padding-bottom: 15px;
    border-bottom: 1px solid #ededed
}

.blog-grid2 .post, .blog-grid3 .post {
    margin-bottom: 60px
}

.blog-grid-masonry {
    margin-bottom: 80px;
    position: relative;
    width: 100%
}

@media screen and (min-width: 768px) {
    .blog-grid-masonry {
        margin-bottom: 80px;
        position: relative;
        margin-right: -15px;
        margin-left: -15px;
        width: 100%;
        width: calc(100% + 30px)
    }

    .blog-grid2 .post {
        margin: 0 15px 30px;
        width: 45%;
        width: calc(50% - 30px)
    }

    .blog-grid3 .post {
        margin: 0 15px 30px;
        width: 30%;
        width: calc(33.33% - 30px)
    }
}

@media screen and (max-width: 480px) {
    .blog-medium-post-img img {
        width: 100%
    }
}

.meta-sep {
    text-align: center;
    padding: 0 3px;
    display: inline-block
}

.format-audio .img-overlay, .post-meta .post-meta-info:first-child .meta-sep, .post-meta .post-meta-info:last-child .meta-sep {
    display: none
}

article.format-link header.link-post-tag {
    padding: 0 .714285714rem;
    float: right;
    font-size: 11px;
    font-size: 1rem;
    line-height: 2.181818182;
    font-weight: 700;
    font-style: italic;
    text-transform: uppercase;
    color: #848484;
    background-color: #fbfbfb;
    border-radius: 3px
}

h1.not-found-title, h3.not-found-desc {
    font-weight: 900;
    margin-top: 50px;
    color: #FFF
}

article.format-link .entry-content a {
    font-size: 2rem;
    line-height: 1.090909091;
    text-decoration: none
}

.single .entry-content {
    margin-bottom: 25px
}

.format-link .entry-summary.imd_quote_post a {
    font-size: 2em
}

.mejs-container {
    margin: 1.7em 0
}

.single-format-aside h1.entry-title {
    margin-top: 14px;
    padding-left: 15px;
    padding-right: 15px
}

.single-format-aside .entry-content {
    padding-left: 15px;
    margin-top: 20px;
    padding-right: 15px
}

.blog-default-wrapper .aside-wrap .entry-title {
    padding-top: 0;
    padding-left: 15px
}

.blog-default-wrapper .aside-wrap .entry-summary {
    padding: 20px 15px
}

.aside-wrap .post-meta {
    margin-left: 15px;
    margin-right: 15px
}

.single-post .imedica-carousel {
    margin-bottom: 25px
}

.blog-default-wrapper .format-gallery h2.entry-title {
    margin-bottom: 30px
}

.blog-default-wrapper .format-gallery .post-thumb {
    margin-bottom: 20px
}

.imd-video-wrapper {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 25px;
    height: 0
}

.imd-video-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%
}

.blog-medium-image-wrapper .imd-video-wrapper iframe {
    position: static;
    width: auto;
    height: auto
}

.search .vc_row {
    margin-left: 0;
    margin-right: 0
}

.archive article, .search article {
    padding: 0
}

.blog-grid2 blockquote, .blog-grid3 blockquote {
    margin: 30px 20px
}

.archive .blog-grid2 article, .search .blog-grid2 article {
    margin: 8px 8px 1em;
    border: 1px solid #DCDDDE;
    padding: 0;
    border-bottom: 4px solid #DCDDDE
}

.archive .blog-grid2 article h2.entry-title, .search .blog-grid2 article h2.entry-title {
    margin: 30px 30px 25px
}

.archive .blog-grid2 article .entry-summary, .search .blog-grid2 article .entry-summary {
    margin: 0 30px;
    border-bottom: 1px solid #DCDDDE;
    padding-bottom: 40px;
    word-wrap: break-word
}

.archive .blog-grid2 article .post-meta, .search .blog-grid2 article .post-meta {
    padding: 20px 30px
}

.archive .blog-grid2 .post-thumb img, .search .blog-grid2 .post-thumb img {
    width: 100%
}

.no-results span.text {
    width: 87%;
    float: left
}

.no-results input#s {
    width: 100%;
    line-height: 1.3em;
    padding: 6px 5px 7px 8px
}

.search header.page-header {
    margin-top: 0;
    border-bottom: 0;
    margin-bottom: 0;
    padding-bottom: 0
}

.sticky {
    display: block
}

.byline, .updated:not(.published) {
    display: none
}

.group-blog .byline, .single .byline {
    display: inline
}

.entry-summary, .page-content {
    margin: 1.5em 0 0
}

.page-links {
    margin: 0 0 1.5em
}

#primary-sidebar .widget:first-child h3, .category-sticky .entry-title {
    margin-top: 0
}

.post-thumb.text-center.imd-featured-thumb {
    overflow: hidden;
    padding: 0
}

.imd-blog-home .category-sticky .read-more-link {
    display: inline-block;
    padding-right: 0
}

.imd-blog-home .category-sticky .post-meta {
    border: none;
    margin-bottom: 0;
    padding-bottom: 10px;
    padding-left: 0;
    padding-top: 25px
}

.blog-default-wrapper .sticky {
    padding: 20px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box
}

.single article.sticky {
    border-bottom: none;
    background: 0 0;
    padding: 0;
    display: block
}

.sticky .entry-summary, .sticky .imd-featured-content {
    padding: 0;
    display: inline-block;
    width: auto
}

.sticky .entry-summary ul {
    margin: 0;
    list-style: none
}

.blog-grid2 .sticky .post-meta, .blog-grid3 .sticky .post-meta {
    border-top: none
}

.post-thumb:hover .img-overlay {
    -webkit-transition: all .2s linear;
    transition: all .2s linear;
    opacity: 1
}

.attachment .post-meta, .single-post .post-meta, .single-post p.post-meta {
    border-bottom: 1px solid #DCDDDE;
    padding-bottom: 25px;
    margin-bottom: 25px
}

.archive div.site-content, .attachment .post-meta:empty, .blog div.site-content, .home div.site-content, .page div.site-content, .search div.site-content, .single div.site-content, .single-post .post-meta:empty, .single-post div.site-content, .single-post p.post-meta:empty, .site-content {
    padding: 0
}

.single-post .entry-title, 
.single-post .entry-title, 
.single-post .imedica-comments-title, 
.single-post #reply-title {
    margin-top: 1.3em;
    margin-bottom: .6em;
    -ms-word-wrap: break-word;
    word-wrap: break-word;
    font-family: <?php echo $vars['h2-heading-font-family'] ?>;
    font-size: <?php echo $vars['h2-heading-font-size'] ?>;
    line-height: <?php echo $vars['h2-heading-line-height'] ?>;
    margin-bottom: 10px;
    font-weight: <?php echo $vars['h2-heading-font-weight'] ?>;
}

time.entry-date {
    font-weight: 300
}

.single-post .post-content img {
    margin-bottom: 20px
}

.not-found-title {
    height: 150px;
    line-height: 200px;
    font-size: 130px
}

.not-found-desc {
    height: 30px;
    line-height: 10px;
    font-size: 30px
}

.imd-404-block-container {
    margin: 30px 0
}

.entry-title-404 {
    display: inline-block;
    margin: 20px 0
}

.entry-content-404 {
    margin-bottom: 50px
}

.entry-content-404 form#searchform button.button.search-submit {
    left: -4px;
    top: 0;
    position: relative;
    height: 34px;
    width: 10%
}

.error404 .search {
    width: 80%;
    margin: 0 auto
}

.entry-content-404 span.text {
    width: calc(100% - 40px);
    float: left
}

.entry-content-404 form#searchform {
    width: 60%;
    margin: 0 auto;
    text-align: center
}

@media screen and (max-width: 480px) {
    .imd-404-block {
        font-size: 136px;
        font-size: 32vw
    }

    .imd-404-block p {
        font-size: 28px;
        font-size: 9vw
    }
}

.imd_quote_post.entry-summary {
    margin-bottom: 20px
}

.blog-default-wrapper .format-quote .entry-summary:after, .blog-grid2 .format-quote .entry-summary:after, .blog-grid3 .format-quote .entry-summary:after {
    content: "\f10d";
    font-family: FontAwesome;
    top: 0;
    left: 0;
    position: absolute;
    font-size: 50px;
    color: #F7F7F7;
    font-style: italic;
    z-index: -1
}

.blog-default-wrapper .format-quote .entry-summary, .blog-grid2 .format-quote .entry-summary, .blog-grid3 .format-quote .entry-summary {
    position: relative;
    z-index: 1;
    padding-left: 40px;
    padding-top: 20px;
    font-style: italic
}

.blog-default-wrapper .format-quote blockquote, .blog-grid2 .format-quote blockquote, .blog-grid3 .format-quote blockquote {
    margin: 0;
    padding: 0;
    border: none;
    color: inherit;
    font-size: inherit;
    font-style: inherit
}

.blog-default-wrapper .format-quote blockquote:after, .blog-default-wrapper .format-quote blockquote:before, .blog-grid2 .format-quote blockquote:after, .blog-grid2 .format-quote blockquote:before, .blog-grid3 .format-quote blockquote:after, .blog-grid3 .format-quote blockquote:before {
    content: none
}

.imedica-justified-grid-gallery {
    max-height: 260px;
    overflow: hidden;
    display: block
}

.page .imedica-justified-grid-gallery, .single .imedica-justified-grid-gallery {
    height: auto;
    max-height: 100%;
    overflow: visible;
    display: block;
    margin-bottom: 30px
}

.imedica-grid-gallery, .imedica-grid-gallery * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box
}

.imedica-grid-gallery a {
    display: inline-block;
    float: left;
    padding: 2px;
    width: 33.33%;
    position: relative;
    overflow: hidden
}

.imedica-grid-gallery img {
    width: 100%;
    margin: 0 !important;
    padding: 0;
    max-width: 100%
}

.imedica-grid-gallery a:hover .imedica-grid-img-caption {
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    transform: translateY(0)
}

.related-post-thumbnail + .related-post-title {
    display: inline-block;
    float: left;
    width: 65%;
    width: calc(100% - 85px)
}

.imedica-grid-gallery .imedica-grid-img-caption {
    position: absolute;
    left: 2px;
    bottom: 0;
    margin: 0;
    padding: 0;
    font-size: 12px;
    line-height: 1.9em;
    width: 100%;
    width: calc(100% - 4px);
    color: #fff;
    background: rgba(0, 0, 0, .6);
    -webkit-transform: translateY(100%);
    -moz-transform: translateY(100%);
    transform: translateY(100%);
    -webkit-transition: -webkit-transform 300ms linear;
    -moz-transition: -moz-transform 300ms linear;
    transition: transform 300ms linear
}

.header-fixed-left, .header-fixed-right {
    background: #d5d5d5;
    position: fixed !important
}

.imedica-grid-column-1 a {
    width: 100%
}

.imedica-grid-column-2 a {
    width: 50%
}

.imedica-grid-column-3 a {
    width: 33.33%
}

.imedica-grid-column-4 a {
    width: 25%
}

.imedica-grid-column-5 a {
    width: 20%
}

.imedica-grid-column-6 a {
    width: 16.66%
}

.imedica-grid-column-7 a {
    width: 14.28%
}

.imedica-grid-column-8 a {
    width: 12.5%
}

.imedica-grid-column-9 a {
    width: 11.11%
}

.imedica-grid-column-1 a:nth-child(1n+1), .imedica-grid-column-2 a:nth-child(2n+1), .imedica-grid-column-3 a:nth-child(3n+1), .imedica-grid-column-4 a:nth-child(4n+1), .imedica-grid-column-5 a:nth-child(5n+1), .imedica-grid-column-6 a:nth-child(6n+1), .imedica-grid-column-7 a:nth-child(7n+1), .imedica-grid-column-8 a:nth-child(8n+1), .imedica-grid-column-9 a:nth-child(9n+1) {
    clear: left
}

.imedica-grid-column-1 a:nth-child(1n+0), .imedica-grid-column-2 a:nth-child(2n+0), .imedica-grid-column-3 a:nth-child(3n+0), .imedica-grid-column-4 a:nth-child(4n+0), .imedica-grid-column-5 a:nth-child(5n+0), .imedica-grid-column-6 a:nth-child(6n+0), .imedica-grid-column-7 a:nth-child(7n+0), .imedica-grid-column-8 a:nth-child(8n+0), .imedica-grid-column-9 a:nth-child(9n+0) {
    clear: right;
    margin-right: 0 !important
}

.related-posts {
    display: inline-block;
    width: 100%
}

.related-posts-items {
    margin-left: -15px;
    margin-right: -15px
}

.related-posts-items a {
    display: block;
    float: left;
    clear: both;
    margin-bottom: 15px;
    width: 100%
}

.related-posts-item:nth-child(2n+1) {
    clear: left
}

.related-posts-item:nth-child(2n+0) {
    clear: right;
    margin-right: 0 !important
}

.related-post-thumbnail {
    display: inline-block;
    float: left;
    margin-right: 5px;
    width: 80px
}

.related-post-title {
    width: 100%
}

.related-post-title span {
    display: inherit;
    font-size: 13px;
    color: #8c99a9
}

.header-search.header2-search .search, .imd-author-meta, .imedica-sharing-links, .imedica-sharing-title {
    display: inline-block
}

.imd-author-meta {
    padding: 0 0 35px;
    border-bottom: 1px solid #eee;
    margin-top: 60px;
    margin-bottom: 25px
}

.about-author, .related-posts-title {
    padding: 0;
    margin-bottom: 30px
}

.post-author-avatar {
    padding: 0;
    margin-bottom: 20px
}

.post-author-bio {
    padding: 0 0 0 15px;
    margin-bottom: 20px
}

.imedica-social-sharing {
    background: #FBFBFB;
    padding: 15px;
    border: 1px solid #F0F0F0;
    margin-top: 60px
}

.imedica-sharing-title {
    font-size: 15px;
    font-weight: 600;
    margin: 15px 0;
    line-height: 30px
}

.imedica-social-sharing a {
    width: 42px;
    font-size: 24px;
    display: inline-block;
    text-align: center;
    margin: 3px 0
}

.imedica-sharing-links {
    margin: 15px 0
}

.header-layout2 .site-title {
    width: 100%
}

.header-default .site-heading a img {
    max-width: 99%
}

.header-fixed-left {
    left: 0;
    height: 100%
}

.header-fixed-right {
    right: 0;
    height: 100%
}

.theme-showcase.content-fixed-left {
    position: absolute;
    left: 25%
}

.theme-showcase.content-fixed-right {
    position: absolute;
    right: 25%
}

.header-layout1 .header-logo-center, .header-layout1 nav#primary-navigation {
    padding: 0
}

.header-layout2 {
    height: auto
}

@media screen and (max-width: 783px) {
    .header-layout2 .header-search {
        display: none
    }

    .header-logo-left.col-md-4.text-left {
        padding: 20px 0
    }
}

.imd-contact-info-wrap ul.imd-contact-info {
    list-style: none;
    display: block;
    margin: 0;
    padding: 0
}

.imd-contact-info-wrap ul.imd-contact-info li {
    display: inline-block;
    padding: 0 15px 0 3px
}

.imd-contact-info i {
    padding-right: 5px
}

.imd-full-layout .navbar-default .imd-contact-info-wrap {
    padding: 0
}

.theme-showcase .page-title-overlay:after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: inherit;
    opacity: inherit;
    top: 0
}

.imedica-title-sep:after, .imedica-title-sep:before {
    height: 1px;
    width: 12%;
    content: ""
}

.imedica-title-sep {
    height: 30px;
    line-height: 30px;
    margin-top: 15px;
    margin-bottom: 15px
}

.imedica-title-sep i {
    font-size: 20px;
    height: 20px;
    width: 20px;
    line-height: 32px
}

.imedica-title-sep:after {
    border: 1px solid;
    position: absolute;
    top: 50%;
    right: 37%
}

.imedica-title-sep:before {
    border: 1px solid;
    position: absolute;
    top: 50%;
    left: 37%
}

.imd-box-layout .imedica-breadcrumb, .imd-box-layout .imedica-title {
    padding: 0
}

.imd-pagetitle-container {
    line-height: 2.6em
}

.breadcrumbs .breadcrumb {
    padding: 0;
    margin: 0;
    font-size: 0;
    background: 0 0
}

.breadcrumbs .breadcrumb a {
    color: #424242;
    text-decoration: none;
    font-size: 16px;
    position: relative;
    z-index: 2;
    font-weight: 400
}

.breadcrumb > .active, .breadcrumbs .breadcrumb .active a {
    color: #de4a32
}

.mobile-top-menu .imedica-top-navigation.top-menu-toggled-on {
    margin-left: -15px;
    margin-right: -15px
}

.widget > ul {
    margin: 0
}

.widget-area .widget_nav_menu ul.sub-menu li a:before {
    border: none
}

.widget_search .search-submit {
    display: none
}

.widget-area .widget_search .search-submit {
    display: block;
    float: left;
    width: 35px;
    line-height: .7em;
    height: 35px;
    padding: 0
}

.widget-area .search span.text input.imd-search {
    line-height: 1.4em;
    margin: 0;
    padding-bottom: 9px;
    width: 100%
}

.widget-area span.text {
    width: calc(100% - 35px);
    float: left
}

aside.widget ul li > a {
    display: inline-block
}

ul#recentcomments {
    margin: 0;
    list-style: none
}

li.recentcomments span, ul.recentcomments > li.recentcomments > a li.recentcomments > a {
    clear: both
}

.recentcomments a:before {
    content: "\f105";
    font-family: FontAwesome;
    font-weight: 400;
    border-width: 1px;
    border-style: solid;
    border-radius: 50%;
    text-align: center;
    font-size: 15px;
    width: 20px;
    height: 20px;
    padding-left: 1px;
    line-height: 17px;
    margin-right: 10px;
    -webkit-transition: .3s;
    -moz-transition: .3s;
    -ms-transition: .3s;
    -o-transition: .3s;
    transition: .3s;
    color: @imedica-theme-color;
    border-color: @imedica-theme-color;
    display: inline-block
}

#secondary ul.social-profiles li:before, .imedica-footer-area .widget-area ul li > a:before {
    content: none
}

aside.widget ul .recentcomments > a {
    margin-left: 0
}

ul#recentcomments li {
    margin-bottom: 10px
}

.imedica-footer-area li.recentcomments span {
    margin-left: 0 !important
}

#secondary ul li.recentcomments > a {
    padding-left: 30px !important;
    margin-left: 0 !important;
    word-break: break-word;
    clear: both;
    display: block !important
}

#secondary ul li {
    padding: .7em 0;
    border-bottom-width: 1px;
    border-bottom-style: solid
}

#secondary ul li:last-child {
    border-bottom: none
}

h3.widget-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    margin-top: 0;
    padding: 0;
    line-height: 1.4em
}

div.widget-area ul {
    list-style: none
}

div.widget-area ul li ul.children {
    margin-left: 18px;
    margin-bottom: 0;
    margin-top: 5px
}

#secondary ul.social-profiles li {
    display: inline-block;
    border: none;
    padding: 0;
    margin: 5px
}

#secondary ul.social-profiles li a {
    margin: 0
}

#secondary ul.social-profiles li a i {
    border: 1px solid;
    border-radius: 2px;
    height: 2em;
    width: 2em;
    line-height: 2em;
    text-align: center
}

#secondary ul.social-profiles li a i:hover {
    color: #fff;
    -webkit-transition: all .25s ease-in-out;
    -moz-transition: all .25s ease-in-out;
    -ms-transition: all .25s ease-in-out;
    -o-transition: all .25s ease-in-out;
    transition: all .25s ease-in-out
}

#secondary ul.social-profiles li a .fa-google-plus {
    color: red
}

#secondary ul.social-profiles li a .fa-google-plus:hover {
    background: red;
    border: 1px solid red
}

#secondary ul.social-profiles li a .fa-rss {
    color: #f60
}

#secondary ul.social-profiles li a .fa-rss:hover {
    background: #f60;
    border: 1px solid #f60
}

#secondary ul.social-profiles li a .fa-linkedin {
    color: #069
}

#secondary ul.social-profiles li a .fa-linkedin:hover {
    background: #069;
    border: 1px solid #069
}

#secondary ul.social-profiles li a .fa-facebook {
    color: #3b5997
}

#secondary ul.social-profiles li a .fa-facebook:hover {
    background: #3b5997;
    border: 1px solid #3b5997
}

#secondary ul.social-profiles li a .fa-twitter {
    color: #00aced
}

#secondary ul.social-profiles li a .fa-twitter:hover {
    background: #00aced;
    border: 1px solid #00aced
}

#secondary ul.social-profiles li a .fa-instagram {
    color: #36658c
}

#secondary ul.social-profiles li a .fa-instagram:hover {
    background: #36658c;
    border: 1px solid #36658c
}

#secondary ul.social-profiles li a .fa-flickr {
    color: #FF0080
}

#secondary ul.social-profiles li a .fa-flickr:hover {
    background: #FF0080;
    border: 1px solid #FF0080
}

#secondary ul.social-profiles li a .fa-reddit {
    color: #76BBFF
}

#secondary ul.social-profiles li a .fa-reddit:hover {
    background: #76BBFF;
    border: 1px solid #76BBFF
}

#secondary ul.social-profiles li a .fa-digg {
    color: #000
}

#secondary ul.social-profiles li a .fa-digg:hover {
    background: #000;
    border: 1px solid #000
}

#secondary ul.social-profiles li a .fa-github {
    color: #333
}

#secondary ul.social-profiles li a .fa-github:hover {
    background: #333;
    border: 1px solid #333
}

#secondary ul.social-profiles li a .fa-vk {
    color: #4C75A3
}

#secondary ul.social-profiles li a .fa-vk:hover {
    background: #4C75A3;
    border: 1px solid #4C75A3
}

#secondary ul.social-profiles li a .fa-youtube {
    color: #E52C27
}

#secondary ul.social-profiles li a .fa-youtube:hover {
    background: #E52C27;
    border: 1px solid #E52C27
}

#wp-calendar, #wp-calendar caption, #wp-calendar td, #wp-calendar th {
    border: 1px solid #ddd
}

.site-footer ul.social-profiles {
    margin: 0;
    padding: 0;
    list-style: none
}

.site-footer ul.social-profiles li {
    list-style: none;
    display: inline-block;
    margin: 0;
    padding: 0
}

.site-footer .social-profiles li a {
    margin: 0;
    padding: 0
}

.site-footer .imd_address .address-meta {
    display: inline-block;
    padding: 0
}

.site-footer .widget-address, 
.site-footer .address-meta {
    color: <?php echo $vars['footer-color-main']; ?>;
}

.site-footer .imd_address .icon-wrap {
    padding: 0
}

.site-footer .imd_address .col-xs-12 {
    color: #bcbec0;
    line-height: 1.5em;
    padding: 0 0 12px
}

.widget select {
    width: 100%;
    height: 35px
}

#wp-calendar caption {
    text-align: center;
    padding: 10px;
    margin: 0;
    background: #f7f7f7;
    border-bottom: 0
}

#wp-calendar td, #wp-calendar th {
    padding: 10px;
    text-align: center;
    border-top: 0;
    border-right: 0
}

#wp-calendar {
    border-bottom: 0;
    border-left: 0
}

.site-footer h3.widget-title {
    font-size: 15px;
    font-weight: 600;
    color: #e6e7e8;
    line-height: 2.3em;
    text-transform: uppercase;
    width: 100%;
    margin: 0;
}

.site-footer aside:first-child h3.widget-title {
    margin-bottom: 40px;
}

.recent-post-title {
    display: inline-block;
    float: left;
    width: 100%
}

.recent-post-thumbnail + .recent-post-title {
    width: 65%;
}

.recent-post-thumbnail {
    display: inline-block;
    float: left;
    margin-right: 5px;
    width: 80px;
    max-width: 30%
}

.recent-posts-items a {
    display: block;
    float: left;
    clear: both;
    margin-bottom: 15px;
    width: 100%
}

.imedica_recent_posts ul li {
    width: 100%;
    padding: 0
}

li.recent-post-item .post-content {
    display: inline-block;
    width: 80%
}

div.imedica_recent_posts ul li:before {
    content: "";
    display: none
}

.imedica_recent_posts ul li > span, .widget.flickr {
    display: block
}

.imedica_recent_posts ul li a > img {
    margin-right: 10px;
    width: 80px;
    height: 80px
}

span.post-date {
    padding-left: 8px
}

.post-title-grid {
    font-size: 16px;
    margin-bottom: 0
}

.post-meta-grid {
    padding-bottom: 0;
    font-size: 14px
}

.widget_pages ul li {
    line-height: 1.8em
}

.widget.flickr .flickr_badge_image {
    margin: 0 8px 10px 0;
    width: 72px;
    height: 72px;
    background: 0 0;
    padding: 0;
    display: inline-block;
    float: none
}

.flickr_badge_image {
    float: none !important;
    display: inline-block;
    margin: 0 5px 5px 0
}

.imd-tabber-widget ul.imd-tabber-header {
    margin: 0;
    overflow: auto
}

.imd-tabber-widget ul.imd-tabber-header li {
    list-style: none;
    float: left;
    padding: 0 !important;
    border: none !important
}

.imd-tabber-widget ul.imd-tabber-header li a {
    display: block;
    text-decoration: none !important;
    margin: 1px 1px 1px 0;
    font-size: 13px
}

.main-navigation a, .service-box a, .site-navigation a:hover {
    text-decoration: none
}

.imd-tabber-widget ul.imd-tabber-header li a:hover {
    cursor: pointer
}

.imd-tabber-widget div.widget {
    clear: left;
    padding: 5px 10px;
    margin-bottom: 1em
}

.imd-tabber-widget div.widget ul {
    margin: 0 0 1em
}

.imd-tabber-widget div.imd-st-tab {
    padding: 5px 10px
}

.imd-tabber-widget ul.imd-tabber-header li a {
    color: #FFF;
    padding: 15px 20px;
    background: #C7C8CA;
    -webkit-transform: translateZ(0);
    -webkit-transition: .3s;
    -moz-transition: .3s;
    -ms-transition: .3s;
    -o-transition: .3s;
    transition: .3s;
    margin-bottom: 0
}

.imd-tabber-widget div.imd-st-tab {
    background-color: transparent
}

.imd-tabber-widget ul.imd-tabber-header li:before {
    content: "" !important;
    border: none !important;
    margin: 0 !important;
    padding: 0 !important
}

.wpb_tour .wpb_tabs_nav li.ui-tabs-active > a:after, .wpb_tour .wpb_tabs_nav li.ui-tabs-active > a:before {
    margin-top: -23px;
    height: 0;
    position: absolute;
    width: 0;
    left: 100%;
    content: " "
}

.imd-tabber-widget ul.imd-tabber-header li:hover:before {
    background: 0 0 !important;
    color: transparent
}

.widget a.tt_upcoming_events_event_container {
    margin: 0
}

.widget .tt_upcoming_events, .widget .tt_upcoming_events li {
    width: auto !important
}

.widget .tt_upcoming_events li .tt_upcoming_events_event_container .tt_upcoming_events_hours {
    display: inline-block
}

h3.wpb_accordion_header.ui-accordion-header.ui-accordion-icons i.accrdn-icon {
    width: 2.65em;
    height: 100%;
    text-align: center;
    font-size: inherit;
    color: #FFF;
    float: left;
    position: absolute;
    border-right: 1px solid #dcddde;
    transition: all .2s ease-in-out
}

.ultimate-accordion-title {
    position: relative
}

.imedica-row .wpb_accordion .wpb_accordion_wrapper .ui-icon {
    background: 0 0 !important;
    position: absolute;
    top: 50% !important;
    -webkit-transform: translatey(-50%);
    -ms-transform: translatey(-50%);
    transform: translatey(-50%)
}

.accrdn-icon:before {
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
       -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
         -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    position: absolute
}

span.ui-accordion-header-icon.ui-icon.ui-icon-triangle-1-e:before {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    text-rendering: normal
}

span.ui-accordion-header-icon.ui-icon.ui-icon-triangle-1-s:before {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    text-rendering: normal;
    color: #FFF
}

.wpb_accordion_content.ui-accordion-content.vc_clearfix.ui-helper-reset.ui-widget-content.ui-corner-bottom.ui-accordion-content-active {
    overflow: hidden;
}

.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_content, .wpb_content_element .wpb_tour_tabs_wrapper .wpb_tab {
    padding: 0 1em
}

.wpb_content_element .wpb_accordion_header a, .wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav a {
    padding: 0
}

span.ui-accordion-header-icon.ui-icon.ui-icon-triangle-1-e:before, span.ui-accordion-header-icon.ui-icon.ui-icon-triangle-1-s:before {
    font-family: imedica-extra-fonts;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
       -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
         -o-transform: translateY(-50%);
            transform: translateY(-50%);
    font-size: 16px
}

.pricetable-link, .service-box a, .service-title {
    text-transform: capitalize
}

#content .wpb_content_element .wpb_tabs_nav {
    background-color: #fff
}

.imedica-container .wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav a {
    display: inline
}

.wpb_tour li.ui-state-default.ui-corner-top i.tabs-icon {
    width: 42px;
    line-height: 42px;
    text-align: center;
    font-size: 24px;
    color: #107fc9;
    margin-right: 5px;
    position: absolute;
    height: 42px;
    left: 0;
    transition: all .2s ease-in-out
}

.wpb_tour li.ui-state-default.ui-corner-top:hover i.tabs-icon {
    color: white;
}

.wpb_tour .imd_mainlink span.imd_link {
    -webkit-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out
}

.wpb_tour li.ui-state-default.ui-corner-top a.ui-tabs-anchor {
    padding: 0 0 0 45px;
    height: auto;
    line-height: 42px;
    position: relative;
    white-space: pre-wrap;
    display: block
}

.wpb_tour .wpb_tabs_nav li {
    margin: 0;
    border-left: 1px solid #e0e1e2;
    border-top: 1px solid #e0e1e2
}

.wpb_tour .wpb_tabs_nav li:last-child {
    border-bottom: 1px solid #e0e1e2
}

.wpb_tour .wpb_tabs_nav li.ui-tabs-active {
    border-right: none
}

.wpb_tour .wpb_tabs_nav li.ui-tabs-active > a:after {
    top: 50%;
    border: solid transparent;
    pointer-events: none;
    border-color: rgba(136, 183, 213, 0);
    border-left-color: #F7F7F7;
    border-width: 22px 21px 24px 14px
}

.wpb_tour .wpb_tabs_nav li.ui-tabs-active > a:before {
    top: 50%;
    border: solid transparent;
    pointer-events: none;
    border-color: rgba(136, 183, 213, 0);
    border-left-color: #757575;
    border-width: 22px 15px 24px 14px
}

.wpb_tour .wpb_tour_tabs_wrapper .wpb_tab, .wpb_tour_next_prev_nav {
    padding-left: 42px
}

i.Defaults-angle-right.tabs-icon:before {
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%)
}

.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav a {
    padding: 0 10px;
    height: 42px;
    line-height: 42px
}

.wpb_tabs .wpb_tour_tabs_wrapper .wpb_tabs_nav a > i.tabs-icon {
    font-size: 18px;
    line-height: 42px;
    padding-right: 5px
}

/*Removed for widget title support*/
/*.wpb_tabs .wpb_wrapper.wpb_tour_tabs_wrapper.ui-tabs {
    border: 1px solid #dcddde
}*/

.wpb_tabs .wpb_wrapper.wpb_tour_tabs_wrapper.ui-tabs ul.wpb_tabs_nav.ui-tabs-nav {
    border-bottom: 1px solid #dcddde
}

.wpb_tabs.wpb_content_element .wpb_tab.ui-tabs-panel {
    background-color: inherit
}

.team-member-position {
    line-height: 1.6em;
    font-size: 14px;
    padding-bottom: 8px
}

.team-member-description {
    padding-top: 8px;
    line-height: 1.4em;
    font-size: 13px
}

.team-member-name-wrap {
    width: 85%;
    margin-left: auto;
    margin-right: auto
}

.team-member-border-bottom {
    border-bottom: 1px solid #DCDDDE;
    width: 100%;
    height: 1px;
    display: block;
    padding: 3px 0
}

.team-member-image.team_img_hover {
    position: relative;
    transition: all .2s linear
}

.imedica-counter-elements, .imedica-counter-elements * {
    box-sizing: border-box;
    -webkit-box-sizing: border-box
}

.imedica-counter-spacer {
    margin: 0 auto;
    padding: 0;
    position: relative;
    overflow: hidden
}

.imedica-counter-line {
    display: block;
    width: 100%;
    max-width: 100%;
    margin: 0 auto
}

.imedica-counter-elements {
    padding-bottom: 30px
}

.imedica-counter-elements .imedica-counter-value {
    color: #414042;
    padding: 0 15px
}

.imedica-counter-elements .imedica-counter-label {
    color: #676669
}

.imedica-counter-box {
    margin: auto;
    display: block;
    width: 100%;
    text-align: center
}

.imedica-counter-label {
    line-height: 1.8em;
    width: 100%;
    color: #ededed;
    font-size: 18px;
    text-align: center;
    padding-top: 5px;
    padding-left: 0
}

.imedica-counter-value {
    line-height: 1.3em;
    width: 100%;
    color: #fff;
    font-size: 60px;
    text-align: center;
    padding-left: 0
}

.imedica-call-to-action-wrapper, .imedica-call-to-action-wrapper * {
    box-sizing: border-box;
    -webkit-box-sizing: border-box
}

.imedica-call-to-action-wrapper {
    position: relative
}

.imedica_margin_fix .imedica-call-to-action-wrapper {
    margin-bottom: 35px
}

.imedica-call-to-action-wrapper:after {
    background-image: none;
    background-repeat: no-repeat;
    width: 100%;
    content: "";
    opacity: .6;
    height: 36px;
    background-position: top;
    position: absolute;
    background-size: contain
}

.imedica-call-to-action .imedica-call-to-action-header .imedica-call-to-action-title {
    font-size: 30px;
    margin-top: 20px;
    margin-bottom: 10px;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1
}

.imedica-call-to-action-description p {
    color: inherit;
    line-height: inherit;
    font-size: inherit
}

.imedica-call-to-action .imedica-call-to-action-description {
    padding-top: 10px;
    color: #6d6d6d;
    font-size: 16px;
    margin: 0 0 10px;
    line-height: 1.4em
}

.imedica-call-to-action-style2 {
    margin: 0;
    padding: 20px 15px;
    display: block;
    position: relative;
    overflow: hidden;
    height: 100%;
    width: 100%
}

.imedica-call-to-action-style2 .imedica-call-to-action {
    display: inline-block;
    float: left;
    margin: 10px 0;
    padding: 0 15px
}

.imedica-call-to-action-style2 .imedica-btn-wrapper {
    margin: 10px 0;
    padding: 0 15px;
    font-family: inherit
}

.imedica-call-to-action-style2 .imedica-btn-wrapper a.imedica-btn {
    margin-right: 0
}

.imedica-call-to-action-style2 .imedica-call-to-action-description {
    margin: 0;
    padding: 0;
    line-height: inherit
}

.imedica-call-to-action-style2 .imedica-call-to-action-description p {
    margin: 0;
    padding: 0;
    line-height: 1.2em
}

.imedica-call-to-action-style2 i.imedica-icon.imedica-icon-right {
    margin-left: 5px
}

.imedica-btn-wrapper, .imedica-btn-wrapper * {
    box-sizing: border-box;
    -webkit-box-sizing: border-box
}

.imedica-btn-wrapper {
    height: 100%;
    padding: 0 0 15px;
    text-align: center
}

.imedica_margin_fix .imedica-btn-wrapper {
    padding: 0;
    margin-bottom: 35px
}

.imedica-btn-wrapper .imedica-btn .imedica-icon {
    color: #fff;
    font-size: 14px
}

.imedica-btn-wrapper .imedica-btn .imedica-icon-left {
    margin-right: 10px
}

.imedica-btn-wrapper .imedica-btn .imedica-icon-right {
    margin-left: 0
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-tiny {
    padding: 2px 6px;
    font-size: 9px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-tiny .imedica-icon {
    font-size: 9px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-small {
    padding: 3px 8px;
    font-size: 11px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-small .imedica-icon {
    font-size: 11px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-medium {
    padding: 7px 11px;
    font-size: 12px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-medium .imedica-icon {
    font-size: 12px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-large {
    padding: 9px 18px;
    font-size: 14px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-large .imedica-icon {
    font-size: 14px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right i.imedica-icon {
    position: absolute;
    color: #fff;
    -webkit-transition: all .3s;
    -moz-transition: all .3s;
    transition: all .3s;
    opacity: 0
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-large {
    padding: 9px 25px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-large i.imedica-icon {
    top: 5px;
    font-size: 90%;
    line-height: inherit;
    right: -30px;
    opacity: 0
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-large:hover {
    padding: 9px 35px 9px 15px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-large:hover .imedica-icon-right {
    right: 10px;
    opacity: 1
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-medium {
    padding: 7px 20px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-medium i.imedica-icon {
    top: 1px;
    line-height: 32px;
    right: -30px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-medium:hover {
    padding: 7px 28px 7px 12px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-medium:hover .imedica-icon-right {
    right: 10px;
    opacity: 1
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-small {
    padding: 3px 18px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-small i.imedica-icon {
    top: 1px;
    line-height: 22px;
    right: -30px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-small:hover {
    padding: 3px 26px 3px 10px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-small:hover .imedica-icon-right {
    right: 10px;
    opacity: 1
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-tiny {
    padding: 2px 14px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-tiny i.imedica-icon {
    top: 1px;
    line-height: 17px;
    right: -30px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-tiny:hover {
    padding: 2px 22px 2px 6px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-right.imedica-btn-tiny:hover .imedica-icon-right {
    right: 7px;
    opacity: 1
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left i.imedica-icon {
    position: absolute;
    color: #fff;
    -webkit-transition: all .3s;
    -moz-transition: all .3s;
    transition: all .3s;
    opacity: 0
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-large {
    padding: 9px 25px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-large i.imedica-icon {
    font-size: 90%;
    line-height: 32px;
    left: -30px;
    opacity: 0;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%)
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-large:hover {
    padding: 9px 5px 9px 45px;
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-large:hover .imedica-icon-left {
    left: 1%;
    opacity: 1
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-medium {
    padding: 7px 20px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-medium i.imedica-icon {
    top: 1px;
    line-height: 32px;
    left: -30px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-medium:hover {
    padding: 7px 12px 7px 28px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-medium:hover .imedica-icon-left {
    left: 10px;
    opacity: 1
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-small {
    padding: 3px 18px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-small i.imedica-icon {
    top: 1px;
    line-height: 22px;
    left: -30px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-small:hover {
    padding: 3px 10px 3px 26px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-small:hover .imedica-icon-left {
    left: 10px;
    opacity: 1
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-tiny {
    padding: 2px 14px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-tiny i.imedica-icon {
    top: 1px;
    line-height: 17px;
    left: -30px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-tiny:hover {
    padding: 2px 6px 2px 22px
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-animate-left.imedica-btn-tiny:hover .imedica-icon-left {
    left: 7px;
    opacity: 1
}

.imedica_col-md-3 {
    width: 100%;
    float: left;
    margin-bottom: 120px
}

.imedicapricetabmain .imedica_col-md-3 {
    margin-bottom: 60px
}

.imedicapricetabmain {
    margin-left: -15px;
    margin-right: -15px;
    margin-top: 115px;
    display: inline-block;
}

.imedica_margin_fix .imedicapricetabmain {
    margin-bottom: 35px;
}

.imedica-container .wpb_column:first-child .imedicapricetabmain {
    margin-left: 0
}

.imedica-container .wpb_column:last-child .imedicapricetabmain {
    margin-right: 0
}

.price-table {
    border: 1px solid #F5F5F5;
    float: left;
    border-bottom: none
}

.price-table p {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit
}

.price-figure img {
    float: left;
    position: absolute;
    top: 26px;
    left: 100px
}

.price-plan {
    width: 100%;
    text-align: center;
    line-height: 30px;
    padding: 10px 0;
    border-bottom: 1px solid #F5F5F5;
    box-shadow: 0 7px 11px -5px #d7d3d3;
    position: relative
}

.price-table-wrap {
    margin: 115px 0
}

.price-plan-title {
    font-size: 22px;
    font-weight: 700;
    color: #58595b;
    line-height: 1.3em
}

.iprice-span {
    color: #8C99A9;
    font-size: 12px;
    font-weight: 700;
    margin-top: 10px;
    margin-bottom: 10px
}

.price-table ul {
    margin: 0;
    padding: 0
}

.price-table li:nth-child(odd) {
    background: #F7F7F7
}

.price-table li:nth-child(even) {
    background: #fff
}

.price-table a {
    line-height: 51px;
    font-size: 20px !important;
    float: left;
    color: #FFF;
    text-align: center;
    width: 100%
}

.price-table li {
    width: 100%;
    float: left;
    border-bottom: 1px solid #f5f5f5;
    color: inherit;
    font-size: inherit;
    line-height: inherit;
    padding: 10px 15px;
    text-align: inherit;
    font-family: inherit;
    list-style-type: none;
    margin: 0
}

.price-semi-circle {
    position: absolute;
    bottom: -6px;
    left: 20px;
    height: 44px;
    width: 87px;
    border-radius: 90px 90px 87px 87px;
    -moz-border-radius: 90px 90px 87px 87px;
    -webkit-border-radius: 90px 45px;
    background: #fff;
    border-top: 21px solid #0d67a3
}

.price-table.price-table-big li {
    line-height: inherit;
    padding: 15px;
    text-align: inherit
}

.price-table.iprice-no-right-border li {
    line-height: inherit;
    padding: 10px 15px;
    text-align: inherit
}

.price-table-desc li:nth-child(odd) {
    background: #f6f6f6;
    moz-box-shadow: inset -20px 0 22px -20px #eee;
    -webkit-box-shadow: inset -20px 0 22px -20px #eee;
    -moz-box-shadow: inset -20px 0 22px -20px #eee;
    box-shadow: inset -20px 0 22px -20px #eee
}

.price-table-desc li:nth-child(even) {
    background: #fbfbfb;
    moz-box-shadow: inset -20px 0 22px -20px #eee;
    -moz-box-shadow: inset -20px 0 22px -20px #eee
}

.price-table-desc .imd-price-wrap .price-plan {
    moz-box-shadow: inset -20px 0 22px -20px #eee;
    -moz-box-shadow: inset -20px 0 22px -20px #eee
}

.price-table.price-table-desc:hover {
    background: inherit !important
}

.price-table:hover, .price-table:hover .price-semi-circle {
    background: #f7f7f7 !important
}

.price-table:hover .price-figure, .price-table:hover span.pricetable-link a {
    background-color: #109DD1
}

.price-figure, .price-table a {
    transition: all .2s ease-in-out
}

.futurebox .icon-box-back2, .icon-box-3, .icon-box-3.stop:hover, .icon-boxwrap2 {
    transition: all .5s ease 0s
}

.price-figure {
    font-size: 40px;
    font-weight: 300
}

@media (max-width: 767px) {
    .imedicapricetabmain {
        margin-left: 0;
        margin-right: 0
    }

    .imedicapricetabmain .price-table {
        width: 100%;
        max-width: 100%;
        box-shadow: none;
        margin: 0 auto
    }
}

.futurebox {
    width: 100%;
    float: left
}

.icon-box-3 {
    width: 100%;
    border-radius: 0;
    float: left;
    padding-bottom: 20px;
    border: 1px solid #eee
}

.icon-boxwrap2 {
    margin: 20px auto 0;
    border-radius: 100%;
    height: 67px;
    width: 67px;
    float: none;
    -webkit-transform: rotate(-40deg);
    transform: rotate(-40deg);
    -webkit-transform-origin: center center 0;
    transform-origin: center center 0
}

.futurebox .icon-box-back2 {
    color: #FFF;
    line-height: inherit;
    text-align: center;
    font-size: inherit;
    background: none;
    height: 2em;
    width: 2em;
    margin: auto;
    float: left;
    -webkit-transform: rotate(40deg);
    transform: rotate(40deg);
    -webkit-transform-origin: center center 0;
    transform-origin: center center 0
}

.icon-boxwrap2.stop {
    -webkit-transform: rotate(0);
    transform: rotate(0);
    margin: -30px auto 0;
    height: 2em;
    width: 2em;
    line-height: 2em;
    -webkit-transform: scale(1);
    transform: scale(1)
}

.icon-box-3.stop:hover {
    background: #FEFEFE;
    border: 1px solid #EEE
}

.icon-box-3:hover .icon-box-back2.stop {
    -webkit-transform: rotate(0);
       -moz-transform: rotate(0);
        -ms-transform: rotate(0);
         -o-transform: rotate(0);
            transform: rotate(0);
    -webkit-transform: scale(1);
       -moz-transform: scale(1);
        -ms-transform: scale(1);
         -o-transform: scale(1);
            transform: scale(1);
}

.icon-box-3.stop:hover .icon-boxwrap2.stop, .icon-box-back2.stop:hover {
    -webkit-transform: rotate(0);
       -moz-transform: rotate(0);
        -ms-transform: rotate(0);
         -o-transform: rotate(0);
            transform: rotate(0);
}

.icon-box-3.stop:hover .icon-boxwrap2.stop {
    -webkit-transform: scale(1.1);
       -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
         -o-transform: scale(1.1);
            transform: scale(1.1);
    -webkit-transform-origin: center center 0;
    transform-origin: center center 0;
    transition: all .5s ease 0s
}

.infofoldMe {
    position: relative;
    overflow: hidden;
    margin-bottom: 20px
}

.col-futurebox {
    width: 100%;
    float: left;
    margin: 5px
}

.imedica_margin_fix .col-futurebox.Style1,
.imedica_margin_fix .col-futurebox.Style2,
.imedica_margin_fix .col-futurebox.Style5{
    margin: 0 0 35px 0
}

.imedica_margin_fix .col-futurebox.Style3,
.imedica_margin_fix .col-futurebox.Style4 {
    margin: 0 0 61px 0;
}

.col-futurebox p {
    word-wrap: break-word;
    -moz-hyphens: auto
}

.feture-style1-desc {
    float: left;
    padding-top: 10px;
    word-wrap: break-word;
    word-break: normal
}

.feature-style1_title {
    display: table-cell;
    vertical-align: middle;
    word-wrap: inherit;
    padding-bottom: 10px;
    width: 100%;
    height: 50px
}

.service-title {
    width: 100%;
    color: #414042;
    font-size: 24px;
    line-height: 1.6em
}

.col-futurebox p, .service-title span {
    font-family: inherit;
    font-size: inherit
}

.styl1icon:before {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
       -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
         -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
}

.service-title i {
    color: #FFF;
    font-size: 24px;
    height: 46px;
    width: 46px;
    text-align: center;
    line-height: 46px;
    padding-bottom: 10px
}

.describe {
    padding-bottom: 15px;
    padding-top: 10px
}

.featuretab2 {
    width: 100%;
    display: inline-block
}

.service-box p {
    font-size: inherit;
    color: inherit;
    line-height: inherit;
    padding-top: inherit;
    padding-bottom: inherit;
    margin: inherit;
}

.service-box p:empty {
    padding: 0;
    margin: 0
}

.describe, .service-title {
    transition: all .2s ease-in-out
}

.service-icon-container {
    width: 15%;
}

.service-box a .feature-style1_title {
    width: 75%;
    display: inline-block;
}

.service-box a {
    line-height: 30px;
    font-size: 13px;
    background: none
}

.service-box a.style2_link {
    display: block
}

.service-box:active .rot-y .panel-icon, .service-box:focus .rot-y .panel-icon, .service-box:hover .rot-y .panel-icon {
    -webkit-transform: scale(1.08, 1.08);
       -moz-transform: scale(1.08, 1.08);
        -ms-transform: scale(1.08, 1.08);
         -o-transform: scale(1.08, 1.08);
            transform: scale(1.08, 1.08);
}

.service-icon-container.rot-y .styl1icon:after {
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    border-width: .5em .5em 0 0;
    border-style: solid;
    border-top-color: inherit;
    border-right-color: inherit;
    outline: 0;
    box-shadow: none;
}

.foldMe:after, .foldMe:before {
    content: ""
}

.service-box.Style5:hover .service-icon-container.rot-y .styl1icon:after {
    -moz-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    -o-transform: scale(1, 1);
    -webkit-transform: scale(1, 1);
    transform: scale(1, 1)
}

.futurebox {
    margin-bottom: 30px
}

.imedica_margin_fix .futurebox {
    margin-bottom: 35px
}

.infobox_button {
    display: block;
    padding: 6px 20px;
    border-radius: 0;
    border: 1px solid;
    margin-right: 15px;
    float: left;
    position: relative;
    z-index: 1;
    text-align: center;
    transition: all .2s ease 0s
}

.infobox_button:hover {
    background-color: #fff;
    color: #000
}

.imedica-ititle-icon, .imedica-ititle-title {
    display: inline-block;
    color: #fff
}

.foldMe:before {
    position: absolute;
    top: 100%;
    right: 0;
    border-width: 2em 2em 0 0;
    border-style: solid;
    border-top-color: inherit;
    border-right-color: transparent
}

.foldMe:after {
    position: absolute;
    top: 100%;
    left: 0;
    right: 2em;
    border-width: 1em;
    border-style: solid
}

.foldMe, .foldMe1 {
    position: relative
}

.foldMe {
    margin-bottom: 20px
}

.service-box {
    background: none;
    transition: all .5s ease 0s;
    margin: 0;
    padding: 0
}

.imd-price-list-element-wrap, i.imd-pr-list-icon {
    transition: .5s;
    -webkit-transition: .5s;
    -moz-transition: .5s
}

.fututerbox-main {
    margin: 1.5em
}

.fututerbox-main .describe * {
    color: inherit;
    font-size: inherit;
}

.style2title {
    margin-left: 20%
}

.feature-styl2-descr {
    padding-top: 10px;
    text-align: center
}

.service-icon-container.scontainer {
    width: 100%;
    height: auto;
    margin: 0 auto 10px
}

.service-box .rot-y .panel-icon.iconid {
    font-size: 35px;
    width: 2em;
    height: 2em;
    line-height: 35px;
    -webkit-transform: scale(1.1);
       -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
         -o-transform: scale(1.1);
            transform: scale(1.1);
    padding: .5em
}

.foldMe1 {
    overflow: hidden;
    margin-bottom: 20px
}

.col-futurebox.Style5, .col-futurebox.Style5 * {
    box-sizing: border-box;
    -webkit-box-sizing: border-box
}

.col-futurebox.Style5 {
    display: block;
    vertical-align: top;
    margin: 0;
    padding: 0;
    width: 100%
}

.col-futurebox.Style5 .feature-left-block {
    display: table-cell;
    vertical-align: top
}

.col-futurebox.Style5 .feature-right-block {
    display: table-cell;
    vertical-align: top;
    padding-left: 25px
}

.col-futurebox.Style5 .feature-style1_title, .col-futurebox.Style5 .feture-style1-desc {
    display: inline-block;
    width: 100%;
    margin: 0;
    height: auto;
    padding-top: 0
}

.col-futurebox.Style5 .feature-box-inner-wrapper {
    display: inline;
    width: 100%;
    height: 100%
}

.col-futurebox.Style5 .feature-icon-wrapper {
    border: none;
    margin: 0;
    padding: 0
}

.col-futurebox.Style5 .feature-icon {
    height: 2em;
    width: 2em;
    line-height: 2em;
    display: inline-block;
    text-align: center
}

.col-futurebox.Style5 .service-icon-container.rot-y .feature-icon:after {
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    border-width: .5em .5em 0 0;
    border-style: solid;
    border-top-color: inherit;
    border-right-color: inherit;
    outline: 0;
    box-shadow: none;
}

.col-featurebox.Style5:hover .rot-y .panel-icon {
    -webkit-transform: scale(1);
    transform: scale(1)
}

.imedica_margin_fix .imedica-ititle-wrapper {
    margin-bottom: 35px
}

.imedica-ititle-wrapper, 
.imedica-ititle-wrapper * {
    box-sizing: border-box;
    -webkit-box-sizing: border-box
}

.imedica-ititle-icon {
    float: left;
    padding-right: 10px
}

.imedica-ititle-icon i {
    color: inherit;
    font-size: inherit;
    font-weight: inherit;
    line-height: inherit
}

.imedica-ititle.ititle-foldMe {
    position: relative;
    overflow: hidden
}

.imedica-ititle.ititle-foldMe:after {
    content: '';
    display: none
}

.imedica-ititle.ititle-foldMe:before {
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    border-width: 10px 10px 0 0;
    border-style: solid;
    border-top-color: inherit;
    border-right-color: inherit
}

#primary-navigation ul.nav-menu ul.sub-menu li a:after, .nav-menu ul ul.children li a:after, .navbar-static-top ul.sub-menu li a:after {
    content: none
}

.imedica-ititle.ititle-foldMe.dir-left {
    padding: 5px 25px 5px 15px
}

.imedica-ititle.dir-right .imedica-ititle-icon {
    float: right;
    padding-right: 0;
    padding-left: 10px
}

.test_icon {
    margin-top: 10px
}

.left-wrap {
    float: left
}

i.ultsl-record {
    position: absolute;
    left: 0
}

.ult-testiblock-auth-name {
    margin-top: .7em;
    line-height: 1.2em;
    margin-bottom: .7em
}

.ult-testiblock-auth-social {
    margin-top: .3em
}

.imedica_margin_fix .ult-testiblock-wrap {
    padding-top: 0;
    padding-bottom: 0;
    margin-bottom: 35px
}

.ult-testiblock-wrap {
    padding-top: 22px;
    padding-bottom: 22px;
    width: 100%;
    line-height: 1.5em;
    display: inline-block
}

.ult-testiblock-wrap .ult-testiblock-divider{
    margin-top: 20px;
    margin-bottom: 5px;
    margin-left :0px;
    display: block;
}

.ult-testiblock-testimonial-content p {
    font-family: inherit
}

.horizontal_layout .ult-testiblock-authinfo.style1 {
    width: 25%;
    text-align: center;
    display: table-cell;
    vertical-align: top
}

.horizontal_layout .ult-testiblock-testimonial-content.style1 {
    width: 75%;
    display: table-cell;
    vertical-align: top;
    padding: 0 .8em;
    line-height: 1.2em
}

.horizontal_layout .ult-testiblock-authinfo.style2 {
    vertical-align: top
}

.horizontal_layout .ult-testiblock-testimonial-content.style2 {
    vertical-align: top;
    padding: 0 .8em;
    line-height: 1.2em
}

.horizontal_layout .ult-testiblock-auth-social span, .vertical_layout .ult-testiblock-auth-social span {
    display: block
}

.vertical_layout {
    text-align: center
}

@media only screen and (max-width: 768px) {
    .imedica-container .ult-testiblock-authinfo, .imedica-container .ult-testiblock-testimonial-content {
        width: 100%;
        text-align: center
    }

    .ult-testiblock-wrap .ult-testiblock-divider {
        margin-left :auto;
        margin-right :auto;
    }
}

@media only screen and (min-width: 769px) {
    
    .left-wrap .ult-testiblock-authinfo.style2 .ult-testiblock-auth-avatar {
    text-align:left;
    }

    .right-wrap .ult-testiblock-authinfo.style2 .ult-testiblock-auth-avatar {
        text-align:right;
    }
}

.imd-price-list-element-wrap {
    display: block;
    width: 100%;
    padding: 10px 0;
    -ms-transition: .5s;
    -o-transition: .5s;
    height: auto;
    box-sizing: border-box
}

.imd-price-list-icon-wrap {
    display: inline-block;
    width: auto;
    height: auto;
    margin-right: .6em;
    vertical-align: top
}

.imd-price-list-icon-wrap .imd-pr-list-icon {
    display: inline-block;
    vertical-align: top;
    font-size: inherit;
    height: 1.6em;
    width: 1.6em;
    padding: 0;
    text-align: center;
    line-height: 1.4em;
    -ms-transition: .5s;
    -o-transition: .5s
}

span.imd-pricelist-item-name {
    display: inline-block;
    width: auto;
    vertical-align: top;
    max-width: 50%
}

span.imd-pricelist-item-price {
    display: inline-block;
    width: auto;
    text-align: right;
    float: right;
    vertical-align: top;
    max-width: 50%
}

.imd_price_list .imd-price-list-element-wrap:last-child {
    border-bottom: none !important
}

.imedica_margin_fix .price_list_wrap {
    margin-bottom: 35px
}

.price_list_name {
    margin-bottom: 0;
    border-bottom: 1px solid #DCDDDE;
    position: relative;
    line-height: 1.3em
}

.ult-carousel-wrapper {
    width: 95%;
    margin: 0 auto
}

ul li.type-product a.added_to_cart {
    display: block
}

ul.slick-dots li > i > i {
    display: none !important
}

.featuretab {
    border-collapse: collapse;
    border-spacing: 6px
}

.featuretab tr:not(:first-child) {
    border-top-color: inherit;
    border-top-width: 1px;
    border-top-style: solid
}

.featuretab td {
    margin-bottom: 5px;
    padding-bottom: 11px;
    padding-top: 5px
}

.featuretab td:nth-child(2) {
    text-align: right
}

input.wpcf7-form-control.wpcf7-text.wpcf7-email.wpcf7-validates-as-required.wpcf7-validates-as-email, input.wpcf7-form-control.wpcf7-text.wpcf7-validates-as-required {
    box-shadow: none
}

.booking-section select.wpcf7-select {
    padding: 5px
}

.booking-section .wpcf7-date {
    padding: 7px 5px 7px 10px;
}

.booking-section .wpcf7-form-control textarea, .booking-section .wpcf7-text {
    padding: 5px 10px !important
}

.booking-section input, .booking-section select.wpcf7-select, .booking-section textarea {
    width: 100%;
    font-size: 12px;
    line-height: 1.4;
    margin: 0 0 10px;
    border-radius: 0;
    border: 1px solid #ccc
}

.booking-section {
    text-align: center
}

.booking-section .wpcf7-submit {
    width: 100%;
    margin: 10px auto 5px;
    padding: 10px
}

.booking-section .first-section {
    position: relative;
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAECAYAAABCxiV9AAAACXBIWXMAAAsTAAALEwEAmpwYAAAKT2lDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjanVNnVFPpFj333vRCS4iAlEtvUhUIIFJCi4AUkSYqIQkQSoghodkVUcERRUUEG8igiAOOjoCMFVEsDIoK2AfkIaKOg6OIisr74Xuja9a89+bN/rXXPues852zzwfACAyWSDNRNYAMqUIeEeCDx8TG4eQuQIEKJHAAEAizZCFz/SMBAPh+PDwrIsAHvgABeNMLCADATZvAMByH/w/qQplcAYCEAcB0kThLCIAUAEB6jkKmAEBGAYCdmCZTAKAEAGDLY2LjAFAtAGAnf+bTAICd+Jl7AQBblCEVAaCRACATZYhEAGg7AKzPVopFAFgwABRmS8Q5ANgtADBJV2ZIALC3AMDOEAuyAAgMADBRiIUpAAR7AGDIIyN4AISZABRG8lc88SuuEOcqAAB4mbI8uSQ5RYFbCC1xB1dXLh4ozkkXKxQ2YQJhmkAuwnmZGTKBNA/g88wAAKCRFRHgg/P9eM4Ors7ONo62Dl8t6r8G/yJiYuP+5c+rcEAAAOF0ftH+LC+zGoA7BoBt/qIl7gRoXgugdfeLZrIPQLUAoOnaV/Nw+H48PEWhkLnZ2eXk5NhKxEJbYcpXff5nwl/AV/1s+X48/Pf14L7iJIEyXYFHBPjgwsz0TKUcz5IJhGLc5o9H/LcL//wd0yLESWK5WCoU41EScY5EmozzMqUiiUKSKcUl0v9k4t8s+wM+3zUAsGo+AXuRLahdYwP2SycQWHTA4vcAAPK7b8HUKAgDgGiD4c93/+8//UegJQCAZkmScQAAXkQkLlTKsz/HCAAARKCBKrBBG/TBGCzABhzBBdzBC/xgNoRCJMTCQhBCCmSAHHJgKayCQiiGzbAdKmAv1EAdNMBRaIaTcA4uwlW4Dj1wD/phCJ7BKLyBCQRByAgTYSHaiAFiilgjjggXmYX4IcFIBBKLJCDJiBRRIkuRNUgxUopUIFVIHfI9cgI5h1xGupE7yAAygvyGvEcxlIGyUT3UDLVDuag3GoRGogvQZHQxmo8WoJvQcrQaPYw2oefQq2gP2o8+Q8cwwOgYBzPEbDAuxsNCsTgsCZNjy7EirAyrxhqwVqwDu4n1Y8+xdwQSgUXACTYEd0IgYR5BSFhMWE7YSKggHCQ0EdoJNwkDhFHCJyKTqEu0JroR+cQYYjIxh1hILCPWEo8TLxB7iEPENyQSiUMyJ7mQAkmxpFTSEtJG0m5SI+ksqZs0SBojk8naZGuyBzmULCAryIXkneTD5DPkG+Qh8lsKnWJAcaT4U+IoUspqShnlEOU05QZlmDJBVaOaUt2ooVQRNY9aQq2htlKvUYeoEzR1mjnNgxZJS6WtopXTGmgXaPdpr+h0uhHdlR5Ol9BX0svpR+iX6AP0dwwNhhWDx4hnKBmbGAcYZxl3GK+YTKYZ04sZx1QwNzHrmOeZD5lvVVgqtip8FZHKCpVKlSaVGyovVKmqpqreqgtV81XLVI+pXlN9rkZVM1PjqQnUlqtVqp1Q61MbU2epO6iHqmeob1Q/pH5Z/YkGWcNMw09DpFGgsV/jvMYgC2MZs3gsIWsNq4Z1gTXEJrHN2Xx2KruY/R27iz2qqaE5QzNKM1ezUvOUZj8H45hx+Jx0TgnnKKeX836K3hTvKeIpG6Y0TLkxZVxrqpaXllirSKtRq0frvTau7aedpr1Fu1n7gQ5Bx0onXCdHZ4/OBZ3nU9lT3acKpxZNPTr1ri6qa6UbobtEd79up+6Ynr5egJ5Mb6feeb3n+hx9L/1U/W36p/VHDFgGswwkBtsMzhg8xTVxbzwdL8fb8VFDXcNAQ6VhlWGX4YSRudE8o9VGjUYPjGnGXOMk423GbcajJgYmISZLTepN7ppSTbmmKaY7TDtMx83MzaLN1pk1mz0x1zLnm+eb15vft2BaeFostqi2uGVJsuRaplnutrxuhVo5WaVYVVpds0atna0l1rutu6cRp7lOk06rntZnw7Dxtsm2qbcZsOXYBtuutm22fWFnYhdnt8Wuw+6TvZN9un2N/T0HDYfZDqsdWh1+c7RyFDpWOt6azpzuP33F9JbpL2dYzxDP2DPjthPLKcRpnVOb00dnF2e5c4PziIuJS4LLLpc+Lpsbxt3IveRKdPVxXeF60vWdm7Obwu2o26/uNu5p7ofcn8w0nymeWTNz0MPIQ+BR5dE/C5+VMGvfrH5PQ0+BZ7XnIy9jL5FXrdewt6V3qvdh7xc+9j5yn+M+4zw33jLeWV/MN8C3yLfLT8Nvnl+F30N/I/9k/3r/0QCngCUBZwOJgUGBWwL7+Hp8Ib+OPzrbZfay2e1BjKC5QRVBj4KtguXBrSFoyOyQrSH355jOkc5pDoVQfujW0Adh5mGLw34MJ4WHhVeGP45wiFga0TGXNXfR3ENz30T6RJZE3ptnMU85ry1KNSo+qi5qPNo3ujS6P8YuZlnM1VidWElsSxw5LiquNm5svt/87fOH4p3iC+N7F5gvyF1weaHOwvSFpxapLhIsOpZATIhOOJTwQRAqqBaMJfITdyWOCnnCHcJnIi/RNtGI2ENcKh5O8kgqTXqS7JG8NXkkxTOlLOW5hCepkLxMDUzdmzqeFpp2IG0yPTq9MYOSkZBxQqohTZO2Z+pn5mZ2y6xlhbL+xW6Lty8elQfJa7OQrAVZLQq2QqboVFoo1yoHsmdlV2a/zYnKOZarnivN7cyzytuQN5zvn//tEsIS4ZK2pYZLVy0dWOa9rGo5sjxxedsK4xUFK4ZWBqw8uIq2Km3VT6vtV5eufr0mek1rgV7ByoLBtQFr6wtVCuWFfevc1+1dT1gvWd+1YfqGnRs+FYmKrhTbF5cVf9go3HjlG4dvyr+Z3JS0qavEuWTPZtJm6ebeLZ5bDpaql+aXDm4N2dq0Dd9WtO319kXbL5fNKNu7g7ZDuaO/PLi8ZafJzs07P1SkVPRU+lQ27tLdtWHX+G7R7ht7vPY07NXbW7z3/T7JvttVAVVN1WbVZftJ+7P3P66Jqun4lvttXa1ObXHtxwPSA/0HIw6217nU1R3SPVRSj9Yr60cOxx++/p3vdy0NNg1VjZzG4iNwRHnk6fcJ3/ceDTradox7rOEH0x92HWcdL2pCmvKaRptTmvtbYlu6T8w+0dbq3nr8R9sfD5w0PFl5SvNUyWna6YLTk2fyz4ydlZ19fi753GDborZ752PO32oPb++6EHTh0kX/i+c7vDvOXPK4dPKy2+UTV7hXmq86X23qdOo8/pPTT8e7nLuarrlca7nuer21e2b36RueN87d9L158Rb/1tWeOT3dvfN6b/fF9/XfFt1+cif9zsu72Xcn7q28T7xf9EDtQdlD3YfVP1v+3Njv3H9qwHeg89HcR/cGhYPP/pH1jw9DBY+Zj8uGDYbrnjg+OTniP3L96fynQ89kzyaeF/6i/suuFxYvfvjV69fO0ZjRoZfyl5O/bXyl/erA6xmv28bCxh6+yXgzMV70VvvtwXfcdx3vo98PT+R8IH8o/2j5sfVT0Kf7kxmTk/8EA5jz/GMzLdsAAAAgY0hSTQAAeiUAAICDAAD5/wAAgOkAAHUwAADqYAAAOpgAABdvkl/FRgAAACpJREFUeNpiFKg/+Z8BB2BiYGBgxCHHyARjoEvAdDKgKYArBAAAAP//AwALVgJlRZS9mQAAAABJRU5ErkJggg==) 96% 15px no-repeat
}

.booking-section .first-section select {
    background: 0 0;
    border: 1px solid #ccc;
    border-radius: 0;
    -webkit-appearance: none
}

.booking-section span.wpcf7-not-valid-tip {
    font-size: 12px;
    line-height: 30px;
    text-align: center;
    border: 1px solid #FF2E2E;
    margin-bottom: 10px
}

div.wpcf7-validation-errors {
    border: 2px solid #f7e700;
    text-align: center;
    font-size: 12px;
    line-height: 18px;
    padding: 10px;
    margin-top: 15px;
    clear: both
}

.contact-us-section .section {
    width: 50%;
    float: left;
    margin-bottom: 20px;
    padding: 0
}

.contact-us-section .section .wpcf7-form-control {
    width: 100%;
    border: 1px solid #cdcdcd;
    border-radius: 0;
    margin: 0;
    padding: 10px 15px;
    color: #8c99a9;
    font-weight: 600;
    box-shadow: inset 0 3px 5px rgba(166, 166, 166, .27), inset 0 0 0 rgba(166, 166, 166, .27) !important
}

.contact-us-section .section:nth-child(odd) {
    clear: both;
    padding-right: 10px
}

.contact-us-section .section:nth-child(odd) .wpcf7-form-control {
    padding-right: 9px;
    color: inherit
}

.contact-us-section .section:nth-child(even) {
    padding-left: 10px
}

.contact-us-section .seventh.section {
    width: 100%;
    margin: 0;
    padding: 0
}

.contact-us-section .eight.section {
    float: right;
    width: 100%;
    text-align: right;
    margin-top: 20px
}

.contact-us-section .eight.section img.ajax-loader {
    display: none
}

.contact-us-section .eight.section .wpcf7-submit {
    width: auto;
    color: #fff;
    font-weight: 400;
    border: none;
    padding: 15px 48px
}

.pricelist-hover, .site-title {
    font-weight: 700
}

.contact-us-section .third.section .wpcf7-date {
    padding: 4px 15px;
    color: inherit
}

#wpcf7-f442-p427-o1 .wpcf7-validation-errors {
    clear: both;
    margin: 0
}

.contact-us-section span.wpcf7-not-valid-tip {
    border: 1px solid;
    text-align: center;
    margin-top: 10px;
    font-size: 12px;
    margin-bottom: -10px
}

.contact-us-section.contact-version2 .section.fifth {
    clear: none
}

.contact-us-section.contact-version2 .section {
    width: 25%
}

.contact-us-section.contact-version2 .section.eight, .contact-us-section.contact-version2 .section.seventh {
    width: 100%;
    padding: 0
}

.contact-us-section.contact-version2 .section.eight .wpcf7-submit {
    width: 100%
}

.contact-us-section.contact-version2 .section.second {
    padding-right: 10px
}

.contact-us-section.contact-version2 .fifth.section {
    padding-left: 10px
}

/* Contact form css start */
.contact-new .section {
    width: 33%;
    display: inline-block;
}

.contact-new .section:nth-child(odd) {
    clear: none;
    margin-right: 0px;
}

.contact-new .section:nth-child(even) {
    padding-left: 10px;
}

.contact-new .section.second {
    padding-right: 10px;
}

.contact-new .seventh.section {
    width: 100%;
}

.contact-new .section.eight {
    display: inline-block;
    width: auto;
    margin: 0px auto;
    float: none;
    text-align: center;
}

.contact-new .section.eight .wpcf7-submit {
    background-color: #fff;
    color: #bcbec0;
    border-radius: 50px;
    font-family: <?php echo $vars['heading-font-family'] ?>;
    font-size: 30px;
    font-weight: bold;
    margin-top: 18px;
    padding: 15px 30px;
}


.contact-new .section {
    margin-bottom: 10px;
}

.contact-new .section .wpcf7-form-control-wrap .wpcf7-form-control {
    box-shadow: none;
    border: none;
    color: #737373;
    font-weight: 300;
    font-size: 16px;
    width: 100%;
    padding: 10px 15px;
}

.contact-new .section.eight, .contact-new .section.seventh {
    width: 99.5%;
    padding: 0;
}

.contact-new .section .seventh textarea {
    padding-left: 9px;
}

.center {
    text-align: center;
}

@media (max-width: 480px) {
    .contact-new .section {
        width: 100%;
    }

    .contact-new .section:nth-child(even) {
        padding-left: 0px;
    }

    .contact-new .section.second {
        padding-right: 0px;
    }
}

@media (max-width: 320px) {
    .contact-new .section {
        width: 100%;
    }

    .contact-new .section:nth-child(even) {
        padding-left: 0px;
    }

    .contact-new .section.second {
        padding-right: 0px;
    }
}

/* Contact form css end */

#wpcf7-f591-p476-o1 .wpcf7-validation-errors {
    clear: both;
    margin: 0
}

@media only screen and (max-width: 768px) {
    .contact-us-section.contact-version1 .section, .contact-us-section.contact-version2 .section, .contact-us-section.contact-version2 .section.fifth, .contact-us-section.contact-version2 .section.second {
        width: 100%;
        padding: 0
    }
}

.ultsl-arrow-left6, .ultsl-arrow-right6 {
    /* padding: .8em; */
    display: inline-block;
    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -ms-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out
}

.tp-bannertimer {
    background: rgba(0, 0, 0, .3) !important
}

.recent-post-vc p {
    font-size: inherit
}

.popular_post_category, .recent_post_category {
    color: inherit
}

.imedica_recent_posts .recent-post-item,
.imedica_recent_posts-no-thumb .recent-post-item {
    margin-bottom: 35px;
    list-style: none;    
}

.post-category {
    margin-top: 15px;
    margin-bottom: 10px
}

hr.category_line {
    margin-top: 10px
}

#center {
    margin-left: auto;
    margin-right: auto
}

.tour_ext_class {
    margin-left: 0%
}

.wpb_tour .wpb_tabs_nav li {
    -webkit-transition: .5s;
    -moz-transition: .5s;
    -ms-transition: .5s;
    -o-transition: .5s;
    transition: .5s
}

input#imedica_newsletter_email {
    width: 70%;
    float: left;
    height: 33px;
    line-height: 33px;
}

input#imedica_newsletter_submit {
    width: 30%;
    float: left;
    padding: 6.9px 0;
    text-shadow: none;
    height: 33px;
}

.newsletter_form {
    display: inline-block;
    width: 100%;
    margin-bottom: 0
}

.form.mc4wp-form {
    margin-bottom: 0;
    margin-top: 0;
}

.main-navigation {
    clear: both;
    display: block;
    float: left;
    width: 100%
}

.main-navigation ul {
    list-style: none;
    margin: 0;
    padding-left: 0
}

.main-navigation li {
    float: left;
    position: relative
}

.main-navigation a {
    display: block
}

.main-navigation ul ul {
    box-shadow: 0 3px 3px rgba(0, 0, 0, .2);
    float: left;
    position: absolute;
    top: 1.5em;
    left: -999em;
    z-index: 99999
}

.main-navigation ul ul ul {
    left: -999em;
    top: 0
}

.main-navigation ul ul a {
    width: 200px
}

.main-navigation ul ul li:hover > ul {
    left: 100%
}

.site-main .comment-navigation, .site-main .paging-navigation, .site-main .post-navigation {
    margin: 0 0 1.5em;
    overflow: hidden
}

.comment-navigation .nav-previous, .paging-navigation .nav-previous, .post-navigation .nav-previous {
    float: left;
    width: 50%
}

.comment-navigation .nav-next, .paging-navigation .nav-next, .post-navigation .nav-next {
    float: right;
    text-align: right;
    width: 50%
}

.site-title {
    float: left;
    font-size: 18px;
    margin: 0;
    line-height: 36px
}

.header-main {
    position: relative;
    float: left;
    width: 100%;
    line-height: 3.8em
}

header.site-header.navbar-fixed-top {
    background: rgba(255, 255, 255, .9);
    box-shadow: 2px 0 1px 0 #666
}

.site-navigation ul {
    list-style: none;
    margin: 0
}

.site-navigation li {
    border-top: 1px solid rgba(255, 255, 255, .2);
    text-align: left
}

.site-navigation ul ul {
    margin-left: 20px
}

.site-navigation a {
    display: block
}

.primary-navigation .nav-menu {
    border-bottom: 1px solid rgba(255, 255, 255, .2);
    display: none
}

.primary-navigation a {
    padding: 7px 0;
    line-height: inherit;
    display: block;
    text-align: left
}

.primary-navigation a:before {
    font-family: FontAwesome;
    font-style: normal;
    position: relative;
    line-height: 0;
    margin-right: 5px;
    top: 1px;
    display: inline-block;
    width: 1em;
    text-align: center
}

.secondary-navigation {
    border-bottom: 1px solid rgba(255, 255, 255, .2);
    font-size: 12px;
    margin: 48px 0
}

.secondary-navigation a {
    padding: 9px 0
}

.toggled-on .nav-menu {
    display: block;
    max-width: 100%;
    overflow: hidden;
    width: 100%;
    padding: 0;
    background: #303030
}

#primary-navigation.site-navigation.toggled-on ul li > ul.sub-menu, #primary-navigation.site-navigation.toggled-on ul li > ul.sub-menu li:hover, .toggled-on ul.mega-menu {
    background: inherit
}

.primary-navigation.toggled-on .nav-menu li {
    padding: 0 20px;
    border-top: 1px solid rgba(224, 224, 224, .1);
    line-height: 3em
}

.primary-navigation.toggled-on .nav-menu li a {
    height: 100%;
    line-height: 3em !important;
    color: #E0E0E0;
    width: 89%;
    font-weight: 400;
    font-size: 13px
}

.primary-navigation.toggled-on .nav-menu li a:hover {
    color: #fff
}

#primary-navigation.site-navigation.toggled-on ul li ul.sub-menu li a, 
#primary-navigation.site-navigation.toggled-on ul li > ul.sub-menu li a,
.site-header-main .mobile-top-menu #primary-navigation.toggled-on ul.sub-menu.mega-menu-row > li.mega-menu-col > a {
    border-top: none;
    line-height: 40px;
    font-weight: 400;
    color: <?php echo $vars["imd-mob-text-color"]; ?>;
    font-size: 12px
}

#primary-navigation.site-navigation.toggled-on ul li ul.sub-menu li a:hover, #primary-navigation.site-navigation.toggled-on ul li > ul.sub-menu li a:hover {
    color: #fff
}

.toggled-on ul.nav-menu ul.sub-menu {
    border-top: none;
    background: inherit
}

.toggled-on ul.nav-menu li.menu-item ul.sub-menu li {
    border-top: none;
    border-bottom: none
}

.primary-navigation.col-md-7.col-sm-12.col-xs-12 {
    margin: 0
}

.navbar.navbar-default.navbar-static-top p {
    margin: 0;
    line-height: 40px
}

ul.top-social-link {
    list-style: none;
    display: block;
    margin: 0;
    padding: 0;
    width: 100%;
    line-height: 3em
}

ul.top-social-link li {
    display: inline-block;
    vertical-align: middle
}

ul.top-social-link li:last-child a {
    padding-right: 0
}

.primary-navigation button.menu-toggle-top-menu {
    display: block
}

.top-menu-toggled-on div ul.nav-menu {
    display: block;
    list-style: none;
    background: #363839;
    margin-top: 100px;
    margin-left: 0
}

.top-menu-toggled-on div ul.nav-menu li {
    border-top: 1px solid rgba(255, 255, 255, .2);
    padding: 0 7%;
    line-height: 2.4em
}

.top-menu-toggled-on div ul.nav-menu ul.sub-menu.mega-menu-row {
    background: inherit;
    list-style: none;
    margin-left: 0;
    width: 100%
}

.top-menu-toggled-on div ul.nav-menu ul.mega-menu {
    background: inherit;
    list-style: none
}

.top-menu-toggled-on div ul.nav-menu ul.sub-menu.mega-menu-row ul.sub-menu {
    background: inherit;
    border-top: none;
    list-style: none
}

.top-menu-toggled-on div ul.nav-menu ul.sub-menu {
    border-top: none;
    list-style: none;
    background: inherit
}

.top-menu-toggled-on div ul.nav-menu li.menu-item ul.sub-menu li {
    border-bottom: none;
    padding-right: 0;
    padding-left: 0
}

#primary-navigation.toggled-on ul.nav-menu li.current_page_item, #primary-navigation.toggled-on ul.nav-menu li:hover {
    background: inherit
}

.menu-toggle, .menu-toggle-imd-top-social, .menu-toggle-top-menu {
    cursor: pointer;
    height: 48px;
    text-align: center;
    width: 48px;
    background-color: transparent;
    margin-right: 13px;
    padding: 12px;
    margin-top: 12px;
    margin-bottom: 13px;
    border: none;
    color: <?php echo $vars['imd-menu-parent-fontColor']; ?>
}

.imd-top-social {
    padding: 0
}

.menu-toggle-imd-top-social:hover, .menu-toggle-top-menu:hover, .menu-toggle:hover {
    background: rgba(214, 214, 214, .48);
    box-shadow: inset 1px 1px 1px 0 #CCC;
    -webkit-transition: .3s;
    transition: .3s
}

div.nav-menu ul li > a {
    line-height: 4.6em
}

.nav-menu ul li:hover > ul.children {
    visibility: visible;
    margin-top: 0;
    opacity: 1
}

.nav-menu ul li.page_item_has_children:hover > a, .nav-menu ul li:hover > a:after {
    width: 100%;
    left: 0
}

.imd-mobile-menu-buttos {
    text-align: right;
    width: 58%;
    display: none;
    float: right;
    padding-right: 0
}

.imd-mobile-menu-buttos i {
    display: inline-flex;
    vertical-align: middle
}

.mobile-top-menu .imedica-top-navigation {
    display: none;
    margin-top: 30px
}

.mobile-top-menu .imedica-top-navigation.top-menu-toggled-on {
    display: block
}

.imd-mobile-social-menu, b.caret {
    display: none
}

.header-default, .header-default nav {
    line-height: inherit;
    height: auto
}

.imd-fluid-layout .imedica-row .imedica-container {
    position: relative;
}

/* Mobile Menu new option styling */

.imd-mobile-menu-buttos .imd-button-wrap i{
    color: <?php echo $vars["imd-mob-menu-icon-color"]; ?>;
}

/*topemenu*/
.mobile-top-menu .imedica-top-navigation.top-menu-toggled-on ul.nav-menu li,
.primary-navigation.toggled-on .nav-menu li {
   border-top:1px solid <?php //Lighter
    $colour = $vars["imd-mob-submenu-bg-color"];
    $brightness = 0.7; // 50% brighter
    $newColour = colourBrightness($colour,$brightness);
    echo $newColour;
    ?> !important;
     /*1px solid rgba(224, 224, 224, .1);*/
    
}

/* End styling */

@media screen and (max-width: 782px) {
    b.caret i, b.caret i:before {
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        position: absolute;
        left: 50%
    }

    .header-main {
        padding: 0
    }

    .imd-full-layout .header-layout1 .header-main {
        padding: 0 15px
    }

    .header-main .header-logo-center .site-title {
        text-align: left;
        margin: 0;
        padding: 0;
        width: 42%
    }

    .imd-button-wrap button {
        padding: 0;
        margin: 1%;
        vertical-align: top;
        font-size: 25px
    }

    .site-header-main .navbar.navbar-default.navbar-static-top {
        display: none
    }

    .imd-button-wrap button a {
        vertical-align: middle
    }

    .imd-button-wrap {
        display: inline-block;
        vertical-align: top
    }

    .navbar-inverse1.navbar-fixed-top1.header-layout1 {
        height: auto
    }

    .header-layout1 nav#primary-navigation {
        border-top: none
    }

    .header-layout1 .imd-mobile-social-menu.top-social-toggled-on {
        margin-top: 100px
    }

    .header-logo-center.col-md-12.col-sm-12.col-xs-4.text-center {
        width: 40%;
        margin-top: 15px
    }


    /*Color background color For topmenu */
    .top-menu-toggled-on div ul.nav-menu,
    .primary-navigation ul.nav-menu > li.current-menu-item, 
    .primary-navigation ul.nav-menu > li.current-menu-ancestor,
    .mobile-top-menu .toggled-on .nav-menu {
        background: <?php echo $vars["imd-mob-submenu-bg-color"];  ?>;
    }

    .imd-mobile-social-menu.top-social-toggled-on ul.imd-social-menu {
        background: <?php echo $vars["imd-mob-social-bg-color"];  ?>;
    }
 
    .mobile-top-menu .site-navigation.toggled-on ul.nav-menu li a {
        color: <?php echo $vars["imd-mob-text-color"]; ?>;
        display: inline-block;
        width: 85%;
        font-weight: 400;
        font-size: 13px;
        line-height: 1.7em;
    }

    /*topmenu*/
    .imedica-top-navigation.top-menu-toggled-on ul.nav-menu li a,
    .mobile-top-menu .site-navigation.primary-navigation.toggled-on ul.nav-menu ul.sub-menu li a{
        color: <?php echo $vars["imd-mob-text-color"]; ?>;
    }
   
    /*Topmeny seleted page*/
    .site-navigation .current_page_item > a, .site-navigation .current_page_ancestor > a, 
    .site-navigation .current-menu-item > a, .site-navigation .current-menu-ancestor > a,

    .imedica-top-navigation.top-menu-toggled-on ul.nav-menu li a:hover,
    .imedica-top-navigation.top-menu-toggled-on ul.nav-menu ul.sub-menu li a:hover,


    .mobile-top-menu .site-navigation.primary-navigation.toggled-on .current_page_item > a, .site-navigation .current_page_ancestor > a, 
    .mobile-top-menu .site-navigation.primary-navigation.toggled-on .current-menu-item > a, .site-navigation .current-menu-ancestor > a,

    .mobile-top-menu .site-navigation.primary-navigation.toggled-on ul.nav-menu li a:hover,
    .mobile-top-menu .site-navigation.primary-navigation.toggled-on ul.nav-menu ul.sub-menu li a:hover {
       
        color: <?php echo $vars["imd-mob-text-hoverColor"]; ?>!important;

    }

    .mobile-top-menu #primary-navigation {
        padding: 0;
        vertical-align: top;
        width: 100%;
        margin: 0;
        border: 0;
        display: block
    }

    .header-layout1 .mobile-top-menu #primary-navigation {
        margin-top: 30px
    }

    .row.site-navigation.primary-navigation.header-layout2 {
        padding: 0
    }

    b.caret {
        display: block;
        width: 25px;
        height: 40px;
        float: right;
        font-size: 13px;
        cursor: pointer;
        position: relative;
        color: <?php echo $vars["imd-mob-text-color"]; ?>;
    }

    b.caret i {
        background: rgba(168, 168, 168, .1);
        border-radius: 50%;
        width: 22px;
        height: 22px;
        font-size: 13px;
        top: 50%;
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        line-height: 1.6em
    }

    b.caret i:before {
        top: 50%;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }

    b.caret i:hover {
        background: rgba(210, 210, 210, .26)
    }

    .toggled-on ul.nav-menu li ul.sub-menu, .top-menu-toggled-on div ul.nav-menu ul.sub-menu, .top-menu-toggled-on ul.nav-menu li .mega-menu {
        display: none
    }

    .toggled-on ul.nav-menu li.open ul.sub-menu, .top-menu-toggled-on div ul.nav-menu li.open ul.sub-menu, .top-menu-toggled-on ul.nav-menu li.open .mega-menu {
        display: block
    }

    .mobile-top-menu .top-menu-toggled-on ul.nav-menu li {
        margin: 0;
        line-height: 3em;
        padding: 0 30px;
        border-top: 1px solid rgba(224, 224, 224, .1)
    }

    .imd-mobile-social-menu {
        display: none
    }

    .imd-mobile-social-menu.top-social-toggled-on {
        display: block;
        background: #EEE;
        margin-top: 110px;
        z-index: 9999
    }

    .imd-mobile-social-menu.top-social-toggled-on ul.imd-social-menu {
        display: block;
        list-style: none;
        margin: 0;
        padding: 0
    }

    .imd-social-icon-wrap {
        width: 40px;
        float: left;
        margin-right: 20px;
        display: block
    }

    .imd-mobile-social-menu.top-social-toggled-on ul.imd-social-menu li div > i {
        background: rgba(168, 168, 168, .5);
        color: <?php echo $vars["imd-mob-social-text-color"]; ?>;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        line-height: 30px;
        text-align: center;
        font-size: 16px;
        display: inline-block
    }

    .imd-mobile-social-menu.top-social-toggled-on ul.imd-social-menu li a {
        color: <?php echo $vars["imd-mob-social-text-color"]; ?>;
        padding-left: 0
    }
     .imd-mobile-social-menu.top-social-toggled-on ul.imd-social-menu li a:hover {
        color: <?php echo $vars["imd-mob-social-text-hoverColor"]; ?>
    }

    ul.top-social-link-mobile {
        display: inline-block;
        margin: 0;
        width: 70%;
        text-align: left
    }

    ul.top-social-link-mobile li {
        display: inline-block
    }

    .imd-mobile-social-menu.top-social-toggled-on ul.imd-social-menu > li {
        padding: 0 25px;
        border-bottom : 1px solid <?php //Lighter
        $colour = $vars["imd-mob-social-bg-color"];
        $brightness = 0.3; // 50% brighter
        $newColour = colourBrightness($colour,$brightness);
        echo $newColour;
        ?> !important;
         /*1px solid rgba(224, 224, 224, .1);*/
        line-height: 3em;
        display: inline-block;
        width: 100%
    }

    .imd-mobile-social-menu.top-social-toggled-on form.search button.button.search-submit, .imd-social-menu input#searchsubmit {
        display: none
    }

    .imd-mobile-social-menu.top-social-toggled-on ul.imd-social-menu > li:last-child {
        border-bottom: none
    }

    li.imd-custom-html p {
        margin: 0;
        padding: 5px 0;
        line-height: 1.6em
    }

    .imd-top-social.text-right {
        height: 40px;
        line-height: 40px
    }

    .imd-social-menu input.imd-search {
        width: 75%;
        padding: 1px 5px
    }

    .imd-mobile-menu-buttos {
        display: inline-block;
        margin-top: 15px
    }

    .primary-navigation.toggled-on .nav-menu ul.sub-menu li {
        padding: 0
    }

    .primary-navigation.toggled-on .nav-menu ul.sub-menu {
        margin-left: 15px
    }

    .imd-full-layout .row.imd-mobile-social-menu.top-social-toggled-on, .imd-full-layout .row.mobile-top-menu, .row.site-navigation.primary-navigation.header-layout1 {
        margin-right: -15px;
        margin-left: -15px
    }

    .primary-navigation.toggled-on .nav-menu ul.sub-menu > li.menu-item-has-children {
        border-top: 1px solid rgba(224, 224, 224, .1)
    }

    .header-logo-left.col-md-4.text-left {
        float: left;
        width: 40%;
        margin-bottom: 0
    }

    .mobile-header2-search {
        display: block
    }

    .header2-search, .menu-search-default-head, .navbar-inverse.navbar-fixed-top.header-default.header-fixed, .search-large {
        display: none
    }

    .header-layout2 .header-search.mobile-header2-search {
        margin-top: 0;
        vertical-align: top
    }

    .header-layout2 .mobile-header2-search fieldset {
        width: 100%;
        text-align: center
    }

    .header-layout2 .mobile-header2-search fieldset input.imd-search {
        width: 80%;
        padding: 0 2px 2px 5px;
        margin-right: -5px;
        font-size: 13px;
        line-height: 2.3em
    }

    .navbar-inverse1.navbar-fixed-top1.header-layout2 {
        height: auto
    }

    .header-default, .header-default nav {
        height: auto;
        line-height: inherit;
    }

    .primary-navigation.site-navigation {
        background-color: transparent
    }

    .imd-full-layout .header-layout2 .row.imd-mobile-social-menu.top-social-toggled-on {
        margin-bottom: 15px
    }

    a.top-social-icon {
        padding: 0 5px
    }

    .header-layout2 .site-navigation.toggled-on, .header-layout2 .top-menu-toggled-on div ul.nav-menu {
        margin-top: -15px
    }

    .top-menu-toggled-on div ul.nav-menu {
        margin-top: 0
    }

    .header-default .top-menu-toggled-on div ul.nav-menu {
        margin-top: 90px
    }

    .header-layout1 .site-navigation.toggled-on {
        margin-top: 0
    }

    .imd-fluid-layout .header-layout1 .imedica-container {
        padding: 0 15px
    }

    .header-default .site-navigation.primary-navigation {
        width: initial
    }
}

@media screen and (max-width: 400px) {
    .primary-navigation .mega-nav {
        display: none
    }
}

@media screen and (min-width: 401px) {
    .primary-navigation .mega-nav {
        display: none
    }
}

@media screen and (min-width: 673px) {
    .primary-navigation .mega-nav li {
        border-top: none;
        border-bottom: none
    }

    .primary-navigation .mega-nav {
        padding: 10px;
        display: block
    }

    .primary-navigation .mega-nav > li {
        padding: 8px 21px
    }
}

@media screen and (max-width: 767px) {
    .site-navigation.toggled-on {
        margin-top: 100px
    }

    .header-main, .imd-full-layout .navbar-default.navbar .imedica-container {
        padding: 0
    }
}

@media screen and (max-width: 782px) {
    .primary-navigation p {
        color: #fff;
        margin: 7px 0
    }

    .primary-navigation a {
        padding: 0
    }

    .primary-navigation a:before {
        display: inline-block;
        width: 1em;
        text-align: center
    }
}

@media screen and (min-width: 783px) {
    .primary-navigation .imedica-top-navigation .nav-menu, .primary-navigation li {
        display: inline-block;
        position: relative
    }

    .primary-navigation .mega-menu li:hover a, .primary-navigation .mega-menu ul {
        background: 0 0
    }

    .primary-navigation {
        float: right;
        margin: 0 1px 0 -12px;
        padding-top: 0
    }

    .primary-navigation.toggled-on {
        border-bottom: 0;
        margin: 0;
        padding: 0
    }

    .primary-navigation .menu-toggle {
        display: none;
        padding: 0
    }

    .primary-navigation .nav-menu {
        border-bottom: 0;
        display: block
    }

    .primary-navigation a {
        padding: 0 1em;
        white-space: nowrap
    }

    .primary-navigation a:before {
        position: relative;
        line-height: 0;
        margin-right: 9px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%)
    }

    .primary-navigation .menu-item-has-children li.menu-item-has-children > a:after, .primary-navigation .menu-item-has-children li.page_item_has_children > a:after, .primary-navigation .page_item_has_children li.menu-item-has-children > a:after, .primary-navigation .page_item_has_children li.page_item_has_children > a:after {
        content: none;
        right: 8px;
        top: 20px
    }

    .primary-navigation li {
        border: 0;
        -webkit-transition: border .2s ease-in-out;
        transition: border .2s ease-in-out
    }

    .primary-navigation li li {
        border: 0;
        display: block;
        height: auto;
        line-height: 1.0909090909
    }

    ul.nav-menu li ul.sub-menu li:hover > ul.sub-menu {
        margin-left: 0
    }

    .primary-navigation ul li.focus > ul, .primary-navigation ul li:hover > ul {
        visibility: visible
    }

    ul.nav-menu li:hover > ul.sub-menu {
        opacity: 1;
        visibility: visible;
        margin-top: 0;
        -webkit-transition: 200ms;
        transition: 200ms
    }

    ul.nav-menu li ul.sub-menu.mega-menu-row ul.sub-menu {
        box-shadow: none;
        margin-top: 0
    }

    .primary-navigation ul ul {
        float: left;
        margin: 0;
        position: absolute;
        z-index: 99999;
        padding: 0;
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out
    }

    .primary-navigation ul ul ul {
        left: 100%;
        top: 0;
        -webkit-transition-property: visibility, opacity, margin;
        transition-property: visibility, opacity, margin
    }

    .primary-navigation ul .mega-menu ul {
        position: static;
        float: none
    }

    .primary-navigation .menu-item-has-mega-menu {
        position: relative
    }

    .primary-navigation .menu-item-has-mega-menu:hover .mega-menu {
        display: block;
        opacity: 1;
        visibility: visible;
        margin-top: 0
    }

    .primary-navigation .mega-menu a {
        padding: 0;
        position: relative
    }

    ul.nav-menu li:hover ul.mega-menu-row li > ul.sub-menu {
        visibility: visible;
        margin-top: 0;
        border-top: 0
    }

    .search-large, .search-wrap {
        opacity: 0;
        visibility: hidden
    }

    #masthead .primary-navigation .mega-menu .current-menu-item a {
        font-weight: 400;
        color: #3de132
    }

    .primary-navigation .mega-menu a:focus, .primary-navigation .mega-menu a:hover {
        text-decoration: inherit
    }

    .primary-navigation .mega-menu p {
        margin: 0 0 1em
    }

    .primary-navigation .mega-menu a:before {
        top: -2px;
        line-height: 22px;
        text-decoration: none
    }

    .primary-navigation .mega-menu a:after {
        display: none !important
    }

    .primary-navigation .mega-menu .menu-item {
        float: none;
        color: #fff;
        font-size: 13px;
        line-height: 20px
    }

    .primary-navigation .mega-menu-row {
        width: 100%;
        display: table;
        table-layout: fixed;
        padding: 0;
        border-top: 1px solid #484848
    }

    ul.sub-menu.mega-menu-row ul.sub-menu {
        opacity: 1;
        border-top: none
    }

    .primary-navigation .mega-menu-row:first-child {
        border-top: none
    }

    ul.nav-menu li.menu-item ul.sub-menu.mega-menu-row ul li a {
        border-top: none;
        width: 100%;
        line-height: 1.6em;
        padding-top: 8px;
        padding-bottom: 8px
    }

    ul.mega-menu, ul.nav-menu ul.mega-menu li.menu-item ul.sub-menu li {
        border-bottom: none
    }

    .primary-navigation .mega-menu-row .menu-item-has-icon > p {
        margin-left: -27px;
        color: #888;
        padding-top: 5px
    }

    .primary-navigation .mega-menu-row .sub-menu-has-icons a:before, .primary-navigation .mega-menu-row > .menu-item-has-icon > a:before {
        position: absolute;
        left: 7px;
        width: 18px;
        text-align: center;
        margin: 0;
        top: 50%
    }

    .primary-navigation .mega-menu-col p + .sub-menu {
        margin-top: 12px
    }

    .primary-navigation ul ul ul li > a {
        font-weight: 500;
        font-size: 12px
    }

    .mega-menu ul.mega-menu-row li.mega-menu-col {
        padding: 20px 0
    }

    .primary-navigation .mega-menu-col > a {
        padding: 0 30px;
        width: 100%
    }

    .primary-navigation .mega-menu a {
        display: block;
        width: 100%
    }

    ul.mega-menu-row ul.sub-menu li {
        width: 100%;
        padding: 0;
        position: relative
    }

    ul.mega-menu-row ul.sub-menu li a {
        width: 100%;
        margin: 0;
        position: relative;
        left: 0
    }

    ul.mega-menu-row li ul.sub-menu, ul.sub-menu.mega-menu-row {
        border-top: none
    }

    .primary-navigation ul ul.mega-menu-row a {
        min-width: 50px
    }

    ul.mega-menu-row ul.sub-menu.sub-menu-has-icons li a {
        padding: 0 0 0 55px
    }

    ul.mega-menu-row ul.sub-menu.sub-menu-has-icons li a:before {
        position: absolute;
        left: 30px;
        top: 50%;
        -webkit-transform: translateY(-50%);
           -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
             -o-transform: translateY(-50%);
                transform: translateY(-50%);
    }

    ul.mega-menu-row ul.sub-menu li a {
        padding: 0 0 0 30px
    }

    ul.mega-menu-row ul.sub-menu ul.sub-menu {
        margin: 0;
        padding: 0
    }

    ul.mega-menu-row ul.sub-menu ul.sub-menu li a {
        margin: 0;
        position: relative;
        left: 0
    }

    ul.mega-menu-row ul.sub-menu ul.sub-menu.sub-menu-has-icons li a {
        padding: 0 0 0 80px
    }

    ul.mega-menu-row ul.sub-menu ul.sub-menu.sub-menu-has-icons li a:before {
        position: absolute;
        left: 55px;
        top: 50%
    }

    ul.mega-menu-row ul.sub-menu ul.sub-menu li a {
        padding: 0 0 0 55px
    }

    ul.mega-menu-row > li > ul > li a {
        line-height: 3em
    }

    ul.mega-menu-row ul.sub-menu ul.sub-menu ul.sub-menu.sub-menu-has-icons li a {
        padding: 0 0 0 105px
    }

    ul.mega-menu-row ul.sub-menu ul.sub-menu ul.sub-menu.sub-menu-has-icons li a:before {
        position: absolute;
        left: 80px;
        top: 50%
    }

    ul.mega-menu-row ul.sub-menu ul.sub-menu ul.sub-menu li a {
        padding-left: 80px;
        padding-right: 5px
    }

    ul.mega-menu-row ul.sub-menu ul.sub-menu ul.sub-menu ul.sub-menu.sub-menu-has-icons li a {
        padding-left: 130px;
        padding-right: 5px
    }

    ul.mega-menu-row ul.sub-menu ul.sub-menu ul.sub-menu ul.sub-menu.sub-menu-has-icons li a:before {
        position: absolute;
        left: 105px;
        top: 50%
    }

    ul.mega-menu-row ul.sub-menu ul.sub-menu ul.sub-menu ul.sub-menu li a {
        padding-left: 120px;
        padding-right: 5px
    }

    .imd-top-social .menu-toggle-imd-top-social, .primary-navigation .menu-toggle-top-menu {
        display: none;
        padding: 0
    }

    .imd-button-wrap, .mobile-header2-search, .primary-navigation button.menu-toggle-top-menu {
        display: none
    }

    .header2-search {
        display: block
    }

    .header-layout2 nav#primary-navigation {
        padding: 0;
        margin-right: 0
    }

    .header-layout2 #primary-navigation .menu-item {
        line-height: 4.6em
    }

    .header-default ul#menu-main-menu, ul#menu-main-menu {
        position: static
    }

    .header-default .site-navigation.primary-navigation {
        position: static;
        padding: 0
    }

    .header-default ul li.menu-item a {
    <?php
    $lineht = get_option( 'imedica_menulineht', 90 );
    ?>
        line-height: <?php echo $lineht.'px'; ?>
    }

    .header-layout1 #primary-navigation .menu-item a {
        line-height: 3.4em;
        padding-top: 8px;
        padding-bottom: 8px
    }

    ul.nav-menu {
        margin: 0
    }

    .navbar-inverse.navbar-fixed-top.header-default.header-fixed {
        top: -100%;
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out
    }

    .navbar-inverse.header-default ul li.menu-item a {
        line-height: 4.9em
    }

    .left_align ul.sub-menu {
        left: -100%
    }

    .left_align {
        position: relative
    }

    .header-layout1 .imedica-row.header1menu {
        margin: 0 auto;
        position: relative
    }

    .imd-fluid-layout .header-layout1 .imedica-row.header1menu {
        margin: 0 30px
    }

    .imd-fluid-layout .row.mobile-top-menu {
        margin: 0
    }

    .header-layout2 .row.mobile-top-menu {
        margin-left: 0;
        margin-right: 0
    }

    .imd-fluid-layout .header-layout2.primary-navigation {
        margin: 0 -15px
    }

    .imd-full-layout .navbar-default.navbar .imedica-container {
        margin: 0
    }

    .imd-box-layout .header-layout2.primary-navigation {
        margin: 0 -15px
    }

    .header-layout2 form.search {
        position: absolute;
        width: 100%;
        top: 50%;
        -webkit-transform: translatey(-50%);
        -ms-transform: translatey(-50%);
        transform: translatey(-50%)
    }

    .imd-box-layout .row.site-navigation.primary-navigation.header-layout1, .imd-fluid-layout .row.site-navigation.primary-navigation.header-layout1 {
        margin: 0 -15px;
        float: none
    }

    .imd-full-layout .row.site-navigation.primary-navigation.header-layout1 {
        margin: 0;
        float: none;
        padding-top: 0
    }

    #primary-navigation ul.nav-menu li.imedica-search.menu-search-default-head a:after {
        content: none
    }

    .header-menu-search {
        display: none
    }

    .header-menu-search.search-on {
        display: block;
        font-size: 13px;
        position: absolute;
        right: 0;
        background: #fff;
        z-index: 99;
        border: 1px solid #dcddde;
        top: 96%
    }

    .header-menu-search form.search {
        line-height: 1.8em;
        padding: 18px
    }

    .search-large {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: rgba(5, 5, 5, .95);
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        left: 0;
        -webkit-transition-delay: 50ms;
        transition-delay: 50ms;
        top: 0
    }

    .search-wrap {
        top: 50%;
        position: absolute;
        -webkit-transform: translate(-50%, -50%);
           -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
             -o-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        left: 50%;
        width: 85%;
        max-width: 800px
    }

    .search-large .search-wrap, .search-large form.search, .search-large.open-search {
        visibility: visible;
        opacity: 1
    }

    .search-large fieldset {
        border-bottom: 2px solid
    }

    .search-large input.imd-search {
        background: 0 0;
        border: 0;
        box-shadow: none;
        width: 90%;
        text-align: left;
        padding: 0;
        font-size: 28px;
        line-height: 90px
    }

    .search-large span.text {
        line-height: 130px;
        font-size: 28px
    }

    .search-large button.button.search-submit {
        background: 0 0;
        font-size: 24px;
        color: #C2C2C2;
        -webkit-transition: all .7s ease-In;
        transition: all .7s ease-In
    }

    .search-large button.button.search-submit:hover {
        color: #fff
    }

    .search-large input.imd-search:focus {
        border: none;
        box-shadow: none;
        color: #eee
    }

    .search-large form.search {
        -webkit-transform: scale(.9);
        transform: scale(.9);
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
        -webkit-transition-delay: 50ms;
        transition-delay: 50ms
    }

    .search-large-close {
        display: inline-block;
        width: 10%;
        color: #eee
    }

    .search-large.open-search {
        z-index: 9999
    }

    a.search-close {
        position: absolute;
        color: #fff;
        -webkit-transform: rotate(0);
        transform: rotate(0);
        right: 50px;
        top: 70px;
        font-size: 26px;
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out
    }

    a.search-close:hover {
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg)
    }

    h3.large-search-text {
        text-align: left;
        color: #fff;
        font-size: 15px;
        -webkit-transform: scale(.9);
        transform: scale(.9);
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
        -webkit-transition-delay: 50ms;
        transition-delay: 50ms
    }

    .search-large.open-search form.search, .search-large.open-search h3.large-search-text {
        -webkit-transform: scale(1);
        transform: scale(1)
    }

    a.search-close.icon-searchclose, li.imedica-search.menu-search-default-head, li.imedica-search.menu-search-default-head a {
        cursor: pointer
    }

    ul.nav-menu ul.sub-menu.mega-menu-row li.current-menu-item {
        background-color: inherit
    }

    .mega-menu, ul.sub-menu.mega-menu-row {
        width: 100% !important
    }

    .primary-navigation .mega-menu-row > .menu-item-has-icon > a {
        left: 5px !important
    }

    .header-layout2 ul#menu-main-menu {
        position: static
    }

    ul#menu-main-menu {
        display: inline-block
    }

    .mega-menu {
        position: absolute !important;
        left: 0;
        right: 0
    }

    li.menu-item-has-mega-menu {
        position: static !important
    }

    li.menu-item-has-mega-menu a {
        position: relative
    }

    .header-layout2 .main-search.header-search {
        position: absolute;
        height: 100%;
        margin: 0;
        right: 15px
    }

    .header-layout2 > .imedica-row > .container.imedica-container {
        position: relative
    }
}

.assign-menu-align a {
    text-align: right;
    line-height: 5em;
    font-weight: 600;
    font-size: 16px;
    color: #414042;
    display: inline-block;
    float: right
}

.duration-1 {
    -webkit-animation-duration: 1s;
    animation-duration: 1s
}

.duration-2 {
    -webkit-animation-duration: 2s;
    animation-duration: 2s
}

.duration-3 {
    -webkit-animation-duration: 3s;
    animation-duration: 3s
}

.duration-4 {
    -webkit-animation-duration: 4s;
    animation-duration: 4s
}

.duration-5 {
    -webkit-animation-duration: 5s;
    animation-duration: 5s
}

.delay-1 {
    -webkit-animation-delay: 1s;
    animation-delay: 1s
}

.delay-2 {
    -webkit-animation-delay: 2s;
    animation-delay: 2s
}

.delay-3 {
    -webkit-animation-delay: 3s;
    animation-delay: 3s
}

.delay-4 {
    -webkit-animation-delay: 4s;
    animation-delay: 4s
}

.delay-5 {
    -webkit-animation-delay: 5s;
    animation-delay: 5s
}

.imedica_appear_animation .blog-default-wrapper, .imedica_appear_animation .blog-grid-masonry .post-item, .imedica_appear_animation .blog-medium-image-wrapper {
    visibility: hidden;
    opacity: 0
}



/* Teansparent header adding empty space fix */
body.transparent_header .theme-showcase {
    vertical-align: top;
    display: inline-block;
    width: 100%;
}

<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;
