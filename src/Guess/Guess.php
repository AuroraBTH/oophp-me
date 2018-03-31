<?php

namespace Aurora\Guess;

/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */

    private $number;
    private $tries;



    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the number if null is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */
    public function __construct(int $number = -1, int $tries = 6)
    {
        if ($number == -1) {
            $this->number = $this->random();
        } elseif ($number != -1) {
            $this->number = $number;
        }

        $this->tries = $tries;
    }



    /**
     * Randomize the secret number between 1 and 100 to initiate a new game.
     *
     * @return int $random
     */
    public function random()
    {
        $random = rand(1, 100);

        return $random;
    }



    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */
    public function tries()
    {
        return $this->tries;
    }



    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */
    public function number()
    {
        return $this->number;
    }



    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or to high or if no guesses remains.
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return boolean to show the status of the guess made.
     */
    public function makeGuess(int $number)
    {
        if ($number > 0 && $number <= 100) {
            if ($number == $this->number) {
                return true;
            } elseif ($number != $this->number) {
                $this->tries--;
                return false;
            }
        } else {
            throw new GuessOutOfRange("Your guess out of range (1-100).");
        }
    }
}
