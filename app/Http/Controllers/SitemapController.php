<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\DhammaSession;
use App\Models\Media;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $quotes = Quote::where('is_active', true)->get();
        $sessions = DhammaSession::where('is_active', true)->get();
        $media = Media::where('is_active', true)->get();

        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        // Homepage
        $sitemap .= $this->addUrl(route('home'), now(), 'daily', '1.0');
        
        // Static pages
        $sitemap .= $this->addUrl(route('about'), now(), 'monthly', '0.8');
        $sitemap .= $this->addUrl(route('contact'), now(), 'monthly', '0.8');
        $sitemap .= $this->addUrl(route('quotes.index'), now(), 'daily', '0.9');
        $sitemap .= $this->addUrl(route('sessions.index'), now(), 'daily', '0.9');
        $sitemap .= $this->addUrl(route('gallery.index'), now(), 'weekly', '0.8');
        $sitemap .= $this->addUrl(route('gallery.teachings'), now(), 'weekly', '0.8');
        
        // Dynamic quote pages
        foreach ($quotes as $quote) {
            $sitemap .= $this->addUrl(
                route('quotes.show', $quote),
                $quote->updated_at,
                'weekly',
                '0.7'
            );
        }
        
        // Dynamic session pages
        foreach ($sessions as $session) {
            $sitemap .= $this->addUrl(
                route('sessions.show', $session),
                $session->updated_at,
                'weekly',
                '0.7'
            );
        }
        
        $sitemap .= '</urlset>';
        
        return response($sitemap, 200)->header('Content-Type', 'application/xml');
    }
    
    private function addUrl(string $loc, $lastmod, string $changefreq, string $priority): string
    {
        $url = '<url>';
        $url .= '<loc>' . htmlspecialchars($loc) . '</loc>';
        $url .= '<lastmod>' . $lastmod->format('Y-m-d') . '</lastmod>';
        $url .= '<changefreq>' . $changefreq . '</changefreq>';
        $url .= '<priority>' . $priority . '</priority>';
        $url .= '</url>';
        
        return $url;
    }
}
