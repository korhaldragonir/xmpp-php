<?php

namespace Norgul\Xmpp\Authentication\AuthTypes;

use Norgul\Xmpp\Options;
use Norgul\Xmpp\Xml\Xml;

class Plain implements Authenticable
{
    protected $name = 'PLAIN';
    protected $options;

    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function encodedCredentials(): string
    {
        $credentials = "\x00{$this->options->getUsername()}\x00{$this->options->getPassword()}";
        return XML::quote(base64_encode($credentials));
    }
}