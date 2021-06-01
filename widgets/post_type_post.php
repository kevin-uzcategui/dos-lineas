<?php



namespace WPC\Widgets;



use Elementor\Widget_Base;

use Elementor\Controls_Manager;



if (!defined('ABSPATH')) exit; // Exit if accessed directly



class PostTypePost extends Widget_Base{



  public function get_name(){

    return 'id_post_type_post';

  }



  public function get_title(){

    return esc_html__( 'Post Listing', 'dos-lineas' );

  }



  public function get_icon(){

    return 'eicon-posts-grid';

  }



  public function get_categories(){

    return ['custom-category-dos-lineas'];

  }



  protected function _register_controls(){



    $this->start_controls_section(

         'section_general_post',//set unique name



              //set setting of section

            [

             'label' => __( 'General', 'dos-lineas' ),

             'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]

    );



    $this->add_control(

       'spicy_number',

       [

        'label' => __( 'Quantity', 'dos-lineas' ),

        'type' => \Elementor\Controls_Manager::NUMBER,

        'default' => 3,

        'min' => 1,


       ]

    );



    $category = get_categories();

    foreach ($category as $categories) {

        $array[$categories->term_id] = $categories->name;

    }

    $array['all_post_fjalksjpwmvbl'] = esc_html__('All Post', 'dos-lineas'); 


    $this->add_control(

       'spicy_category',

       [

        'label' => __( 'Category', 'dos-lineas' ),

        'type' => \Elementor\Controls_Manager::SELECT,

        'default' => "all_post_fjalksjpwmvbl",

        'options' => $array,

       ]

    );


    $this->add_control(

       'spicy_orderby',

       [

        'label' => __( 'Orderby', 'dos-lineas' ),

        'type' => \Elementor\Controls_Manager::SELECT,

        'default' => "date",

        'options' => [
          'date'  => __( 'Date', 'dos-lineas' ),
          'modified' => __( 'Última Fecha de Modificación', 'dos-lineas' ),
          'title' => __( 'Title', 'dos-lineas' ),
          'menu_order' => __( 'Menu Order (the integer fields in the Insert / Upload Media Gallery dialog)', 'dos-lineas' ),
          'comment_count' => __( 'Comment Count', 'dos-lineas' ),
          'rand' => __( 'Rand', 'dos-lineas' ),
        ],
       ]

    );


    $this->end_controls_section();

    $this->start_controls_section(
      'section_general_style_post',
      [
        'label' => __( 'Shadow', 'dos-lineas' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
       'spicy_style',
       [
        'label' => __( 'Style', 'dos-lineas' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => "style-horizontal",
        'options' => [
          'style-horizontal' => esc_html__( 'Style Horizontal', 'dos-lineas' ),
          'style-vertical' => esc_html__( 'Style Vertical', 'dos-lineas' ),
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
        'name' => 'spicy_shadow',
        'label' => __( 'Box Shadow', 'dos-lineas' ),
        'selector' => '{{WRAPPER}} .post-content-list .content-briefcase-img a, {{WRAPPER}} .post-content-list .text-content-list',
        // 'selectors' => [

        //   '{{WRAPPER}} .post-content-list .content-briefcase-img',

        //   '{{WRAPPER}} .post-content-list .text-content-list',

        //  ],

      ]
    );

    $this->end_controls_section();

  }



  protected function render(){

    $settings = $this->get_settings_for_display();
    $number = $settings['spicy_number'] ;
    $category = $settings['spicy_category'] ;
    $template_style_post = $settings['spicy_style'] ;
    $orderby = $settings['spicy_orderby'] ;

    global $post;


    if ( $category == 'all_post_fjalksjpwmvbl') {
      $args_p = array( 
        'post_type'      => 'post',
        'posts_per_page' => $number,
        'orderby'        => $orderby,
      );
    }else{

      $args_p = array( 
        'post_type' => 'post',
        'tax_query' => [ 
          [
            'taxonomy'         => 'category',
            'terms'            => $category,
            'include_children' => false // Remove if you need posts from term 7 child terms
          ],
        ],
        'posts_per_page' => $number,
        'orderby'        => $orderby,
      );

    }

    $myposts = get_posts( $args_p );

    echo '<div class="row">';
      foreach ( $myposts as $post ) : 
        setup_postdata( $post );

          get_template_part( 'template-parts/post/content-list', $template_style_post);

      endforeach; 

      wp_reset_postdata();

    echo '</div>';
    ?>
    <script>
    jQuery( function( $ ) {
      jQuery(".post-content-list").each(function(indice, elemento){
        /*Image provided*/
        var wp_post_image_width = jQuery(this).find('.img-responsive').outerWidth(true);
        var wp_post_image_width_division = wp_post_image_width / 16;
        var wp_post_image_heigt_calc =  wp_post_image_width_division * 9;

        jQuery('.post-content-list .wp-post-image').css('height', wp_post_image_heigt_calc);
      
        /*Assign size (style horizontal)*/

        if (jQuery(this).hasClass('post-style-horizontal')) {
          var text_content_list = jQuery(this).find('.text-content-list');

          var text_content_list_height = text_content_list.height();

          var text_content_list_count = 0;
          jQuery(this).find('.text-content-list > *').each(function(indice, elemento){
            text_content_list_count += jQuery(this).outerHeight(true);  
          });

          jQuery(this).find('.button-blog').css('bottom', text_content_list_count - text_content_list_height);


        }else if(jQuery(this).hasClass('post-style-vertical')){

          var post_content_list_height = jQuery(this).height();

          var content_briefcase_img_height = jQuery(this).find('.content-briefcase-img').height();

          jQuery(this).find('.text-content-list').css('height', post_content_list_height - content_briefcase_img_height);

          jQuery(this).find('.button-blog').css('position', 'absolute');
          jQuery(this).find('.button-blog').css('margin-bottom', '21px');     
        }
      });
    } );

    </script>

    <?php

  }

}