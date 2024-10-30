<?php

function show_banner()
{

	if ( ! is_admin() ) {

		$get_values = get_option('cookies_pro_options');

		$strOutputHTML .= '<div class="coockie_banner" style="z-index: 9999; position: fixed; bottom: 0px; background:' . $get_values['Color_del_banner'] .'; color:' . $get_values['Color_del_Texto_banner'] . '; width:' . $get_values['Ancho_del_banner'] .'% !important; padding-top:' . $get_values['Padding_top'] . 'px; padding-bottom:' . $get_values['Padding_bottom'] . 'px; text-align:center;">';
	    $strOutputHTML .= '<p style="padding:4px;">'. $get_values['msg'] .'<button class="' . $get_values['Button_styles'] . '">' . $get_values['texto_boton_banner'] . '</button> <a href="' . $get_values['URL_aviso_legal'] . '" target="_blank">' . $get_values['Texto_aviso_legal'] . '</a></p>';
	    $strOutputHTML .= '</div>';
	   	echo $strOutputHTML; 

	} 

}

add_action('wp_footer', 'show_banner');

?>