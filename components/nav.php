<?php

/** navigation component
 * call this template to get an output of the desired navigation
 *
 * variables accepted:
 *    $nav_menu
 *    $nav_classes
 *    $nav_id
 *    $nav_data_attr
 */

?>

<nav
  role="navigation"
  <?php 
    // * ID
    isset($nav_id) ? print 'id="' . $nav_id . '" ' : '' ;
    // * Classes
    isset($nav_classes) ? print 'class="' . $nav_classes . '" ' : '' ;
    // * Data attributes
    isset($nav_data_attr) ? print $nav_data_attr : '' ;
  ?>
>
  <?php isset($nav_menu) ? print $nav_menu : print 'Please define what menu to display using the variable $nav_menu in the referring file' ; ?>
  
</nav>