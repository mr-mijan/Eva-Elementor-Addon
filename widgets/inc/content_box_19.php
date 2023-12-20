<?php
class Eva_Content_Box_19 extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'contentbox_19';
	}

	public function get_title()
	{
		return esc_html__('Content Box 19', 'eva');
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
                'default' => esc_html__( 'Read More', 'eva' ),
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
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .content-box-20-icon' => 'color: {{VALUE}}',
                ],
            ]
        );

    // Content Box Icon Color Background
        $this->add_control(
            'content_box_01_icon_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'eva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-box-20-icon' => 'background-color: {{VALUE}}',
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
                '{{WRAPPER}} .content-box-20-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .content-box-20-title' => 'color: {{VALUE}}',
                ],
            ]
        );
    // Content Box Title Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_01_typography',
                'selector' => '{{WRAPPER}} .content-box-20-title',
            ]
        );
    // Content Box Title Text Shadow
        $this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .content-box-20-title',
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
                    '{{WRAPPER}} .content-box-20-content' => 'color: {{VALUE}}',
                ],
            ]
        );
    // Content Box Description Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_desc_typography',
                'selector' => '{{WRAPPER}} .content-box-20-content',
            ]
        );
    // Content Box Description Text Shadow
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'desc_text_shadow',
                'selector' => '{{WRAPPER}} .content-box-20-content',
            ]
        );

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
                'label' => esc_html__( 'Hover Background Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-box-20:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

    // Box Background Section (icon color)
        $this->add_control(
            'box_background_icon',
            [
                'label' => esc_html__( 'Hover Icon Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#6a4bc4',
                'selectors' => [
                    '{{WRAPPER}} .content-box-20:hover .content-box-20-icon' => 'color: {{VALUE}}',
                ],
            ]
        );

    // Box Background Section (icon BG color)
        $this->add_control(
            'box_background_icon_bg',
            [
                'label' => esc_html__( 'Hover Icon BG Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-box-20:hover .content-box-20-icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

    // Box Background Section Title color)
        $this->add_control(
            'box_background_title',
            [
                'label' => esc_html__( 'Hove Title Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-box-20:hover .content-box-20-title' => 'color: {{VALUE}}',
                ],
            ]
        );

    // Box Background Section Desc color)
        $this->add_control(
            'box_background_desc',
            [
                'label' => esc_html__( 'Hove Desc Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-box-20:hover .content-box-20-content' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .content-box-20' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .content-box-20' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .content-box-20' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

    // Box Shadow
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'selector' => '{{WRAPPER}} .content-box-20',
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

    <!-- Start Content Box -->
    <div class="content-box-19">
        <div class="content-box-19-icon">
            <i class="<?php echo $content_box_icon ['value'];?>"></i>
        </div>
        <div class="content-box-19-content-wrapper">
            <h3 class="content-box-19-title"><?php echo $content_box_title; ?></h3>
            <div class="content-box-19-content"><?php echo $content_box_description; ?></div>
        </div>
        <a class="content-box-19-button" href="<?php echo $content_box_button_url['url']; ?>"><?php echo $content_box_button_text; ?></a>
    </div>
    <!-- End Content Box -->

    <?php
	}
}
   
   
   
   
   


