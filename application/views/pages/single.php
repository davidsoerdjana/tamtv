<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The template for displaying the single page
 *
 * Displays all of the single element.
 *
 * @package Codeigniter
 * @subpackage Tamtv Template
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 * @since Tamtv 1.0
 */

$author = $this->posts->get_post_author($post->ID);

$adsleft = $this->themes->get('ads-120x600-left');

$asdtop = $this->themes->get('ads-980x90');
?>
	<div class="container content-wrapper">
        <?php
        if( $asdtop->status == 'yes') :
        ?>
        <div class="col-xs-12 text-center">
        	<div class="adsvertising">
        		<?php echo $asdtop->meta_value; ?>
        	</div>
        </div>
        <?php endif;  
        if( $adsleft->status == 'yes') : ?>
		<div class="ads-left">
			<img src="<?php echo base_url("public/image/ads/120x600.gif"); ?>" alt="">
		</div>
		<?php endif; ?>
		<div class="col-xs-8 single-content">
			<div class="content-breadcrumb">
			<?php  
			/**
			 * Displayed Breadcrumbs
			 *
			 * @return string
			 **/
			echo $this->breadcrumbs->show();
			?>
			</div>
			<article class="content-news" itemscope itemtype="http://schema.org/NewsArticle">
				<h1 itemprop="name"><?php echo $post->post_title; ?></h1>
				<div class="author-box">
					<div class="media">
						<?php if($this->posts->get_post_author($post->ID)) : ?>
					  	<div class="media-left media-middle">
					    	<a href="">
					      		<img class="media-object img-circle" src="<?php echo base_url("public/image/avatar/{$author->avatar}"); ?>" alt="avatar <?php echo $author->fullname ?>" width="40">
					    	</a>
					  	</div>
					  	<?php endif; ?>
					  	<div class="media-body">
						<?php 
						if($this->posts->get_post_author($post->ID)) 
							echo '<a class="media-heading">'.$author->fullname.'</a> <br>';
						?>
					   		<time itemprop="datePublished"><?php echo $this->posts->date_format($post->post_date); ?></time>
					  	</div>
					</div>
					<div class="sharethis-inline-share-buttons"></div>
				</div>
				<?php  
				if( $post->image ) :
				?>
				<figure class="top2x">
				  	<img src="<?php echo $this->posts->get_thumbnail($post->image) ?>" alt="" class="img-responsive">
				  	<figcaption><?php echo $post->post_excerpt; ?> </figcaption>
				</figure>
				<?php endif; ?>
				<section itemprop="description">
					<?php echo str_replace('<p>[related_news]</p>', $this->content_parser->related_news($post->ID, 4), $post->post_content); ?>
				</section>
				<section class="box-tag">
					<ul class="list-tag">
					<?php  
					/**
					 * Get displaye post tag
					 *
					 * @param Integer
					 **/
					foreach($this->posts->get_post_tags($post->ID) as $row)
						echo '<li>'.anchor(base_url("tag/{$row->slug}"), $row->name).'</li>';
					?>
					</ul>
				</section>
			</article>
			<div class="clearfix"></div>
			<div class="author-box">
				<div class="media">
					<?php if($this->posts->get_post_author($post->ID)) : ?>
					  <div class="media-left media-middle">
					    	<a href="">
					      	<img class="media-object img-circle" src="<?php echo base_url("public/image/avatar/{$author->avatar}"); ?>" alt="avatar <?php echo $author->fullname ?>" width="40">
					    </a>
					  </div>
					  <?php endif; ?>
					  <div class="media-body">
						<?php 
						if($this->posts->get_post_author($post->ID)) 
							echo '<a class="media-heading">'.$author->fullname.'</a> <br>';
						?>
					   	<time itemprop="datePublished"><?php echo $this->posts->date_format($post->post_date); ?></time>
					  </div>
				</div>
				<div class="sharethis-inline-share-buttons"></div> <hr>
			</div>
			<div class="clearfix"></div>
			<?php  
			/**
			 * Polling Elements
			 *
			 * @var string
			 **/
			if( $post->poll_status == 'open' )
				$this->load->view('box-elements/polling', $this->data);

			/**
			 * Comments Elements
			 *
			 * @var string
			 **/
			if( $post->comment_status == 'open' )
				$this->load->view('box-elements/comments', $this->data);
 
			/**
			 * Load the elements sidebar
			 *
			 * @param string ( themes layout )
			 **/
			foreach ($this->themes->layout('content-single') as $row) 
				$this->load->view('box-elements/'.$row->meta_key);
			?>
		</div>
<?php
/* End of file single.php */
/* Location: ./application/views/pages/single.php */