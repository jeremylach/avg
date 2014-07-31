<?php
 
/**
 * Template Name: Avg Page
 */
 
get_header(); 

echo'<h1>AVG</h1>';
$entities = get_posts(array('posts_per_page' => -1,'post_type' => 'entity'));



if($entities) {
	shuffle ($entities);
	$ents_and_facts = array();

	foreach($entities as $e) {
		$facts = get_field("fact", $e->ID);
		//print_r($facts);
		$clean_facts = array();
		foreach ($facts as $f) {
			$clean_facts[] = array("description"=>$f['description'], "key"=>$f['key']->post_title, "unit"=>$f['unit']->post_title, "perunit"=>$f['perunit']->post_title, "value"=>$f['value']);
		}
		$ents_and_facts[] = array("name"=>$e->post_title, "facts"=>$clean_facts);
	}

	echo "<script>var entities = " . json_encode($ents_and_facts) . "</script>";

//print_r($ents_and_facts);

	foreach($ents_and_facts as $e) {
		echo "<div class='entity-area' id='".$e['name']."'>";
			echo "<button class='entity-name'>".$e['name']."</button>";
			echo "<div class='sub'><ul style='display: none;'>";

				foreach($e['facts'] as $f) {
					$fact_content = $e['name'] . " " . $f['description'] . " " . $f['value'] . " " . $f['unit'];
					if (isset($f['perunit'])) {
						$fact_content .= " per " + $f['perunit'];
					}
					echo "<li>$fact_content</li>";

				}
			echo "</ul></div>";
		echo "</div>";
	}

	//echo 'There are';
	//parsefact($posts[0]->ID);
	//echo '<br>For every';
	//parsefact($posts[1]->ID);
}





 
function parsefact( $p ){       
	$rows = get_field('fact',$p);
	$row_count = count($rows);
	$i = rand(0, $row_count - 1);
   $keyid = $rows[$i]['key'];
   echo get_field('name',$keyid->ID); 
   echo $rows[ $i ]['value'];
   echo $rows[ $i ]['description'];
   $unitid = $rows[$i]['unit'];
   echo get_field('unit_name_plural',$unitid->ID);
}

get_footer();

?>