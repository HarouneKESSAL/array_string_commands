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

        preg_match_all('/\{(\d+)\}/', $template, $matches);

        foreach ($matches[1] as $index) {
            if (!isset($args[$index])) {
                $this->error("Missing argument for placeholder {{$index}}.");
                return 1;
            }
        }

        $result = preg_replace_callback('/\{(\d+)\}/', function ($matches) use ($args) {
            return $args[$matches[1]];
        }, $template);

        $this->info("Result: {$result}");
        return 0;
    }

}
