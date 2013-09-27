<?php
namespace Sension\Bundle\BuzzBundle;

use Buzz\Browser;
use Symfony\Component\Stopwatch\Stopwatch;

class BuzzDebug
{
    protected $browser, $stopwatch;

    public function __construct(Browser $browser, Stopwatch $stopwatch)
    {
        if (!$stopwatch) {
            $this->stopwatch = new Stopwatch();
        } else {
            $this->stopwatch = $stopwatch;
        }

        $this->browser = $browser;
    }


    /**
     * Calling an URL via GET and provide a name for the
     * current call in the timeline as well as a context
     **/
    public function get($uri, $headers, $name, $context)
    {
        $this->stopwatch->start($name, $context);

        $result = $this->browser->get($uri, $headers);

        $this->stopwatch->stop($name, $context);

        return $result;
    }
}
