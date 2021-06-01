<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Advertisement extends Widget_Base{

  public function get_name(){
    return 'id_posts_widget';
  }

  public function get_title(){
    return esc_html__( 'Posts Widget', 'dos-lineas' );
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
       'spicy_post_type',
       [
        'label' => __( 'Post Type', 'dos-lineas' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
          'post' => __( 'Post', 'dos-lineas' ),
          'page' => __( 'Page', 'dos-lineas' ),
          'briefcase_dos_lineas' => __( 'Briefcase', 'dos-lineas' ),
          'product' => __( 'Product', 'dos-lineas' ),
       ],

        'default' => 'post',   
    ]
   );

    $this->add_responsive_control(
       'spicy_number',
       [
        'label' => __( 'Quantity', 'dos-lineas' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => 3,
        'min' => 1,
        'devices' => [ 'desktop', 'tablet', 'mobile' ],
       ]
    );


    $category = get_categories();
    foreach ($category as $categories) {
        $array[$categories->term_id] = $categories->name;
    }
    //array_push($array, default => "default");
    // print_r($array);
    // exit;

    $this->add_control(
       'spicy_category',
       [
        'label' => __( 'Category', 'dos-lineas' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => "Default",
        'options' => $array,
       ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'section_shadow_post',
      [
        'label' => __( 'Shadow', 'dos-lineas' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
        'name' => 'spicy_shadow',
        'label' => __( 'Box Shadow', 'dos-lineas' ),
        'selector' => '{{WRAPPER}} .row-general',
      ]
    );

    $this->end_controls_section();

  }

  protected function render(){
    $settings = $this->get_settings_for_display();
    $number = $settings['spicy_number'] ;
    $post_type = $settings['spicy_post_type'] ;
    $category = $settings['spicy_category'] ;

    $id_img_number = 0;

        global $post;

          $args_p = array( 
          'post_type' => $post_type,
          'category' => $category, 
          'posts_per_page' => $number 
        );

        $myposts = get_posts( $args_p );

        echo '<div class="content-all-post-' . $post_type . '">';
          foreach ( $myposts as $post ) : 
            setup_postdata( $post );
              $id_img = 'imgage-posts-list-' . $id_img_number++;

              set_query_var('id_img', $id_img);
              get_template_part( 'template-parts/content-list', get_post_type() );

          endforeach; 
          wp_reset_postdata();
        echo '</div>';
  }
}