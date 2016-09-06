<?php namespace DEfr\VueTranslator\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use DEfr\VueTranslator\Events\TermContentWasUpdated;

class SendTermMessage extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'vue:run {command}';

    /**
     * @var string The console command description.
     */
    protected $description = 'No description provided yet...';

    public function handle()
    {
        // Fire off an event, just randomly grabbing the first user for now
        $user = \App\User::first();
        $message = \App\ChatMessage::create([
            'user_id' => $user->id,
            'message' => $this->argument('message')
        ]);

        event(new ChatMessageWasReceived($message, $user));
    }

    /**
     * Execute the console command.
     * @return void
     */
    public function fire()
    {
        $this->output->writeln('Hello world!');
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

}
