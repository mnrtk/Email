<?php

namespace Mail;

class EmailSender
{
    /**
     * Sender of the email
     * @var string
     */
    protected string $fromAddress;

    /**
     * @var string|null
     */
    protected ?string $fromName;

    /**
     * @var string
     */
    protected string $address;

    /**
     * @var string|null
     */
    protected ?string $name;

    /**
     * @var string
     */
    protected string $cc;

    /**
     * @var string
     */
    protected string $bcc;

    /**
     * @var string|null
     */
    protected ?string $replyTo;

    /**
     * @param string $fromAddress
     * @param string $address
     * @param string|null $name
     * @param string $cc
     * @param string $bcc
     * @param string|null $replyTo
     */
    public function __construct(string $fromAddress,?string $fromName, string $address, ?string $name, string $cc, string $bcc, ?string $replyTo)
    {
        $this->fromAddress = $fromAddress;
        $this->fromName = $fromName;
        $this->address = $address;
        $this->name = $name;
        $this->cc = $cc;
        $this->bcc = $bcc;
        $this->replyTo = $replyTo;
    }

    /**
     * @return string
     */
    public function getFromAddress(): string
    {
        return $this->fromAddress;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCc(): string
    {
        return $this->cc;
    }

    /**
     * @return string
     */
    public function getBcc(): string
    {
        return $this->bcc;
    }

    /**
     * @return string|null
     */
    public function getReplyTo(): ?string
    {
        return $this->replyTo;
    }

    /**
     * @return string|null
     */
    public function getFromName(): ?string
    {
        return $this->fromName;
    }


}