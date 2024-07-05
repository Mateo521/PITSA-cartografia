



<?php


wp_head(); 

echo do_shortcode( '[ultimate_maps id="1"]'); 


wp_footer();

?>

<style>
    .umsMapDetailsContainer,.leaflet-container{
        height: 100% !important;
    }
</style>