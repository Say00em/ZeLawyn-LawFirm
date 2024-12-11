<?php
/*
Template Name: Articles Page
*/
?>

<?php get_header();?>

<div class="main-content-area">

      <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center"
        data-tm-bg-img="<?php echo get_template_directory_uri(); ?>/assets/images/bg/bg1.jpg">
        <div class="container pt-50 pb-50">
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title">Blogs & Articles</h2>
                <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                  <div class="breadcrumbs">
                    <span><a href="<?php echo esc_url(home_url('/'));?>" rel="home">Home</a></span>
                    <span>></span>
                    <span><a href="#">Pages</a></span>
                    <span>></span>
                    <span class="active">Blogs & Articles</span>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
          <div class="row">
            <div class="col-md-9 sm-pull-none">
              <div class="blog-posts">
                <article class="post clearfix mb-30 border-1px">
                  <div class="row">
                    <?php
                        $args = array(
                        'post_type' => 'article',
                        'posts_per_page' => 6,
                        );
                        $articles_query = new WP_Query($args);
                        if ($articles_query->have_posts()) :
                        while ($articles_query->have_posts()) : $articles_query->the_post();
                            $article_category = get_post_meta(get_the_ID(), '_article_category', true);
                            $article_author = get_post_meta(get_the_ID(), '_article_author', true);
                            $article_date = get_post_meta(get_the_ID(), '_article_date', true);
                            $short_descrp = get_post_meta(get_the_ID(), '_short_descrp', true);
                            $article_image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                    ?>
                    <div class="col">
                      <div class="entry-header">
                        <div class="post-thumb thumb">
                          <img alt="images" class="img-responsive img-fullwidth" style="display:none;visibility:hidden;"><img src="<?php echo esc_url($article_image);?>"alt="images" class="img-responsive img-fullwidth">
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="entry-content p-10">
                        <h4 class="entry-title mb-0"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h4>
                        <div class="entry-meta mt-3">
                          <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><svg viewBox="0 0 32 32" width="15px" height="15px" style="margin-right: 10px;" id="user" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:#B1966A;}.cls-2{fill:#B1966A;}</style></defs><title></title><path class="cls-1" d="M16,15A15,15,0,0,0,1,30a1,1,0,0,0,1,1H30a1,1,0,0,0,1-1A15,15,0,0,0,16,15Z"></path><circle class="cls-2" cx="16" cy="9" r="8"></circle></g></svg> <?php echo esc_html($article_author);?></span>

                          <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><svg fill="#B1966A" width="15px" height="15px" style="margin-right: 10px;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M4 11h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm10 0h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zM4 21h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm13 0c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4z"></path></g></svg><?php echo esc_html($article_category);?></span>
                        </div>
                        <p class="mt-3"><?php echo esc_html($short_descrp);?></p>
                        <a href="<?php echo esc_url(get_permalink());?>" class="btn"><span style="margin-right: 10px;">🡲</span>Read more</a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <?php 
                        endwhile;
                            wp_reset_postdata();
                        endif;
                    ?>
                  </div>
                </article>
                <nav>
                  <ul class="pagination">
                    <li class="page-item"><a class="next page-link" href="#">«</a></li>
                    <li class="page-item active"><span class="page-link">1</span></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="next page-link" href="#">»</a></li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="col-md-3">
              <div class="sidebar sidebar-right mt-sm-30">
                <div class="widget">
                  <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Latest News</h4>
                  <div class="latest-posts">

                    <article class="post clearfix pb-0 mb-20">
                      <a class="post-thumb" href="#"><img src="<?php echo esc_url($article_image);?>" height="70px" alt="letest_post1"></a>
                      <div class="post-right">
                        <?php $article_query = new WP_Query(
                          array('post_type' => 'article', 'posts_per_page' => 1)); 
                          if ($article_query->have_posts()) : 
                            while ($article_query->have_posts()) : $article_query->the_post(); 
                            '<h5 class="post-title mt-0">'.the_title('<a href="' . esc_url(get_permalink()) . '" style="color:#192637;">', '</a>').'</h5>';
                        ?>
                        <?php endwhile; wp_reset_postdata(); endif;?>
                        <span class="post-date">
                          <time class="entry-date" datetime="2021-05-15T06:10:26+00:00"><?php echo esc_html($article_date);?></time>
                        </span>
                      </div>
                    </article>
                  </div>
                </div>
                <!-- <div class="widget widget_archive">
                  <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Archives</h4>
                  <ul>
                    <li><a href="#">October 2021</a></li>
                    <li><a href="#">February 2021</a></li>
                  </ul>
                </div> -->
                <!-- <div class="widget widget_meta">
                  <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Meta</h4>
                  <ul>
                    <li><a href="#">Site Admin</a></li>
                    <li><a href="#">Log out</a></li>
                    <li><a href="#">Entries feed</a></li>
                    <li><a href="#">Comments feed</a></li>
                    <li><a href="#">WordPress.org</a></li>
                  </ul>
                </div> -->

                <div class="widget widget_categories">
                  <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Categories</h4>
                    <?php
                      // Query all articles to get unique categories
                      $article_categories = array();
                      $article_query = new WP_Query(array('post_type' => 'article', 'posts_per_page' => -1));
                      if ($article_query->have_posts()) :
                        while ($article_query->have_posts()) : $article_query->the_post();
                          $article_category = get_post_meta(get_the_ID(), '_article_category', true);
                          if (!empty($article_category)) {
                            if (!array_key_exists($article_category, $article_categories)) {
                              $article_categories[$article_category] = 0;
                            }
                            $article_categories[$article_category]++;
                          }
                        endwhile;
                        wp_reset_postdata();
                      endif;

                      // Display the category names and their counts
                      foreach ($article_categories as $category_name => $count) {
                        echo '<li class="cat-item""><a href="#"><span class="categories_name" style="color:#192637;">' . esc_html($category_name) . '</span><span class="categories_num" style="float:right; color:#192637;">(' . esc_html($count) . ')</span></a></li>';
                            }
                    ?>
                  <!-- <ul>
                    <li class="cat-item"><a href="#">Anxiety</a> </li>
                    <li class="cat-item"><a href="#">Grief and loss</a> </li>
                    <li class="cat-item"><a href="#">Uncategorized</a> </li>
                  </ul> -->
                </div>

                <div class="widget widget_tag_cloud">
                  <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Tags</h4>
                  <div class="tagcloud">
                    <a href="#" class="tag-cloud-link">health</a>
                    <a href="#" class="tag-cloud-link">medical</a>
                    <a href="#" class="tag-cloud-link">news</a>
                    <a href="#" class="tag-cloud-link">latest</a>
                  </div>
                </div>
                <div class="widget widget_text">
                  <div class="textwidget">
                    <div class="section-typo-light bg-theme-colored1 text-center mb-md-40 p-30 pt-40 pb-40"> <img
                        class="size-full wp-image-800 aligncenter" alt="images" width="128" height="128"
                        data-cfsrc="<?php echo get_template_directory_uri(); ?>/assets/images/headphone-128.png" style="display:none;visibility:hidden;" /><noscript><img
                          class="size-full wp-image-800 aligncenter" src="<?php echo get_template_directory_uri(); ?>/assets/images/headphone-128.png" alt="images"
                          width="128" height="128" /></noscript>
                      <h4 style="text-align: center;">Online Help!</h4>
                      <h5 style="text-align: center;">+(123) 456-78-90</h5>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

<?php get_footer();?>

