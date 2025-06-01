<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;

class CreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create differents features';

    private $options = [
        'Controller' => 'controller',
        'Model' => 'model',
        'Form Request' => 'request',
        'Middleware' => 'middleware',
        'Event' => 'event',
        'Listener' => 'listener',
        'Enum' => 'enum',
        'Job' => 'job',
        'Resource' => 'resource',
        'Migration' => 'migration',
        'Other' => 'other',
    ];
    private $otherOptions = [
        'Class' => 'App/Classes',
        'Service' => 'App/Services',
        'Repository' => 'App/Repositories',
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiVersion = $this->choice('Choose a version', [
            'v1'
        ], 0);

        $option = $this->choice('Choose a feature', [
            'Controller',
            'Model',
            'Form Request',
            'Middleware',
            'Event',
            'Listener',
            'Job',
            'Enum',
            'Resource',
            'Other'

        ], 0);

        if ($option == 'Other') {
            $selected = $this->choice('Choose a feature', [
                'Service',
                'Repository',
                'Class',
            ], 0);

            $otherOption = $this->otherOptions[$selected];
            $name = $this->ask('Write a name');
            $this->makeOtherFeature("$otherOption/Api/$apiVersion/$name");
            return;
        }

        $name = $this->ask('Write a name:');
        $this->makeFeature($option, "Api/$apiVersion/$name");
    }

    private function makeFeature($option, $name)
    {
        Log::info($option);
        $feature = $this->options[$option];

        $this->call("make:$feature", [
            'name' => $name
        ]);
    }

    private function makeOtherFeature($name)
    {
        $this->call("make:class", [
            'name' => $name
        ]);
    }

    private function executeCommand($command)
    {
        shell_exec($command);
    }
}
