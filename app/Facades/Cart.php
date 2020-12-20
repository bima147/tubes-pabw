<?php 

namespace App\Facades;

use Illmuminate\Support\Facedes\Facade;

/**
 * 
 */
class Cart extends Facade
{
	
	public function __construct(argument)
	{
		# code...
	}

	public static function getFacadeAccessor() {
		return 'cart';
	}
}