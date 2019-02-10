<?php
/**
 * Author: kamino
 * CreateTime: 2018/4/19,下午 04:27
 * Description:
 * Version:
 */

class kamino_wp_liuyan extends WP_Widget {
	function __construct() {
		$id     = "kamino_wp_liuyan";
		$name   = __( "kamino-留言板", "aikamino" );
		$config = array(
			"description" => "留言小工具"
		);
		parent::__construct( $id, $name, $config );
	}

	function form( $instance ) {
		$pid  = $instance['pid'];
		$link = $instance['link'];
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'link' ); ?>">
                留言页链接：
                <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>"
                       name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $link; ?>"
                       placeholder="需开启评论功能">
            </label>
            <label for="<?php echo $this->get_field_id( 'pid' ); ?>">
                留言页PID：
                <input class="widefat" id="<?php echo $this->get_field_id( 'pid' ); ?>"
                       name="<?php echo $this->get_field_name( 'pid' ); ?>" value="<?php echo $pid; ?>"
                       placeholder="必填">
            </label>
        </p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $new_instance;

		return $instance;
	}

	function widget( $args, $instances ) {
		$pid  = $instances['pid'];
		$link = $instances['link'];
		$url  = home_url();
		?>
        <script>
            function liuyan() {
                document.getElementById('liuyanban1').style.display = 'none';
                document.getElementById('liuyanban2').style.display = 'block';
            }
        </script>
        <div id="liuyanban1">
            <aside class="widget_text widget widget_custom_html clearfix">
                <div class="textwidget custom-html-widget">
                    <div id="page1" class="kamino-liuyan-1">
                        <div class="kamino-liuyan-2">
                            <div style="float:left">
                                <button class="btn btn-primary" onclick="liuyan()">快速留言</button>
                            </div>
                            <div style="float:right"><a class="btn btn-primary"
                                                        href="<?php echo $link; ?>">留言页</a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <div id="liuyanban2" style="display: none;">
            <div id="respond" class="comment-respond">
                <h4 id="reply-title" class="comment-reply-title">留言</h4>
                <form action="<?php echo $url . '/wp-comments-post.php'; ?>" method="post" id="commentform"
                      class="comment-form">
                    <div class="comment form-group has-feedback">
                        <div class="input-group">
                <textarea class="form-control" id="comment" placeholder=" " name="comment" rows="5" aria-required="true"
                          required
                          onkeydown="if(event.ctrlKey){if(event.keyCode===13){document.getElementById('submit').click();return false}}"></textarea>
                        </div>
                    </div>
                    <div class="comment-form-author form-group has-feedback">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input class="form-control" placeholder="昵称" id="author" name="author" type="text" value=""
                                   size="30"/><span class="form-control-feedback required">*</span></div>
                    </div>
                    <div class="comment-form-email form-group has-feedback">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                            <input class="form-control" placeholder="邮箱" id="email" name="email" type="text" value=""
                                   size="30"/><span class="form-control-feedback required">*</span></div>
                    </div>
                    <div class="comment-form-url form-group has-feedback">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-link"></i></div>
                            <input class="form-control" placeholder="网站" id="url" name="url" type="text" value=""
                                   size="30"/></div>
                    </div>
                    <p class="form-submit"><input name="submit" type="submit" id="submit" class="btn btn-primary"
                                                  value="发表评论"/>
                        <input type='hidden' name='comment_post_ID' value='<?php echo $pid; ?>' id='comment_post_ID'/>
                        <input type='hidden' name='comment_parent' id='comment_parent' value='0'/>
                    </p></form>
            </div>
        </div>
		<?php
	}
}
