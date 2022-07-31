<?php /* Template Name: Article List Page Template */ 
    $count_per_page = 5;
    $catId = $_GET['cat'];
    $page = $_GET['pg'];

    if(!isset($_GET['pg']))
        $page = 1;
    if(!isset($_GET['cat']))
        return;

    $current_category = get_category($catId);
    $subCategories = get_terms( 
        'category', 
        array('hide_empty' => false, 'parent' => $catId)
    );

    $cat_articles = array();
    $args = array(
        'post_type'	=> 'gb_article',
        'posts_per_page'=>'-1',
        'category' => $current_category->term_id,
        'orderby' => 'post_modified',
        'order' => 'DESC'
    );
    $totlal_articles = get_posts($args);

    $args['posts_per_page'] = $count_per_page;
    $args['offset'] = $count_per_page * ($page - 1);

    $articles = get_posts($args);
    
    foreach($articles as $article) {
        $postID = $article->ID;
        $text = get_field('text', $postID);
        $image = get_field('image', $postID);
        $author = get_user_by('id', $article->post_author);
        $categories = wp_get_post_categories($postID);
        
        $arr_cat = array();
        foreach($categories as $catId) {
            $category = get_category($catId);
            array_push($arr_cat, $category);
        }

        $cat_article = array(
            'id' => $article->ID,
            'excerpt' => $article->post_excerpt,
            'post_date' => $article->post_date,
            'post_title' => $article->post_title,
            'post_status' => $article->post_status,
            'post_modified' => $article->post_modified,
            
            'text' => $text,
            'image' => $image,

            'author_id' => $article->post_author,
            'author_ava' => get_avatar_url( $article->post_author ),
            'author_name' => $author->display_name,
            'author_role' => $author->roles,

            'categories' => $arr_cat,
        );

        array_push($cat_articles, $cat_article);
    }

    // foreach($articles as $article){
    //     print_r($article->post_title. ', ');
    // }
    // echo "</br>";
      
?>

<?php get_header(); ?>


<div class="section pt-5 pb-0">
    <div class="container">
    <div class="row mb-5 justify-content-center">
        <div class="col-lg-9"><span class="fw-normal text-uppercase d-block mb-1">Category</span>
        <h2 class="heading">'<?= $current_category->cat_name ?>'</h2>
        <?php foreach($subCategories as $subcategory) { ?>
            <span style="font-size: 20px;"><a href="<?= get_home_url(). '/article-list?cat='. $subcategory->term_id ?>"><?= $subcategory->name ?></a> </span>&nbsp;
        <?php } ?>
        
        </div>
    </div>
    <div class="row justify-content-center">
        <?php foreach($cat_articles as $article) {?>
        <div class="col-lg-9">
            <div class="post-entry d-md-flex small-horizontal mb-5">
                <div class="me-md-5 thumbnail mb-3 mb-md-0">
                    <a href="<?= get_permalink($article['id']) ?>"> 
                        <img src="<?= $article['image'] ?>" alt="Image" class="img-fluid">
                    </a>
                </div>
                <div class="content">
                    <div class="post-meta mb-3">
                        <?php foreach($article['categories'] as $category) {?>
                            <a href="<?= get_home_url(). '/article-list?cat='. $category->term_id ?>" class="category"><?= $category->name ?></a>, 
                        <?php }?>
                        &mdash; <span class="date"><?= date_format(date_create($article['post_modified']), 'M d, Y') ?></span>
                    </div>
                    <h2 class="heading"><a href="<?= get_permalink($article['id']) ?>"><?= $article['post_title'] ?></a></h2>
                    <p><?= $article['text'] ?></p>
                    <a href="#" class="post-author d-flex align-items-center">
                        <div class="author-pic"><img src="<?= $article['author_ava'] ?>" alt="Image"></div>
                        <div class="text"><strong><?= $article['author_name'] ?></strong>
                        <span><?php foreach($article['author_role'] as $role) { ?>
                            <?= $role ?>
                        <?php } ?></span> </div>
                    </a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <div class="row align-items-center justify-content-center py-5">
        <div class="col-lg-6 text-center">
            <div class="custom-pagination">
                <?php for($i = 1; $i <= ceil(count($totlal_articles) / $count_per_page); $i++) {?>
                <a href="<?= get_home_url(). '/article-list?cat='. $catId. '&pg='. $i?>" class="<?= ($page == $i ? 'active' : '') ?>"><?= $i ?></a>
                <?php }?>
            </div>
        </div>
    </div>
    </div>
</div>

<?php get_footer(); ?>
