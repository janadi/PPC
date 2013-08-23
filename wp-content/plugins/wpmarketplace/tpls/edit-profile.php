<?php
    global $current_user, $wpdb;
    $user = $wpdb->get_row("select * from {$wpdb->prefix}users where ID=".$current_user->ID);
     
?>
<div class="my-profile wp-marketplace">

<div id="form" class="form profile-form">

<form method="post" id="validate_form" class="wpmp-edit-profile-form row-fluid" name="contact_form" action="">
    <input type="hidden" name="dact" value="update-profile" />
                                            <ul>
                                                <li class="span12"><h3>My Profile</h3></li>
                                                <?php if($_SESSION['member_error']){ ?>
                                                <li class="span11"><div class="alert alert-error"><b>Save Failed!</b><br/><?php echo implode('<br/>',$_SESSION['member_error']); unset($_SESSION['member_error']); ?></div></li>
                                                <?php } ?>
                                                <?php if($_SESSION['member_success']){ ?>
                                                <li class="span11"><div class="alert alert-success"><b>Done!</b><br/><?php echo $_SESSION['member_success']; unset($_SESSION['member_success']); ?></div></li>
                                                <?php } ?>
                                            </ul>
                                            <ul>
                                                <li class="span6"><label for="name">Your name: </label><input type="text" class="required" value="<?php echo $user->display_name;?>" name="profile[display_name]" id="name"></li>
                                                <li class="span6"><label for="email">Your Email:</label><input type="text" class="required" value="<?php echo $user->user_email;?>" name="profile[user_email]" id="email"></li>
                                                <li class="span6"><label for="phone">Phone Number: </label><input type="text" class="required" value="<?php echo get_user_meta($current_user->ID,'phone',true);?>" name="phone" id="phone"> </li>
                                                <li class="span6"><label for="company_name">PayPal Account: </label><input type="text" value="<?php echo get_user_meta($current_user->ID,'payment_account',true);?>" name="payment_account" id="payment_account" placeholder="Add paypal or moneybookers email here"> </li>
                                                <li class="span6"><label for="new_pass">New Password: </label><input placeholder="Use nothing if you don't want to change old password" type="password" value="" name="password" id="new_pass"> </li>
                                                <li class="span6"><label for="re_new_pass">Re-type New Password: </label><input type="password" value="" name="cpassword" id="re_new_pass"> </li>
                                                <li class="span12"><label for="message">Description:</label><textarea class="required" cols="40" rows="8" name="profile[description]" id="message"><?php echo htmlspecialchars(stripslashes($current_user->description));?></textarea></li>
                                                <li class="span12"><button type="submit" class="btn btn-large btn-primary"><i class="icon-ok icon-white"></i> Save Changes</button></li>
                                            </ul>
                                            <div class="clear"></div>

</form>
</div>
</div>