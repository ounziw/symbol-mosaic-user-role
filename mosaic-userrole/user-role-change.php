<?php
// ユーザーが自分の情報を保存した時に、モザイク情報にもとづいて権限を変更する

function mur_role_change( $user_id ) {
    if (!$user_id) {
        return;
    }

    $u = new WP_User( $user_id );
    $roles = $u->roles;

    // 管理者権限の場合は、別の権限には変更しない
    if (in_array('administrator', $roles) ){
        return;
    }

    // モザイクを持っていたら、権限を変更する
    if ( mur_user_has_mosaic( $user_id ) ) {
        $role = get_option('symbol_mosaic_holder_role', 'subscriber');
        $u->set_role( $role );
    }
}

add_action('personal_options_update', 'mur_role_change');
add_action('edit_user_profile_update', 'mur_role_change');