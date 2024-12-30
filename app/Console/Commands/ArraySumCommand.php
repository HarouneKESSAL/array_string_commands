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

        // Decode input array
        $array = json_decode($input, true);

        if (is_null($array)) {
            $this->error('Invalid array format. Please provide a valid JSON array.');
            return 1;
        }

        // Recursive function to calculate the sum
        $sum = $this->calculateSum($array);

        $this->info("The sum is: {$sum}");
        return 0;
    }

    private function calculateSum($array)
    {
        $sum = 0;

        foreach ($array as $item) {
            if (is_array($item)) {
                $sum += $this->calculateSum($item);
            } else {
                $sum += $item;
            }
        }

        return $sum;
    }
}
