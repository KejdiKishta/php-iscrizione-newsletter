<?php
function check_email($email) {
    if (isset($email)) {
        $user_email = $email;
        if (str_ends_with($user_email, ".it") || str_ends_with($user_email, ".com") ) {
            return true;
        } else {
            return false;
        }
    }    
}