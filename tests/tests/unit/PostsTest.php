<?php

use adzadzadz\modules\blogger\models\BloggerTerms;

class PostsTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    // tests
    public function testMe()
    {
        $this->assertTrue(BloggerTerms::insertTerm('category', 'adz'));
    }

}