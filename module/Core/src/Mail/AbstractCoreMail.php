<?php

namespace Core\Mail;
use Zend\View\View;
use Zend\Mail\Message;
use Zend\Mime\Part as MimePart;
use Zend\Mime\Message as MimeMessage;
use Zend\Mail\Transport\Smtp as SmtTransport;

abstract class AbstractCoreMail
{
    protected $transport;
    protected $view;
    protected $boby;
    protected $message;
    protected $subject;
    protected $to;
    protected $replyTo;
    protected $data;
    protected $page;
    protected $cc;

    function __construct(SmtTransport $transport, View $view, $page) 
    {
        $this->transport = $transport;
        $this->view = $view;
        $this->page = $page;
    }
	
	function setTransport($transport): self {
		$this->transport = $transport;
		return $this;
	}
	
	function setView($view): self {
		$this->view = $view;
		return $this;
	}

	function setBoby($boby): self {
		$this->boby = $boby;
		return $this;
	}
	
	function setMessage($message): self {
		$this->message = $message;
		return $this;
	}
	
	function setSubject($subject): self {
		$this->subject = $subject;
		return $this;
	}
	
	function setTo($to): self {
		$this->to = $to;
		return $this;
	}
	
	function setReplyTo($replyTo): self {
		$this->replyTo = $replyTo;
		return $this;
	}
	
	function setData($data): self {
		$this->data = $data;
		return $this;
	}
	
	function setPage($page): self {
		$this->page = $page;
		return $this;
	}
	
	function setCc($cc): self {
		$this->cc = $cc;
		return $this;
    }

    abstract function renderView($page, array $data);
    
    function prepare(){
        $html = new MimePart($this->renderView($this->page, $this->data));
        $html->type = 'text/html';

        $body = new MimeMessage();
        $body->setParts([$html]);
        $this->body = $body;
        $config = $this->transport->getOptions()->toArray();
        $this->message = new Message();
		$this->message->addFrom($config['connection_config']['from'])
			->addTo($this->to)
			->setSubject($this->subject)
			->setBody($this->boby);

		if($this->cc){
			$this->message->addCc($this->cc);
		}
		if($this->replyTo){
			$this->message->addCc($this->replyTo);
		}
		return $this;
	}
	
	function send(){
		$this->transport->send($this->message);
	}
}
