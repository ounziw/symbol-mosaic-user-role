<?php
// モザイク関連の関数

function mur_user_has_mosaic( $user_id ) {
    if (!$user_id) {
        return false;
    }

    $mosaic = get_option('symbol_mosaic_id');
    if (!$mosaic) {
        return false;
    }

    $address = get_user_meta($user_id, 'symbol_wallet', true);
    if (!$address) {
        return false;
    }

    $amount = get_option('symbol_mosaic_amount', 1);

    return has_mosaic( $mosaic, $amount, $address );
}

function mur_current_user_has_mosaic() {
    if (!is_user_logged_in()) {
        return false;
    }

    return mur_user_has_mosaic( get_current_user_id() );
}
