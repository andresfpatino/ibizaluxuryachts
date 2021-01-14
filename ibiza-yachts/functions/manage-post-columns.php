<?php 

// Agrega una columna en el Postype de "Instalaciones finalizadas" indicando si esta destacado o no.
function column_headings_callback($defaults){
    $defaults['destacado'] = 'Destacado';
    return $defaults;
}
add_action("manage_yates_posts_columns", "column_headings_callback");

function column_content_callback($columna){
    if($columna === 'destacado'){  
		$especificaciones = get_field('destacado');
		if( $especificaciones == '1' ) { 
			echo 'Si';
		} else {
			echo 'No';
		} 	
    }
}
add_action("manage_yates_posts_custom_column", "column_content_callback", 10, 2);

function my_column_register_sortable( $columns ) {
	$columns['destacado'] = 'destacado';
	return $columns;
}
add_filter('manage_edit-yates_sortable_columns', 'my_column_register_sortable' );