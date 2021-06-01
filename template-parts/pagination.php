<?php

/**
 * Template part
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage twe_line
 **/

?>


<?php if(get_next_posts_link() || get_preview_post_link()): ?>

<div class="pagination">
	<nav>
		<?php 

		echo paginate_links(
			array(

				)

			);



		 ?>
	</nav>
</div>
<?php endif; ?>
