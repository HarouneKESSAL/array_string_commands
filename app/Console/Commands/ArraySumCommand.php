<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ArraySumCommand extends Command
{
    protected $signature = 'run:array_sum {array}';
    protected $description = 'Calculate the sum of an array provided as input';

    public function handle()
    {
        $input = $this->argument('array');
        $array = json_decode($input, true);

        if (is_null($array)) {
            $this->error('Invalid array format. Please provide a valid JSON array.');
            return 1;
        }

        try {
            $sum = $this->calculateSum($array);
            $this->info("The sum is: {$sum}");
        } catch (\InvalidArgumentException $e) {
            $this->error($e->getMessage());
            return 1;
        }

        return 0;
    }

    private function calculateSum($array)
    {
        $sum = 0;

        foreach ($array as $item) {
            if (is_array($item)) {
                $sum += $this->calculateSum($item);
            } elseif (is_numeric($item)) {
                $sum += $item;
            } else {
                throw new \InvalidArgumentException("Invalid element detected: {$item}. Only numeric values are allowed.");
            }
        }

        return $sum;
    }


}
