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
?>
<?php
// give our body tag target properties
// depending on which page is being served
if (is_front_page()) {
  echo "homepage" ;
}
elseif(is_page('news')) {
  echo "page-news" ;
}
elseif(is_page('team')) {
  echo "page-team" ;
}
elseif(is_page('contact')) {
  echo "page-contact" ;
}
elseif(is_archive()) {
  echo "page-archive" ;
}
elseif(is_search()){
  echo "search-page" ;
}
elseif(is_404()) {
  echo "page-404" ;
}
elseif(is_product()) {
echo "page-product" ;
}
elseif(is_single()) {
echo "page-single" ;
}
elseif (is_category()) {
  echo "category-page" ;
}
elseif (is_tax()) {
  echo "tax" ;
}
else {
  echo "page" ;
}
