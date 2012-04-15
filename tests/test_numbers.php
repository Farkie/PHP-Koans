<?php

DEFINE('__','FILL ME IN');

function adder($a, $b) {
	return $a + $b;
}

class test_arrays extends PHPUnit_Framework_TestCase {

	public function test_1() {
		$a = 1;
		$b = 2;
		$this->assertEquals(adder($a, __), 3);
		$this->assertEquals(adder($b, $a), __);
	}

	public function test_2() {
		$a = 14+4;
		$b = __;
		$this->assertEquals(adder($a, $b), 22);
	}

}