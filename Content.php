<?php


class Content
{
    /**
     * @var bool
     */
    protected bool $isHtml;

    /**
     * @var string
     */
    protected string $subject;

    /**
     * @var string
     */
    protected string $body;

    /**
     * @var string
     */
    protected string $altBody;

    /**
     * @param bool $isHtml
     * @param string $subject
     * @param string $body
     * @param string $altBody
     */
    public function __construct(bool $isHtml, string $subject, string $body, string $altBody)
    {
        $this->isHtml = $isHtml;
        $this->subject = $subject;
        $this->body = $body;
        $this->altBody = $altBody;
    }

    /**
     * @return bool
     */
    public function isHtml(): bool
    {
        return $this->isHtml;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getAltBody(): string
    {
        return $this->altBody;
    }


}