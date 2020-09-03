<?php
// 管理画面の作成 wordpress の標準機能 settings api 使用

// フィールドの追加
function mur_settings_field_mosaic() {
    // mosaic idを指定する
    add_settings_field(
        'mosaic_id', // フィールド名
        'モザイクID', // タイトル
        'mur_mosaic_id_callback_function', // コールバック関数。この関数の実行結果が出力される
        'symbol_api_settings', // このフィールドを表示するページ名。do_settings_sectionsで設定
        'symbol_api_settings_section' // このフィールドを表示するセクション名。add_settings_sectionで設定
    );

    register_setting(
        'symbol_api_settings-group', // グループ名。settings_fieldsで設定
        'symbol_mosaic_id', // オプション名
        'esc_attr' // 入力値をサニタイズする関数
    );

    // モザイクの量
    add_settings_field(
        'mosaic_amount', // フィールド名
        'モザイクの量', // タイトル
        'mur_mosaic_amount_callback_function', // コールバック関数。この関数の実行結果が出力される
        'symbol_api_settings', // このフィールドを表示するページ名。do_settings_sectionsで設定
        'symbol_api_settings_section' // このフィールドを表示するセクション名。add_settings_sectionで設定
    );

    register_setting(
        'symbol_api_settings-group', // グループ名。settings_fieldsで設定
        'symbol_mosaic_amount', // オプション名
        'intval' // 入力値をサニタイズする関数
    );

    // モザイク所有者の権限
    add_settings_field(
        'mosaic_holder_role', // フィールド名
        'モザイク保有者の権限', // タイトル
        'mur_mosaic_holder_role_callback_function', // コールバック関数。この関数の実行結果が出力される
        'symbol_api_settings', // このフィールドを表示するページ名。do_settings_sectionsで設定
        'symbol_api_settings_section' // このフィールドを表示するセクション名。add_settings_sectionで設定
    );

    register_setting(
        'symbol_api_settings-group', // グループ名。settings_fieldsで設定
        'symbol_mosaic_holder_role', // オプション名
        'esc_attr' // 入力値をサニタイズする関数
    );
}

add_action('admin_init', 'mur_settings_field_mosaic', 20);

// フォーム項目を表示する
function mur_mosaic_id_callback_function() {
    echo '<input name="symbol_mosaic_id" id="symbol_mosaic_id" type="text" value="';
    form_option('symbol_mosaic_id');
    echo '" size="30" />';
}

function mur_mosaic_amount_callback_function() {
    echo '<input name="symbol_mosaic_amount" id="symbol_mosaic_amount" type="number" value="';
    form_option('symbol_mosaic_amount');
    echo '" size="10" />';
}

function mur_mosaic_holder_role_callback_function() {
    echo '<select name="symbol_mosaic_holder_role" id="symbol_mosaic_holder_role">';
    $role = get_option('symbol_mosaic_holder_role', 'subscriber');
    wp_dropdown_roles( $role );
    echo '</select>';
}