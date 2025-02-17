<?php
namespace Selistore\PrintfulApi\V2;

use Selistore\PrintfulApi\V2\Auth as PrintfulAuth;

final class Api extends PrintfulAuth
{
  public function scopes() {
    return new class{
      use \Selistore\PrintfulApi\V2\Repository\Scopes;
    };
  }

  public function catalog() {
    return new class {
      use \Selistore\PrintfulApi\V2\Catalog;
    };
  }

  public function orders() {
    return new class {
      use \Selistore\PrintfulApi\V2\Orders;
    };
  }

  public function countries() {
    return new class {
      use \Selistore\PrintfulApi\V2\Repository\Countries;
    };
  }

  public function shipping() {
    return new class {
      use \Selistore\PrintfulApi\V2\Repository\ShippingRates;
    };
  }

  public function stores() {
    return new class {
      use \Selistore\PrintfulApi\V2\Repository\Stores;
    };
  }


}