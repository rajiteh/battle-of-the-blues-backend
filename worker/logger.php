<?php

class BotB_Resque_Log extends Psr\Log\AbstractLogger 
{
    public $verbose;
    public $worker;

    public function __construct($verbose = false) {
        $this->verbose = $verbose;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed   $level    PSR-3 log level constant, or equivalent string
     * @param string  $message  Message to log, may contain a { placeholder }
     * @param array   $context  Variables to replace { placeholder }
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        $log_line = '[' . $level . ']';
        if ($this->worker) $log_line .= ' ['.$this->worker.']';
        if ($this->verbose) {
            fwrite(
                STDOUT,
                $log_line . ' [' . strftime('%T %Y-%m-%d') . '] ' . $this->interpolate($message, $context) . PHP_EOL
            );
            return;
        }

        if (!($level === Psr\Log\LogLevel::INFO || $level === Psr\Log\LogLevel::DEBUG)) {
            fwrite(
                STDOUT,
                $log_line . ' ' . $this->interpolate($message, $context) . PHP_EOL
            );
        }
    }

    /**
     * Fill placeholders with the provided context
     * @author Jordi Boggiano j.boggiano@seld.be
     * 
     * @param  string  $message  Message to be logged
     * @param  array   $context  Array of variables to use in message
     * @return string
     */
    public function interpolate($message, array $context = array())
    {
        // build a replacement array with braces around the context keys
        $replace = array();
        foreach ($context as $key => $val) {
            $replace['{' . $key . '}'] = $val;
        }
        // interpolate replacement values into the message and return
        return strtr($message, $replace);
    }

    public function setWorker($worker)
    {
        $this->worker = $worker;
    }

    public function setVerbosity($v)
    {
        $this->verbose = $v;
    }
}

$logger = new BotB_Resque_Log($logLevel);