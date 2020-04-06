<?php

namespace SwedbankPay;

/**
  * This class replaces PHP's PHP's extremely buggy realpath().
  * https://stackoverflow.com/a/4050444/61818
  *
  */
class PathResolver
{
    /**
      * Resolves the path.
      *
      * @param string $path The original path.
      * @return string The resolved path (it might not exist).
      */
    public function resolve($path) : string
    {
        $isUnixPath = $this->isUnixPath($path);
        $path = $this->absolutizeStart($path);
        $path = $this->enforceSeparator($path);
        $path = $this->absolutizeStart($path);
        $path = $this->absolutizeParts($path);
        $path = $this->resolveSymlinks($path);
        $path = $this->root($path, $isUnixPath);

        return $path;
    }


    /**
      * Attempts to detect if path is relative; in which case, prepend the
      * current working directory.
      *
      * @param string $path The path to make absolute.
      * @return string The absolute path.
      */
    private function absolutizeStart($path) : string
    {
        $isUnixPath = $this->isUnixPath($path);

        if (strpos($path, ':') === false && $isUnixPath) {
            return getcwd() . DIRECTORY_SEPARATOR . $path;
        }

        return $path;
    }


    /**
      * Enforce DIRECTORY_SEPARATOR as a directory separator.
      *
      * @param string $path The path to enforce.
      * @return string The enforced path.
      */
    private function enforceSeparator($path) : string
    {
        $search = array('/', '\\');
        $replacement = DIRECTORY_SEPARATOR;
        return str_replace($search, $replacement, $path);
    }


    /**
      * Makes the directories (parts) of the path absolute.
      *
      * @param string $path The path to make absolute.
      * @return string The absolute path.
      */
    private function absolutizeParts($path) : string
    {
        $segments = explode(DIRECTORY_SEPARATOR, $path);
        $parts = array_filter($segments, 'strlen');
        $absolutes = array();

        foreach ($parts as $part) {
            if ('.'  == $part) {
                continue;
            }

            if ('..' == $part) {
                array_pop($absolutes);
                continue;
            }

            $absolutes[] = $part;
        }

        return implode(DIRECTORY_SEPARATOR, $absolutes);
    }


    /**
     * Resolve any symbolic links in the path.
     *
     * @param string $path The in which to resolve symbolic links.
     * @return string The resolved path.
     */
    private function resolveSymlinks($path) : string
    {
        // phpcs:disable
        if (file_exists($path) && linkinfo($path) > 0) {
            return readlink($path);
        }
        // phpcs:enable

        return $path;
    }


    /**
      * Checks whether the path is a Unix path or not.
      *
      * @param string $path The path to check.
      * @return bool true if the path is a Unix path; otherwise false.
      */
    private function isUnixPath($path) : bool
    {
        if (strlen($path) == 0 || $path[0] != '/') {
            return true;
        }

        return false;
    }


    /**
      * Ensure that the path is rooted.
      *
      * @param string $path The potentially unrooted path.
      * @param bool $isUnixPath Indicates whether the path is a Unix path.
      * @return string The rooted path.
      */
    private function root($path, $isUnixPath) : string
    {
        if ($isUnixPath) {
            return $path;
        }

        return DIRECTORY_SEPARATOR . $path;
    }
}
