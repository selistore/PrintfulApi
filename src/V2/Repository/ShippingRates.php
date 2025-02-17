<?php
namespace Selistore\PrintfulApi\V2\Repository;

trait ShippingRates{
  public function calculate($items = []){
    return 45;
  }
}