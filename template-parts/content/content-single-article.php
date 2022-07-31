<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
	$article_post_id = get_the_ID();
	$article_post = get_post($article_post_id);
	
	$title = $article_post->post_title;

	$authorID = $article_post->post_author;
	$post_date = $article_post->post_date;
	$post_modified = $article_post->post_modified;

	$user_data = get_userdata($authorID);
	$user_ava = get_avatar_url($authorID);
	$author_name = $user_data->display_name;
	
	$post_status = $article_post->post_status;
	$categories = get_the_category($article_post_id);
	
	$published_date = get_the_date('Y-m-d H:i:s', $article_post_id);
	$excerpt = $article_post->post_excerpt;

	$text = get_field('text', $article_post_id);
	$image = get_field('image', $article_post_id);

	$chapter_repeater = get_field('chapter_repeater', $chapter_repeater);
	
?>
<style>
	.article-header {
		/* margin-bottom: 10px; */
	}
	.article-category {
		margin-bottom: 40px;
	}
	.article-image {
		width: 500px;
		margin-bottom: 20px;
	}
	.article-info {
		margin-left: 10px;
	}
	
	.chapter-image {
		width : 200px;
	}
</style>
<div class="section post-section pt-5" style="padding: 1rem 0rem;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="text-center">
					<img src="<?= $user_ava ?>" alt="Image" class="author-pic img-fluid rounded-circle mx-auto">
				</div>
				<span class="d-block text-center"><?= $author_name ?></span><span class="date d-block text-center small text-uppercase text-black-50 mb-5"><?= date_format(date_create($article['post_modified']), 'M d, Y') ?></span>
				<h2 class="heading text-center"><?= $title ?></h2>

				<div class="post-meta mb-3 text-center">
					<?php $i = 0; foreach($categories as $category) { ?>
						<a href="<?= get_home_url(). '/article-list?cat='. $category->term_id ?>" class="category"><?= $category->name ?></a><?php if($i != count($categories) - 1) {?>, <?php }?>
						
					<?php $i++;} ?>
				</div>
				<center>
				<img src="<?= $image ?>" alt="Image" class="img-fluid rounded mb-4">
				
				</center>
				<blockquote>
					<div><?= $excerpt ?></div>
				</blockquote>
				<p><?= $text ?></p>

				<div class="row mt-5 pt-5 border-top">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section post-section pb-0" style="padding: 1rem 0rem;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<!-- <h3 class="">Chapters</h3> -->
			</div>
		</div>
		<div class="row justify-content-center">
			<?php if($chapter_repeater == null) return; foreach($chapter_repeater as $chapter) { ?>
				<div class="col-lg-12">
					<div class="post-entry d-md-flex small-horizontal mb-5">
						<div class="me-md-5 thumbnail mb-3 mb-md-0"><img src="<?= $chapter['image'] ?>" alt="Image" class="img-fluid"></div>
						<div class="content">
							<!-- <div class="post-meta mb-3">
								<?php foreach($categories as $category) { ?>
									<a href="#" class="category"><?= $category->name ?></a>,
								<?php } ?>
								<a href="#" class="category">Business</a>, <a href="#" class="category">Travel</a> &mdash; <span class="date">July 2, 2020</span>
							</div> -->
							<h2 class="heading"><?= $chapter['title'] ?></h2>

							<blockquote>
								<div><?= $chapter['excerpt'] ?></div>
							</blockquote>
							<p><?= $chapter['text'] ?></p>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</div>
	