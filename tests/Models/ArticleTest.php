<?php namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Article;

class ArticleTest extends TestCase {

  protected $article;

  public function setUp(): void
  {
    $this->article = (new Article);
  }

  public function testTitleIsEmptyByDefault()
  {
    $this->assertEmpty($this->article->title);
  }

  public function testSlugIsEmptyWithNoTitle()
  {
    $this->assertSame($this->article->getSlug(), "");
  }

  public function titleProvider()
  {
    return [
       "string simple and strtolower" => ["Mens Cotton Jacket", "mens-cotton-jacket"],
       "trim the string" => ["Mens Casual Premium Slim Fit T-Shirts ", "mens-casual-premium-slim-fit-tshirts"],
       "only take alphanumerical characters" => ["Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops", "fjallraven-foldsack-no-1-backpack-fits-15-laptops"],
       "replace spaces by dashes" => ["SanDisk SSD PLUS 1TB Internal SSD - SATA III 6 Gb/s", "sandisk-ssd-plus-1tb-internal-ssd-sata-iii-6-gbs"]
    ];
  }

  /**
   * @dataProvider titleProvider
   */
  public function testSlug($title, $slug)
  {
    $this->article->title = $title;

    $this->assertEquals($this->article->getSlug(), $slug);
  }

}
