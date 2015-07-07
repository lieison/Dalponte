<?php
	if ($icon != '') {
		$output .= '<div id="cs-dropcap-'.$date.'" class="cs-dropcap '.str_replace(".","-",$layout).'"><p class="text-content cs-icon"><i class="' . esc_attr ( $icon ) . '" ' . $styles . '></i>' . $content . '</p></div>';
	} else {
		$output .= '<div id="cs-dropcap-'.$date.'" class="cs-dropcap '.str_replace(".","-",$layout).'"><p class="text-content cs-dropcap-firstText">' . $content . '</p></div>';
	}
?>