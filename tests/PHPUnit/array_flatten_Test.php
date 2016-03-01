<?php

class array_flatten_Test extends \PHPUnit_Framework_TestCase {

	public function test_simple() {
		$array = [
			"three" => [
				"three" => [
					"one" => 1,
					"two" => 2,
				],
				"one" => 1,
				"two" => 2,
				"four" => null,
				"five" => new stdClass,
			],
			"one" => 1,
			"two" => 2,
			"four" => true,
			"five" => false,
		];

		$expected = [
			"three.three.one" => 1,
			"three.three.two" => 2,
			// "three.three"     => "array",
			"three.one"       => 1,
			"three.two"       => 2,
			"three.four"      => "NULL",
			"three.five"      => "object",
			// "three"           => "array",
			"one"             => 1,
			"two"             => 2,
			"four"            => 1,
			"five"            => "",
		];

		$this->assertEquals($expected, array_flatten($array));
	}

	public function test_w_seed() {
		$array = [
			"three" => [
				"three" => [
					"one" => 1,
					"two" => 2,
				],
				"one" => 1,
				"two" => 2,
				"four" => null,
				"five" => new stdClass,
				6     => "six",
			],
			"one" => 1,
			"two" => 2,
			6     => "six",
			"four" => true,
			"five" => false,
		];

		$dt = date(\DateTime::RFC3339);

		$expected = [
			"dt"              => $dt,
			"three.three.one" => 1,
			"three.three.two" => 2,
			// "three.three"     => "array",
			"three.one"       => 1,
			"three.two"       => 2,
			"three.four"      => "NULL",
			"three.five"      => "object",
			// "three"           => "array",
			"one"             => 1,
			"two"             => 2,
			"four"            => 1,
			"five"            => "",
			'three.6'         => 'six',
			6                 => 'six',
		];

		$this->assertEquals($expected, array_flatten($array, null, ["dt" => $dt]));
	}
}



