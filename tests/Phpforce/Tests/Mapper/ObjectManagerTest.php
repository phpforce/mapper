<?php
namespace Phpforce\Tests\Mapper;

use Phpforce\Mapper\ObjectManager;

class ObjectManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testAap()
    {
        $client = $this->getMockBuilder('\Phpforce\SoapClient\ClientInterface')
            ->getMock();

        $em = new ObjectManager($client);
        $result = $em->find('\Phpforce\Mapper\Model\Account', 1);
        var_dump($result);die;
    }
}