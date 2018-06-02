<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function assertPageNotAccessable($route)
    {
        $this->get(route($route))->assertStatus(403);
    }
}
