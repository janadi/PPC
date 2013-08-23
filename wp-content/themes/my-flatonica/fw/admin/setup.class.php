<?php
    class setup{
        
        static $db;
        
        static function likes()
        {
            self::$db = myThemes::cfg( 'db' );
            
            $wp_my_likes = "CREATE TABLE IF NOT EXISTS `" . self::$db[ 'my_likes'] . "` (
                `userID` VARCHAR( 15 ) NOT NULL ,
                `postID` INT( 9 ) NOT NULL ,
                `timestamp` INT NOT NULL ,
                `status` INT( 1 ) NOT NULL ,
                INDEX (  `userID` ,  `postID` ,  `timestamp` ),
                UNIQUE KEY `like` (  `userID` ,  `postID` )
            ) ENGINE = INNODB;";
            
            $wp_my_hot_posts = "CREATE TABLE IF NOT EXISTS `" . self::$db[ 'my_hot_posts' ] . "` (
                `ID` INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                `postID` INT( 9 ) NOT NULL ,
                INDEX (  `postID` )
            ) ENGINE = INNODB;";
            
            if( !( self::$db[ 'obj' ] -> query( $wp_my_likes ) && self::$db[ 'obj' ] -> query( $wp_my_hot_posts ) ) )
                _e( 'An error occurred querying the database, try again or verify database settings.' , 'myThemes' );
        }
    }
?>