<?php
/**
 * Author: kamino
 * CreateTime: 2018/4/19,下午 04:24
 * Description:
 * Version:
 */

/*
 * 短代码[secret] 内容部分加密
 */
function e_secret( $atts, $content = null ) {
	$key = '';
	extract( shortcode_atts( array( 'key' => null ), $atts ) );
	if ( isset( $_POST['e_secret_key'] ) && $_POST['e_secret_key'] == $key ) {
		return '<div class="e-secret e-secret-bgc">' . $content . '</div>';
	} else {
		return '<form class="e-secret" action="' . get_permalink() . '" method="post" name="e-secret"><label>输入密码查看加密内容：</label><input type="password" name="e_secret_key" class="euc-y-i" maxlength="50"><input type="submit" class="euc-y-s" value="确定"><div class="euc-clear"></div></form>';
	}
}
