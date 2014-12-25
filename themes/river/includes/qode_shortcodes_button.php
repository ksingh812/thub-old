<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Size</label>
            <select name="size" id="size">
                <option value="">Default</option>
                <option value="tiny">Tiny</option>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
                <option value="full_width">Full Width</option>
            </select>
        </div>
        <div class="input">
            <label>Type</label>
            <select name="type" id="type">
                <option value="normal">Normal</option>
                <option value="no_fill">Transparent</option>
            </select>
        </div>
        <div class="input">
            <label>Text</label>
            <input name="text" id="text" value="" />
        </div>
        <div class="input">
            <label>Link</label>
            <input name="link" id="link" value="" size="55" />
        </div>
        <div class="input">
            <label>Target</label>
            <select name="target" id="target">
                <option value="_self">Self</option>
                <option value="_blank">Blank</option>
                <option value="_parent">Parent</option>
                <option value="_top">Top</option>
            </select>
        </div>
        <div class="input">
            <label>Border Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="border_color" id="border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="color" id="color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Background Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Font style</label>
            <select name="font_style" id="font_style">
                <option value=""></option>
                <option value="normal">Normal</option>
                <option value="italic">Italic</option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>
<script type="text/javascript">
    colorPicker();
</script>