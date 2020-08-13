<?php

use \CNIT\NetCollect\Auth\Authentication as NetCollectAuthentication;

use CNIT\NetCollect\Auth\Token as AuthToken;
use PHPUnit\Framework\TestCase;

class NetCollectAPITest extends TestCase
{
    public function testAuthInstance()
    {
        $auth = new NetCollectAuthentication("test", "test");
        $this->assertInstanceOf(NetCollectAuthentication::class, $auth);
    }

    public function testInitAuth()
    {
        $authentication = $this->getMockBuilder(NetCollectAuthentication::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->getMock();
        
        $token = $this->createMock(AuthToken::class);
        $token->method('getToken')->willReturn('MY_TOKEN');

        $authentication->method('auth')->willReturn($token);

        $this->assertSame($token, $authentication->auth());
    }
}