<?php

namespace App\Http\Helpers;

class SanitizationHelper
{
    /**
     * Sanitize a string input
     */
    public static function sanitizeString($input, $maxLength = null)
    {
        if (is_null($input)) {
            return null;
        }

        // Convert to string and trim whitespace
        $sanitized = trim((string) $input);
        
        // Remove null bytes
        $sanitized = str_replace("\0", '', $sanitized);
        
        // Remove control characters except newlines and tabs
        $sanitized = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $sanitized);
        
        // Limit length if specified
        if ($maxLength && strlen($sanitized) > $maxLength) {
            $sanitized = substr($sanitized, 0, $maxLength);
        }
        
        return $sanitized;
    }

    /**
     * Sanitize an integer input
     */
    public static function sanitizeInteger($input, $min = null, $max = null)
    {
        if (is_null($input)) {
            return null;
        }

        $sanitized = (int) $input;
        
        if ($min !== null && $sanitized < $min) {
            $sanitized = $min;
        }
        
        if ($max !== null && $sanitized > $max) {
            $sanitized = $max;
        }
        
        return $sanitized;
    }

    /**
     * Sanitize a boolean input
     */
    public static function sanitizeBoolean($input)
    {
        if (is_null($input)) {
            return false;
        }

        return filter_var($input, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;
    }

    /**
     * Sanitize an email input
     */
    public static function sanitizeEmail($input)
    {
        if (is_null($input)) {
            return null;
        }

        $sanitized = self::sanitizeString($input);
        
        if (empty($sanitized)) {
            return null;
        }

        return filter_var($sanitized, FILTER_SANITIZE_EMAIL);
    }

    /**
     * Sanitize a URL input
     */
    public static function sanitizeUrl($input)
    {
        if (is_null($input)) {
            return null;
        }

        $sanitized = self::sanitizeString($input);
        
        if (empty($sanitized)) {
            return null;
        }

        return filter_var($sanitized, FILTER_SANITIZE_URL);
    }

    /**
     * Sanitize a date input
     */
    public static function sanitizeDate($input, $format = 'Y-m-d')
    {
        if (is_null($input)) {
            return null;
        }

        $sanitized = self::sanitizeString($input);
        
        if (empty($sanitized)) {
            return null;
        }

        try {
            $date = \DateTime::createFromFormat($format, $sanitized);
            return $date ? $date->format($format) : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Sanitize JSON input
     */
    public static function sanitizeJson($input)
    {
        if (is_null($input)) {
            return null;
        }

        // If it's already an array or object, return as is
        if (is_array($input) || is_object($input)) {
            return $input;
        }

        $sanitized = self::sanitizeString($input);
        
        if (empty($sanitized)) {
            return null;
        }

        // Fix common JSON issues
        $sanitized = str_replace("'", '"', $sanitized);
        
        $decoded = json_decode($sanitized, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }

        return $decoded;
    }

    /**
     * Sanitize an array of strings
     */
    public static function sanitizeStringArray($input, $maxLength = null)
    {
        if (!is_array($input)) {
            return [];
        }

        return array_map(function($item) use ($maxLength) {
            return self::sanitizeString($item, $maxLength);
        }, $input);
    }

    /**
     * Sanitize an array of integers
     */
    public static function sanitizeIntegerArray($input, $min = null, $max = null)
    {
        if (!is_array($input)) {
            return [];
        }

        return array_map(function($item) use ($min, $max) {
            return self::sanitizeInteger($item, $min, $max);
        }, $input);
    }

    /**
     * Sanitize education data array
     */
    public static function sanitizeEducationData($educations)
    {
        if (!is_array($educations)) {
            return [];
        }

        $sanitized = [];
        
        foreach ($educations as $education) {
            if (!is_array($education)) {
                continue;
            }

            $sanitized[] = [
                'institution' => self::sanitizeString($education['institution'] ?? '', 255),
                'field_of_study' => self::sanitizeString($education['field_of_study'] ?? '', 255),
                'degree' => self::sanitizeString($education['degree'] ?? '', 255),
                'start_date' => self::sanitizeDate($education['start_date'] ?? null),
                'end_date' => self::sanitizeDate($education['end_date'] ?? null),
                'description' => self::sanitizeString($education['description'] ?? '', 1000),
                'status' => self::sanitizeInteger($education['status'] ?? 1, 0, 1)
            ];
        }

        return $sanitized;
    }

    /**
     * Sanitize meta data array
     */
    public static function sanitizeMetaData($metas)
    {
        if (!is_array($metas)) {
            return [];
        }

        $sanitized = [];
        
        foreach ($metas as $meta) {
            if (!is_array($meta)) {
                continue;
            }

            $sanitized[] = [
                'meta_key' => self::sanitizeString($meta['meta_key'] ?? '', 100),
                'meta_value' => self::sanitizeString($meta['meta_value'] ?? '', 1000),
                'meta_status' => self::sanitizeInteger($meta['meta_status'] ?? 1, 0, 1)
            ];
        }

        return $sanitized;
    }

    /**
     * Sanitize category IDs array
     */
    public static function sanitizeCategoryIds($categories)
    {
        if (is_string($categories)) {
            $categories = explode(',', $categories);
        }

        if (!is_array($categories)) {
            return [];
        }

        return self::sanitizeIntegerArray($categories, 1);
    }

    /**
     * Sanitize search query
     */
    public static function sanitizeSearchQuery($query)
    {
        $sanitized = self::sanitizeString($query, 100);
        
        if (empty($sanitized)) {
            return '';
        }

        // Remove special characters that could be used for SQL injection
        $sanitized = preg_replace('/[<>"\']/', '', $sanitized);
        
        return $sanitized;
    }

    /**
     * Sanitize username
     */
    public static function sanitizeUsername($username)
    {
        $sanitized = self::sanitizeString($username, 50);
        
        if (empty($sanitized)) {
            return null;
        }

        // Remove special characters, keep only alphanumeric, underscore, and dash
        $sanitized = preg_replace('/[^a-zA-Z0-9_-]/', '', $sanitized);
        
        return $sanitized;
    }

    /**
     * Sanitize phone number
     */
    public static function sanitizePhoneNumber($phone)
    {
        $sanitized = self::sanitizeString($phone, 20);
        
        if (empty($sanitized)) {
            return null;
        }

        // Remove all non-numeric characters except + at the beginning
        $sanitized = preg_replace('/[^0-9+]/', '', $sanitized);
        
        return $sanitized;
    }

    /**
     * Sanitize profile visibility JSON
     */
    public static function sanitizeProfileVisibility($visibility)
    {
        $sanitized = self::sanitizeJson($visibility);
        
        if (!is_array($sanitized)) {
            return [];
        }

        // Define allowed visibility keys
        $allowedKeys = ['email', 'phone', 'address', 'dob', 'education', 'work'];
        
        $result = [];
        foreach ($sanitized as $key => $value) {
            if (in_array($key, $allowedKeys)) {
                $result[$key] = self::sanitizeBoolean($value);
            }
        }

        return $result;
    }

    /**
     * Sanitize post location data array
     */
    public static function sanitizePostLocations($postLocations)
    {
        if (!is_array($postLocations)) {
            return [];
        }

        $sanitized = [];
        
        foreach ($postLocations as $location) {
            if (!is_array($location)) {
                continue;
            }

            $sanitized[] = [
                'post_type' => self::sanitizeInteger($location['post_type'] ?? 1, 1, 2),
                'place_name' => self::sanitizeString($location['place_name'] ?? null, 255),
                'lat' => self::sanitizeString($location['lat'] ?? null, 20), // Will be converted to decimal
                'lon' => self::sanitizeString($location['lon'] ?? null, 20), // Will be converted to decimal
                'address' => self::sanitizeString($location['address'] ?? null, 1000),
                'type' => self::sanitizeString($location['type'] ?? null, 255),
                'place_id' => self::sanitizeString($location['place_id'] ?? null, 255),
                'place_rank' => self::sanitizeInteger($location['place_rank'] ?? null),
                'name' => self::sanitizeString($location['name'] ?? null, 255)
            ];
        }

        return $sanitized;
    }
    /**
     * Sanitize a float input
     */
    public static function sanitizeFloat($input)
    {
        if (is_null($input)) {
            return null;
        }
        return (float) $input;
    }
}
