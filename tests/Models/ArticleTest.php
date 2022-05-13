<?php namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Article;

class ArticleTest extends TestCase {

  public function testTitleIsEmptyByDefault()
  {
    $article = new Article;
    $this->assertEmpty($article->title);
  }
}
