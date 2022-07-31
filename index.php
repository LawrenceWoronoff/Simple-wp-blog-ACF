<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$day_limit = 7; // One week
 
function getoffsetday($wordpress_date) {
	return (strtotime(date('Y-m-d')) - strtotime(substr($wordpress_date, 0, 10))) / 24 / 60 / 60;
}

$topCategories = get_terms( 
	'category', 
	array('parent' => 0)
 );

$home_articles = [];
foreach($topCategories as $category) {
	// var_dump($category->term_id);
	// var_dump($category->name);
	// var_dump($category->slug);
	// var_dump($category->term_taxonomy_id);
	// var_dump($category->description);
	
	if($category->name == 'Uncategorized')
		continue;

	$articles = get_posts(array(
		'post_type'		=> 'gb_article',
		'posts_per_page'=>'1',
		'category' => $category->term_id,
		'orderby' => 'date',
		'order' => 'DESC'
	));
	
	$postID = $articles[0]->ID;
	$text = get_field('text', $postID);
	$image = get_field('image', $postID);
	$author = get_user_by('id', $articles[0]->post_author);

	if(getoffsetday($articles[0]->post_modified) > $day_limit)
		continue;

	$home_article = array(
		'id' => $articles[0]->ID,
		'excerpt' => $articles[0]->post_excerpt,
		'post_date' => $articles[0]->post_date,
		'post_title' => $articles[0]->post_title,
		'post_status' => $articles[0]->post_status,
		'post_modified' => $articles[0]->post_modified,
		
		'text' => $text,
		'image' => $image,

		'category_name' => $category->name,
		'category_id' => $category->term_id,

		'author_id' => $articles[0]->post_author,
		'author_ava' => get_avatar_url( $articles[0]->post_author ),
		'author_name' => $author->display_name,
		'author_role' => $author->roles,
	);
	array_push($home_articles, $home_article);
}

get_header(); ?>

<div class="section pt-5 pb-0">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-lg-7 text-center">
				<h2 class="heading">Latest </h2> </div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="posts-slide-wrap">
					<div class="posts-slide" id="posts-slide">
						<?php foreach($home_articles as $article) {?>
							<div class="item">
								<div class="post-entry d-lg-flex">
									<div class="me-lg-5 thumbnail mb-4 mb-lg-0">
										<a href="<?= get_permalink($article['id']) ?>"> <img src="<?= $article['image'] ?>" alt="Image" class="img-fluid"> </a>
									</div>
									<div class="content align-self-center">
										<div class="post-meta mb-3"> <a href="<?= get_home_url(). '/article-list?cat='. $article['category_id'] ?>" class="category"><?= $article['category_name'] ?></a> &mdash; <span class="date"><?= date_format(date_create($article['post_modified']), 'M d, Y') ?></span> </div>
										<h2 class="heading"><a href="<?= get_permalink($article['id']) ?>"> <?= $article['post_title'] ?></a></h2>
										<p><?= $article['excerpt'] ?></p>
										<a href="#" class="post-author d-flex align-items-center">
											<div class="author-pic"> <img src="<?= $article['author_ava'] ?>" alt="Image"> </div>
											<div class="text"> <strong><?= $article['author_name'] ?></strong> 
											<span><?php foreach($article['author_role'] as $role) { ?>
												<?= $role ?>
											<?php } ?></span> </div>
										</a>
									</div>
								</div>
							</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="container">
		<div class="row g-5">
			<?php foreach($home_articles as $article) {?>
				<div class="col-lg-4">
					<div class="post-entry d-block small-post-entry-v">
						<div class="thumbnail">
							<a href="<?= get_permalink($article['id']) ?>"> <img src="<?= $article['image'] ?>" alt="Image" class="img-fluid"> </a>
						</div>
						<div class="content">
							<p> <?= $article['excerpt'] ?> </p>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</div>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
<?php endif; ?>

<!--  -->

<?php
get_footer();
