<?php
    function set_selected($desired_value, $new_value)
    {
        if($desired_value==$new_value)
        {
            echo ' selected="selected"';
        }
        else {
            echo " ";
        }
    }
?>