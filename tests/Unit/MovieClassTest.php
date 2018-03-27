<?php

namespace tests\Unit;

use app\src\Models\Movie;

class MovieClassTest extends Base
{

    public function testMovieAttributeTitleExist()
    {
        $this->assertClassHasAttribute('title', Movie::class);
    }

    public function testMovieAttributePosterExist()
    {
        $this->assertClassHasAttribute('poster', Movie::class);
    }

    public function testMovieAttributeDescriptionExist()
    {
        $this->assertClassHasAttribute('description', Movie::class);
    }

}