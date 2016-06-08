<?php

namespace KA\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class KAUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}