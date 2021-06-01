<?php

namespace WPC;



// use Elementor\Plugin;

class Widget_Loader{

  private static $_instance = null;

  public static function instance()

  {

    if (is_null(self::$_instance)) {

      self::$_instance = new self();

    }

    return self::$_instance;

  }


  private function include_widgets_files(){

    require_once(__DIR__ . '/widgets/post_type_post.php');

    require_once(__DIR__ . '/widgets/post_type_briefcase.php');  

    if ( class_exists( 'WooCommerce' ) ) {

      require_once(__DIR__ . '/widgets/post_type_product.php');

    }

    require_once(__DIR__ . '/widgets/title.php');

    require_once(__DIR__ . '/widgets/img_and_text.php');

  }

  public function register_widgets(){

    $this->include_widgets_files();

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PostTypePost());

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PostTypeBriefcase());

    if ( class_exists( 'WooCommerce' ) ) {

      \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\PostTypeProduct());

    } 

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Title());

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\ImgAndText());

  }

  public function __construct(){

    add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);

  }

}



// Instantiate Plugin Class

Widget_Loader::instance();

