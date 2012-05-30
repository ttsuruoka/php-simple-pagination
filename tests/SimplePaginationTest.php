<?php
require_once dirname(__DIR__).'/SimplePagination.php';

class SimplePaginationTest extends PHPUnit_Framework_TestCase
{
    public function test_construct()
    {   
        $pagination = new SimplePagination(1, 10);
        $this->assertEquals(1, $pagination->current);
        $this->assertEquals(0, $pagination->prev);
        $this->assertEquals(2, $pagination->next);
        $this->assertEquals(10, $pagination->count);
        $this->assertEquals(1, $pagination->start_index);

        $pagination = new SimplePagination(2, 10);
        $this->assertEquals(2, $pagination->current);
        $this->assertEquals(1, $pagination->prev);
        $this->assertEquals(3, $pagination->next);
        $this->assertEquals(10, $pagination->count);
        $this->assertEquals(11, $pagination->start_index);
    }   

    public function test_checkLastPage()
    {
        $items = array('a', 'b', 'c', 'd');
        $pagination = new SimplePagination(1, 3);
        $pagination->checkLastPage($items);
        $this->assertFalse($pagination->is_last_page);

        $items = array('e', 'f', 'g');
        $pagination = new SimplePagination(2, 3);
        $pagination->checkLastPage($items);
        $this->assertTrue($pagination->is_last_page);
    }
}
