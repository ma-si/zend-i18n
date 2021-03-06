<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ZendTest\I18n\Translator;

use Interop\Container\ContainerInterface;
use PHPUnit_Framework_TestCase as TestCase;
use Zend\I18n\Translator\TranslatorServiceFactory;

class TranslatorServiceFactoryTest extends TestCase
{
    public function testCreateServiceWithNoTranslatorKeyDefined()
    {
        $slContents = [['config', []]];
        $serviceLocator = $this->getMock(ContainerInterface::class);
        $serviceLocator->expects($this->once())
                       ->method('get')
                       ->will($this->returnValueMap($slContents));

        $factory = new TranslatorServiceFactory();
        $translator = $factory($serviceLocator, 'Zend\I18n\Translator\Translator');
        $this->assertInstanceOf('Zend\I18n\Translator\Translator', $translator);
    }
}
