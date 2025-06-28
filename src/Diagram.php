<?php

namespace LaraCare\SchemaVisualizr;

class Diagram
{
    public string $message;

    public function __construct()
    {
        $this->message = <<<EOL
            🌟--------------------------------------------------🌟<br>
            Welcome to LaraCare DObj<br>
            Your Data Objects, Cleaner and Smarter in Laravel!<br>
            Thank you for using our package 💙<br>
            🌟--------------------------------------------------🌟
            EOL;

        info(strip_tags($this->message)); // still logs a plain version
    }

    public function __toString(): string
    {
        return $this->message;
    }
}