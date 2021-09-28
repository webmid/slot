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
        $array = [9, 10, 'J', 'Q', 'K', 'A', 'cat', 'dog', 'monkey', 'bird'];
        //create random array ( There are several ways for create it)
        $arrayRand = array(
            '0' => $array[array_rand($array)],
            '3' => $array[array_rand($array)],
            '6' => $array[array_rand($array)],
            '9' => $array[array_rand($array)],
            '12' => $array[array_rand($array)],
            '1' => $array[array_rand($array)],
            '4' => $array[array_rand($array)],
            '7' => $array[array_rand($array)],
            '10' => $array[array_rand($array)],
            '13' => $array[array_rand($array)],
            '2' => $array[array_rand($array)],
            '5' => $array[array_rand($array)],
            '8' => $array[array_rand($array)],
            '11' => $array[array_rand($array)],
            '14' => $array[array_rand($array)],
        );
        // Your sample array for test
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

        $calculate = json_decode(calculateSlot($paylineArray, $arrayRand, $amount));

        $this->newLine(1);
        $this->info('board: ' . json_encode(array_values($arrayRand)));
        $this->info('paylines: ' . json_encode($calculate->paylines));
        $this->info('bet_amount: ' . $amount);
        $this->info('total_win: ' . $calculate->points);
        if ($this->confirm('Do You want to repeat game?', 'y')) {
            $this->handle();
        }
    }
}

