<?php

$cnt = do_shortcode(wpautop($post->post_content));
 
$content = ' <br><br>
 
<ul class="nav nav-tabs" id="wpmp-tabs">
              <li class="active"><a data-toggle="tab" href="#desc">'.__('Description','wpmarketplace').'</a></li>
               
</ul> 

<div id="tab-content" class="tab-content">'.$cnt.'</div>
  
';
