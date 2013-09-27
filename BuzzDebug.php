<?php
namespace Sensio\Bundle\BuzzBundle;

use Buzz\Browser;
use Symfony\Component\Stopwatch\Stopwatch;

class BuzzDebug
{
    protected $browser, $stopwatch;

    protected $name, $context;

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
    public function get($uri, $headers)
    {
        $this->stopwatch->start($this->name, $this->context);

        $result = $this->browser->get($uri, $headers);

        $this->stopwatch->stop($name, $context);

        return $result;
    }

    
    public function setName($name)
    {
        $this->name = $name;
    }


    public function setContext($context)
    {
        $this->context = $context;
    }
}
