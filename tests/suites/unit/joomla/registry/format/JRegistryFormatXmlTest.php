<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  Registry
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

require_once JPATH_PLATFORM . '/joomla/registry/format.php';

/**
 * Test class for JRegistryFormatXML.
 * Generated by PHPUnit on 2009-10-27 at 15:13:11.
 *
 * @package     Joomla.UnitTest
 * @subpackage  Registry
 * @since       11.1
 */
class JRegistryFormatXMLTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Test the JRegistryFormatXML::objectToString method.
	 *
	 * @return void
	 */
	public function testObjectToString()
	{
		$class = JRegistryFormat::getInstance('XML');
		$options = null;
		$object = new stdClass;
		$object->foo = 'bar';
		$object->quoted = '"stringwithquotes"';
		$object->booleantrue = true;
		$object->booleanfalse = false;
		$object->numericint = 42;
		$object->numericfloat = 3.1415;
		$object->section = new stdClass;
		$object->section->key = 'value';
		$object->array = array('nestedarray' => array('test1' => 'value1'));

		$string = "<?xml version=\"1.0\"?>\n<registry>" .
			"<node name=\"foo\" type=\"string\">bar</node>" .
			"<node name=\"quoted\" type=\"string\">\"stringwithquotes\"</node>" .
			"<node name=\"booleantrue\" type=\"boolean\">1</node>" .
			"<node name=\"booleanfalse\" type=\"boolean\"></node>" .
			"<node name=\"numericint\" type=\"integer\">42</node>" .
			"<node name=\"numericfloat\" type=\"double\">3.1415</node>" .
			"<node name=\"section\" type=\"object\">" .
			"<node name=\"key\" type=\"string\">value</node>" .
			"</node>" .
			"<node name=\"array\" type=\"array\">" .
			"<node name=\"nestedarray\" type=\"array\">" .
			"<node name=\"test1\" type=\"string\">value1</node>" .
			"</node>" .
			"</node>" .
			"</registry>\n";

		// Test basic object to string.
		$this->assertThat(
			$class->objectToString($object, $options),
			$this->equalTo($string)
		);
	}

	/**
	 * Test the JRegistryFormatXML::stringToObject method.
	 *
	 * @return void
	 */
	public function testStringToObject()
	{
		$class = JRegistryFormat::getInstance('XML');
		$object = new stdClass;
		$object->foo = 'bar';
		$object->booleantrue = true;
		$object->booleanfalse = false;
		$object->numericint = 42;
		$object->numericfloat = 3.1415;
		$object->section = new stdClass;
		$object->section->key = 'value';
		$object->array = array('test1' => 'value1');

		$string = "<?xml version=\"1.0\"?>\n<registry>" .
			"<node name=\"foo\" type=\"string\">bar</node>" .
			"<node name=\"booleantrue\" type=\"boolean\">1</node>" .
			"<node name=\"booleanfalse\" type=\"boolean\"></node>" .
			"<node name=\"numericint\" type=\"integer\">42</node>" .
			"<node name=\"numericfloat\" type=\"double\">3.1415</node>" .
			"<node name=\"section\" type=\"object\">" .
			"<node name=\"key\" type=\"string\">value</node>" .
			"</node>" .
			"<node name=\"array\" type=\"array\">" .
			"<node name=\"test1\" type=\"string\">value1</node>" .
			"</node>" .
			"</registry>\n";

		// Test basic object to string.
		$this->assertThat(
			$class->stringToObject($string),
			$this->equalTo($object)
		);
	}

}
