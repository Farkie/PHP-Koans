<?php

DEFINE('__','FILL ME IN');

function adder($a, $b) {
	return $a + $b;
}

class test_arrays extends PHPUnit_Framework_TestCase {

	public function test_1() {
		$a = 1;
		$b = 2;
		$this->assertEquals(adder($a, $b), 3);
		$this->assertEquals(adder($b, $a), 3);
	}

	public function test_2() {
		$a = 1;
		$b = 2;
		$this->assertEquals(adder($a, $b), 3);
	}

}