<?php

namespace drupol\phpermutations\Tests\Iterators;

use drupol\phpermutations\Iterators\Combinations;
use drupol\phpermutations\Tests\AbstractTest;

/**
 * Class CombinationsTest.
 */
class CombinationsTest extends AbstractTest
{
    /**
     * The type.
     */
    const TYPE = 'combinations';

    /**
     * The tests.
     *
     * @dataProvider dataProvider
     *
     * @param mixed $input
     * @param mixed $expected
     */
    public function testCombinations($input, $expected)
    {
        $combinations = new Combinations($input['dataset'], $input['length']);

        $this->assertEquals($input['dataset'], $combinations->getDataset());
        $this->assertEquals($input['length'], $combinations->getLength());
        $this->assertCount(count($input['dataset']),
            $combinations->getDataset());
        $this->assertEquals(
            $expected['dataset'],
            $combinations->toArray(),
            '$canonicalize = true',
            $delta = 0.0,
            $maxDepth = 10,
            $canonicalize = true
        );
        $this->assertEquals($expected['count'], $combinations->count());
    }

    /**
     * Test combinations with big numbers.
     *
     * @see https://github.com/drupol/phpermutations/issues/10
     */
    public function testCombinationsWithBigNumbers()
    {
        $combinations = new Combinations(range(1, 200), 2);
        $this->assertCount($combinations->count(), $combinations->toArray());
    }
}
