<?php
class Result
{
    public bool $isFailure;
    public $content;

    public static function failure(string $errorMessage) : Result
    {
        return new Result(isFailure:true, content:$errorMessage);
    }

    public static function success($content = null) : Result
    {
        return new Result(isFailure:false, content:$content);
    }

    private function __construct(bool $isFailure, $content)
    {
        $this->isFailure = $isFailure;
        $this->content = $content;
    }
}