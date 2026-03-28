<?php
namespace Fardin\EleAddons\App\Widgets;

if (!defined("ABSPATH")) {
	exit;
}
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;
use \Elementor\Icons_Manager; 

class BasicWidget extends Widget_Base
{

	use \Fardin\EleAddons\App\Traits\Singletion;

	public function get_name(): string
	{
		return 'ele_heading';
	}

	public function get_title(): string
	{
		return esc_html__('ELE Heading', ELE_ADDONS_TEXT_DOMAIN);
	}

	public function get_icon(): string
	{
		return 'eicon-code';
	}

	public function get_categories(): array
	{
		return ['basic'];
	}

	public function get_keywords(): array
	{
		return ['addon', 'ele-addon', 'ele-heading', 'heading'];
	}

	protected function register_controls(): void
	{

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Title', ELE_ADDONS_TEXT_DOMAIN),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', ELE_ADDONS_TEXT_DOMAIN),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Add your Heading Here', ELE_ADDONS_TEXT_DOMAIN),
			]
		);
		$this->add_control(
			'link',
			[
				'label' => esc_html__('link', ELE_ADDONS_TEXT_DOMAIN),
				'type' => Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				],
			]
		);
		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__('Title', ELE_ADDONS_TEXT_DOMAIN),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Text Color', ELE_ADDONS_TEXT_DOMAIN),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab End

	}

	protected function render(): void
	{
		$settings = $this->get_settings_for_display();

		if (empty($settings['title'])) {
			return;
		}
		if(!empty($settings['link']['url'])){
			$this->add_link_attributes('link', $settings['link']);
		}
		?>
		<a <?php $this->print_render_attribute_string('link') ?> class="hello-world">
			<div class="ele_addons_icon_wrapper">
				<?php Icons_Manager::render_icon($settings['icon'], ['arial-hidden'=> 'true']); ?>
			</div>
			<?php echo $settings['title']; ?>
		</a>
		<?php
	}
}