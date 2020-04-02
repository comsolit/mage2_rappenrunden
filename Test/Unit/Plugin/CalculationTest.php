<?php
/**
 * @author comsolit AG team tw <info@comsolit.com>
 * @copyright Copyright (c) 2020 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */
namespace Comsolit\RappenRunden\Test\Unit\Plugin;

class CalculationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     */
    public function testBeforeRound($a, $b)
    {
        $actual = round($a * 20) / 20;
        $this->assertEquals($b, $actual);
    }

    /**
     * @return array
     */
    public function provider()
    {
        return [
            // value, expected
            ['0.97', '0.95'],
            ['1.23', '1.25'],
            ['123.56', '123.55'],
            ['99.98','100.00'],
            ['100.99', '101.00'],
            ['95.93', '95.95'],
            ['1.11', '1.10'],
            ['1.96', '1.95']
        ];
    }
}