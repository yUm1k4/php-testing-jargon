<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\TagParser;

class TagParserTest extends TestCase 
{
    // protected TagParser $parser;

    // protected function setUp(): void // setUp() adalah method yang akan dijalankan sebelum setiap test
    // {
    //     $this->parser = new TagParser();
    // }

    /**
     * @dataProvider provideTags
     */
    public function test_it_parses_tags($input, $expected)
    {
        $parser = new TagParser();

        $result = $parser->parse($input);

        $this->assertSame($expected, $result); // asertSame() itu ngecek type data juga
    }

    public function provideTags()
    {
        return [
            ['foo', // input
                ['foo']], // expected
            ['foo, bar', // separator comma with space
                ['foo', 'bar']],
            ['foo,bar,baz', // separator comma without space
                ['foo', 'bar', 'baz']],
            ['foo bar baz', // separator space
                ['foo', 'bar', 'baz']],
            ['foo|bar|baz', // separator pipe
                ['foo', 'bar', 'baz']],
            ['foo-bar-baz', // separator dash
                ['foo', 'bar', 'baz']],
            ['foo - bar - baz', // separator dash with space
                ['foo', 'bar', 'baz']],
            ['foo!bar!baz', // separator exclamation 
                ['foo', 'bar', 'baz']],
        ];
    }
}