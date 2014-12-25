<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Type</label>
            <select name="type" id="type">
                <option value="with_border">With border</option>
                <option value="without_border">Without border</option>
            </select>
        </div>
        <div class="input">
            <label>Background Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Border Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="border_color" id="border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Link (only with 'elegant' type)</label>
            <input name="link" id="link" value="" size="55" />
        </div>
        <div class="input">
            <label>Link Target</label>
            <select name="target" id="target">
                <option value=""></option>
                <option value="_self">Self</option>
                <option value="_blank">Blank</option>
                <option value="_parent">Parent</option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>