<?php

/**
 * Wird zum Testen benutzt ob Funktions-Aufrufe by Value oder by Reference schneller sind
 * Class Benchmark
 */
class Benchmark
{
    const BY_VALUE = 'byValue';
    const BY_REFERENCE = 'byReference';
    private $executionTime;

    /**
     * Benchmark constructor.
     */
    public function __construct()
    {
        $this->executionTime = microtime(true);
    }

    /**
     * @param int $iterations
     */
    public function runByValueTests($iterations = 100)
    {
        $timeStart = microtime(true);

        $values = [];
        $values[] = 1;
        for ($i = 0; $i <= $iterations; $i++) {
            $values[] = $this->createValueByValue($values);
        }

        $timeEnd = microtime(true);
        $this->executionTime = $timeEnd - $timeStart;
    }

    /**
     * @param int $iterations
     */
    public function runByReferenceTests($iterations = 100)
    {
        $timeStart = microtime(true);

        $values = [];
        $values[] = 1;
        for ($i = 0; $i <= $iterations; $i++) {
            $this->createValueByReference($values);
        }

        $timeEnd = microtime(true);
        $this->executionTime = $timeEnd - $timeStart;
    }

    /**
     * @param $values
     * @return mixed
     */
    private function createValueByValue($values)
    {
        $values[mt_rand(0, count($values) - 1)] = mt_rand(0, 99999);
        return $values;
    }

    /**
     * @param $values
     */
    private function createValueByReference(&$values)
    {
        $values[mt_rand(0, count($values) - 1)] = mt_rand(0, 99999);
    }

    /**
     * @return mixed
     */
    public function getExecutionTime()
    {
        return $this->executionTime;
    }
}
