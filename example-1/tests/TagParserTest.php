<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\TagParser;

class TagParserTest extends TestCase 
{
    protected TagParser $parser;

    protected function setUp(): void // setUp() adalah method yang akan dijalankan sebelum setiap test
    {
        $this->parser = new TagParser();
    }

    public function test_parses_a_single_tag()
    {
        // Act
        $result = $this->parser->parse('foo');
        $expected = ['foo'];

        // Assert
        // $this->assertEquals($expected, $result);
        $this->assertSame($expected, $result);
    }

    public function test_parses_separated_list_of_tags_with_comma()
    {
        $result = $this->parser->parse('foo, bar,baz');
        $expected = ['foo', 'bar', 'baz'];

        $this->assertSame($expected, $result);
    }

    public function test_parses_separated_list_of_tags_with_space()
    {
        $result = $this->parser->parse('foo bar baz');
        $expected = ['foo', 'bar', 'baz'];

        $this->assertSame($expected, $result);
    }

    public function test_parses_separated_list_of_tags_with_pipe()
    {
        $result = $this->parser->parse('foo | bar | baz');
        $expected = ['foo', 'bar', 'baz'];

        $this->assertSame($expected, $result);
    }

    public function test_parses_separated_list_of_tags_with_dash()
    {
        $result = $this->parser->parse('foo-bar-baz');
        $expected = ['foo', 'bar', 'baz'];

        $this->assertSame($expected, $result);
    }
}