<?php

// --------------------------------------------------------------------------
// Заметное сообщение для режима разработки
// --------------------------------------------------------------------------

function todo($t) {
	if(!IS_DEVELOPMENT) {
		return;
	}

	if($t) {
		print '<h1 style="color:darkred; margin:5px 0; padding:10px; border:1px solid red; font-size:30px;">'.$t.'</h1>';
	}
}

?>