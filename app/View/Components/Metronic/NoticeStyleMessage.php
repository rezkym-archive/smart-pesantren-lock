<?php

namespace View\Components\Metronic;

use Illuminate\View\Component;

class NoticeStyleMessage extends Component
{
    /**
     * The message type.
     *
     * @var string
     */
    public $type;

    /**
     * message.
     *
     * @var string
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.metronic.notice-style-message');
    }
}
