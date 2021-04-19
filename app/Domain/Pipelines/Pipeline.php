<?php


namespace App\Domain\Pipelines;



interface Pipeline
{
    public function handle($content, \Closure $next);

}
