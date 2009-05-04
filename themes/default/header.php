<?php 
include( dirname(__FILE__) . '/../core/core-header.php' ); 
// End WPtouch Core Header
?>

<body class="<?php wptouch_core_body_background(); ?>">
<div id="headerbar">
	<div id="headerbar-title">
		<!-- This fetches the admin selection logo icon for the header, which is also the bookmark icon -->
		<img src="<?php echo bnc_get_title_image(); ?>" alt="<?php $str = bnc_get_header_title(); echo stripslashes($str); ?>" />
		<a href="<?php bloginfo('home'); ?>"><?php wptouch_core_body_sitetitle(); ?></a>
	</div>
</div>

<div id="drop-fade">
<?php if (bnc_is_login_button_enabled()) { ?>

	<?php if (!is_user_logged_in()) { ?>
		    <a href="javascript:<?php if (bnc_is_js_enabled()) echo "bnc_jquery_login_drop();"; else echo "document.getElementById('wptouch-login').style.display='block';" ?>">
					<img src="<?php bloginfo('template_directory'); ?>/images/menu/touchmenu-login.png" alt="" /> <?php _e( 'Login', 'wptouch' ); ?></a>	

	<?php } else { ?>

	<?php $version = (float)get_bloginfo('version'); if ($version >= 2.7) { ?>
		<a href="<?php echo wp_logout_url($_SERVER['REQUEST_URI']); ?>">
	<?php } else { ?>
		<a href="<?php bloginfo('wpurl'); ?>/wp-login.php?action=logout&redirect_to=<?php echo $_SERVER['REQUEST_URI']; ?>">
	<?php } ?>
		<img src="<?php bloginfo('template_directory'); ?>/images/menu/touchmenu-logout.png" alt="" /> <?php _e( 'Logout', 'wptouch' ); ?>
		</a>
	<?php } ?>

<?php } ?>

	<?php if (bnc_is_cats_button_enabled()) { ?>	
		    <a href="javascript:<?php if (bnc_is_js_enabled()) echo "bnc_jquery_cats_drop();"; else echo "document.getElementById('wptouch-cats').style.display='block';" ?>">
		    <img src="<?php bloginfo('template_directory'); ?>/images/menu/catsmenu.png" alt="" /> <?php _e( 'Categories', 'wptouch' ); ?></a>	
	<?php } ?>
	
		    <a href="javascript:<?php if (bnc_is_js_enabled()) echo "bnc_jquery_search_drop();"; else echo "document.getElementById('wptouch-search').style.display='block';" ?>">
		    <img src="<?php bloginfo('template_directory'); ?>/images/menu/search-touchmenu.png" alt="" /> <?php _e( 'Search', 'wptouch' ); ?></a>

		    <a href="javascript:<?php if (bnc_is_js_enabled()) echo "bnc_jquery_menu_drop();"; else echo "document.getElementById('wptouch-menu').style.display='block';" ?>">
		    <img src="<?php bloginfo('template_directory'); ?>/images/menu/touchmenu.png" alt="" /> <?php _e( 'Menu', 'wptouch' ); ?>
		    </a>

</div>
<!--#start The Login Drop-Down -->

	<div id="wptouch-login" class="dropper" style="display:none">
		<div id="wptouch-login-inner">
			<form name="loginform" id="loginform" action="<?php bloginfo('wpurl'); ?>/wp-login.php" method="post">
				<label>
					<input type="text" name="log" id="log" onfocus="if (this.value == 'username') {this.value = ''}" value="username" />
				</label>
				<label>
					<input type="password" name="pwd"  onfocus="if (this.value == 'password') {this.value = ''}" id="pwd" value="password" />
				</label>
				<input type="hidden" name="rememberme" value="forever" />
				<input type="submit" id="logsub" name="submit" value="<?php _e('Login'); ?>" tabindex="9" />
				<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
			</form>
		</div>
	</div>
	
<!-- #start The Search Drop-Down -->

	<div id="wptouch-search" class="dropper" style="display:none">
		<div id="wptouch-search-inner">
			<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
			<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /> 
			<input name="submit" type="submit" id="ssubmit" tabindex="5" value="Search" />
			</form>
		</div>
	</div>

<!-- #start The Categories Drop-Down -->

	<div id="wptouch-cats" class="dropper" style="display:none">
		<div id="catsmenu-inner">
            <ul>
		   		<?php bnc_get_ordered_cat_list(); if (!bnc_is_js_enabled()) { ?>
	           		<li class="noarrow"><a class="menu-close" href="javascript:document.getElementById('wptouch-cats').style.display = 'none';">
	           		<img src="<?php bloginfo('template_directory'); ?>/images/cross.png" alt="" /> <?php _e( "Close Menu", "wptouch" ); ?></a>
	           		</li>
	           	<?php } ?>
            </ul>
        </div>
	</div>

<!-- #start The Menu Drop-Down -->

	<div id="wptouch-menu" class="dropper" style="display:none"> 
        <div id="wptouch-menu-inner">
			<ul>
				<?php wptouch_core_header_home(); ?>            
				<?php wptouch_core_header_pages(); ?>
				<?php wptouch_core_header_rss(); ?>
				<?php wptouch_core_header_email(); ?>           
				<?php wptouch_core_header_close(); ?>           
			</ul>
        </div>
	</div>

<!-- #start the wptouch plugin use check -->
<?php wptouch_core_header_check_use(); ?>