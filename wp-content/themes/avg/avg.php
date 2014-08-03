<?php
 
/**
 * Template Name: Avg Page
 */
 
get_header();

require_once("lib/Fact.php");
require_once("lib/Entity.php");

echo'<h1>AVG</h1>';
$entities = get_posts(array('posts_per_page' => -1,'post_type' => 'entity'));



if($entities) {
	shuffle ($entities);
	$ents_and_facts = array();

	/*foreach($entities as $e) {
		$facts = get_field("fact", $e->ID);
		//print_r($facts);
		$clean_facts = array();
		foreach ($facts as $f) {
			$clean_facts[] = array("description"=>$f['description'], "key"=>$f['key']->post_title, "unit"=>$f['unit']->post_title, "perunit"=>$f['perunit']->post_title, "value"=>$f['value']);
		}
		$ents_and_facts[] = array("name"=>$e->post_title, "facts"=>$clean_facts);
	}

	echo "<script>var entities = " . json_encode($ents_and_facts) . "</script>";
	*/
//print_r($ents_and_facts);

	/*foreach($ents_and_facts as $e) {
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
	}*/

	//echo 'There are';
	//parsefact($posts[0]->ID);
	//echo '<br>For every';
	//parsefact($posts[1]->ID);
}

$weed = new Unit("Weed");
$debt = new Unit("Debt");
$textbook = new Unit("Textbook");
$dollar = new Unit("Dollar");
$year = new Unit("Year");
$units = array($weed, $debt, $textbook, $dollar, $year);


$banana = new SmallUnit("Banana", .2);
$hamburger = new SmallUnit("Hamburger", .99);
$small_units = array($banana->toJson(), $hamburger->toJson() );

echo "<script> var smallunits = " . json_encode($small_units) . ";</script>";

$student = new Entity("Student");
$gov = new Entity("US Government");
$military = new Entity("US Military");

//These facts assume the quantity is dollars
$student->add_fact(new Fact(2500, $weed, $year, "Spent on weed per year"));
$student->add_fact(new Fact(70000, $debt, $year));
$student->add_fact(new Fact(500, $textbook, $year, "Spent on textbooks per year"));

$ents = array($student, $gov, $military);

foreach($ents as $e) {
	echo "<div class='entity-area' id='".$e->name."'>";
		echo "<button class='entity-name'>".$e->name."</button>";
		echo "<div class='sub'><div style='display: none;' class='facts'>";

			foreach($e->facts as $f) {
				//$fact_content = $e->name . " " . $f['description'] . " " . $f['value'] . " " . $f['unit'];
				//if (isset($f['perunit'])) {
					//$fact_content .= " per " + $f['perunit'];
				//}
				echo "<li><button class='sub-unit-trigger' data-unit='$' data-quantity='".$f->quantity."'>$f</button>";
				echo "<div class='breakdown'><ul style='display: block'></ul></li>";

			}
		echo "</div></div>";
	echo "</div>";

}
//$facts = array(new )








 
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