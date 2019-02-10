<?php
/**
 * Author: kamino
 * CreateTime: 2018/4/19,下午 04:26
 * Description:
 * Version:
 */

class kamino_wp_noticebar extends WP_Widget {
	function __construct() {
		$id     = "kamino_wp_noticebar";
		$name   = __( "kamino-通知栏", "blog.aikamino.cn" );
		$config = array(
			"description" => "滚动通知小工具"
		);
		parent::__construct( $id, $name, $config );
	}

	function form( $instance ) {
		$notice = $instance['notice'];
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'notice' ); ?>">
                HTML：
                <textarea class="widefat" rows="4" id="<?php echo $this->get_field_id( 'notice' ); ?>"
                          name="<?php echo $this->get_field_name( 'notice' ); ?>"><?php echo $notice; ?></textarea>
            </label>
        </p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $new_instance;

		return $instance;
	}

	function widget( $args, $instances ) {
		?>
        <aside class="widget_text widget widget_custom_html clearfix">
            <div class="notice">
                <div style="float:left;"><i class="fa fa-volume-up" aria-hidden="true"></i></div>
                <div style="float:left;">
                    <ul id="notice-text">
						<?php
						echo $instances['notice'];
						?>
                    </ul>
                </div>
            </div>
        </aside>
        <script>
            function autoScroll(obj) {
                $(obj).find("ul").animate({
                    marginTop: "-30px"
                }, 500, function () {
                    $(this).css({marginTop: "0px"}).find("li:first").appendTo(this);
                })
            }

            $(function () {
                setInterval('autoScroll(".notice")', 3000);
            })
        </script>
		<?php
	}
}
