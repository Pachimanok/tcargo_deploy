<?php 
namespace App\Helpers;
use Illuminate\Support\HtmlString;
class Breadcrumbs {
	public static function item($url, $label, $disabled = false){
		$item = new \stdClass;
		$item->url = $url;
		$item->label = $label;
		$item->disabled = $disabled;
		return $item;

	}
	public static function make($array){
		$i=0;
		$breadcrumbs = '<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">';

		foreach($array as $item){
			$i++;
			$items_count = count($array);
			$breadcrumbs .= '<li class="m-nav__item m-nav__item--home">';
			if($item->disabled){
				$breadcrumbs .= '<span class="m-nav__link-text">'.$item->label.'</span>';				
			}else{
			$breadcrumbs .= '
		          <a href="'.$item->url.'" class="m-nav__link m-nav__link--icon">
		          	<span class="m-nav__link-text">
		            	'.$item->label.'
		            </span>
		          </a>
		        ';				
			}
			$breadcrumbs .= '</li>';
			if($i < $items_count){
				$breadcrumbs .= '<li class="m-nav__separator">-</li>';
			}

		}

		$breadcrumbs .= '</ul>';

		return new HtmlString($breadcrumbs);
	}

}

