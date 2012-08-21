<?php
/**
 * @package     Joomla.UnitTest
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

/**
 * Test class for JLanguageStemmer.
 * Generated by PHPUnit on 2012-03-21 at 21:29:32.
 */
class JLanguageStemmerTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var JLanguageStemmer
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{

	}

	/**
	 * @covers  JLanguageStemmer::getInstance
	 */
	public function testGetInstance()
	{
		$instance = JLanguageStemmer::getInstance('porteren');

		$this->assertInstanceof(
			'JLanguageStemmer',
			$instance
		);

		$this->assertInstanceof(
			'JLanguageStemmerPorteren',
			$instance
		);
	}

	/**
	 * @covers             JLanguageStemmer::getInstance
	 * @expectedException  RuntimeException
	 */
	public function testGetInstanceException()
	{
		$instance = JLanguageStemmer::getInstance('unexisting');
	}
}
