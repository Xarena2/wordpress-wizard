<?php
/**
 * Template name: wizard page
 * description: wizard page for child theme twentytwentyone in wordpress
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/temhpate-hierarchy/#single-post
 *
 * @package Wordpress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

wp_head();
?>
<body>
	<div class="body">	
		<div id="nav">
			<h3 id="work">Wizard</h3>	
		</div>
		<div class="container1">
		<form id="form1">
			<div class="content_box">
				<h1 class="title">Contact Info</h1>
				<div class="set-field">	
					<label>Name</label>
					<input type="text" id="set-name">
				</div>	
				<div class="set-field">	
					<label id="required">Email</label>
					<input type="text" id="set-email" required="true">
				</div>	
				<div class="set-field">	
					<label>Phone</label>
					<input type="text" id="set-phone">
				</div>
			</div>			

			<div class="btn-box">
				<button type="button" id="next1">Continue</button>
			</div>
		</form>		
		<form id="form2">
			<div class="content_box">
				<h1 class="title">Quantity</h1>
				<div class="set-field" id="set-field">	
					<label id="required">Quantity</label>
					<input type="text" id="set-quantity" required="true">
				</div>
			</div>
						
			<div class="btn-box">
				<button type="button" id="next2">Continue</button>
				<button type="button" id="back1"><img src="/wp-content/themes/twentytwentyone-child/assets/img/back.svg"></button>
			</div>
		</form>		
		<form id="form3">
			<div class="content_box">
				<h1 class="title">Price</h1>
				<h2 class="price1" id="price1">10$</h2>	
			</div>
			

			<div class="btn-box">
				<button type="button" id="next3">Send to Email</button>
				<button type="button" id="back2"><img src="/wp-content/themes/twentytwentyone-child/assets/img/back.svg"></button>
			</div>
		</form>		

		<form id="form4">
			<div class="content_box">
				<h1 class="title">Done</h1>
				<div id="finish">
					<img src="" id="image">
				</div>
			</div>								

			<div class="btn-box">
				<button type="button" id="next4"><img src="/wp-content/themes/twentytwentyone-child/assets/img/again.svg"></button>
			</div>
		</form>		

		<div class="step-row">
			<div class="step-col" id="home">
				<img src="/wp-content/themes/twentytwentyone-child/assets/img/svhome.svg" class="icon">
			</div>
			<div class="step-col" id="contact">
				<img src="/wp-content/themes/twentytwentyone-child/assets/img/divider.svg" class="divider">
				<p class="step-col-title active" id="link-contact">Contact Info</p>
			</div>
			<div class="step-col" id="quantity">
				<img src="/wp-content/themes/twentytwentyone-child/assets/img/divider.svg" class="divider">
				<p class="step-col-title" id="link-quantity">Quantity</p>				
			</div>
			<div class="step-col" id="price">
				<img src="/wp-content/themes/twentytwentyone-child/assets/img/divider.svg" class="divider">
				<p class="step-col-title" id="link-price">Price</p>
			</div>
			<div class="step-col" id="done">
				<img src="/wp-content/themes/twentytwentyone-child/assets/img/divider.svg" class="divider">
				<p class="step-col-title" id="link-done">Done</p>
			</div>
		</div>
	</div>
		<div class="description">
			<p class="description-title">Title</p>
			<p class="descriptions">This is the description</p>
		</div>
	</div>	
</body>
<?php
wp_footer();
