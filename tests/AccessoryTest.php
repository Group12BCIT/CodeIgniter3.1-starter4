<?php

use PHPUnit\Framework\TestCase;
// Extend from the entity

class AccessoryTest extends TestCase
{
	private $CI;
	public function setUp()
	{
	  // Load CI instance normally
      $this->CI = &get_instance();
	  $this->CI->load->model('accessoriesentity');
	}
	
	public function testGetPost()
    {
      $_SERVER['REQUEST_METHOD'] = 'GET';
      $_GET['foo'] = 'bar';
      $this->assertEquals('bar', $this->CI->input->get_post('foo'));
    }
	
} // end class