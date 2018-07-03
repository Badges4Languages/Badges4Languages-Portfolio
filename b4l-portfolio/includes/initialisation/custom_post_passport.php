<?php

/*
 Plugin Name: Student Portfolio Plugin
 Description: Plugin for assigning the grades to students on the basis of their progress
 Version: 1.0
 Author: Muhammad Uzair
 Author URI: https://www.linkedin.com/in/uzair043/
*/

wp_enqueue_script("jquery");
wp_enqueue_script('jquery-ui');
wp_enqueue_script('jquery-ui-tabs');
wp_enqueue_style( 'wp-admin' );

require_once( 'create-passport.php');

function check_passport($val) {
	global $post;

	if( is_array( get_post_meta( $post->ID, "_passport", true) ) ){
		$checkbox_values = get_post_meta( $post->ID, "_passport", true );
	} else{
		$checkbox_values = array();
	}

	if(in_array($val, $checkbox_values)){
		return " checked";
	}
}

function custom_post_passport() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => __('Passport','b4l-portofolio'),
		'singular_name'       => __('Passport','b4l-portofolio'),
		'menu_name'           => __('Passport','b4l-portofolio'),
		'parent_item_colon'   => __('Parent Passport','b4l-portofolio'),
		'all_items'           => __('Passports','b4l-portofolio'),
		'view_item'           => __('View Passport','b4l-portofolio'),
		'add_new_item'        => __('Add New Passport','b4l-portofolio'),
		'edit_item'           => __('Edit Passport','b4l-portofolio'),
		'update_item'         => __('Update Passport','b4l-portofolio'),
		'search_items'        => __('Search Passports','b4l-portofolio'),
		'not_found'           => __('Not Found','b4l-portofolio'),
		'not_found_in_trash'  => __('Not found in Trash','b4l-portofolio')
	);

// Set other options for Custom Post Type

	$args = array(
		'label'               => 'passport',
		'description'         => __('A custom post to assign language levels to students based on their proficiency.','b4l-portofolio'),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => 'portfolios',
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capabilities'     => array(
			'edit_post' => 'edit_passport',
			'edit_posts' => 'edit_passports',
			'edit_others_posts' => 'edit_other_passports',
			'edit_published_posts' => 'edit_published_passports',
			'publish_posts' => 'publish_passports',
			'read_post' => 'read_passport',
			'read_posts' => 'read_passports',
			'read_private_posts' => 'read_private_passports',
			'delete_post' => 'delete_passport'
		)

	);

	// Registering your Custom Post Type
	register_post_type( 'passport', $args );

}

add_action( 'init', 'custom_post_passport');

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

function metabox_passport(){
	add_action('add_meta_boxes', function(){
		add_meta_box('id_passport', __('Passport','b4l-portofolio'), 'passport_grades', 'passport');
	});

	function passport_grades($post){
		$value = 'yes';
		$counter = 0;
		$counter_li = 1;
		$counter_re = 1;
		$counter_si = 1;
		$counter_sp = 1;
		$counter_wr = 1;

		//$result = get_post_meta($post->ID, 'result', true);

		$t_passport = array(

			 "language" => array(

					"li" => array(

						11 => __("I can recognise familiar words and very basic phrases concerning myself, my family and immediate concrete surroundings when people speak slowly and clearly.",'b4l-portofolio'),
						21 => __("I can understand phrases and the highest frequency vocabulary related to areas of most immediate personal relevance (e.g. very basic personal and family information, shopping, local area, employment).
						I can catch the main point in short, clear, simple messages and announcements. ",'b4l-portofolio'),
						31 => __("I can understand the main points of clear standard speech on familiar matters regularly encountered in work, school, leisure, etc.
						I can understand the main point of many radio or TV programmes on current affairs or topics of personal or professional interest when the delivery is relatively slow and clear. ",'b4l-portofolio'),
						41 => __("I can understand extended speech and lectures and follow even complex lines of argument provided the topic is reasonably familiar.
						I can understand most TV news and current affairs programmes. I can understand the majority of films in standard dialect. ",'b4l-portofolio'),
						51 => __("I can understand extended speech even when it is not clearly structured and when relationships are only implied and not signalled explicitly.
						I can understand television programmes and films without too much effort. ",'b4l-portofolio'),
						61 => __("I have no difficulty in understanding any kind of spoken language, whether live or broadcast, even when delivered at fast native speed, provided.
						I have some time to get familiar with the accent. ",'b4l-portofolio')),
					"re" => array(
						11 => __("I can understand familiar names, words and very simple sentences, for example on notices and posters or in catalogues.",'b4l-portofolio'),
						21 => __("I can read very short, simple texts.
						I can find specific, predictable information in simple everyday material such as advertisements, prospectuses, menus and timetables and I can understand short simple personal letters. ",'b4l-portofolio'),
						31 => __("I can understand texts that consist mainly of high frequency everyday or job-related language.
						I can understand the description of events, feelings and wishes in personal letters. ",'b4l-portofolio'),
						41 => __("I can read articles and reports concerned with contemporary problems in which the writers adopt particular attitudes or viewpoints.
						I can understand contemporary literary prose. ",'b4l-portofolio'),
						51 => __("I can understand long and complex factual and literary texts, appreciating distinctions of style.
						I can understand specialised articles and longer technical instructions, even when they do not relate to my field. ",'b4l-portofolio'),
						61 => __("I can read with ease virtually all forms of the written language, including abstract, structurally or linguistically complex texts such as manuals, specialised articles and literary works.",'b4l-portofolio')),
					"si" => array(
						11 => __("I can interact in a simple way provided the other person is prepared to repeat or rephrase things at a slower rate of speech and help me formulate what I'm trying to say.
						I can ask and answer simple questions in areas of immediate need or on very familiar topics. ",'b4l-portofolio'),
						21 => __("I can communicate in simple and routine tasks requiring a simple and direct exchange of information on familiar topics and activities.
						I can handle very short social exchanges, even though I can't usually understand enough to keep the conversation going myself. ",'b4l-portofolio'),
						31 => __("I can deal with most situations likely to arise whilst travelling in an area where the language is spoken.
						I can enter unprepared into conversation on topics that are familiar, of personal interest or pertinent to everyday life (e.g. family, hobbies, work, travel and current events). ",'b4l-portofolio'),
						41 => __("I can interact with a degree of fluency and spontaneity that makes regular interaction with native speakers quite possible.
						I can take an active part in discussion in familiar contexts, accounting for and sustaining my views. ",'b4l-portofolio'),
						51 => __("I can express myself fluently and spontaneously without much obvious searching for expressions.
						I can use language flexibly and effectively for social and professional purposes.
						I can formulate ideas and opinions with precision and relate my contribution skilfully to those of other speakers. ",'b4l-portofolio'),
						61 => __("I can take part effortlessly in any conversation or discussion and have a good familiarity with idiomatic expressions and colloquialisms.
						I can express myself fluently and convey finer shades of meaning precisely.
						If I do have a problem I can backtrack and restructure around the difficulty so smoothly that other people are hardly aware of it. ",'b4l-portofolio')),
					"sp" => array(
						11 => __("I can use simple phrases and sentences to describe where I live and people I know.",'b4l-portofolio'),
						21 => __("I can use a series of phrases and sentences to describe in simple terms my family and other people, living conditions, my educational background and my present or most recent job.",'b4l-portofolio'),
						31 => __("I can connect phrases in a simple way in order to describe experiences and events, my dreams, hopes and ambitions.
						I can briefly give reasons and explanations for opinions and plans.
						I can narrate a story or relate the plot of a book or film and describe my reactions. ",'b4l-portofolio'),
						41 => __("I can present clear, detailed descriptions on a wide range of subjects related to my field of interest.
						I can explain a viewpoint on a topical issue giving the advantages and disadvantages of various options. ",'b4l-portofolio'),
						51 => __("I can present clear, detailed descriptions of complex subjects integrating sub-themes, developing particular points and rounding off with an appropriate conclusion.",'b4l-portofolio'),
						61 => __("I can present a clear, smoothly-flowing description or argument in a style appropriate to the context and with an effective logical structure which helps the recipient to notice and remember significant points.",'b4l-portofolio')),
					"wr" => array(
						11 => __("I can write a short, simple postcard, for example sending holiday greetings.
						I can fill in forms with personal details, for example entering my name, nationality and address on a hotel registration form. ",'b4l-portofolio'),
						21 => __("I can write short, simple notes and messages relating to matters in areas of immediate needs.
						I can write a very simple personal letter, for example thanking someone for something. ",'b4l-portofolio'),
						31 => __("I can write simple connected text on topics which are familiar or of personal interest.
						I can write personal letters describing experiences and impressions. ",'b4l-portofolio'),
						41 => __("I can write clear, detailed text on a wide range of subjects related to my interests.
						I can write an essay or report, passing on information or giving reasons in support of or against a particular point of view.
						I can write letters highlighting the personal significance of events and experiences. ",'b4l-portofolio'),
						51 => __("I can express myself in clear, well-structured text, expressing points of view at some length.
						I can write about complex subjects in a letter, an essay or a report, underlining what I consider to be the salient issues.
						I can select style appropriate to the reader in mind. ",'b4l-portofolio'),
						61 => __("I can write clear, smoothly-flowing text in an appropriate style.
						I can write complex letters, reports or articles which present a case with an effective logical structure which helps the recipient to notice and remember significant points.
						I can write summaries and reviews of professional or literary works.",'b4l-portofolio')),
				)

			);

		?>

		<?php
			//Listening level
			$i = 0;
			while($i <= 5 && in_array( $value.$i, get_post_meta( $post->ID, "_passport", true ) ) ){
				$i++;
			}
			$level_li = get_result($i);

			//Reading level
			$i = 6;
			$lvl = 0;
			while($i <= 11 && in_array( $value.$i, get_post_meta( $post->ID, "_passport", true ) ) ){
				$i++;
				$lvl++;
			}
			$level_re = get_result($lvl);

			//Spoken Interaction level
			$i = 12;
			$lvl = 0;
			while($i <= 17 && in_array( $value.$i, get_post_meta( $post->ID, "_passport", true ) ) ){
				$i++;
				$lvl++;
			}
			$level_si = get_result($lvl);

			//Spoken Production level
			$i = 18;
			$lvl = 0;
			while($i <= 23 && in_array( $value.$i, get_post_meta( $post->ID, "_passport", true ) ) ){
				$i++;
				$lvl++;
			}
			$level_sp = get_result($lvl);

			//Writing level
			$i = 24;
			$lvl = 0;
			while($i <= 29 && in_array( $value.$i, get_post_meta( $post->ID, "_passport", true ) ) ){
				$i++;
				$lvl++;
			}
			$level_wr = get_result($lvl);
		?>

		<p>
			<?php _e("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
			Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",'b4l-portofolio') ?>
		</p>

		<!-- Result of the student levels in each section -->
		<div id="result_content">
			<center><h1><?php _e("Current Result",'b4l-portofolio'); ?></h1></center>
			<?php
				_e("Listening level : ",'b4l-portofolio') . $level_li . "<br>";
				_e("Reading level : ",'b4l-portofolio') . $level_re . "<br>";
				_e("Spoken Interaction level : ",'b4l-portofolio') . $level_si . "<br>";
				_e("Spoken Production level : ",'b4l-portofolio') . $level_sp . "<br>";
				_e("Writing level : ",'b4l-portofolio') . $level_wr . "<br>";
			?>
		</div>

		<?php include(plugin_dir_path( dirname( __FILE__ ) ) . 'utils/js_passport.php'); ?>
		<?php include(plugin_dir_path( dirname( __FILE__ ) ) . 'utils/js_send_badge.php'); ?>
		<?php include(plugin_dir_path( dirname( __FILE__ ) ) . 'utils/style.php'); ?>

		<script>
	        jQuery(document).ready(function(jQuery) {
		        jQuery('#tabs').tabs();
		        jQuery(".nav-tab").click(function(){
			        jQuery(".nav-tab").removeClass("nav-tab-active");
			        jQuery(this).addClass("nav-tab-active");
	        	});
	        });
	    </script>

	    <!-- Learning Sections -->
		<div id="tabs" style="border: 0px;">

			<h2 class="nav-tab-wrapper">
	        	<ul>
		            <li style="border: 0px;"><a href="#tabs-1" class="nav-tab nav-tab-active"><?php _e( 'Listening','b4l-portofolio' ); ?></a></li>
		            <li style="border: 0px;"><a href="#tabs-2" class="nav-tab"><?php _e( 'Reading','b4l-portofolio' ); ?></a></li>
		            <li style="border: 0px;"><a href="#tabs-3" class="nav-tab"><?php _e( 'Spoken Interaction','b4l-portofolio' ); ?></a></li>
					<li style="border: 0px;"><a href="#tabs-4" class="nav-tab"><?php _e( 'Spoken Production','b4l-portofolio' ); ?></a></li>
					<li style="border: 0px;"><a href="#tabs-5" class="nav-tab"><?php _e( 'Writing','b4l-portofolio' ); ?></a></li>
	          	</ul>
			</h2>

			<div id="tabs-1" style="border: 0px;">
				<?php
					for($i = 0 ; $i < count($t_passport["language"]["li"]); $i++){
						echo '<br>'.  '<input type="checkbox" name="passport[]" id="li'.$counter_li.'" value="'.$value.$counter.'" style="margin-left: 30px;" ' . check_passport($value.$counter) . '>' .  $t_passport["language"]["li"][$i+1 . 1]. '</br>';
						$counter++;
						$counter_li++;
					}
				?>
			</div>

			<div id="tabs-2" style="border: 0px;">
				<?php
					for($i = 0 ; $i < count($t_passport["language"]["re"]); $i++){
						echo '<br>'.  '<input type="checkbox" name="passport[]" id="re'.$counter_re.'" value="'.$value.$counter.'"style="margin-left: 30px;" ' . check_passport($value.$counter) . '>' .  $t_passport["language"]["re"][$i+1 . 1]. '</br>';
						$counter++;
						$counter_re++;
					}
				?>
			</div>

			<div id="tabs-3" style="border: 0px;">
				<?php
					for($i = 0 ; $i < count($t_passport["language"]["si"]); $i++){
						echo '<br>'.  '<input type="checkbox" name="passport[]" id="si'.$counter_si.'" value="'.$value.$counter.'"style="margin-left: 30px;" ' . check_passport($value.$counter) . '>' .  $t_passport["language"]["si"][$i+1 . 1]. '</br>';
						$counter++;
						$counter_si++;
					}
				?>

			</div>

			<div id="tabs-4" style="border: 0px;">
				<?php
					for($i = 0 ; $i < count($t_passport["language"]["sp"]); $i++){
						echo '<br>'.  '<input type="checkbox" name="passport[]" id="sp'.$counter_sp.'" value="'.$value.$counter.'"style="margin-left: 30px;" ' . check_passport($value.$counter) . '> ' .  $t_passport["language"]["sp"][$i+1 . 1]. '</br>';
						$counter++;
						$counter_sp++;
					}
				?>
			</div>

			<div id="tabs-5" style="border: 0px;">
				<?php
					for($i = 0 ; $i < count($t_passport["language"]["wr"]); $i++){
						echo '<br>'.  '<input type="checkbox" name="passport[]" id="wr'.$counter_wr.'" value="'.$value.$counter.'"style="margin-left: 30px;" ' . check_passport($value.$counter) . '> ' .  $t_passport["language"]["wr"][$i+1 . 1]. '</br>';
						$counter++;
						$counter_wr++;
					}
				?>
			</div>

		</div>
	<?php
	}
}
add_action( 'init', 'metabox_passport');

//Function to get the level of each field (Listening, Writting, etc.)
function get_result($val){
	switch ($val){
		case 0:
			$result = __('No level','b4l-portofolio');
			break;
		case 1: 
			$result = 'A1';
			break;
		case 2: 
			$result = 'A2';
			break;
		case 3: 
			$result = 'B1';
			break;
		case 4: 
			$result = 'B2';
			break;
		case 5: 
			$result = 'C1';
			break;
		case 6: 
			$result = 'C2';
			break;
	}

	return $result;
}

//Add the language metabox
function metabox_language_passport(){
	add_action('add_meta_boxes', function(){
		add_meta_box('id_language_passport', __('Passport language','b4l-portofolio'), 'passport_language', 'passport', 'side', 'high');
	});

	function passport_language($post){
		if( is_plugin_active( "open-badges-framework/open-badges-framework.php" ) ) {
			// Display the children of the right PARENT
		    $parents = apply_filters( 'plugin_get_sub', $parents );
		    echo '<div style="margin-bottom:5px;"><b>' . __('Most important languages','b4l-portofolio') . ':</b></div>';
		    ?>

		    <select name="language" id="language">
		    	<option value="Select">Select</option>
			    <?php
				    foreach ((array)$parents['most-important'] as $language) {
				    	if( get_post_meta( $post->ID,'_passport_language',true ) == $language->term_id ){
				    		echo '<option selected="selected" value="' . $language->term_id . '">' . $language->name . '</option>';
				    	}else{
				    		echo '<option value="' . $language->term_id . '">' . $language->name . '</option>';
				    	}
				    }
			    ?>
		    </select>

		    <!-- Remove comment to have the list of all fields
		    <select name="field" id="field"> <option value="Select" selected disabled hidden>Select</option>  -->
		    <?php
			    /*foreach ($parents as $parent) {
			        foreach ($parent as $language) {
			            echo '<option value="' . $language->term_id . '">';
			            echo $language->name . '</option>';
			        }
			    }*/
		    ?>
		    <!-- </select> -->

			<?php	
		} 
	}
}
add_action('init', 'metabox_language_passport');

//Add the student metabox (student related to this passport)
function metabox_stud(){
	add_action('add_meta_boxes', function(){
		add_meta_box('id_student', __('Student','b4l-portofolio'), 'func_student', 'passport', 'side', 'high');
	});

	function func_student($post){
		$students = get_users(); ?>

		<select name="student" id="student">
			<option selected="true" disabled="disabled">Select</option>
		    <?php
		    foreach ( $students as $student ) {
		    	if( get_post_meta( $post->ID,'_student',true ) == $student->ID ){
		   			echo '<option selected="selected" value="' . $student->ID . '">' . $student->display_name . '</option>';
		   		}else{
		   			echo '<option value="' . $student->ID . '">' . $student->display_name . '</option>';
		   		}
		   	}
		    ?>
	    </select>

	    <?php
	}
}
add_action('init', 'metabox_stud');

//Save all the metaboxes
add_action('save_post', function($id){
	global $post;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post->ID;
	}

	/*if(isset($_POST['result'])){
		update_post_meta($id, "result", $_POST['result']);
	}*/

	if(isset($_POST['passport'])){
		update_post_meta($post->ID, "_passport", $_POST['passport']);
	} else{
		update_post_meta($post->ID, "_passport", array());
	}

	if(isset($_POST['language'])){
		update_post_meta($post->ID, "_passport_language", $_POST['language']);
	}

	if(isset($_POST['student'])){
		update_post_meta($post->ID, "_student", $_POST['student']);
	}

});

///////////////////////////////////////////////
///////////////////////////////////////////////
add_action('admin_menu', 'sp_add_settings');

function sp_add_settings(){
	add_submenu_page(
		'edit.php?post_type=passport',
		'Create Passport',
		'Settings',
		'manage_options',
		'create_passport',
		'create_passport_callback' );
}

?>
