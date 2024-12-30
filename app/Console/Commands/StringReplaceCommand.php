<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StringReplaceCommand extends Command
{
    protected $signature = 'run:string_replace {template} {args*}';
    protected $description = 'Replace placeholders in a template with provided arguments';

    public function handle()
    {
        $template = $this->argument('template');
        $args = $this->argument('args');

        $result = preg_replace_callback('/\{(\d+)\}/', function ($matches) use ($args) {
            $index = $matches[1];
            return $args[$index] ?? $matches[0];
        }, $template);

        $this->info("Result: {$result}");
        return 0;
    }
}
