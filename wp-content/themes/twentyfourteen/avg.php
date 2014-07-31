<?php
 
/**
 * Template Name: Avg Page
 */
 
//get_header(); 
$fields = get_fields();
var_dump( $fields );

echo'<h1>AVG</h1>';
$posts = get_posts(array('numberposts' => -1,'post_type' => 'entity'));


if($posts)
{
	shuffle ($posts);
	echo 'There are';
	parsefact($posts[0]->ID);
	
	
	
	echo '<br>For every';
	parsefact($posts[1]->ID);
	
 
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

?>