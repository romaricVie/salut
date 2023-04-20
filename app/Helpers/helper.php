<?php
// Fonction permettant de gerer le titre des pages
if(!function_exists('page_title')){
	function page_title($title){
		$base_title = config('app.name');
		
		return empty($title) ? $base_title : $title.' | '.$base_title;
		
	}
}

/*
*
* Function permettant de gerer le lien actif des pages!
@return string
*/
if(!function_exists('set_active_route')){
	function set_active_route($route){
		 return Route::is($route) ? 'active' : '';
	}
}
//Fonction permettant de gerer les liens cliquables. /(http|https|ftp)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\s*)?/
	if(!function_exists('replace_links')){
	function replace_links($text){
		$regex_url ="#[-a-zA-Z0-9@:%_\+.~\#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~\#?&//=]*)?#si";
		return preg_replace($regex_url,
		 "<a href=\"$0\" target=\"_blank\">$0</a>", 
		 $text);
	}
}


   if(!function_exists('format_date'))
   {
       function format_date($date){
		return $date ->format('d/m/Y H:i:s');
	}


   }

  
