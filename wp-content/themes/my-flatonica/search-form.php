<div class="search-bar">
    <div class="container-fluid my-container">
        <form action="<?php echo esc_url( home_url( "/" ) ); ?>/" method="get" id="searchform" class="row-fluid">
            <fieldset>
                <input class="input span4 offset6" name="s" type="text" id="keywords" value="<?php _e( 'type here to search...' , 'myThemes' ); ?>" onfocus="if (this.value == '<?php _e( 'type here to search...' , 'myThemes' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'type here to search...' , 'myThemes' ); ?>';}"/>
                <input type="submit" value="search" class="button red span2 pull-right">    
            </fieldset>
        </form>
    </div>    
</div>