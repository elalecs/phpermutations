<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\NGrams;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class NgramsTest.
 */
class NgramsTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'ngrams';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testNgrams($input, $expected)
    {
        $ngrams = new NGrams($input['dataset'], $input['length']);

        for ($i = 0; $i < $input['turn']; ++$i) {
            $ngrams->next();
        }
        $this->assertEquals($expected['current'], $ngrams->current());

        $this->assertEquals($input['dataset'], $ngrams->getDataset());
        $this->assertEquals($expected['count'], $ngrams->count());
    }
}
