<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class PostTypeBriefcase extends Widget_Base{

  public function get_name(){
    return 'id_post_type_briefcase';
  }

  public function get_title(){
    return esc_html__( 'Portfolio Listing', 'dos-lineas' );
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
          'taxonomy'   =>  'category_briefcase' // mention taxonomy here. 
      )
    );

    $array['all_briefcase_ñlajsdfrfkl'] = esc_html__('All Portfolio', 'dos-lineas'); 

    foreach ($categories as $category) {       
      $array[$category->term_id] = $category->name;        
    }

    $this->add_control(
       'spicy_category',
       [
        'label' => __( 'Category', 'dos-lineas' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => "all_briefcase_ñlajsdfrfkl",
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
        'label' => __( 'General', 'dos-lineas' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
       'spicy_style',
       [
        'label' => __( 'Style', 'dos-lineas' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => "style-simple",
        'options' => [
          'style-simple' => esc_html__( 'Style Simple', 'dos-lineas' ),
          'style-line' => esc_html__( 'Style Line', 'dos-lineas' ),
        ],
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
    $category = $settings['spicy_category'] ;
    $template_style_portfolio = $settings['spicy_style'] ;
    $orderby = $settings['spicy_orderby'] ;

    $id_img_number = 0;

        global $post;

        if ( $category == 'all_briefcase_ñlajsdfrfkl') {
          $args_p = array(
            'post_type' => 'briefcase_dos_lineas',
            'posts_per_page' => $number,
            'orderby'        => $orderby,
          );
        }else{
          $args_p = array(
            'post_type' => 'briefcase_dos_lineas',
            'tax_query' => [ // Elegir por termino de una categoria
              [
                'taxonomy' => 'category_briefcase',
                'terms' => $category,
                'include_children' => false // Remove if you need posts from term 7 child terms
              ],
            ],
            'posts_per_page' => $number,
            'orderby'        => $orderby,
          );
        }



        $myposts = get_posts( $args_p );

        echo '<div class="content-all-post-briefcase_dos_lineas">';
          foreach ( $myposts as $post ) : 
            setup_postdata( $post );
              get_template_part( 'template-parts/briefcase/content-list', $template_style_portfolio);

          endforeach; 
          
        echo '</div>';
        wp_reset_postdata();


        ?>
        <script>
        /*Variables*/

        var backgound_briefcase_list_width = jQuery('.backgound-briefcase-list').width();

        /*Carculo del tamaño de la imagen*/

        jQuery('.backgound-briefcase-list').css('height', backgound_briefcase_list_width);

        /*Carcular la cantidad de texto*/

        jQuery(".briefcase-title").each(function(indice, elemento){
          var briefcase_title_height = jQuery(this)[0].scrollHeight;

          if (backgound_briefcase_list_width - 7 < briefcase_title_height) {
            jQuery(this).addClass('title-big');
          }
        });
        </script>      
        <?php
        
  }
}