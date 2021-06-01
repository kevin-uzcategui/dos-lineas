<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class PostTypeProduct extends Widget_Base{

  public function get_name(){
    return 'id_post_type_product';
  }

  public function get_title(){
    return esc_html__( 'Product Listing', 'dos-lineas' );
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
        'default' => 4,
        'min' => 1,
       ]
    );

     $categories = get_categories(

        array(
            'hide_empty' =>  0,
            //'exclude'  =>  1,
            'taxonomy'   =>  'product_cat'
        )
     );

     $array['all_products_pwnañlkjsd'] = esc_html__('All Products', 'dos-lineas'); 

     foreach ($categories as $category) {       
        $array[$category->slug] = $category->name;        
     }


    $this->add_control(
       'spicy_category',
       [
        'label' => __( 'Category', 'dos-lineas' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => "all_products_pwnañlkjsd",
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
        'selector' => '{{WRAPPER}} .products .product',
      ]
    );

    $this->end_controls_section();

  }

  protected function render(){
    $settings = $this->get_settings_for_display();
    $number = $settings['spicy_number'] ;
    $category = $settings['spicy_category'] ;
    $orderby = $settings['spicy_orderby'] ;

    if ( $category == 'all_products_pwnañlkjsd') {
      $args = array( 
        'post_type' => 'product',
        'posts_per_page' => $number,
        'orderby'        => $orderby,
      );
    }else{
      $args = array( 
        'post_type' => 'product',
        'tax_query' => [ 
          [
            'taxonomy' => 'product_cat',
            'terms' => true,
            'include_children' => true // Remove if you need posts from term 7 child terms
          ],
        ],
        'posts_per_page' => $number,
        'orderby'        => $orderby,
      );   
    }

    $loop = new \WP_Query( $args );
    woocommerce_product_loop_start();
    while ( $loop->have_posts() ) : $loop->the_post();

      wc_get_template_part( 'template-parts/content-list', 'product');

    endwhile; wp_reset_query(); 
    woocommerce_product_loop_end();

  }
}