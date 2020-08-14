<?php

use CNIT\NetCollect\Auth\Token as AuthToken;
use CNIT\NetCollect\Manager\AccountManager;
use PHPUnit\Framework\TestCase;

class AccountManagerTest extends TestCase
{
    /**
     * @var AuthToken
     */
    private $auth;

    public function setUp(): void
    {
        $stub = $this->createMock(Token::class);

        $stub->expects($this->once())
            ->method('getToken')
            ->willReturn('vyDM0AwqyrleTteTnq2mwQeMxt0VsLstewwyfor14DYjI3IhrfJ4s5ofwJr0xq1ho8umQAkdm4sNX02usEeyyyzAxkven1thHTrh');

        $this->auth = $stub;
    }

    public function testCreateAccount()
    {
        $account = $this->getMockBuilder(AccountManager::class)
            ->setConstructorArgs([$this->auth])
            ->addMethods(['register'])
            ->getMock();

        $account->method('register')->with('DAKIA', 'Franck', AccountManager::CIVILITE_MONSIEUR, '49929598', '52797005');
    }
}