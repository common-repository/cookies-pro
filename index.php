<?php
/*
Plugin Name: Cookies Pro
Plugin URI: http://www.pixelpro.es
Description: Bloquea las cookies hasta que el usuario las acepte para cumplir la normativa acerca de las cookies.
Version: 1.0
Author: Daniel Ariza 
Author URI: http://www.pixelpro.es
License: Un nombre de licencia "pegadizo" e.j. GPL2
*/

require('libs.php');

function wp_cookies_pro_install () {

	$options = $newoptions = get_option('cookies_pro_options');
	$options = $newoptions;
	$newoptions = array(
		'msg' => 'Las cookies nos permiten ofrecer nuestros servicios. Al utilizar nuestros servicios, aceptas el uso que hacemos de las cookies.',
		'texto_boton_banner' => 'Aceptar',
		'URL_aviso_legal' => '#',
		'Texto_aviso_legal' => 'Más información.',
		'Ancho_del_banner' => '100',
		'Color_del_banner' => '#000',
		'Color_del_Texto_banner' => '#FFF',
		'Padding_top' => '24',
		'Padding_bottom' => '4',
		'Button_styles' => 'Button_styles',
	);

	update_option('cookies_pro_options', $newoptions);
}

register_activation_hook( __FILE__, 'wp_cookies_pro_install' );

function wp_cookies_pro_add_pages() {
	add_menu_page('Cookies Pro opciones', 'CookiesPro', 'administrator', __FILE__, 'wp_cookies_pro',plugins_url('/img/cookiespro.png', __FILE__));
}

add_action('admin_menu', 'wp_cookies_pro_add_pages');

Function wp_cookies_pro (){
	$options = $newoptions = get_option('cookies_pro_options');

	if (!empty($_POST["custom_submit"]) ) {

		$newoptions['msg'] = strip_tags(stripslashes($_POST["msg"]));
		$newoptions['texto_boton_banner'] = strip_tags(stripslashes($_POST["texto_boton_banner"]));
		$newoptions['URL_aviso_legal'] = strip_tags(stripslashes($_POST["URL_aviso_legal"]));
		$newoptions['Texto_aviso_legal'] = strip_tags(stripslashes($_POST["Texto_aviso_legal"]));
		$newoptions['Ancho_del_banner'] = strip_tags(stripslashes($_POST["Ancho_del_banner"]));
		$newoptions['Color_del_banner'] = strip_tags(stripslashes($_POST["Color_del_banner"]));
		$newoptions['Color_del_Texto_banner'] = strip_tags(stripslashes($_POST["Color_del_Texto_banner"]));
		$newoptions['Padding_top'] = strip_tags(stripslashes($_POST["Padding_top"]));
		$newoptions['Padding_bottom'] = strip_tags(stripslashes($_POST["Padding_bottom"]));
		$newoptions['Button_styles'] = strip_tags(stripslashes($_POST["Button_styles"]));
	} 
	
	if ( $options != $newoptions ) {

		$options = $newoptions;
		update_option('cookies_pro_options', $options);

	}
	
	echo '<form class="cookies_pro_wrap" method="post"><div id="settings">';
	echo "<div class=\"wrap\"><img class='img_logo_cookiespro' src='" . plugins_url('/img/banner_galleta.png', __FILE__) . "' />";

	echo '<table class="form-table">';

	echo '<tr valign="top"><th scope="row">Mensaje</th>';
	echo '<td><textarea name="msg" cols="14" rows="4" data-obligatorio="si">'. $options['msg'].'</textarea> * <span class="warning">Obligatorio: Ex: <cite>Acepte ley de protección de cookies</cite></span></td></tr>';

	echo '<tr valign="top"><th scope="row">Texto botón banner</th>';
	echo '<td><input type="text" name="texto_boton_banner" cols="14" value="'.$options['texto_boton_banner'].'" size="5" data-obligatorio="si"/> * <span class="warning">Obligatorio: Ex: <cite>Aceptar</cite></span></td></tr>';
	
	echo '<tr valign="top"><th scope="row">URL aviso legal</th>';
	echo '<td><input type="text" name="URL_aviso_legal" cols="14" value="'.$options['URL_aviso_legal'].'" data-obligatorio="si" /> * <span class="warning">Obligatorio: Ex: <cite>http://www.misitio.com</cite></span></td></tr>';
	
	echo '<tr valign="top"><th scope="row">Texto aviso legal</th>';
	echo '<td><input type="text" name="Texto_aviso_legal" cols="14" value="'.$options['Texto_aviso_legal'].'" size="20" data-obligatorio="si" /> * <span class="warning">Obligatorio: Ex: <cite>Más información</cite></span></td></tr>';
	
	echo '<tr valign="top"><th scope="row">Ancho del banner</th>';
	echo '<td><input type="text" name="Ancho_del_banner" cols="14" value="'.$options['Ancho_del_banner'].'" size="10" data-obligatorio="si" /> * <span class="warning">Obligatorio: Ex: <cite>100</cite></span></td></tr>';
	
	echo '<tr valign="top"><th scope="row">Color del banner</th>';
	echo '<td><input type="text" name="Color_del_banner" cols="14" value="'.$options['Color_del_banner'].'" size="10" data-obligatorio="si" data-obligatorio="si"/> * <span class="warning">Obligatorio: Ex: <cite>#000</cite></span></td></tr>';
	
	echo '<tr valign="top"><th scope="row">Color del texto del banner</th>';
	echo '<td><input type="text" name="Color_del_Texto_banner" cols="14" value="'.$options['Color_del_Texto_banner'].'" size="10" data-obligatorio="si"/> * <span class="warning">Obligatorio: Ex: <cite>#FFF</cite></span></td></tr>';
	
	echo '<tr valign="top"><th scope="row">Padding top</th>';
	echo '<td><input type="text" name="Padding_top" cols="14" value="'.$options['Padding_top'].'" size="10" data-obligatorio="si"/> * <span class="warning">Obligatorio: Ex: <cite>24</cite></span></td></tr>';
	
	echo '<tr valign="top"><th scope="row">Padding bottom</th>';
	echo '<td><input type="text" name="Padding_bottom" cols="14" value="'.$options['Padding_bottom'].'" size="10" data-obligatorio="si"/> * <span class="warning">Obligatorio: Ex: <cite>4</cite></span></td></tr>';
	
	echo '<tr valign="top"><th scope="row">Padding bottom</th>';
	echo '<td><select name="Button_styles" value="'.$options['Button_styles'].'">';

	$valor_styles = $options['Button_styles'];

	switch ($valor_styles) {
		case 'butonDefecto':
			echo '<option value="'.$options['Button_styles'].'" selected>Estilo por defecto</option>';
			echo '<option value="BotonUno">Estilo Uno</option>';
			echo '<option value="BotonDos">Estilo Dos</option>';
			echo '<option value="BotonTres">Estilo Tres</option>';
			break;

		case 'BotonUno':
			echo '<option value="butonDefecto">Estilo defecto</option>';
			echo '<option value="'.$options['Button_styles'].'" selected>Estilo Uno</option>';
			echo '<option value="BotonDos">Estilo Dos</option>';
			echo '<option value="BotonTres">Estilo Tres</option>';
			break;

		case 'BotonDos':
			echo '<option value="butonDefecto">Estilo defecto</option>';
			echo '<option value="BotonUno">Estilo Uno</option>';
			echo '<option value="'.$options['Button_styles'].'" selected>Estilo Dos</option>';
			echo '<option value="BotonTres">Estilo Tres</option>';
			break;

		case 'BotonTres':
			echo '<option value="butonDefecto">Estilo defecto</option>';
			echo '<option value="BotonUno">Estilo Uno</option>';
			echo '<option value="BotonDos">Estilo Dos</option>';
			echo '<option value="'.$options['Button_styles'].'" selected>Estilo Tres</option>';
			break;

		default:
			echo '<option value="butonDefecto" selected>Estilo defecto</option>';
			echo '<option value="BotonUno">Estilo Uno</option>';
			echo '<option value="BotonDos">Estilo Dos</option>';
			echo '<option value="BotonTres">Estilo Tres</option>';
			break;
		}
		
	echo '</select></td></tr>';
	
	echo '</table>';
	echo '<input type="hidden" name="custom_submit" value="true" />';
	echo '<p class="submit"><input class="enviar_form" type="submit" value="Actualizar opciones &raquo;" /></p>';

	echo "<a href='http://www.pixelpro.es' target='_blank'><img class='img_banner_pixelpro' src='" . plugins_url('/img/bannerBackend.jpg', __FILE__) . "' /></a>";

	echo '</form>';

}

require('view.php');

?>