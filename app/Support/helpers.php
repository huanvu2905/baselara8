<?php

declare(strict_types=1);

use Illuminate\Support\Collection;

if (! function_exists('nl2br_e')) {
    /**
     * Combine "nl2br" and "e" function
     *
     * @param string
     * @return string
     */
    function nl2br_e(?string $text): ?string
    {
        return nl2br(e($text));
    }
}

if (! function_exists('post_thumb')) {
    /**
     * Get the thumbnail of image
     *
     * @param string $path
     * @return array
     */
    function post_thumb(string $path = null): string
    {
        $array = explode('.', $path);

        return $array[0] . '_540_350' . '.' . $array[1];
    }
}