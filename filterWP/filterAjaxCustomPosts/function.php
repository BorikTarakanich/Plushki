 /*****custom post vacancies*****/


/*****custom post taxonomy func*****/
add_action( 'init', 'create_taxonomy_func' );
function create_taxonomy_func(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'func', ['func'], [
		'label'                 => 'func', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Должность',
			'singular_name'     => 'Должность',
			'search_items'      => 'Найти должность',
			'all_items'         => 'Все должности',
			'view_item '        => 'Посмотреть должность',
			'edit_item'         => 'Изменить должность',
			'update_item'       => 'Обновить должность',
			'add_new_item'      => 'Добавить новую должность',
			'new_item_name'     => 'New func Name',
			'menu_name'         => 'Должность',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

/*****custom post taxonomy region*****/
add_action( 'init', 'create_taxonomy_region' );
function create_taxonomy_region(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'region', ['region'], [
		'label'                 => 'region', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Регион',
			'singular_name'     => 'Регион',
			'search_items'      => 'Найти Регион',
			'all_items'         => 'Все регионы',
			'view_item '        => 'Посмотреть регион',
			'edit_item'         => 'Изменить регион',
			'update_item'       => 'Обновить регион',
			'add_new_item'      => 'Добавить новый регион',
			'new_item_name'     => 'New region Name',
			'menu_name'         => 'Регион',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

/*****custom post taxonomy type Employment*****/
add_action( 'init', 'create_taxonomy_employment' );
function create_taxonomy_employment(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'employment', ['employment'], [
		'label'                 => 'employment', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Тип занятости',
			'singular_name'     => 'Тип занятости',
			'search_items'      => 'Найти тип занятости',
			'all_items'         => 'Все типы занятости',
			'view_item '        => 'Посмотреть тип занятости',
			'edit_item'         => 'Изменить тип занятости',
			'update_item'       => 'Обновить тип занятости',
			'add_new_item'      => 'Добавить новый тип занятости',
			'new_item_name'     => 'New employment Name',
			'menu_name'         => 'Тип занятости',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

/*taxonomy post vacancies*/
function create_vacancies_post_type()
{
  register_post_type('vacancies', array(
    'labels'             => array(
      'name'               => 'Вакансии', // Основное название типа записи
      'singular_name'      => 'Вакансии', // отдельное название записи типа Book
      'add_new'            => 'Добавить новую',
      'add_new_item'       => 'Добавить новую вакансию',
      'edit_item'          => 'Редактировать вакансию',
      'new_item'           => 'Новая вакансия',
      'view_item'          => 'Посмотреть вакансию',
      'search_items'       => 'Найти вакансию',
      'not_found'          => 'Вакансии не найден',
      'not_found_in_trash' => 'В корзине вакансий не найдено',
      'parent_item_colon'  => '',
      'menu_name'          => 'Вакансии'

    ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 4,
    'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'post-formats', 'custom-fields','func'),
    'taxonomies'         => array('func','region','employment'),
  ));
}
add_action('init', 'create_vacancies_post_type');





















add_action( 'wp_ajax_myfilter', 'true_filter_function' ); 
add_action( 'wp_ajax_nopriv_myfilter', 'true_filter_function' );
 
function true_filter_function(){

 
	$args = array(
		'orderby' => 'date', // сортировка по дате у нас будет в любом случае (но вы можете изменить/доработать это)
	);
 
	
	if( isset( $_POST[ 'func_value' ] )) {
		$args[] = array(
				'tax_func' => $_POST[ 'func_value' ],
		);
	}




	if( isset( $_POST[ 'region_value' ] )) {
	
		$args[]= array(
				'tax_region' => $_POST[ 'region_value' ],
		);
	}



	if( isset( $_POST[ 'employment_value' ] )) {
	
		$args[]= array(
				'tax_employment' => $_POST[ 'employment_value' ],
		);
	}



	
	$terms_func = get_terms([
		'taxonomy' => ['func'],
		 'slug' => $args[0]["tax_func"],

	]);
	
	$terms_region = get_terms([
		'taxonomy' => ['region'],
		'slug' =>$args[1]["tax_region"],
	]);

	$terms_employment = get_terms([
		'taxonomy'  => ['employment'] ,
		'slug' =>$args[2]["tax_employment"],

	]);

	$args2 = array(
		'post_type' => 'vacancies',
		'func'=>$args[0]["tax_func"],
		'region' => $args[1]["tax_region"],
		'employment'=>$args[2]["tax_employment"]
	);


	// $args2 = array(
	// 	'post_type' => 'vacancies',
	// 	'tax_query' => array(
	// 		array(
	// 			'taxonomy' => 'func',
	// 		'field'    => 'slug',
	// 		'terms'    => $terms_func[0]->slug
	// 		)
	// 	)
	// );




	$query = new WP_Query($args2);
	if ($query->have_posts()) {
		while ($query->have_posts()) : $query->the_post();
		$term_func = wp_get_post_terms(get_the_ID(),'func');
		$terms_region= wp_get_post_terms(get_the_ID(),'region');
		$terms_employment = wp_get_post_terms(get_the_ID(),'employment');
		?>
			<div class="box-vacancies" onclick="linkSingle()">
        <div class="box-vacancies_header">
            <h3><a href="<?php echo get_permalink(); ?>"><?php echo $term_func[0]->name  ?></a></h3>
            <p>700-1000 бел. руб.</p>
        </div>
        <div class="box-vacancies_content">
            <p class="vacancies-region"><?php echo $terms_region[0]->name; ?></p>
            <p class="empl"><?php echo	$terms_employment[0]->name ?></p>
        </div>
        <div class="box-vacancies_footer">
            <p class="vacancies-text">Регулярные международные перевозки сильно влияют на техническое состояние автопарка компаний. В результате интенсивной работы техника подвергается повышенному износу. Своевременно ТО позволяет не только продлить срок службы машин и повысить продуктивность, но и сэкономить в будущем на покупке новой техники. Техническое обслуживание машин имеет следующие разновидности:</p>
            <p class="vacancies-date">14.10.2020</p>
        </div>
  </div> 									
<?php endwhile;									
	}
	wp_reset_postdata();
	die();
}
