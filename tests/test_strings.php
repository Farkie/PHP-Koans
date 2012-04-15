<?php

DEFINE('__','FILL ME IN');

class test_strings extends PHPUnit_Framework_TestCase {

	public function test_1() {
		$a = 'cheese';
		$b = 'string';
		$this->assertEquals($a.' '.$b, __);
		$this->assertEquals($a, __);
	}

	public function test_2() {
		$a = 1;
		$b = 2;
		$this->assertEquals('str1', $b+a);
	}

}