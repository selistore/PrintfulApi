<?php
namespace Selistore\PrintfulApi\V2;

trait Catalog
{
  public function products() {
    return new class(){
      use \Selistore\PrintfulApi\V2\Repository\Catalog\Products;
    };
  }
  
  public function categories(){
    return new class(){
      use \Selistore\PrintfulApi\V2\Repository\Catalog\Categories;
    };
  }
  
  public function variants(){
    return new class(){
      use \Selistore\PrintfulApi\V2\Repository\Catalog\Variants;
    };
  }
}