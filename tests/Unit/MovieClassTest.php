<?php

namespace tests\Unit;

use app\src\Models\Movie;

class MovieClassTest extends Base
{

    public function testMovieAttributes()
    {
        $this->assertClassHasAttribute('title', Movie::class);
    }

}