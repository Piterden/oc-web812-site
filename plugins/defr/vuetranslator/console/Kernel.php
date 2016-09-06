<?php namespace DEfr\VueTranslator\Console;

use SendTermMessage;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        SendTermMessage::class,
    ];
}
