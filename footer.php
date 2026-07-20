<?php 
$front_page_id = get_option('page_on_front') ? get_option('page_on_front') : get_option('page_for_posts');
$header_phone = (function_exists('get_field') && get_field('header_phone', $front_page_id)) ? get_field('header_phone', $front_page_id) : '+44 (0)114 358 2020';
$header_phone_clean = preg_replace('/[^0-9+]/', '', $header_phone);
$footer_address = (function_exists('get_field') && get_field('footer_address', $front_page_id)) ? get_field('footer_address', $front_page_id) : 'Old Station Drive, Millhouses, Sheffield, S7 2PY';
$footer_email = (function_exists('get_field') && get_field('footer_email', $front_page_id)) ? get_field('footer_email', $front_page_id) : 'enquiries@blenheim.co.uk';
$social_facebook = (function_exists('get_field') && get_field('social_facebook', $front_page_id)) ? get_field('social_facebook', $front_page_id) : 'https://www.facebook.com/BlenheimProperties';
$social_instagram = (function_exists('get_field') && get_field('social_instagram', $front_page_id)) ? get_field('social_instagram', $front_page_id) : 'https://instagram.com/blenheimhomesland/';
$social_linkedin = (function_exists('get_field') && get_field('social_linkedin', $front_page_id)) ? get_field('social_linkedin', $front_page_id) : 'https://www.linkedin.com/company/blenheim-property/';
$footer_copyright = (function_exists('get_field') && get_field('footer_copyright', $front_page_id)) ? get_field('footer_copyright', $front_page_id) : '&copy; 2026 BP Estates 12592062 | BP Developments 04969547';

$footer_col_1_info = (function_exists('get_field') && get_field('footer_col_1_info', $front_page_id)) ? get_field('footer_col_1_info', $front_page_id) : '<p class="font-bold mb-4 uppercase text-base">CÔNG TY TNHH CHĂM SÓC MẸ VÀ BÉ TẠI NHÀ HOME CARE</p><p class="mb-2">Địa chỉ: 20 Huy Du, Phường Từ Liêm, TP Hà Nội, Việt Nam.</p><p class="mb-2">Tổng đài hỗ trợ: 1900 0387</p><p class="mb-2">Hotline: 0973871376 - 0962131515</p><p class="mb-2">Email: cskh@homegroups.vn</p><p class="mb-2">Mã số doanh nghiệp: 0107375668 do Sở Kế hoạch &amp; Đầu tư TP Hà Nội cấp lần đầu ngày 29/03/2016</p>';
$footer_col_2_links = (function_exists('get_field') && get_field('footer_col_2_links', $front_page_id)) ? get_field('footer_col_2_links', $front_page_id) : array();
$footer_col_3_links = (function_exists('get_field') && get_field('footer_col_3_links', $front_page_id)) ? get_field('footer_col_3_links', $front_page_id) : array();
$footer_col_4_links = (function_exists('get_field') && get_field('footer_col_4_links', $front_page_id)) ? get_field('footer_col_4_links', $front_page_id) : array();
?>
	<footer>
        <div class="wrapper">
            <div class="wrapper-inside">
                <div class="full-grid pt-20 pb-16 footerLists mobile:pt-16 text-white text-sm">
                    <div class="col-span-5 mobile:col-span-full mobile:pb-10 pr-4">
                        <?php
                        if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                            echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="block mb-6"><img src="' . esc_url( $logo[0] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="w-auto object-contain" style="max-height: 80px;" /></a>';
                        } else {
                            echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="text-white text-3xl font-bold uppercase no-underline mb-6 block">' . get_bloginfo( 'name' ) . '</a>';
                        }
                        ?>
                        <?php echo wp_kses_post($footer_col_1_info); ?>
                    </div>
                    <div class="col-span-2 mobile:col-span-full mobile:pb-10">
                        <span class="text-white text-lg mb-6 mobile:mb-4 inline-block font-bold">Về Homecare</span>
                        <ul class="text-sm">
                            <?php if(!empty($footer_col_2_links)): ?>
                                <?php foreach($footer_col_2_links as $link): ?>
                                    <li><a href="<?php echo esc_url($link['url']); ?>" class="block hover:text-gold duration-300" style="padding: 12px 0;"><?php echo esc_html($link['title']); ?></a></li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Showroom Home Care</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Feedback khách hàng</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Dấu ấn Home Care</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Trung tâm ở cữ</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Sản phẩm Home Care</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-span-3 mobile:col-span-full mobile:pb-10">
                        <span class="text-white text-lg mb-6 mobile:mb-4 inline-block font-bold">Chính sách &amp; điều khoản</span>
                        <ul class="text-sm">
                            <?php if(!empty($footer_col_3_links)): ?>
                                <?php foreach($footer_col_3_links as $link): ?>
                                    <li><a href="<?php echo esc_url($link['url']); ?>" class="block hover:text-gold duration-300" style="padding: 12px 0;"><?php echo esc_html($link['title']); ?></a></li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Chính sách mua hàng</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Chính sách thanh toán</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Chính sách đổi trả</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Chính sách vận chuyển</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Chính sách bảo hành</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Chính sách bảo mật</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-span-2 mobile:col-span-full mobile:pb-10">
                        <span class="text-white text-lg mb-6 mobile:mb-4 inline-block font-bold">Liên kết nhanh</span>
                        <ul class="text-sm">
                            <?php if(!empty($footer_col_4_links)): ?>
                                <?php foreach($footer_col_4_links as $link): ?>
                                    <li><a href="<?php echo esc_url($link['url']); ?>" class="block hover:text-gold duration-300" style="padding: 12px 0;"><?php echo esc_html($link['title']); ?></a></li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Massage tắm bé tại nhà</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Massage bầu tại nhà</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Thông tắc tia sữa tại nhà</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Chăm sóc sau sinh mẹ bé</a></li>
                                <li><a href="#" class="block hover:text-gold duration-300" style="padding: 12px 0;">Giảm eo sau sinh</a></li>
                            <?php endif; ?>
                        </ul>
                        <div class="mt-6 flex gap-4">
                            <?php if ($social_facebook) : ?><a href="<?php echo esc_url($social_facebook); ?>" target="_blank" aria-label="Facebook" class="inline-block duration-300 hover:opacity-70"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-facebook.svg" alt="" width="24" height="24" loading="lazy" /></a><?php endif; ?>
                            <?php if ($social_instagram) : ?><a href="<?php echo esc_url($social_instagram); ?>" target="_blank" aria-label="Instagram" class="inline-block duration-300 hover:opacity-70"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-instagram.svg" alt="" width="24" height="24" loading="lazy" /></a><?php endif; ?>
                            <a href="#" target="_blank" aria-label="TikTok" class="inline-block duration-300 hover:opacity-70"><svg class="w-6 h-6 fill-white" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 15.71a6.34 6.34 0 0 0 10.86 4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg></a>
                        </div>
                    </div>
                </div>
                <div class="full-grid border-t border-green-line text-white/50 py-7 font-regular">
                    <div class="col-span-full text-center mobile:pb-3">
                        <p class="!text-xs"><?php echo wp_kses_post($footer_copyright); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>