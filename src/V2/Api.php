<?php
namespace Selistore\PrintfulApi\V2;

use Selistore\PrintfulApi\V2\Auth as PrintfulAuth;

/**
 * Class Api
 *
 * This class provides access to various API endpoints such as scopes, catalog, orders, countries, shipping, and stores.
 * It extends the PrintfulAuth class for authentication.
 */
final class Api extends PrintfulAuth
{
    /**
     * Get the scopes repository.
     *
     * @return object Anonymous class using the Scopes trait.
     */
    public function scopes() {
        return new class {
            use \Selistore\PrintfulApi\V2\Repository\Scopes;
        };
    }

    /**
     * Get the catalog repository.
     *
     * @return object Anonymous class using the Catalog trait.
     */
    public function catalog() {
        return new class {
            use \Selistore\PrintfulApi\V2\Catalog;
        };
    }

    /**
     * Get the orders repository.
     *
     * @return object Anonymous class using the Orders trait.
     */
    public function orders() {
        return new class {
            use \Selistore\PrintfulApi\V2\Orders;
        };
    }

    /**
     * Get the countries repository.
     *
     * @return object Anonymous class using the Countries trait.
     */
    public function countries() {
        return new class {
            use \Selistore\PrintfulApi\V2\Repository\Countries;
        };
    }

    /**
     * Get the shipping rates repository.
     *
     * @return object Anonymous class using the ShippingRates trait.
     */
    public function shipping() {
        return new class {
            use \Selistore\PrintfulApi\V2\Repository\ShippingRates;
        };
    }

    /**
     * Get the stores repository.
     *
     * @return object Anonymous class using the Stores trait.
     */
    public function stores() {
        return new class {
            use \Selistore\PrintfulApi\V2\Repository\Stores;
        };
    }
}
