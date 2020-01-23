<?php 

add_action( "init", 'kc_custom_section' );


if (!function_exists("kc_custom_section")) :

   function kc_custom_section(){
    if (function_exists("kc_add_map")) :
        kc_add_map(array(
            'kc_cust_section'=>array(
                'name' => esc_html__('Service', 'textdomain'),
                'icon' => 'sl-paper-plane',
                'category' => 'Custom Category',
                'params' => array(
                    'content' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'textdomain'),
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'textdomain'),
                            'type' => 'textarea',
                        ),
                        array(
                            'name' => 'icon',
                            'label' => esc_html__('Icon', 'textdomain'),
                            'type' => 'icon_picker',
                        ),
                    )
                )
            )
        ));
    endif;
   }

endif; 


function kc_section_shortcode($atts, $content){
    ob_start();
    $kc_shortcode_atts = shortcode_atts( array(
      'title'=>'',
      'desc'=>'',
      'icon'=>'',
    ), $atts );

    extract($kc_shortcode_atts);

    ?>
        
        <div class="col-4 test_class">
            <h3 class="title"><?php echo esc_html($title); ?></h3>
            <?php echo esc_html($desc); ?>
            <span class="<?php echo esc_attr($icon); ?>"></span>
        </div>

    <?php 

    return ob_get_clean();
}
add_shortcode( 'kc_cust_section', 'kc_section_shortcode' );