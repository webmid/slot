<?php


namespace App\Console\Commands;


use Illuminate\Console\Command;

class SlotCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "slot";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Run slot game";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arrayRand = createRandomSlot();
        // sample array for test
        /*
        $arrayRand = array(
            '0' => 'J',
            '3' => 'J',
            '6' => 'J',
            '9' => 'Q',
            '12' => 'K',
            '1' => 'cat',
            '4' => 'J',
            '7' => 'Q',
            '10' => 'monkey',
            '13' => 'bird',
            '2' => 'bird',
            '5' => 'bird',
            '8' => 'J',
            '11' => 'Q',
            '14' => 'A',
        );
        */



        $paylineArray = [[0, 3, 6, 9, 12], [1, 4, 7, 10, 13], [2, 5, 8, 11, 14], [0, 4, 8, 10, 12], [2, 4, 6, 10, 14]];
        $amount = 100;

        $calculate = calculateSlot($paylineArray, $arrayRand, $amount);

        $this->newLine(1);
        $this->info('board: ' . json_encode(array_values($arrayRand)));
        $this->info('paylines: ' . json_encode($calculate['paylines']));
        $this->info('bet_amount: ' . $amount);
        $this->info('total_win: ' . $calculate['points']);
        if ($this->confirm('Do You want to repeat game?', 'y')) {
            $this->handle();
        }
    }
}

