<?php


use PHPUnit\Framework\TestCase;
use Wangiii\Hasher\MD5Hasher;

class MD5HasherTest extends TestCase
{
    protected $hasher;

    public function setUp(): void
    {
        $this->hasher = new MD5Hasher();
    }

    public function testMD5HasherMake()
    {
        $password = md5('password');
        $passwordTwo = $this->hasher->make('password');

        $this->assertEquals($password, $passwordTwo);
    }

    public function testMD5HasherWithSaltMake()
    {
        $password = md5('passwordjason');
        $passwordTwo = $this->hasher->make('password', ['salt' => 'jason']);

        $this->assertEquals($password, $passwordTwo);
    }

    public function testMD5HasherCheck()
    {
        $password = md5('password');
        $passwordCheck = $this->hasher->check('password', $password);

        $this->assertTrue($passwordCheck);
    }

    public function testMD5HasherWithSaltCheck()
    {
        $password = md5('passwordjason');
        $passwordCheck = $this->hasher->check('password', $password, ['salt' => 'jason']);

        $this->assertTrue($passwordCheck);
    }
}