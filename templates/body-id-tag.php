<?php
/**
 *
 * The Template for attribute value for the body tag
 *
 * This is so that we can apply custom styling depending on the
 * page that we have
 * template built by Sunil Williams
 * sunil@sunil.co.nz
 *
 */
?><?php
// give our body tag target properties
// depending on which page is being served

$tags = array() ;

if (is_front_page()) {
  array_push($tags, "homepage") ;
}
elseif(is_page('news')) {
  array_push($tags, "page-news") ;
}
elseif(is_page('blog')) {
 array_push($tags, "blog") ;
}
elseif(is_page('team')) {
  array_push($tags, "team") ;
}
elseif(is_page('contact')) {
 array_push($tats, "contact") ;
}
elseif(is_archive()) {
  array_push($tags, "page-archive") ;
}
elseif(is_search()){
  array_push($tags, "search_page") ;
}
elseif(is_404()) {
  array_push($tags, "404") ;
}
elseif ( function_exists( is_product )) { /* for woocommerce */
  if(is_product()) {
    array_push($tags, "page-product") ;
  }
}
elseif(is_single()) {
  array_push($tags, "page-single") ;
}
elseif (is_category()) {
  array_push($tags, "category-page") ;
}

else {
 array_push($tags, "page") ;
}

echo( join(" ", $tags) ) ;