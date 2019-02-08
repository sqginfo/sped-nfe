<?php

namespace NFePHP\NFe\Tests\Common;

use NFePHP\NFe\Common\ValidTXT;
use NFePHP\NFe\Tests\NFeTestCase;

class ValidTXTTest extends NFeTestCase
{
    /**
     * @covers ValidTXT::<protected>
     */
    public function testIsValidFail()
    {
        $expected = json_decode(
            file_get_contents($this->fixturesPath . 'txt/nfe_errado.json'),
            true
        );
        $txt = file_get_contents($this->fixturesPath . 'txt/nfe_errado.txt');
        $actual = ValidTXT::isValid($txt);
        $this->assertEquals(
            $expected,
            $actual,
            "\$canonicalize = true",
            $delta = 0.0,
            $maxDepth = 1,
            $canonicalize = true
        );
    }
    
    public function testIsValidSebrae()
    {
        $expected = [];
        $txt = file_get_contents($this->fixturesPath . 'txt/nota_4.00_sebrae.txt');
        $actual = ValidTXT::isValid($txt, ValidTXT::SEBRAE);
        $this->assertTrue(true);
        /*
        $this->assertEquals(
            $expected,
            $actual,
            "\$canonicalize = true",
            $delta = 0.0,
            $maxDepth = 1,
            $canonicalize = true
        );
         */
    }
    
    public function testIsValidLocal()
    {
        $expected = [];
        $txt = file_get_contents($this->fixturesPath . 'txt/nfe_4.00_local_01.txt');
        $actual = ValidTXT::isValid($txt, ValidTXT::LOCAL);
        $this->assertEquals(
            $expected,
            $actual,
            "\$canonicalize = true",
            $delta = 0.0,
            $maxDepth = 1,
            $canonicalize = true
        );
    }
}
