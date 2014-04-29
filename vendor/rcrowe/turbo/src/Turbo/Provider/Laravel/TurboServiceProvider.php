<?php

/**
 * Think turbolinks but for your PHP application.
 *
 * @author Rob Crowe <hello@vivalacrowe.com>
 * @license MIT
 */

namespace Turbo\Provider\Laravel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Brings the power of Turbo/PJAX to Laravel.
 */
class TurboServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */

    protected $defer = false;

    public function register()
    {
        $app = $this->app;

        $this->app->after(function($request, $response) use ($app)
        {
            // Only handle non-redirections
            if (!$response->isRedirection()) {
                // Must be a pjax-request
                if ($request->server->get('HTTP_X_PJAX')) {
                    $crawler = new Crawler($response->getContent());

                    // Filter to title (in order to update the browser title bar)
                    $response_title = $crawler->filter('head > title');

                    // Filter to given container
                    $response_container = $crawler->filter($request->server->get('HTTP_X_PJAX_CONTAINER'));

                    // Container must exist
                    if ($response_container->count() != 0) {

                        $title = '';
                        // If a title-attribute exists
                        if ($response_title->count() != 0) {
                            $title = '<title>' . $response_title->html() . '</title>';
                        }
                        $response->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
                        $response->header('Pragma', 'no-cache');
                        // Set new content for the response
                        $response->setContent($title . $response_container->html());
                    }

                    // Updating address bar with the last URL in case there were redirects
                    $response->header('X-PJAX-URL', $request->getRequestUri());
                }
            }
        });
    }

    public function provides()
    {
        return array();
    }

}
