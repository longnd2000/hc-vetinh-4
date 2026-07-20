<?php get_header(); ?>
<main class="page-wrapper overflow-x-hidden">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section class="bg-cream text-dark">
    <div class="wrapper">
        <div class="full-grid">
            <div class="col-span-full text-center pt-48 pb-20 mobile:pb-12 fade-in mobile:pt-28">
                <span class="subtitle text-gold-dark"><?php echo get_the_date(); ?></span>
                <h2 class="mt-8 mobile:mt-4"><?php the_title(); ?></h2>
                <?php
                $article_excerpt = (function_exists('get_field') && get_field('article_excerpt')) ? get_field('article_excerpt') : (has_excerpt() ? get_the_excerpt() : false);
                if ($article_excerpt) : 
                ?>
                    <p class="max-w-[760px] mx-auto block mt-10 opacity-80 mobile:mt-5"><?php echo wp_kses_post($article_excerpt); ?></p>
                <?php endif; ?>
            </div>

            <?php 
            $single_img = (function_exists('get_field') && get_field('article_image')) ? (is_array(get_field('article_image')) ? get_field('article_image')['url'] : get_field('article_image')) : (has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : false);
            if ($single_img) : 
            ?>
            <div class="col-span-full fade-in pb-20 tablet:pb-12">
                <img src="<?php echo esc_url($single_img); ?>" alt="<?php the_title_attribute(); ?>" class="w-full" width="1200" height="675" loading="lazy" />
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="wrapper">
        <div class="pb-32 text-[0] tablet:pb-20">
            <div class="textContent text-base inline-block align-top pr-10 mobile:block mobile:pr-0" style="width: 70%;">
                <?php 
                if (function_exists('get_field') && get_field('article_content')) {
                    echo apply_filters('the_content', get_field('article_content'));
                } else {
                    the_content(); 
                }
                ?>
            </div>
            <div class="sidebar text-base inline-block align-top pl-10 mobile:block mobile:pl-0 mobile:mt-10" style="width: 30%;">
                <h4 class="pb-2">Bài viết liên quan</h4>
                <?php
                // Simple related posts by category logic
                $categories = get_the_category();
                if ($categories) {
                    $category_ids = array();
                    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                    $args=array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post->ID),
                        'posts_per_page'=> 3,
                        'ignore_sticky_posts'=>1
                    );
                    $my_query = new wp_query( $args );
                    if( $my_query->have_posts() ) {
                        while( $my_query->have_posts() ) {
                            $my_query->the_post();
                            ?>
                            <a href="<?php the_permalink(); ?>" class="oneOther block mb-6">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>" alt="<?php the_title_attribute(); ?>" class="w-full mb-3" width="300" height="200" loading="lazy" />
                                <?php endif; ?>
                                <h4 class="text-sm font-bold"><?php the_title(); ?></h4>
                            </a>
                            <?php
                        }
                    }
                    wp_reset_query();
                }
                ?>
                <a href="/blog" class="subtitle-2 text-gold-dark border-transparent hover:border-gold-dark border-b pb-0.5 mt-4 inline-block">Xem tất cả bài viết</a>
            </div>
        </div>
    </div>
</section>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>