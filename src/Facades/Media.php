<?php

namespace ErisRayanesh\ICheetahStaticClient\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * Class Media
 * @method static \Psr\Http\Message\ResponseInterface getFiles(string $uri)
 * @method static \Psr\Http\Message\ResponseInterface getDirectories(string $uri)
 * @method static \Psr\Http\Message\ResponseInterface browse(string $uri, bool $directories = true, bool $files = true)
 * @method static string getUri()
 * @method \ErisRayanesh\ICheetahStaticClient\Manager setUri(string $uri)
 * @method static string getKey()
 * @method \ErisRayanesh\ICheetahStaticClient\Manager setKey(string $uri)
 */
class Media extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'media';
    }
}
