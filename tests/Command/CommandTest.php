<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Tests\Nbobtc\Command;

use Nbobtc\Command\Command;

/**
 */
class CommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider commandDataProvider
     */
    public function testCommand($method, $parameters, $id)
    {
        $command = new Command($method, $parameters, $id);

        $this->assertEquals($method, $command->getMethod());
        $this->assertEquals($parameters, $command->getParameters());
        $this->assertEquals($id, $command->getId());

        $command = new Command();
        $this->assertNull($command->getMethod());
        $this->assertEmpty($command->getParameters());
        $this->assertNull($command->getId());

        $this->assertInstanceOf('Nbobtc\Command\CommandInterface', $command->withMethod($method));
        $this->assertEquals($method, $command->getMethod());
        $this->assertInstanceOf('Nbobtc\Command\CommandInterface', $command->withParameters($parameters));
        $this->assertEquals($parameters, $command->getParameters());
        $this->assertInstanceOf('Nbobtc\Command\CommandInterface', $command->withId($id));
        $this->assertEquals($id, $command->getId());
    }

    public function commandDataProvider()
    {
        return array(
            array('getinfo', array('one'), 1),
        );
    }

    public function testCommandWithParameters()
    {
        $command = new Command();
        $this->assertEmpty($command->getParameters());
        $command->withParameters('a');
        $this->assertEquals(array('a'), $command->getParameters());

        $command = new Command();
        $this->assertEmpty($command->getParameters());
        $command->withParameters(array('a'));
        $this->assertEquals(array('a'), $command->getParameters());
    }
}
