<?php
/*
Template Name: Case Studies Page
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
                <h2 class="title">Case Studies</h2>
                <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                  <div class="breadcrumbs">
                    <span><a href="<?php echo esc_url(home_url('/'));?>" rel="home">Home</a></span>
                    <span>></span>
                    <span><a href="#">Pages</a></span>
                    <span>></span>
                    <span class="active">Case Studies</span>
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
                          'post_type' => 'case', // Custom post type
                          'posts_per_page' => 5, // Number of classes to display
                      );
                      $cases_query = new WP_Query($args);
                      if ($cases_query->have_posts()) :
                          while ($cases_query->have_posts()) : $cases_query->the_post();
                              $case_short_descrp = get_post_meta(get_the_ID(), '_case_short_descrp', true);
                              $case_date = get_post_meta(get_the_ID(), '_case_date', true);
                              $case_image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                    ?>
                    <div class="col">
                      <div class="entry-header">
                        <div class="post-thumb thumb">
                          <img alt="images" class="img-responsive img-fullwidth" style="display:none;visibility:hidden;"><img src="<?php echo esc_url($case_image);?>"alt="images" class="img-responsive img-fullwidth">
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="entry-content p-10">
                        <h4 class="entry-title mb-0"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h4>
                        <div class="entry-meta mt-3">
                          <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><svg viewBox="-0.5 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="margin-right: 10px;" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#B1966A" fill-rule="evenodd" d="M61,154.006845 C61,153.45078 61.4499488,153 62.0068455,153 L73.9931545,153 C74.5492199,153 75,153.449949 75,154.006845 L75,165.993155 C75,166.54922 74.5500512,167 73.9931545,167 L62.0068455,167 C61.4507801,167 61,166.550051 61,165.993155 L61,154.006845 Z M62,157 L74,157 L74,166 L62,166 L62,157 Z M64,152.5 C64,152.223858 64.214035,152 64.5046844,152 L65.4953156,152 C65.7740451,152 66,152.231934 66,152.5 L66,153 L64,153 L64,152.5 Z M70,152.5 C70,152.223858 70.214035,152 70.5046844,152 L71.4953156,152 C71.7740451,152 72,152.231934 72,152.5 L72,153 L70,153 L70,152.5 Z" transform="translate(-61 -152)"></path> </g></svg> <?php echo esc_html($case_date);?></span>

                          <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><svg viewBox="0 0 32 32" width="15px" height="15px" style="margin-right: 10px;" id="user" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:#B1966A;}.cls-2{fill:#B1966A;}</style></defs><title></title><path class="cls-1" d="M16,15A15,15,0,0,0,1,30a1,1,0,0,0,1,1H30a1,1,0,0,0,1-1A15,15,0,0,0,16,15Z"></path><circle class="cls-2" cx="16" cy="9" r="8"></circle></g></svg> Admin</span>
                        </div>
                        <p class="mt-3"><?php echo esc_html($case_short_descrp);?></p>
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

                <div class="widget widget_tag_cloud">
                  <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Tags</h4>
                  <div class="tagcloud">
                    <a href="#" class="tag-cloud-link">Law</a>
                    <a href="#" class="tag-cloud-link">Legal</a>
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

