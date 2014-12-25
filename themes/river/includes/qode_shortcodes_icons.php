<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>

<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Size</label>
            <select name="size" id="size">
                <option value=""></option>
                <option value="icon-large">Tiny</option>
                <option value="icon-2x">Small</option>
                <option value="icon-3x">Medium</option>
                <option value="icon-4x">Large</option>
            </select>
        </div>
        <div class="input">
            <label>Custom Size (px)</label>
            <input name="custom_size" id="custom_size" value="" maxlength="10" size="10" />
        </div>
        <div class="input">
            <label>Icon</label>
            <select id="icon" name="icon">
                <option value=""></option>
                    <?php
                        $fa_icons = getFontAwesomeIconArray();
                        foreach ($fa_icons as $key => $value) {
                    ?>
                    <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="input">
            <label>Type</label>
            <select name="type" id="type">
                <option value="normal">Normal</option>
                <option value="circle">Circle</option>
                <option value="square">Square</option>
            </select>
        </div>
        <div class="input">
            <label>Position</label>
            <select name="position" id="position">
                <option value="">Normal</option>
                <option value="left">Left</option>
                <option value="right">Right</option>
            </select>
        </div>
        <div class="input">
            <label>Border</label>
            <select name="border" id="border">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="input">
            <label>Border Color (Only for Square type)</label>
            <div class="colorSelector"><div style=""></div></div>
            <input type="text" name="border_color" id="border_color" value="" size="12" maxlength="12" />
        </div>
        <div class="input">
            <label>Icon Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_color" id="icon_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Background Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Margin (top right bottom left):</label>
            <input name="margin" id="margin" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>

</div>