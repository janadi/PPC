<form action="<?php echo esc_url( home_url( "/" ) ); ?>/" method="get" id="searchform">
    <fieldset>
        <div id="searchbox">
            <input type="text" name="s"  id="keywords" value="<?php _e( 'type here...' , 'myThemes' ); ?>" onfocus="if (this.value == '<?php _e( 'type here...' , 'myThemes' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'type here...' , 'myThemes' ); ?>';}">
            <button type="submit" class="span3 pull-right button red" value=""><i></i></button>
        </div>
    </fieldset>
</form>