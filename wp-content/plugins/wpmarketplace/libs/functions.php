<?php

function wpmp_popular_files($start,$limit){
    global $wpdb;
    $files=$wpdb->get_results("select *, sum(oi.price) as price_total from {$wpdb->prefix}mp_orders o inner join {$wpdb->prefix}mp_order_items oi on oi.oid=o.order_id inner join {$wpdb->prefix}posts p on oi.pid=p.ID where p.post_type='wpmarketplace'and o.payment_status='Completed'  group by  oi.pid order by price_total desc limit $start, $limit");
    
    return $files;
}
//number of popular files
function wpmp_total_popular_files(){
    global $wpdb;
    $files=$wpdb->get_var("select distinct count(distinct pid) from {$wpdb->prefix}mp_orders o inner join {$wpdb->prefix}mp_order_items oi on oi.oid=o.order_id inner join {$wpdb->prefix}posts p on oi.pid=p.ID where p.post_type='wpmarketplace' and o.payment_status='Completed'");    
    
    return $files;
}
//number of total sales
function wpmp_total_purchase($pid=''){
     global $wpdb;
     if(!$pid) $pid = get_the_ID();
     $sales = $wpdb->get_var("select count(*) from {$wpdb->prefix}mp_orders o, {$wpdb->prefix}mp_order_items oi where oi.oid=o.order_id and oi.pid='$pid' and o.payment_status='Completed'");
     return $sales;
}
 
//the function for adding the product from the frontend
function wpmp_add_product(){ 
    if(wp_verify_nonce($_POST['__product_wpmp'],'wpmp-product')&&$_POST['task']==''){ //echo "here";exit; 
        if( $_POST['post_type']=="wpmarketplace"){
            global $current_user, $wpdb;
            get_currentuserinfo();    
            $settings = get_option('_wpmp_settings');
            $pstatus=$settings['fstatus']?$settings['fstatus']:"draft";
            $my_post = array(
             'post_title' => $_POST['product']['post_title'],
             'post_content' => $_POST['product']['post_content'],
             'post_excerpt' => $_POST['product']['post_excerpt'],
             'post_status' => $pstatus,
             'post_author' => $current_user->ID,
             'post_type' => "wpmarketplace" 
             
            );

            if($_POST['id']){
              //update post
              $my_post['ID']=$_REQUEST['id'];
              wp_update_post( $my_post );
               $postid= $_REQUEST['id'];  
            }else{
              //insert post
              $postid=wp_insert_post( $my_post );
            }


            update_post_meta($postid,"wpmp_list_opts",$_POST['wpmp_list']);  

             //set the product type
            wp_set_post_terms($postid,$_POST['product_type'], "ptype"); 

            foreach($_POST['wpmp_list'] as $k=>$v){
                update_post_meta($postid,$k,$v);
             
            }


            if($_POST['wpmp_list']['fimage']){
              $wp_filetype = wp_check_filetype(basename($_POST['wpmp_list']['fimage']), null );
              $attachment = array(
                 'post_mime_type' => $wp_filetype['type'],
                 'post_title' => preg_replace('/\.[^.]+$/', '', basename($_POST['wpmp_list']['fimage'])),
                 'post_content' => '',
                 'guid' => $_POST['wpmp_list']['fimage'],
                 'post_status' => 'inherit'
              );
              $attach_id = wp_insert_attachment( $attachment, $_POST['wpmp_list']['fimage'], $postid );
              
              set_post_thumbnail( $postid, $attach_id );
            }
        }
          
        header("Location: ".$_SERVER['HTTP_REFERER']);
        die();
     }
}
 
 ///for withdraw request
 function wpmp_withdraw_request(){
     global $wpdb, $current_user;

     $uid = $current_user->ID;

     if($_POST['withdraw']==1 && $_POST['withdraw_amount']>0){
    
        $wpdb->insert( 
        "{$wpdb->prefix}mp_withdraws",
        array( 
            'uid' => $uid,
             'date' => time(),
             'amount' => $_POST['withdraw_amount'],
             'status' => 0
        ), 
        array( 
            '%d', 
            '%d', 
            '%f', 
            '%d' 
        ) 
    );
    header("Location: ".$_SERVER['HTTP_REFERER']);
    die();    
    }
     
 }
 
 //count the total number of product
 function total_product(){
   global $wpdb;
   $total_product=$wpdb->get_var("select count(ID) from {$wpdb->prefix}posts where post_type='wpmarketplace' and post_status='publish'");
   return $total_product;  
 }
 //featured products
 function feature_products($show=10){
    global $wpdb;
    $files=$wpdb->get_results("select * from {$wpdb->prefix}mp_feature_products fp inner join {$wpdb->prefix}posts p on p.ID=fp.productid where p.post_type='wpmarketplace' and ".time()." between startdate and enddate limit 0,{$show}");
    return $files;
 }
 
 function featured_products($show=10){
    global $wpdb;
    $files=$wpdb->get_results("select * from {$wpdb->prefix}mp_feature_products fp inner join {$wpdb->prefix}posts p on p.ID=fp.productid where p.post_type='wpmarketplace' and p.post_status='publish' and ".time()." between startdate and enddate limit 0,{$show}");
    return $files;
 }
 
 //top rated products
 function top_rate_products($show=10){
    global $wpdb;
    $querystr = "
    SELECT $wpdb->posts.* 
    FROM $wpdb->posts, $wpdb->postmeta
    WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id 
    AND $wpdb->postmeta.meta_key = 'avg_rating' 
    AND $wpdb->posts.post_status = 'publish' 
    AND $wpdb->posts.post_type = 'wpmarketplace'
    ORDER BY $wpdb->postmeta.meta_value DESC  limit 0,{$show}
 ";

 $pageposts = $wpdb->get_results($querystr, OBJECT); 
 return $pageposts;
 }


 function wpmp_redirect($url){
     if(!headers_sent())
         header("location: ". $url);
     else
         echo "<script>location.href='{$url}';</script>";
     die();
 }
 function wpmp_js_redirect($url){

         echo "&nbsp;Redirecting...<script>location.href='{$url}';</script>";
     die();
 }


 function wpmp_members_page(){
     $settings = get_option('_wpmp_settings');
     return get_permalink($settings['members_page_id']);
 }
 
  function wpmp_orders_page(){
     $settings = get_option('_wpmp_settings');
     return get_permalink($settings['orders_page_id']);
  }

/**
 * Retrienve Site Commissions on User's Sales
 * @param null $uid
 * @return mixed
 */
function wpmp_site_commission($uid = null){
      global $current_user;
      $user = $current_user;
      if($uid) $user = get_userdata($uid);
      $comission = get_option("wpmp_user_comission");
      $comission =  $comission[$user->roles[0]];
      return $comission;
  }



function wpmp_get_user_earning(){

}


function wpmp_product_price($pid){
    $pinfo = get_post_meta($pid,"wpmp_list_opts",true);
    $price = $pinfo['sales_price']?$pinfo['sales_price']:$pinfo['base_price'];
    return number_format($price,2);
}

function wpmp_addtocart_link($id){
    $pinfo = get_post_meta($id,"wpmp_list_opts",true);
    @extract($pinfo);
    $cart_enable="";
    if($settings['stock']['enable']==1){
        if($manage_stock==1){
            if($stock_qty>0)$cart_enable=""; else $cart_enable=" disabled ";
        }
    }
    if($price_variation)
        $html = "<a href='".get_permalink($id)."' class='btn btn-info btn-small' ><i class='icon-shopping-cart icon-white'></i> ".__("Add to Cart","wpmarketplace")."</a>";
    else{
        $html = <<<PRICE
                        <form method="post" action="" name="cart_form">
                        <input type="hidden" name="add_to_cart" value="add">
                        <input type="hidden" name="pid" value="$id">
                        <input type="hidden" name="discount" value="$discount">

PRICE;
        $html.='<button '.$cart_enable.' class="btn btn-info btn-small" type="submit" ><i class="icon-shopping-cart icon-white"></i> '.__("Add to Cart","wpmarketplace").'</button></form>';

    }
    return $html;
}


function wpmp_user_dashboard(){
    include(WPMP_BASE_DIR.'tpls/dashboard.php');
    return $data;
}


function wpmp_all_products($params){
    include(WPMP_BASE_DIR.'tpls/catalog.php');
}


 
 function wpmp_head(){
    ?>
    
        <script language="JavaScript">
         <!--
         var wpmp_base_url = '<?php echo plugins_url('/wpmarketplace/'); ?>';
         jQuery(function(){
             jQuery('.wpmp-thumbnails a').lightBox({fixedNavigation:true});
         });  
         //-->
         </script>
    
    <?php 
 }
