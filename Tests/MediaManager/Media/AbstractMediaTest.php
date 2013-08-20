<?php


require_once 'Object/MediaManager/Category/AbstractCategory.class.php';
require_once 'Object/MediaManager/Media/Sound.class.php';

class AbstractMediaTest extends PHPUnit_Framework_TestCase
{
	private
	  $stub = null;

	protected function setUp()
	{
		$this->stub = $this->getMockForAbstractClass('AbstractMedia');
	}

	public function testInitialisation()
	{
		$this->assertInternalType('integer', $this->stub->getMediaType(), 'The value mediaType is not correctly initialized. Check if parrent::__construct is present.');
		$this->assertEquals($this->stub->getMediaType(), MediaType::UNKNOWN, 'The value mediaType is not correctly initialized. Check if parrent::__construct is present.');
		$this->assertInternalType('integer', $this->stub->getSize(), 'The value size is not correctly initialized.');
		$this->assertEquals($this->stub->getSize(), 0, 'The value size is not correctly initialized.');
	}

	public function testSetAndGetType()
	{
		$type = $this->stub->getType();

		$this->assertInternalType('integer', $type);
		$this->assertEquals($type, SoundType::UNKNOWN, 'The value mediaType is not correctly initialized.');
		$this->stub->setType(SoundType::UNKNOWN);
		$this->assertEquals($this->stub->getType(), SoundType::UNKNOWN, 'The value type can\'t be set.');
	}

	public function testSetAndGetMediaType()
	{
		$mediaType = $this->stub->getMediaType();

		$this->assertInternalType('integer', $mediaType);
		$this->assertEquals($mediaType, MediaType::UNKNOWN, 'The value mediaType is not correctly initialized.');
		$this->stub->setMediaType(MediaType::SOUND);
		$this->assertEquals($this->stub->getMediaType(), MediaType::SOUND, 'The value type can\'t be set.');
	}

	public function testSetAndGetSize()
	{
		$size = $this->stub->getSize();

		$this->assertInternalType('integer', $size);
		$this->assertNotNull($size, 'The value size is not correctly initialized.');
		$this->stub->setSize(42.42);
		$this->assertEquals($this->stub->getSize(), 42.42, 'The value size can\'t be set.');
	}

	public function testSetAndGetExpirationDate()
	{
		$expirationDate = $this->stub->getExpirationDate();
		$date = strtotime("+1 week");

		$this->assertInternalType('integer', $expirationDate);
		$this->assertNotNull($expirationDate, 'The value expirationDate is not correctly initialized.');
		$this->stub->setExpirationDate($date);
		$this->assertEquals($this->stub->getExpirationDate(), $date, 'The value date can\'t be set.');
	}

	public function testSetAndGetPath()
	{
		$this->assertNull($this->stub->getPath(), 'The value path is not correctly initialized.');
		$this->stub->setPath("/my/path/");
		$this->assertInternalType('string', $this->stub->getPath());
		$this->assertEquals($this->stub->getPath(), "/my/path/", 'The value path can\'t be set.');
	}

	public function testSetAndGetCompany()
	{
		$company = 42;

		$this->assertNull($this->stub->getCompany(), 'The value company is not correctly initialized.');
		$this->stub->setCompany($company);
		$this->assertEquals($this->stub->getCompany(), $company, 'The value company can\'t be set.');
	}

	public function testSetAndGetCategory()
	{
		$category = new Line();

		$this->assertNull($this->stub->getCategory(), 'The value category is not correctly initialized.');
		$this->stub->setCategory($category);
		$this->assertEquals($this->stub->getCategory(), $category, 'The value category can\'t be set.');
	}
}