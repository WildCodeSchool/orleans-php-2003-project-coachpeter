<?php

namespace App\Controller;

use Symfony\Component\ErrorHandler\ErrorRenderer\ErrorRendererInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * Renders error or exception pages from a given FlattenException.
 *
 * @author Yonel Ceruto <yonelceruto@gmail.com>
 * @author Matthias Pigulla <mp@webfactory.de>
 */
class ErrorController
{
    private $kernel;
    private $controller;
    private $errorRenderer;

    public function __construct(
        HttpKernelInterface $kernel,
        ErrorController $controller,
        ErrorRendererInterface $errorRenderer
    ) {
        $this->kernel = $kernel;
        $this->controller = $controller;
        $this->errorRenderer = $errorRenderer;
    }
    public function __invoke(\Throwable $exception): Response
    {
        dd($this->errorRenderer);
        $exception = $this->errorRenderer->render($exception);
        return new Response($exception->getAsString(), $exception->getStatusCode(), $exception->getHeaders());
    }
    public function preview(Request $request, int $code): Response
    {
        /*
         * This Request mimics the parameters set by
         * \Symfony\Component\HttpKernel\EventListener\ErrorListener::duplicateRequest, with
         * the additional "showException" flag.
         */
        $subRequest = $request->duplicate(null, null, [
            '_controller' => $this->controller,
            'exception' => new HttpException($code, 'This is a sample exception.'),
            'logger' => null,
            'showException' => false,
        ]);
        return $this->kernel->handle($subRequest, HttpKernelInterface::SUB_REQUEST);
    }
}
