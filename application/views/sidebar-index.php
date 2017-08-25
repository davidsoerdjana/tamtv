<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The template for displaying the sidebar right
 *
 * Displays all of the sidebar right element.
 *
 * @package Codeigniter
 * @subpackage Tamtv Template
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 * @since Tamtv 1.0
 */

$box = $this->themes->get('ads-120x600-right');
?>
		<div class="col-xs-4 box-sidebar">
			<?php  
			/**
			 * Load the elements sidebar
			 *
			 * @param string ( themes layout )
			 **/
			foreach ($this->themes->layout('sidebar-index') as $row) 
			{
				$this->load->view('box-elements/'.$row->meta_key);
			}
			?>
		</div>
		<?php if( $box->status == 'yes') : ?>
		<div class="ads-right">
			<img src="<?php echo base_url("public/image/ads/120x600.gif"); ?>" alt="">
		</div>
		<?php endif; ?>
	</div>
<?php
/* End of file right-sidebar.php */
/* Location: ./application/views/sidebar-index.php */