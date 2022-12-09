<?php

namespace App\Tests;

use App\passwordChecker;
use PHPUnit\Framework\TestCase;
// use Symfony\Bundle\FrameworkBundle\Test\testCase;

class testMDP extends TestCase{
    public function testMDPfaux(){
        $test = new passwordChecker("oui");

        $result = $test->pwdCheck();
        $this->assertFalse($result);
    }

    public function testMDPvrai(){
        $test = new passwordChecker("qdvhvzdvjjgqzvzdgjrvdzbgqv");

        $result = $test->pwdCheck();
        $this->assertTrue($result);
    }
}