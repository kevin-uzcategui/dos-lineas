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



    return esc_html__( 'Image And Text Inside', 'dos-lineas' );



  }







  public function get_icon(){



    return 'eicon-image-before-after';



  }







  public function get_categories(){



    return ['custom-category-dos-lineas'];



  }







  protected function _register_controls(){







    $this->start_controls_section(



         'section_name',//set unique name







              //set setting of section



            [



             'label' => __( 'Image And Text', 'dos-lineas' ),



             'tab' => \Elementor\Controls_Manager::TAB_CONTENT,



            ]



    );







    $this->add_control(



       'spicy_pro_img_and_text',



           [



            'label' => __( 'Image And Text', 'dos-lineas' ),



            'type' => \Elementor\Controls_Manager::TEXT,



            'default' => __( 'This is the heading', 'dos-lineas' ),



            'label_block' => true,



            'placeholder' => __( 'Your title', 'dos-lineas' ),



            'dynamic' => [



                           'active' => true,



                          ],



           ]



    );







    $this->add_control(



        'spicy_hearding',



        [



            'label' => __( 'Heading Type', 'dos-lineas' ),



            'type' => \Elementor\Controls_Manager::SELECT,



            'options' => [



              'h1' => 'H1',



              'h2' => 'H2',



              'h3' => 'H3',



              'h4' => 'H4',



              'h5' => 'H5',



              'h6' => 'H6'



            ],



            'default' => 'h2',



        ]



    );







    $this->end_controls_section();







    // Controls Style Title







    $this->start_controls_section(



      'section_style_button',



      [



        'label' => __( 'Title', 'dos-lineas' ),



        'tab' => \Elementor\Controls_Manager::TAB_STYLE,



      ]



    );    







    $this->add_group_control(



            \Elementor\Group_Control_Typography::get_type(),



            [



             'name' => 'spicy_pro_textarea_typography',



             'selector' => '{{WRAPPER}} .titlewidget',


         ]



    );







        $this->add_control(



           'spicy_pro_title_color',



           [



            'label' => __( 'Title Color', 'dos-lineas' ),



            'type' => \Elementor\Controls_Manager::COLOR,



            'default' => '',



            'selectors' => [



              '{{WRAPPER}} .titlewidget' => 'color: {{VALUE}};',



             ],


           ]



    );







            $this->add_control(



           'spicy_pro_line_color',



           [



            'label' => __( 'Line Color', 'dos-lineas' ),



            'type' => \Elementor\Controls_Manager::COLOR,



            'default' => '',



            'selectors' => [



              '{{WRAPPER}} .titlewidget::before' => 'border-top: 3px solid {{VALUE}};',



              '{{WRAPPER}} .titlewidget::after' => 'border-top: 1px solid {{VALUE}};',



             ],



            'scheme' => [



                         'type' => \Elementor\Scheme_Color::get_type(),



                         'value' => \Elementor\Scheme_Color::COLOR_1,



                        ],



           ]



    );











   $this->end_controls_section();



 }







  protected function render(){



    $settings = $this->get_settings_for_display();



    $var_title = $settings['spicy_pro_title'];



    $var_hearding = $settings['spicy_hearding'];







   // Text



    



   echo "<".$var_hearding." class=\"titlewidget \">";



   echo $var_title;



   echo "</".$var_hearding.">";







  }







}



