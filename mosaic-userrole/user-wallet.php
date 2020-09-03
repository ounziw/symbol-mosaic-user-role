<?php
// ウォレットのアドレスを入れられるようにする
//
function mur_symbol_wallet( $user_contact ) {
    $user_contact['symbol_wallet'] = 'Symbolのアドレス';
    return $user_contact;
}
add_filter( 'user_contactmethods', 'mur_symbol_wallet' );