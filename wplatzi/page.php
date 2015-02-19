<?php get_header(); ?>

	<section class="pagePost row">
		<div class="small-12 medium-12 large-12 columns">
			<?php while ( have_posts() ) : the_post(); ?>
			<figure class="pagePost-image">
				<?php the_post_thumbnail('wplatzi-full-width'); ?>
			</figure>
			<h1 class="pagePost-title"><?php the_title(); ?></h1>
			<div class="pagePost-content">
				<?php the_content(); ?>
			</div>

			<div class="pagePost-info large-9 large-centered columns">
				<div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?></div>
				<div class="author-info">
					<div class="author-name"><?php the_author(); ?></div>
					<div class="post-date"><?php the_time('d \d\e F, Y') ?></div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</section>

<?php get_footer(); ?>
