<?php
/*
Template Name: Single Article Page
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
                <h2 class="title">Read Article</h2>
                <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                  <div class="breadcrumbs">
                    <span><a href="<?php echo esc_url(home_url('/'));?>" rel="home">Home</a></span>
                    <span>></span>
                    <span><a href="<?php echo esc_url(home_url('/articles'));?>">Blogs & Articles</a></span>
                    <span>></span>
                    <span class="active">Article</span>
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
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        $article_category = get_post_meta(get_the_ID(), '_article_category', true);
                        $article_author = get_post_meta(get_the_ID(), '_article_author', true);
                        $article_date = get_post_meta(get_the_ID(), '_article_date', true);
                        $short_descrp = get_post_meta(get_the_ID(), '_short_descrp', true);
                        $article_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
            <div class="col-lg-12 order-lg-2">
              <div class="blog-posts single-post">
                <article class="post clearfix mb-0">
                  <div class="entry-header mb-30">
                    <div class="post-thumb thumb"> <img alt="images" class="img-responsive img-fullwidth" src="<?php echo esc_url($article_image);?>" alt="images" class="img-responsive img-fullwidth"></div><br>
                    <h2><?php the_title();?></h2>
                    <div class="entry-meta mt-0">
                      <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><svg fill="#B1966A" width="15px" height="15px" style="margin-right: 10px;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M4 11h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm10 0h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zM4 21h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm13 0c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4z"></path></g></svg><?php echo esc_html($article_category);?></span>

                      <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><svg viewBox="0 0 32 32" width="15px" height="15px" style="margin-right: 10px;" id="user" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:#B1966A;}.cls-2{fill:#B1966A;}</style></defs><title></title><path class="cls-1" d="M16,15A15,15,0,0,0,1,30a1,1,0,0,0,1,1H30a1,1,0,0,0,1-1A15,15,0,0,0,16,15Z"></path><circle class="cls-2" cx="16" cy="9" r="8"></circle></g></svg> <?php echo esc_html($article_author);?></span>

                      <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><svg viewBox="-0.5 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="margin-right: 10px;" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#B1966A" fill-rule="evenodd" d="M61,154.006845 C61,153.45078 61.4499488,153 62.0068455,153 L73.9931545,153 C74.5492199,153 75,153.449949 75,154.006845 L75,165.993155 C75,166.54922 74.5500512,167 73.9931545,167 L62.0068455,167 C61.4507801,167 61,166.550051 61,165.993155 L61,154.006845 Z M62,157 L74,157 L74,166 L62,166 L62,157 Z M64,152.5 C64,152.223858 64.214035,152 64.5046844,152 L65.4953156,152 C65.7740451,152 66,152.231934 66,152.5 L66,153 L64,153 L64,152.5 Z M70,152.5 C70,152.223858 70.214035,152 70.5046844,152 L71.4953156,152 C71.7740451,152 72,152.231934 72,152.5 L72,153 L70,153 L70,152.5 Z" transform="translate(-61 -152)"></path> </g></svg> <?php echo esc_html($article_date);?></span>
                    </div>
                  </div>
                  <div class="entry-content">
                    <p><?php the_content();?></p>
                  </div>
                </article>
                <!-- <div class="comment-box mt-30">
                  <h3>Leave a Comment</h3>
                  <form role="form" id="comment-form">
                    <div class="row">
                      <div class="col-6 pt-0 pb-0">
                        <div class="mb-3">
                          <input type="text" class="form-control" required name="contact_name" id="contact_name"
                            placeholder="Enter Name">
                        </div>
                        <div class="mb-3">
                          <input type="text" required class="form-control" name="contact_email2" id="contact_email2"
                            placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                          <input type="text" placeholder="Enter Website" required class="form-control" name="subject">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="mb-3">
                          <textarea class="form-control" required name="contact_message2" id="contact_message2"
                            placeholder="Enter Message" rows="7"></textarea>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <button type="submit" class="btn btn-theme-colored1 btn-round m-0"
                            data-loading-text="Please wait...">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div> -->
              </div>
            </div>
            <!-- <div class="col-md-3">
              <div class="sidebar sidebar-left mt-sm-30">
                <div class="widget">
                  <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Latest News</h4>
                  <div class="latest-posts">
                    <article class="post clearfix pb-0 mb-20">
                      <a class="post-thumb" href="#"><img alt="images" data-cfsrc="images/shop/portfolio-sq1.jpg"
                          style="display:none;visibility:hidden;"><noscript><img src="images/shop/portfolio-sq1.jpg"
                            alt="images"></noscript></a>
                      <div class="post-right">
                        <h5 class="post-title mt-0"><a href="#">Sustainable Construction</a></h5>
                        <span class="post-date">
                          <time class="entry-date" datetime="2021-05-15T06:10:26+00:00">April 15, 2021</time>
                        </span>
                      </div>
                    </article>
                    <article class="post clearfix pb-0 mb-20">
                      <a class="post-thumb" href="#"><img alt="images" data-cfsrc="images/shop/portfolio-sq2.jpg"
                          style="display:none;visibility:hidden;"><noscript><img src="images/shop/portfolio-sq2.jpg"
                            alt="images"></noscript></a>
                      <div class="post-right">
                        <h5 class="post-title mt-0"><a href="#">Industrial Coatings</a></h5>
                        <span class="post-date">
                          <time class="entry-date" datetime="2021-05-15T06:10:26+00:00">April 15, 2021</time>
                        </span>
                      </div>
                    </article>
                    <article class="post clearfix pb-0 mb-20">
                      <a class="post-thumb" href="#"><img alt="images" data-cfsrc="images/shop/portfolio-sq3.jpg"
                          style="display:none;visibility:hidden;"><noscript><img src="images/shop/portfolio-sq3.jpg"
                            alt="images"></noscript></a>
                      <div class="post-right">
                        <h5 class="post-title mt-0"><a href="#">Storefront Installations</a></h5>
                        <span class="post-date">
                          <time class="entry-date" datetime="2021-05-15T06:10:26+00:00">April 15, 2021</time>
                        </span>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="widget widget_archive">
                  <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Archives</h4>
                  <ul>
                    <li><a href="#">October 2021</a></li>
                    <li><a href="#">February 2021</a></li>
                  </ul>
                </div>
                <div class="widget widget_meta">
                  <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Meta</h4>
                  <ul>
                    <li><a href="#">Site Admin</a></li>
                    <li><a href="#">Log out</a></li>
                    <li><a href="#">Entries feed</a></li>
                    <li><a href="#">Comments feed</a></li>
                    <li><a href="#">WordPress.org</a></li>
                  </ul>
                </div>
                <div class="widget widget_categories">
                  <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Categories</h4>
                  <ul>
                    <li class="cat-item"><a href="#">Anxiety</a> </li>
                    <li class="cat-item"><a href="#">Grief and loss</a> </li>
                    <li class="cat-item"><a href="#">Uncategorized</a> </li>
                  </ul>
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
                <div class="widget widget_text text-center">
                  <div class="textwidget">
                    <div class="section-typo-light bg-theme-colored1 mb-md-40 p-30 pt-40 pb-40"> <img
                        class="size-full wp-image-800 aligncenter" alt="images" width="128" height="128"
                        data-cfsrc="images/headphone-128.png" style="display:none;visibility:hidden;" /><noscript><img
                          class="size-full wp-image-800 aligncenter" src="images/headphone-128.png" alt="images"
                          width="128" height="128" /></noscript>
                      <h4>Online Help!</h4>
                      <h5>+(123) 456-78-90</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <?php
                endwhile;
                wp_reset_postdata();
                endif;
            ?>
          </div>
        </div>
      </section>
    </div>

<?php get_footer();?>