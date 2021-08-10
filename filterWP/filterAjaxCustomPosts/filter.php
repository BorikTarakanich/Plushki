<div class="vacancies-filter">




<?php 

echo '<form action="" method="POST" id="filter">';

$taxes = array('func','region','employment'); // таксономии через запятую, 'region','employment'
$countTax=0;
		foreach ($taxes as $tax) {
            $countTax++;
			$current_tax = isset( $_GET[$tax] ) ? $_GET[$tax] : '';
			$tax_obj = get_taxonomy($tax);
			$tax_name = mb_strtolower($tax_obj->labels->name);
			// функция mb_strtolower переводит в нижний регистр
			// она может не работать на некоторых хостингах, если что, убирайте её отсюда
			$terms = get_terms($tax);
            if($countTax==1){
                $tax_descr='Должность';
                $tax_name='Введите должность';
            } 
            else if($countTax==2) {
                $tax_descr='Регион';
                $tax_name='Введите регион';
            }
            else if($countTax==3){
                $tax_descr='Тип занятости';
                $tax_name='Введите тип занятости';
            }
			if(count($terms) > 0) {
                
				echo "<div class='filter-box box-$tax'><span>$tax_descr</span><div><select name='$tax' id='$tax' class='postform'>";
				echo "<option value=''>$tax_name</option>";
				foreach ($terms as $term) {
					echo '<option value='. $term->slug, $current_tax == $term->slug ? '' : '','>' . $term->name .' (' . $term->count .')</option>'; 
				}
				echo "</select></div></div>";
			}
		}

 
 
echo '<input class="filter-submit" type="submit" name="action" value="Поиск">
</form>';

?>