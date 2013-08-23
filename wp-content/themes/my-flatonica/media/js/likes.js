var likes = new Object();

likes.set = function( postID , method ){
    jQuery(function(){
        jQuery.post( ajaxurl , 
            {
                'action' : 'likes_set',
                'post_id': postID,
                'method' : method
            },
            function( result ){
                jQuery( '.like-' + postID ).html( result );
            }
        );
    });
}