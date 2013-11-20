<?php

/**
 * Create a block with arbitrary content.
 *
 */
class SimpleDashBlock extends Plugin
{
	/**
	 * Register the template.
	 **/
	function action_init()
	{
		// $this->load_text_domain( 'simpledashblock' );
		$this->add_template( 'block.simpledashblock', dirname(__FILE__) . '/block.simpledashblock.php' );
	}

	/**
	 * Add to the list of possible block types.
	 **/
	public function filter_block_list($block_list)
	{
		$block_list['simpledashblock'] = _t('Simple Dash Block', 'simpledashblock');
		return $block_list;
	}
	
	/**
	 * Return a list of blocks that can be used for the dashboard
	 * @param array $block_list An array of block names, indexed by unique string identifiers
	 * @return array The altered array
	 */
	public function filter_dashboard_block_list($block_list)
	{
		$block_list['simpledashblock'] = _t('Simple Dash Block');
		return $block_list;
	}

	/**
	 * Output the content of the block, and nothing else.
	 **/
	public function action_block_content_simpledashblock($block, $theme)
	{
		$block->has_options = true;
		return $block;
	}

	/**
	 * Configuration form with one big textarea. Raw to allow JS/HTML/etc. Insert them at your own peril.
	 **/
	public function action_block_form_simpledashblock($form, $block)
	{
		$form->append('text', 'title', $block, _t( 'Title:', 'simpledashblock' ) );
		$content = $form->append('textarea', 'content', $block, _t( 'Content:', 'simpledashblock' ) );
		$content->raw = true;
		$content->rows = 5;
		$form->append( 'submit', 'submit', _t('Submit') );
	}
}

?>
