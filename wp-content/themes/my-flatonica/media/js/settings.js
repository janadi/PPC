jQuery(document).ready(function(){
    jQuery('header nav.nav ul li').find('ul').each(function(){
        if( !jQuery(this).parent('li').hasClass('submenu-arrow') ){
            jQuery(this).parent('li').addClass('submenu-arrow');
        }
    });
});