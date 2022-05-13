<?php namespace App\Models;

use phpDocumentor\Reflection\Types\Null_;

class Article {

  public $title;

  public function getSlug()
  {
		$text  = $this->title;
    $text  = strtolower($text);
		$text  = preg_replace( '/[^A-Za-z0-9 _.]/', '', $text );
		$text  = preg_replace( '/[ _.]+/', '-', trim( $text ) );
		$text  = trim( $text, '-' );
    return $text;
  }
}
