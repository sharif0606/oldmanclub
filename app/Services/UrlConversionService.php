<?php

namespace App\Services;

class UrlConversionService
{
    /**
     * Convert URLs in text to HTML anchor tags
     *
     * @param string $text
     * @return string
     */
    public function convertUrlsToLinks(string $text): string
    {
        // Pattern to match URLs (http/https/www/domain.com)
        $pattern = '/(?:(?:https?:\/\/)|(?:www\.)|(?:[a-zA-Z0-9-]+\.[a-zA-Z]{2,}))(?:[^\s<>"]+)?/i';
        
        return preg_replace_callback($pattern, function($matches) {
            $url = $matches[0];
            $displayText = $url;
            
            // Add protocol if missing
            if (!preg_match('/^https?:\/\//', $url)) {
                if (strpos($url, 'www.') === 0) {
                    $fullUrl = 'http://' . $url;
                } else {
                    $fullUrl = 'http://' . $url;
                }
            } else {
                $fullUrl = $url;
            }
            
            // Clean up display text (remove protocol for display)
            $displayText = preg_replace('/^https?:\/\//', '', $displayText);
            $displayText = preg_replace('/^www\./', '', $displayText);
            
            return '<a href="' . htmlspecialchars($fullUrl) . '" target="_blank">' . htmlspecialchars($displayText) . '</a>';
        }, $text);
    }

    /**
     * Check if text contains any URLs
     *
     * @param string $text
     * @return bool
     */
    public function containsUrls(string $text): bool
    {
        $pattern = '/(?:(?:https?:\/\/)|(?:www\.)|(?:[a-zA-Z0-9-]+\.[a-zA-Z]{2,}))(?:[^\s<>"]+)?/i';
        return preg_match($pattern, $text) === 1;
    }

    /**
     * Extract all URLs from text
     *
     * @param string $text
     * @return array
     */
    public function extractUrls(string $text): array
    {
        $pattern = '/(?:(?:https?:\/\/)|(?:www\.)|(?:[a-zA-Z0-9-]+\.[a-zA-Z]{2,}))(?:[^\s<>"]+)?/i';
        preg_match_all($pattern, $text, $matches);
        return $matches[0] ?? [];
    }

    /**
     * Process text content with URL conversion and other formatting
     *
     * @param string $text
     * @param array $allowedTags
     * @return string
     */
    public function processTextContent($text, array $allowedTags = ['<b>', '<i>', '<u>','<h1>','<p>','<br/>','<br>'])
    {
        if($text == null){
            return null;
        }
        if($text == ''){
            return '';
        }
        // Normalize line breaks
        $content = preg_replace('/\R{2,}/', "\n", $text);
        
        // Remove HTML tags except allowed ones
        $allowedTagsString = implode('', $allowedTags);
        $content = strip_tags($content, $allowedTagsString);
        
        // Convert URLs to links
        $content = $this->convertUrlsToLinks($content);
        
        return $content;
    }
}