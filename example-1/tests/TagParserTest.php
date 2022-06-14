<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\TagParser;

class TagParserTest extends TestCase 
{
    public function test_parses_a_single_tag()
    {
        $parser = new TagParser;

        $result = $parser->parse('foo');
        $expected = ['foo'];

        // $this->assertEquals($expected, $result);
        $this->assertSame($expected, $result);
    }

    public function test_parses_separated_list_of_tags_with_comma()
    {
        $parser = new TagParser;

        $result = $parser->parse('foo, bar,baz');
        $expected = ['foo', 'bar', 'baz'];

        $this->assertSame($expected, $result);
    }

    public function test_parses_separated_list_of_tags_with_space()
    {
        $parser = new TagParser;

        $result = $parser->parse('foo bar baz');
        $expected = ['foo', 'bar', 'baz'];

        $this->assertSame($expected, $result);
    }

    public function test_parses_separated_list_of_tags_with_pipe()
    {
        $parser = new TagParser;

        $result = $parser->parse('foo | bar | baz');
        $expected = ['foo', 'bar', 'baz'];

        $this->assertSame($expected, $result);
    }

    public function test_parses_separated_list_of_tags_with_dash()
    {
        $parser = new TagParser;

        $result = $parser->parse('foo-bar-baz');
        $expected = ['foo', 'bar', 'baz'];

        $this->assertSame($expected, $result);
    }
}