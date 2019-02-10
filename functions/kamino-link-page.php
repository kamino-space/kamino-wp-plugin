<?php
/**
 * Author: kamino
 * CreateTime: 2018/4/19,下午 05:05
 * Description:
 * Version:
 */

/*
 * 短代码[friend] 友情链接模板
 */
function kamino_links( $atts, $content = null ) {

	$name = $url = $sign = $avatar = $bgp = '';

	$values = array(
		'name'   => 'kamino的小伙伴',
		'url'    => null,
		'sign'   => null,
		'avatar' => 'https://blog.aikamino.cn/wp-content/uploads/2018/04/lys.jpg',
		'bgp'    => null
	);

	extract( shortcode_atts( $values, $atts ) );

	$html = '<div class="fri-linkbox">
				<a href="' . $url . '" target="_blank">
					<div class="fri-msg">
                	<div class="fri-avatar">
                		 <img src="' . $avatar . '" alt="Avatar">
                	</div>
                	<div class="fri-msgbox">
                    	<p class="fri-name">' . $name . '</p>
                    	<p class="fri-url">' . $url . '</p>
                    	<p class="fri-sign">' . $sign . '</p>
                	</div>
            	</div>
            	';
	if ( ! empty( $bgp ) ) {
		$html .= '<div class="fri-bgc"></div>
            	<div class="fri-bg" style="background-image: url(' . $bgp . ')"></div>
            	';
	}
	$html .= '</a>
    		</div>';

	return $html;
}


/*
 * 短代码[sc] 运行内部的短代码
 */
function kamino_links_s( $atts, $content ) {
	return '<div class="kratos-post-content">' . do_shortcode( $content ) . '</div>';
}
