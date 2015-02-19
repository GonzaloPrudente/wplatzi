<?php get_header(); ?>
	
	<section class="postList row">
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="<?php the_ID(); ?>" class="postlist_template small-12 medium-6 large-6 columns">
			<h2 class="postList-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<figure class="postlist-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</figure>
			<div class="postList-content">
				<?php the_excerpt(); ?>
			</div>
		</article>
		<?php endwhile; ?>
	</section>

	
<?php get_footer(); ?>
