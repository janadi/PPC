<?php
    class likes{
        
        static $db;
        static $per_page;
        
        static function setLike( $postID , $userID , $status = 1 )
        {
            if( self::doUpdateLike( $postID , $userID ) ){
                self::$db[ 'obj' ] -> query(
                    "UPDATE " . self::$db[ 'my_likes' ] . " 
                        SET status =  " . $status . " 
                        WHERE userID = '" . $userID . "'
                        AND  postID = " . $postID 
                );
            }else{
                self::$db[ 'obj' ] -> insert(
                    self::$db[ 'my_likes' ],
                    array( 
                        'postID' => $postID,
                        'userID' => $userID,
                        'timestamp' => time(),
                        'status' => $status 
                    )
                );
            }
        }
        
        static function unsetLike( $postID , $userID )
        {
            self::$db[ 'obj' ] -> query(
                "DELETE FROM " . self::$db[ 'my_likes' ] . 
                " WHERE postID = " . $postID .
                " AND userID = '" . $userID . "'" .
                " AND status = 1" 
            );
        }
   
        /* LIKES ACTION */
        static function canLikeUp( $postID , $userID )
        {
            $record = self::$db[ 'obj' ] -> get_row( "SELECT * FROM " . self::$db[ 'my_likes' ] . " WHERE postID = " . $postID . " AND userID = '" . $userID . "'" );
            return empty( $record ) || ( is_object( $record ) && property_exists( $record , 'status' ) && $record -> status == 0 );
        }
        
        static function canLikeDown( $postID , $userID )
        {
            $record = self::$db[ 'obj' ] -> get_row( "SELECT * FROM " . self::$db[ 'my_likes' ] . " WHERE postID = " . $postID . " AND userID = '" . $userID . "'" );
            
            if( empty( $record ) || ( is_object( $record ) && property_exists( $record , 'status' ) && $record -> status == 1 ) ){
                return true;
            }else{
                return false;
            }
        }
        
        static function doUpdateLike( $postID , $userID )
        {
            $record = self::$db[ 'obj' ] -> get_row( "SELECT * FROM " . self::$db[ 'my_likes' ] . " WHERE postID = " . $postID . " AND userID = '" . $userID . "'" );
            return !empty( $record ) && is_object( $record ) && property_exists( $record , 'status' );
        }
        
        /* HOT ACTION */
        static function isHot( $postID )
        {
            $limit = myThemes::cfg( 'hot-limit' );
            
            $result = self::$db[ 'obj' ] -> get_row( "SELECT count( *  ) nr FROM " . self::$db[ 'my_likes' ] . " WHERE postID = " . $postID . "  AND status = 1" );
            
            if( $limit > $result -> nr ){
                return false;
            }else{
                return true;
            }
        }
        
        static function isSetHot( $postID )
        {
            $result = self::$db[ 'obj' ] -> get_row( "SELECT * FROM " . self::$db[ 'my_hot_posts' ] . " WHERE postID = " . $postID );
            
            if( !empty( $result  ) ){
                return true;
            }
            else{
                return false;
            }
        }
        
        static function setHot( $postID )
        {
            self::$db[ 'obj' ] -> insert(
                self::$db[ 'my_hot_posts' ] ,
                array(
                    'postID' => $postID 
                )
            );
        }
        
        static function resetHot( $postID )
        {
            $post = get_post( $postID );
            
            self::$db = myThemes::cfg( 'db' );
            
            if( self::isHot( $post -> ID ) && !empty( $post ) && $post -> post_status == 'publish' ){
                if( !self::isSetHot( $post -> ID ) ){
                    self::setHot( $post -> ID );
                }
            }else{
                if( self::isSetHot( $post -> ID ) ){
                    self::unsetHot( $post -> ID );
                }
            }
        }
        
        static function unsetHot( $postID )
        {
            self::$db[ 'obj' ] -> query( "DELETE FROM " . self::$db[ 'my_hot_posts' ] . " WHERE postID = " . $postID );
        }
        
        static function getHotPosts( $page = 0 )
        {
            self::$db = myThemes::cfg( 'db' );
            self::$per_page = get_option( 'posts_per_page' );
            
            $start = $page * self::$per_page;
            
            return self::$db[ 'obj' ] -> get_results( "SELECT * FROM " . self::$db[ 'my_hot_posts' ] . " LIMIT " . $start . ' , ' . self::$per_page );
        }
        
        static function getPagination(){
            global $post;
            global $wp_query;
            self::$db = myThemes::cfg( 'db' );
            
            $res = self::$db[ 'obj' ] -> get_row( "SELECT count( * ) total FROM " . self::$db[ 'my_hot_posts' ] );
            
            $max = (int)( $res -> total / self::$per_page );
            
            if( ( $res -> total % self::$per_page ) > 0 ){
                $max++;
            }
            
            $pagination = array(
                'base'          => get_pagenum_link(1) . '%_%',
                'format'        => '?paged=%#%',
                'total'        => $max,
                'current'       => max( 1, $wp_query -> query_vars[ 'paged' ] ),
                'show_all'      => False,
                'end_size'      => 1,
                'mid_size'      => 2,
                'prev_next'     => True,
                'prev_text'     => '&larr;',
                'next_text'     => '&rarr;',
                'type'          => 'list',
                'add_args'     => array(),
                'add_fragment' => ''
            );
            
            $pgn = paginate_links( $pagination );
	
            if( !empty( $pgn ) ){
            ?>
                <div class="pagination">
                    <nav class="inline aligncenter">
                        <?php echo $pgn ?>
                    </nav>
                </div>
            <?php		
            }
        }
        
        /* ADD LIKE / DISLIKE | UP / DOWN */
        static function set( )
        {            
            $method = isset( $_POST[ 'method' ] ) && (int)$_POST[ 'method' ] ? (int)$_POST[ 'method' ] : 0;
            $postID = isset( $_POST[ 'post_id' ] ) && (int)$_POST[ 'post_id' ] ? (int)$_POST[ 'post_id' ] : exit();
            
            $userID = $_SERVER[ 'REMOTE_ADDR' ];
            
            $post = get_post( $postID );
            
            if( !isset( $post -> ID ) )
                exit();

            self::$db = myThemes::cfg( 'db' );
    
            if( self::canLikeUp( $post -> ID , $userID ) ){
                self::setLike( $post -> ID , $userID );
            }else{
                self::unsetLike( $post -> ID , $userID );
            }

            /* VERIFY HOT POST */
            self::resetHot( $post -> ID );

            /* RESET POST META LIKES */
            $up = self::countLikes( $post -> ID );

            meta::set( $post -> ID , 'likes' , array( 1 => $up ) );

            if( $method ){
                echo self::get2( $post -> ID );
            }
            else{
                echo self::get( $post -> ID );
            }
            
            exit();
        }
        
        static function get( $postID )
        {   
            self::$db = myThemes::cfg( 'db' );
            
            $userID = $_SERVER[ 'REMOTE_ADDR' ];
            
            $likes = '<strong>' . self::getNumberLikes( $postID ) . '</strong>';
            if( $likes == 1 ){
                $likes  .= ' ' . __( 'Like' , 'myThemes' );
            }
            else{
                $likes  .= ' ' . __( 'Likes' , 'myThemes' );
            }
            
            if( self::canLikeUp( $postID , $userID ) ){
                $classes = "post-meta-likes";
            }
            else{
                $classes = "post-meta-likes liked";
            }
            
            return '<a href="javascript:likes.set( ' . $postID . ' , 0 );" class="' . $classes . '"><i class="meta-icon"></i>' . $likes . '</a>';
        }
        
        static function get2( $postID )
        {   
            self::$db = myThemes::cfg( 'db' );
            
            $userID = $_SERVER[ 'REMOTE_ADDR' ];
            
            $likes = '<span>' . self::getNumberLikes( $postID ) . '</span>';
            
            if( self::canLikeUp( $postID , $userID ) ){
                $classes = "button white likes";
            }
            else{
                $classes = "button white likes liked";
            }
            
            return '<a href="javascript:likes.set( ' . $postID . ' , 1 );" class="' . $classes . '"><i></i>' . $likes . '</a>';
        }
        
        static function countLikes( $postID , $status = 1 )
        {
            self::$db = myThemes::cfg( 'db' );
            
            $record = self::$db[ 'obj' ] -> get_row( "SELECT count( * ) numberLikes FROM " . self::$db[ 'my_likes' ] . " WHERE postID = " . $postID . " AND status = " . $status );
            return $record -> numberLikes;
        }
        
        static function getNumberLikes( $postID , $status = 1 )
        {
            return (int)meta::get( $postID , 'likes' , $status );
        }
    }
?>