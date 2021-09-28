<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Post_Tab
 * @subpackage Post_Tab/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="dynamic_tab">
    <div class="tab_head">
        <ul class="tab_tabs">
            <?php 
            if(count($urls) > 0){
                $item_active = 'active_item';
                $numbers = 1;
                foreach($urls as $key => $img){
                    echo _e('<li data-id="'.$key.'" class="tab_item '.$item_active.'">Page '.$numbers.'</li>', 'dynamic-tabs');
                    $item_active = '';
                    $numbers++;
                }
            }
            ?>
        </ul>
    </div>
    <div class="tab_contents">
        <?php
        if(count($urls) > 0){
            $img_active = 'tabshow';
            foreach($urls as $key => $img){
                ?>
                <div data-id="<?php echo $key ?>" class="tab_item_data <?php echo $img_active ?>">
                    <div class="tab_image">
                        <img src="<?php echo $img ?>" alt="tab-image">
                    </div>
                </div>
                <?php
                $img_active = '';
            }
        }
        ?>
    </div>
</div>