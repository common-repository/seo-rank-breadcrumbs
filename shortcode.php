<?php
if ( ! shortcode_exists( 'seo-rank-breadcrumbs' ) ) {
   if ( function_exists( 'seo_rank_breadcrumbs' )) {
add_shortcode( 'seo-rank-breadcrumbs', 'seo_rank_breadcrumbs' );
}
}
?>