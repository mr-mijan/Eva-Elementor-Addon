<?php
class Eva_Content_Box_03 extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'contentbox_03';
	}

	public function get_title()
	{
		return esc_html__('Content Box 3', 'eva');
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

    // Content Box Icon Color (1)
        $this->add_control(
            'content_box_01_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'eva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#6a4bc4',
                'selectors' => [
                    '{{WRAPPER}} .content-box-3-icon-wrapper' => 'color: {{VALUE}}',
                ],
            ]
        );
    
    // Content Box 01 Icon Size
    $this->add_control(
        'box_content_icon_size',
        [
            'label' => esc_html__( 'Size', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em', 'rem' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .content-box-3-icon' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Content Box icon Border Color (1)
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border_color_01',
                'selector' => '{{WRAPPER}} .content-box-3-icon-wrapper',
            ]
        );

    // Content Box Animation Dot Background Color
        $this->add_control(
            'animation_dot_background_01',
            [
                'label' => esc_html__( 'Dot Color', 'eva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#6a4bc4',
                'selectors' => [
                    '{{WRAPPER}} .content-box-3-circle-bullet' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    // Style Tab Section (Content)
		$this->start_controls_section(
			'content_style_section',
			[
				'label' => esc_html__( 'Content Style', 'eva' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

    // Content Box Title Section
    // Title Heading
		$this->add_control(
			'content_box_01_title_heading',
			[
				'label' => esc_html__( 'Title Section', 'eva' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

    // Content Box Title Color
        $this->add_control(
            'content_box_01_title_color',
            [
                'label' => esc_html__( 'Text Color', 'eva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                // 'default' => '#6a4bc4',
                'selectors' => [
                    '{{WRAPPER}} .content-box-3-title' => 'color: {{VALUE}}',
                ],
            ]
        );
    // Content Box Title Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_01_typography',
                'selector' => '{{WRAPPER}} .content-box-3-title',
            ]
        );
    // Content Box Title Text Shadow
        $this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .content-box-3-title',
			]
		);
    // Description Heading
		$this->add_control(
			'content_box_01_desc_heading',
			[
				'label' => esc_html__( 'Description Section', 'eva' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);
    // Content Box Description Color
        $this->add_control(
            'content_box_01_desc_color',
            [
                'label' => esc_html__( 'Description Color', 'eva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                // 'default' => '#6a4bc4',
                'selectors' => [
                    '{{WRAPPER}} .content-box-3-content' => 'color: {{VALUE}}',
                ],
            ]
        );
    // Content Box Description Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_desc_typography',
                'selector' => '{{WRAPPER}} .content-box-3-content',
            ]
        );
    // Content Box Description Text Shadow
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'desc_text_shadow',
                'selector' => '{{WRAPPER}} .content-box-3-content',
            ]
        );
    // Content Box Button Heading
            $this->add_control(
                'content_box_button_heading',
                [
                    'label' => esc_html__( 'Button Section', 'eva' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
       
    // Content Box Btn Tab Section
        $this->start_controls_tabs(
            'style_tabs'
        );

    // Content Box Btn Tab Section (Normal)
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'eva' ),
            ]
        );
    // Content Box btn Section
        $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'content_btn_typography',
            'selector' => '{{WRAPPER}} .content-box-3-button',
        ]
    );

    // Content Box btn Section (color)
        $this->add_control(
            'content_box_btn_color',
            [
                'label' => esc_html__( 'Color', 'eva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-box-3-button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

    // Content Box Btn Tab Section (Hover)
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'eva' ),
            ]
		);
    // Content Box btn Section (color)
        $this->add_control(
            'content_box_btn_hover_color',
            [
                'label' => esc_html__( 'Color', 'eva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-box-3-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_section();

    // Content Box section
      		$this->start_controls_section(
			'content_box_style_section',
			[
				'label' => esc_html__( 'Box Style', 'eva' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

    // Box Background Section
        $this->add_control(
            'box_background',
            [
                'label' => esc_html__( 'Background Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-box-3' => 'background-color: {{VALUE}}',
                ],
            ]
        );
    // Box Margin Section
        $this->add_control(
            'box_margin',
            [
                'label' => esc_html__( 'Margin', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .content-box-3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

    // Box Padding Section
        $this->add_control(
            'box_padding',
            [
                'label' => esc_html__( 'Padding', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .content-box-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    // Box Border Radius Section
        $this->add_control(
            'box_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .content-box-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

    // Box Shadow
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'selector' => '{{WRAPPER}} .content-box-3',
            ]
        );

        $this->end_controls_section();
    }


	protected function render(){
    $settings = $this->get_settings_for_display();
    $content_box_icon =$settings ['content_box_icon'];
    $content_box_title =$settings ['content_box_title'];
    $content_box_description =$settings ['content_box_description'];
    $content_box_button_text =$settings ['content_box_button_text'];
    $content_box_button_url =$settings ['content_box_button_url'];
    ?>

    <!-- START Content Box 3 -->
    <div class="content-box-3">
                <div class="content-box-3-icon-wrapper">
                    <div class="content-box-3-circle">
                        <div class="content-box-3-circle-bullet"></div>
                    </div>
                    <div class="content-box-3-circle">
                        <div class="content-box-3-circle-bullet"></div>
                    </div>
                    <span class="content-box-3-icon">
                        <i class="<?php echo $content_box_icon ['value'];?>"></i>
                    </span>
                </div>
                <div class="content-box-3-content-wrapper">
                    <h3 class="content-box-3-title"><?php echo $content_box_title; ?></h3>
                    <div class="content-box-3-content"><?php echo $content_box_description; ?></div>
                </div>
                <a class="content-box-3-button" href="<?php echo $content_box_button_url['url']; ?>"><?php echo $content_box_button_text; ?></a>
            </div>
            <!-- END Content Box 3 -->
        <?php
	}
}
   
   
   
   
   

 
