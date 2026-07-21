<?php get_header(); ?>
<main class="page-wrapper overflow-x-hidden">
<section class="bg-cream text-dark">
    <div class="wrapper">
        <div class="full-grid">
            <div class="col-span-full text-center pt-48 fade-in mobile:pt-28">
                <h1 class=""><?php the_archive_title(); ?></h1>
                <div class="max-w-[640px] mx-auto block mt-10 opacity-80 mobile:mt-5"><?php the_archive_description(); ?></div>
            </div>
        </div>
    </div>

    <?php
    $front_page_id = get_option('page_on_front') ? get_option('page_on_front') : get_option('page_for_posts');
    $featured_categories = (function_exists('get_field') && get_field('featured_categories', $front_page_id)) ? get_field('featured_categories', $front_page_id) : false;
    $categories = array();
    
    if ($featured_categories && is_array($featured_categories)) {
        foreach ($featured_categories as $cat_val) {
            if (is_object($cat_val)) {
                $categories[] = $cat_val;
            } elseif (is_numeric($cat_val)) {
                $categories[] = get_term($cat_val, 'category');
            }
        }
    } else {
        $categories = get_categories(array('number' => 3, 'hide_empty' => true));
    }
    
    if (!empty($categories)):
    ?>
    <div class="full-grid gap-0 relative z-0 text-white mt-10">
        <?php foreach ($categories as $cat): 
            $cat_img = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
            if (function_exists('get_field')) {
                $acf_img = get_field('category_image', $cat);
                if ($acf_img) {
                    $cat_img = is_array($acf_img) ? $acf_img['url'] : $acf_img;
                }
            }
        ?>
        <div class="col-span-4 mobile:col-span-full">
            <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="relative block cover group after:content-[''] after:block after:pb-[100%] mobile:max-h-[260px] mobile:overflow-hidden" style="background-image:url('<?php echo esc_url($cat_img, array('http', 'https', 'data')); ?>');">
                <div class="overlay bg-black opacity-40 z-20 top-0 left-0 w-full h-full absolute group-hover:opacity-30 duration-500 transition-opacity"></div>
                <div class="text text-center center z-30 w-full">
                    <h3 class="mb-12 mobile:h2 mobile:mb-6"><?php echo esc_html($cat->name); ?></h3>
                    <span class="underlineLink mx-auto">Xem bài viết</span>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="bg-cream text-dark">
        <div class="wrapper">
            <div class="full-grid pt-24 mobile:pt-12 gap-x-16 medium:gap-x-12 pb-10 mobile:gap-x-0 mobile:pb-2">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                global $wp_query;
                $post_img = (function_exists('get_field') && get_field('article_image')) ? (is_array(get_field('article_image')) ? get_field('article_image')['url'] : get_field('article_image')) : (has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
                $col_class = ($wp_query->current_post < 2) ? 'col-span-6' : 'col-span-4';
                ?>
                <div class="<?php echo $col_class; ?> fade-in pb-28 mobile:col-span-full mobile:pb-14">
                    <a href="<?php the_permalink(); ?>" class="cover block relative after:pb-[67.5%] after:block after:content-[''] overflow-hidden" aria-label="<?php echo esc_attr(get_the_title()); ?>">
                        <img src="<?php echo esc_url($post_img, array('http', 'https', 'data')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="absolute top-0 left-0 w-full h-full object-cover<?php echo ($wp_query->current_post === 0) ? ' skip-lazy' : ''; ?>" <?php if( $wp_query->current_post === 0 ) { echo 'fetchpriority="high" decoding="sync" data-no-lazy="1" data-skip-lazy="1"'; } else { echo 'loading="lazy" decoding="async"'; } ?> />
                    </a>
                    <a class="pt-6 block" href="<?php the_permalink(); ?>">
                        <h4 class="text-left text-lg font-bold"><?php the_title(); ?></h4>
                        <p class="text-base max-w-[85%] mt-3 mb-6 line-clamp-2 mobile:mb-4"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
                        <span class="underlineLink">Xem thêm</span>
                    </a>
                </div>
                <?php endwhile; else: ?>
                    <div class="col-span-full text-center">Không tìm thấy bài viết nào.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    

</section>
</main>
<?php get_footer(); ?>