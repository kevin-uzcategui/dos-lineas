<?php



namespace WPC\Widgets;



use Elementor\Widget_Base;

use Elementor\Controls_Manager;



if (!defined('ABSPATH')) exit; // Exit if accessed directly



class ImgAndText extends Widget_Base{



  public function get_name(){

    return 'id_img_and_text';

  }



  public function get_title(){

    return esc_html__( 'Image with Text', 'dos-lineas' );

  }



  public function get_icon(){

    return 'eicon-image-before-after';

  }



  public function get_categories(){

    return ['custom-category-dos-lineas'];

  }



  protected function _register_controls(){



    // Controls content



    $this->start_controls_section(

         'section_img',//set unique name



              //set setting of section

            [

             'label' => __( 'Image', 'dos-lineas' ),

             'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]

    );



    $this->add_control(

      'spicy_img',

      array(

        'label'   => __( 'Image', 'dos-lineas' ),

        'type'    => Controls_Manager::MEDIA,

        'default' => [

          'url' => \Elementor\Utils::get_placeholder_image_src(),

        ]





      )

    );    





    $this->end_controls_section();



    $this->start_controls_section(

         'section_text',//set unique name



              //set setting of section

            [

             'label' => __( 'Text', 'dos-lineas' ),

             'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]

    );



    $this->add_control(

       'spicy_text',

           [

            'label' => __( 'Text', 'dos-lineas' ),

            'type' => \Elementor\Controls_Manager::TEXT,

            'default' => __( 'This is the text', 'dos-lineas' ),

            'label_block' => true,

            'placeholder' => __( 'Your text', 'dos-lineas' ),

            'dynamic' => [

                           'active' => true,

                          ],

           ]

    );



    $this->add_control(

       'spicy_url',

           [

            'label' => __( 'Link (URL):', 'dos-lineas' ),

            'type' => \Elementor\Controls_Manager::URL,

            'default' => [

              'url' => '',

            ],

           ]

    );        



    $this->add_control(

        'spicy_text_container',

        [

            'label' => __( 'Text container (HTML)', 'dos-lineas' ),

            'type' => \Elementor\Controls_Manager::SELECT,

            'options' => [

              'p' => 'p',

              'div' => 'div',

              'span' => 'span',

              'h1' => 'H1',

              'h2' => 'H2',

              'h3' => 'H3',

              'h4' => 'H4',

              'h5' => 'H5',

              'h6' => 'H6'

            ],

            'default' => 'p',

        ]

    );



    $this->end_controls_section();



    // Controls Style



    $this->start_controls_section(

      'section_style_text',

      [

        'label' => __( 'Text', 'dos-lineas' ),

        'tab' => \Elementor\Controls_Manager::TAB_STYLE,

      ]

    );    



    $this->add_group_control(

        \Elementor\Group_Control_Typography::get_type(),

        [

         'name' => 'spicy_text_typography',

         'selector' => '{{WRAPPER}} .text-img-inside',

     ]

    );



      $this->add_control(

     'spicy_pro_line_color',

     [

      'label' => __( 'Text Color', 'dos-lineas' ),

      'type' => \Elementor\Controls_Manager::COLOR,

      'default' => '',

      'selectors' => [

        '{{WRAPPER}} .text-img-inside' => 'color: {{VALUE}};',

       ],


     ]

    );

















    $this->add_group_control(

      \Elementor\Group_Control_Text_Shadow::get_type(),

      [

        'name' => 'spicy_shadow',

        'label' => __( 'Text Shadow', 'dos-lineas' ),

        'selector' => '{{WRAPPER}} .text-img-inside',

      ]

    );      













    $this->add_responsive_control(

       'spicy_text_align',

       [

        'label' => __( 'Alignment', 'Spicy-extension' ),

        'type' => \Elementor\Controls_Manager::CHOOSE,

        'options' => [

                      'left' => [

                                  'title' => __( 'Left','Spicy-extension'),

                                  'icon' => 'fa fa-align-left',

                                ],

                      'center' => [

                                    'title' => __( 'Center', 'Spicy-extension' ),

                                    'icon' => 'fa fa-align-center',

                                   ],

                      'right' => [

                                  'title' => __( 'Right', 'Spicy-extension' ),

                                  'icon' => 'fa fa-align-right',

                                 ],

                      'justify' => [

                                    'title' => __( 'Justified', 'Spicy-extension' ),

                                    'icon' => 'fa fa-align-justify',

                                   ],

                     ],

        'default' =>'',

        'selectors' => [

          '{{WRAPPER}} .text-img-inside' => 'text-align: {{VALUE}};',

        ],

    ]

    );



   $this->end_controls_section();    



    $this->start_controls_section(

      'section_style_img',

      [

        'label' => __( 'Image', 'dos-lineas' ),

        'tab' => \Elementor\Controls_Manager::TAB_STYLE,

      ]

    );





















    $this->start_controls_tabs( 'image_effects' );



    $this->start_controls_tab( 'normal',

      [

        'label' => __( 'Normal', 'elementor' ),

      ]

    );



    $this->add_control(

      'opacity',

      [

        'label' => __( 'Opacity', 'elementor' ),

        'type' => \Elementor\Controls_Manager::SLIDER,

        'range' => [

          'px' => [

            'max' => 1,

            'min' => 0.10,

            'step' => 0.01,

          ],

        ],

        'selectors' => [

          '{{WRAPPER}} .content-img-and-text img' => 'opacity: {{SIZE}};',

        ],

      ]

    );



    $this->add_group_control(

      \Elementor\Group_Control_Css_Filter::get_type(),

      [

        'name' => 'css_filters',

        'selector' => '{{WRAPPER}} .content-img-and-text img',

      ]

    );



    $this->end_controls_tab();



    $this->start_controls_tab( 'hover',

      [

        'label' => __( 'Hover', 'elementor' ),

      ]

    );



    $this->add_control(

      'opacity_hover',

      [

        'label' => __( 'Opacity', 'elementor' ),

        'type' => \Elementor\Controls_Manager::SLIDER,

        'range' => [

          'px' => [

            'max' => 1,

            'min' => 0.10,

            'step' => 0.01,

          ],

        ],

        'selectors' => [

          '{{WRAPPER}} .content-img-and-text:hover img' => 'opacity: {{SIZE}};',

        ],

      ]

    );



    $this->add_group_control(

      \Elementor\Group_Control_Css_Filter::get_type(),

      [

        'name' => 'css_filters_hover',

        'selector' => '{{WRAPPER}} .content-img-and-text:hover img',

      ]

    );



    $this->add_control(

      'background_hover_transition',

      [

        'label' => __( 'Transition Duration', 'elementor' ),

        'type' => \Elementor\Controls_Manager::SLIDER,

        'range' => [

          'px' => [

            'max' => 3,

            'step' => 0.1,

          ],

        ],

        'selectors' => [

          '{{WRAPPER}} .content-img-and-text img' => 'transition-duration: {{SIZE}}s',

        ],

      ]

    );



    $this->add_control(

      'hover_animation',

      [

        'label' => __( 'Hover Animation', 'plugin-domain' ),

        'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,

        'prefix_class' => 'elementor-animation-',

      ]

    );    



    $this->end_controls_tab();



    $this->end_controls_tabs();





   $this->end_controls_section();

 }



  protected function render(){

    $settings = $this->get_settings_for_display();

    $var_img = $settings['spicy_img'];

    $var_text = $settings['spicy_text'];

    $var_text_container = $settings['spicy_text_container'];

    $var_url = $settings['spicy_url'];



   ?>

   <div class="content-img-and-text {{ settings.hover_animation }}">

      <?php if (! $var_url['url'] == "" or ! $var_url['url']  == null): ?>

        <a href="<?php echo $var_url['url'] ?>">

      <?php endif ?>



        <img src="<?= $var_img['url'] ?>">

        



        <<?= $var_text_container ?> class="text-img-inside "><?= $var_text ?></<?= $var_text_container ?>>



      <?php if (! $var_url['url']  == "" or ! $var_url['url']  == null): ?>

        </a>

      <?php endif ?>

   </div>

   <?php



  }



}

