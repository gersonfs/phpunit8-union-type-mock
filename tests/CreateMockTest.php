<?php
require_once 'vendor/autoload.php';

class CreateMock extends \PHPUnit\Framework\TestCase {

    public function testCreateMock()
    {
        $mock = $this->getMockBuilder(\MockedClass::class)->getMock();
        $mock->method('getValue')->willReturn(2);
        $obj = new MyClass($mock);
        $this->assertSame(2, $obj->test());
    }
}

class MyClass {

    public function __construct(private \MockedClass $obj){}

    public function test()
    {
        return $this->obj->getValue();
    }
}

class MockedClass {

    public function getValue(): int|false
    {
        return 1;
    }
}