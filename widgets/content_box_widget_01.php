<?php
class Eva_Elementor_Addon extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'contentbox';
	}

	public function get_title()
	{
		return esc_html__('Content Box 1', 'eva');
	}

	public function get_icon()
	{
		return ' eicon-info-box';
	}

	public function get_categories()
	{
		return ['eva-contentbox-addon'];
	}

	public function get_keywords()
	{
		return ['Content Box', 'Icon Box'];
	}

	protected function register_controls()
	{
    // Content Section

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Content', 'elementor-currency-control'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
    // Select Content Box Section
        $this->add_control(
            'content_box_select',
            [
                'label' => esc_html__( 'Content Box Select', 'eva' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style_01',
                'options' => [
                    'style_01' => esc_html__( 'Style-01', 'eva' ),
                    'style_02' => esc_html__( 'Style-02', 'eva' ),
                    'style_03' => esc_html__( 'Style-03', 'eva' ),
                    'style_04' => esc_html__( 'Style-04', 'eva' ),
                    'style_05' => esc_html__( 'Style-05', 'eva' ),
                    'style_06' => esc_html__( 'Style-06', 'eva' ),
                    'style_07' => esc_html__( 'Style-07', 'eva' ),
                    'style_08' => esc_html__( 'Style-08', 'eva' ),
                    'style_09' => esc_html__( 'Style-09', 'eva' ),
                    'style_10' => esc_html__( 'Style-10', 'eva' ),
                    'style_11' => esc_html__( 'Style-11', 'eva' ),
                    'style_12' => esc_html__( 'Style-12', 'eva' ),
                    'style_13' => esc_html__( 'Style-13', 'eva' ),
                    'style_14' => esc_html__( 'Style-14', 'eva' ),
                    'style_15' => esc_html__( 'Style-15', 'eva' ),
                    'style_16' => esc_html__( 'Style-16', 'eva' ),
                    'style_17' => esc_html__( 'Style-17', 'eva' ),
                    'style_18' => esc_html__( 'Style-18', 'eva' ),
                    'style_19' => esc_html__( 'Style-19', 'eva' ),
                    'style_20' => esc_html__( 'Style-20', 'eva' ),
                ],
            ]
        );

    // Content Box Icon
        $this->add_control(
            'content_box_icon',
            [
                'label' => esc_html__( 'Icon', 'eva' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-chart-bar',
                    'library' => 'fa-regular',
                ],
            ]
        );

    // Content Box Title
        $this->add_control(
            'content_box_title',
            [
                'label' => esc_html__( 'Title', 'eva' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Business Stratagy', 'eva' ),
                'placeholder' => esc_html__( 'Type your title here', 'eva' ),
                'label_block' => true
            ]
        );

    // Content Box Description
        $this->add_control(
            'content_box_description',
            [
                'label' => esc_html__( 'Description', 'eva' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'eva' ),
                'placeholder' => esc_html__( 'Type your description here', 'eva' ),
            ]
        );

    // Content Box Button Text
        $this->add_control(
            'content_box_button_text',
            [
                'label' => esc_html__( 'Button Text', 'eva' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'View Detais', 'eva' ),
                'placeholder' => esc_html__( 'Type your button text here', 'eva' ),
            ]
        );

    // Content Box Button URL
        $this->add_control(
            'content_box_button_url',
            [
                'label' => esc_html__( 'Link', 'eva' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

		$this->end_controls_section();

	// Style Tab Section
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Icon Style', 'eva' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

    // Content Box Icon Color (1-4)
        $this->add_control(
            'content_box_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'eva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#6a4bc4',
                'selectors' => [
                    '{{WRAPPER}} .content-box-1-icon-wrapper' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .content-box-2-icon-wrapper' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .content-box-3-icon-wrapper' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .content-box-4-icon-wrapper' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .content-box-5-icon' => 'color: {{VALUE}}',
                ],
            ]
        );

    // // Content Box Icon Background Color (5-)
        $this->add_control(
            'content_box_icon_backgound_color',
            [
                'label' => esc_html__( 'Icon Background Color', 'eva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#6a4bc4',
                'selectors' => [
                    '{{WRAPPER}} .content-box-5-icon-box' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'content_box_select' => 'style_05',
                ],
            ]
        );
    // Content Box Border Color
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'selector' => '{{WRAPPER}} .content-box-1-icon-wrapper',
                ]
            );

    //  // Content Box Animation Dot Background Color
    //     $this->add_control(
    //         'animation_dot_background',
    //         [
    //             'label' => esc_html__( 'Dot Color', 'eva' ),
    //             'type' => \Elementor\Controls_Manager::COLOR,
    //             'default' => '#6a4bc4',
    //             'selectors' => [
    //                 '{{WRAPPER}} .content-box-1-circle-bullet' => 'background-color: {{VALUE}}',
    //                 '{{WRAPPER}} .content-box-2-circle-bullet' => 'background-color: {{VALUE}}',
    //                 '{{WRAPPER}} .content-box-3-circle-bullet' => 'background-color: {{VALUE}}',
    //                 '{{WRAPPER}} .content-box-4-circle-bullet' => 'background-color: {{VALUE}}',
    //             ],
    //         ]
    //     );
        
    //     $this->end_controls_section();

	// // Content Tab Section
    //     $this->start_controls_section(
    //         'style_content_section',
    //         [
    //             'label' => esc_html__( 'Content', 'eva' ),
    //             'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    //         ]
    //     );

    // // Title Heading
	// 	$this->add_control(
	// 		'title_heading',
	// 		[
	// 			'label' => esc_html__( 'Title Section', 'eva' ),
	// 			'type' => \Elementor\Controls_Manager::HEADING,
	// 			'separator' => 'after',
	// 		]
	// 	);

    // // Content Box Title Section (Typography)
    //     $this->add_group_control(
    //         \Elementor\Group_Control_Typography::get_type(),
    //         [
    //             'name' => 'content_title_typography',
    //             'selector' => '{{WRAPPER}} .content-box-1-title',
    //             'selector' => '{{WRAPPER}} .content-box-2-title',
    //             'selector' => '{{WRAPPER}} .content-box-3-title',
    //             'selector' => '{{WRAPPER}} .content-box-4-title',
    //         ]
    //     );
    // // Content Box Title Color
    //     $this->add_control(
	// 		'content_box_title_color',
	// 		[
	// 			'label' => esc_html__( 'Title Color', 'eva' ),
	// 			'type' => \Elementor\Controls_Manager::COLOR,
	// 			'selectors' => [
	// 				'{{WRAPPER}} .content-box-1-title' => 'color: {{VALUE}}',
	// 				'{{WRAPPER}} .content-box-2-title' => 'color: {{VALUE}}',
	// 				'{{WRAPPER}} .content-box-3-title' => 'color: {{VALUE}}',
	// 				'{{WRAPPER}} .content-box-4-title' => 'color: {{VALUE}}',
	// 			],
	// 		]
	// 	);

    // // Content Box Desc Heading
	// 	$this->add_control(
	// 		'desc_heading',
	// 		[
	// 			'label' => esc_html__( 'Description Section', 'eva' ),
	// 			'type' => \Elementor\Controls_Manager::HEADING,
	// 			'separator' => 'after',
	// 		]
	// 	);
    //  // Content Box Description Section (Typography)
    //     $this->add_group_control(
    //         \Elementor\Group_Control_Typography::get_type(),
    //         [
    //             'name' => 'content_des_typography',
    //             'selector' => '{{WRAPPER}} .content-box-1-content',
    //             'selector' => '{{WRAPPER}} .content-box-2-content',
    //             'selector' => '{{WRAPPER}} .content-box-3-content',
    //             'selector' => '{{WRAPPER}} .content-box-4-content',
    //         ]
    //     );
    // // Content Box Description Section (Color)
    //     $this->add_control(
	// 		'content_box_description_color',
	// 		[
	// 			'label' => esc_html__( 'Description Color', 'eva' ),
	// 			'type' => \Elementor\Controls_Manager::COLOR,
	// 			'selectors' => [
	// 				'{{WRAPPER}} .content-box-1-content' => 'color: {{VALUE}}',
	// 				'{{WRAPPER}} .content-box-2-content' => 'color: {{VALUE}}',
	// 				'{{WRAPPER}} .content-box-3-content' => 'color: {{VALUE}}',
	// 				'{{WRAPPER}} .content-box-4-content' => 'color: {{VALUE}}',
	// 			],
	// 		]
	// 	);

    // // Content Box Button Heading
	// 	$this->add_control(
	// 		'button_heading',
	// 		[
	// 			'label' => esc_html__( 'Button Section', 'eva' ),
	// 			'type' => \Elementor\Controls_Manager::HEADING,
	// 			'separator' => 'before',
	// 		]
	// 	);
    // // Content Box Btn Tab Section
    //     $this->start_controls_tabs(
    //         'style_tabs'
    //     );

    // // Content Box Btn Tab Section (Normal)
    //     $this->start_controls_tab(
    //         'style_normal_tab',
    //         [
    //             'label' => esc_html__( 'Normal', 'eva' ),
    //         ]
    //     );
    // // Content Box btn Section
    //     $this->add_group_control(
    //     \Elementor\Group_Control_Typography::get_type(),
    //     [
    //         'name' => 'content_btn_typography',
    //         'selector' => '{{WRAPPER}} .content-box-1-button',
    //         'selector' => '{{WRAPPER}} .content-box-2-button',
    //         'selector' => '{{WRAPPER}} .content-box-3-button',
    //         'selector' => '{{WRAPPER}} .content-box-4-button',
    //     ]
    // );
    // // Content Box btn Section (color)
    //     $this->add_control(
    //         'content_box_btn_color',
    //         [
    //             'label' => esc_html__( 'Color', 'eva' ),
    //             'type' => \Elementor\Controls_Manager::COLOR,
    //             'selectors' => [
    //                 '{{WRAPPER}} .content-box-1-button' => 'color: {{VALUE}}',
    //                 '{{WRAPPER}} .content-box-2-button' => 'color: {{VALUE}}',
    //                 '{{WRAPPER}} .content-box-3-button' => 'color: {{VALUE}}',
    //                 '{{WRAPPER}} .content-box-4-button' => 'color: {{VALUE}}',
    //             ],
    //         ]
    //     );

	// 	$this->end_controls_tab();

    // // Content Box Btn Tab Section (Hover)
    //     $this->start_controls_tab(
    //         'style_hover_tab',
    //         [
    //             'label' => esc_html__( 'Hover', 'eva' ),
    //         ]
	// 	);
    // // Content Box btn Section
    //     $this->add_group_control(
    //         \Elementor\Group_Control_Typography::get_type(),
    //         [
    //             'name' => 'content_btn_hover_typography',
    //             'selector' => '{{WRAPPER}} .content-box-1-button:hover',
    //             'selector' => '{{WRAPPER}} .content-box-2-button:hover',
    //             'selector' => '{{WRAPPER}} .content-box-3-button:hover',
    //             'selector' => '{{WRAPPER}} .content-box-4-button:hover',
    //         ]
    //     );
    
    //     $this->add_control(
    //         'content_box_btn_hover_color',
    //         [
    //             'label' => esc_html__( 'Color', 'eva' ),
    //             'type' => \Elementor\Controls_Manager::COLOR,
    //             'default' => '#333;',
    //             'selectors' => [
    //                     '{{WRAPPER}} .content-box-1-button:hover' => 'color: {{VALUE}}',
    //                     '{{WRAPPER}} .content-box-2-button:hover' => 'color: {{VALUE}}',
    //                     '{{WRAPPER}} .content-box-3-button:hover' => 'color: {{VALUE}}',
    //                     '{{WRAPPER}} .content-box-4-button:hover' => 'color: {{VALUE}}',
    //                 ],
    //             ]
    //         );
        

    //     $this->end_controls_section();


    // // Box Section
    //     $this->start_controls_section(
    //         'style_content_box_section',
    //         [
    //             'label' => esc_html__( 'Box Contnet', 'eva' ),
    //             'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    //         ]
    //     );

    // // Box content aligment
    //     $this->add_control(
    //         'content_box_align',
    //         [
    //             'label' => esc_html__( 'Alignment', 'eva' ),
    //             'type' => \Elementor\Controls_Manager::CHOOSE,
    //             'options' => [
    //                 'left' => [
    //                     'title' => esc_html__( 'Left', 'eva' ),
    //                     'icon' => 'eicon-text-align-left',
    //                 ],
    //                 'center' => [
    //                     'title' => esc_html__( 'Center', 'eva' ),
    //                     'icon' => 'eicon-text-align-center',
    //                 ],
    //                 'right' => [
    //                     'title' => esc_html__( 'Right', 'eva' ),
    //                     'icon' => 'eicon-text-align-right',
    //                 ],
    //             ],
    //             'default' => 'center',
    //             'toggle' => true,
    //             'selectors' => [
    //                 '{{WRAPPER}} .content-box-1' => 'text-align: {{VALUE}};',
    //                 '{{WRAPPER}} .content-box-2' => 'text-align: {{VALUE}};',
    //                 '{{WRAPPER}} .content-box-3' => 'text-align: {{VALUE}};',
    //                 '{{WRAPPER}} .content-box-4' => 'text-align: {{VALUE}};',
    //             ],
    //         ]
    //     );

    // // Box content Background Color
    //     $this->add_control(
    //         'box_content_background_color',
    //         [
    //             'label' => esc_html__( 'Background Color', 'eva' ),
    //             'type' => \Elementor\Controls_Manager::COLOR,
    //             'selectors' => [
    //                 '{{WRAPPER}} .content-box-1' => 'background-color: {{VALUE}}',
    //                 '{{WRAPPER}} .content-box-2' => 'background-color: {{VALUE}}',
    //                 '{{WRAPPER}} .content-box-3' => 'background-color: {{VALUE}}',
    //                 '{{WRAPPER}} .content-box-4' => 'background-color: {{VALUE}}',
    //             ],
    //         ]
    //     );

    // // Box Content Box Shadow
    //     $this->add_group_control(
    //         \Elementor\Group_Control_Box_Shadow::get_type(),
    //         [
    //             'name' => 'box_content_boxshadow',
    //             'selector' => '{{WRAPPER}} .content-box-1',
    //             'selector' => '{{WRAPPER}} .content-box-2',
    //             'selector' => '{{WRAPPER}} .content-box-3',
    //             'selector' => '{{WRAPPER}} .content-box-4',
    //         ]
    //     );
    // // Conten box ( Box Sction)
	// 	$this->add_control(
	// 		'content_box_border_buttom',
	// 		[
	// 			'label' => esc_html__( 'Box Hover Border Color', 'eva' ),
	// 			'type' => \Elementor\Controls_Manager::COLOR,
	// 			'selectors' => [
	// 				'{{WRAPPER}} .content-box-2:hover::before' => 'background-color: {{VALUE}}',
	// 				'{{WRAPPER}} .content-box-4:hover::before' => 'background-color: {{VALUE}}',
	// 			],
            
    //             'condition' => [
    //                 'content_box_select' => 'style_02',
    //                 'content_box_select' => 'style_04',
    //             ],
	// 		]
	// 	);

        $this->end_controls_section();
    }


	protected function render(){
    $settings = $this->get_settings_for_display();
    $content_box_select =$settings ['content_box_select'];
    $content_box_icon =$settings ['content_box_icon'];
    $content_box_title =$settings ['content_box_title'];
    $content_box_description =$settings ['content_box_description'];
    $content_box_button_text =$settings ['content_box_button_text'];
    $content_box_button_url =$settings ['content_box_button_url'];
	
        switch ($content_box_select) {
            case "style_01":
              include(__DIR__.'/inc/parts-01/content_box_01.php');
              break;

            case "style_02":
                include(__DIR__.'/inc/parts-01/content_box_02.php');
              break;

            case "style_03":
                include(__DIR__.'/inc/parts-01/content_box_03.php');
              break;

            case "style_04":
                include(__DIR__.'/inc/parts-01/content_box_04.php');
              break;

            case "style_05":
                include(__DIR__.'/inc/parts-01/content_box_05.php');
              break;

            case "style_06":
                include(__DIR__.'/inc/parts-01/content_box_06.php');
             break;

            case "style_07":
                include(__DIR__.'/inc/parts-01/content_box_07.php');
              break;

            case "style_08":
                include(__DIR__.'/inc/parts-01/content_box_08.php');
              break;

            case "style_09":
                include(__DIR__.'/inc/parts-01/content_box_09.php');
              break;

            case "style_10":
                include(__DIR__.'/inc/parts-01/content_box_10.php');
              break;
            
            case "style_11":
                include(__DIR__.'/inc/parts-01/content_box_11.php');
              break;

            case "style_12":
                include(__DIR__.'/inc/parts-01/content_box_12.php');
              break;

            case "style_13":
                include(__DIR__.'/inc/parts-01/content_box_13.php');
              break;

            case "style_14":
                include(__DIR__.'/inc/parts-01/content_box_14.php');
              break;

            case "style_15":
                include(__DIR__.'/inc/parts-01/content_box_15.php');
              break;

            case "style_16":
                include(__DIR__.'/inc/parts-01/content_box_16.php');
              break;

            case "style_17":
                include(__DIR__.'/inc/parts-01/content_box_17.php');
              break;

            case "style_18":
                include(__DIR__.'/inc/parts-01/content_box_18.php');
              break;

            case "style_19":
                include(__DIR__.'/inc/parts-01/content_box_19.php');
              break;

            case "style_20":
                include(__DIR__.'/inc/parts-01/content_box_20.php');
              break;

            default:
                include(__DIR__.'/inc/parts-01/content_box_01.php');
        }
    ?>
<?php
	}
}