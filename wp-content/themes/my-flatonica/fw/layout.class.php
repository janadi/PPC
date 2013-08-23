<?php
/*
    Version : 0.0.2
 */

class layout {
    public $layout = '';
    public $sidebars = '';
    public $sidebarsNr = '';
    public $contentClass = '';
    public $itemid = '';
    public $template = '';
    public $containerClass = '';
	
    function _get( $setting, $template, $itemId ) {
        
        /* ONLYR FOR CATEGORY TEMPLATE */
        $rett = '';
        $id = $itemId;
        $temp = $template;
			
        switch( $template ){
	
            case 'front-page':
            case 'single':
            case 'page':
                $rett = meta::get( $itemId , 'post-' . $setting );
                
                if( $rett ) break;
                $rett = myThemes::get( $template . '-' . $setting  );
                
                if( $rett ) break;
                $rett = myThemes::get( $setting  );
                break;
            default: {		
                $rett = myThemes::get( $setting  );
                break;
            }
        }
		
        return $rett;
    }

    function layout( $template = '', $itemId = 0 )
    {   
        $this -> itemid = $itemId;
        $this -> template = $template;
        
        $this -> layout = $this -> _get( 'layout' , $template, $itemId );
        
        if( $this -> layout == 'left' || $this -> layout == 'right' ){
            $layout = 'left';
            if( $this -> layout == 'left' )
                $layout = 'right';
            
            $this -> contentClass = 'span8';
            return;
        }
        
        $this -> contentClass = 'span12';
    }
	
    function echoSidebar( $position )
    {
        $sidebar = $this -> _get( 'sidebar', $this -> template, $this -> itemid );
        
        if( $this -> layout == $position ){
            echo '<aside class="span4">';
                dynamic_sidebar( $sidebar );
            echo '<div class="clearfix"></div>';
            echo '</aside>';
            return;
        }
    }
	
    function contentClass( ) {
        return $this -> contentClass;
    }
    
    function countSidebars( $layout )
    {
        return count( explode( '+', $layout ) ) - 2;
    }
}
?>