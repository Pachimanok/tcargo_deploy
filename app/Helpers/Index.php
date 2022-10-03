<?php 
namespace App\Helpers;
use Illuminate\Support\HtmlString;
class Index {
	public static function orderByLink($column, $label, array $params = []){
		$link = '<a ';
		//Sets the URI
		$link .= 'href="'.self::orderByURI($column).'" ';
		//Optional parameters
		foreach($params as $key=>$val){
			$link .= $key.'='.$val.' ';
		}
		$link .= '>';
		//Sets the caret direction
		$caret = request()->sort=='desc' ? 'down' : 'up';
		if(request()->order_by == $column){
			$link .= '<i class="fa fa-caret-'.$caret.'"></i> ';
		}
		//Sets the label
		$link .= $label;
		$link .= '</a>';
		//Convert to HTML (to be properly used insede blade templates)
		return new HtmlString($link);
	}
	public static function orderByURI($column){
		$options = ["order_by"=>$column, "page"=>"1", "sort" => 'asc'];
		//Modify sort if alredy viewing desc
		if(request()->order_by == $column AND request()->sort=='asc'){
			$options["sort"] = 'desc';
		}
		$request_uri = request()->fullUrlWithQuery($options);
		return $request_uri;
	}

}

