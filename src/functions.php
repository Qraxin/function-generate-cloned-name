<?php

if (!function_exists('generate_cloned_name')) {
    /**
     * Adds specific suffix for the source name and adds cloned index if the suffix exists.
     *
     * Examples:
     * Test name ===> Test name - Copy
     * Test name - Copy ===> Test name - Copy(1)
     * Test name - Copy(1) ===> Test name - Copy(2)
     *
     * @param string $sourceName
     * @param string $cloneSuffix
     * @return string
     */
    function generate_cloned_name(string $sourceName, string $cloneSuffix = ' - Copy'): string
    {
        if (preg_match("#$cloneSuffix(\(([0-9]+)\))?$#", $sourceName, $matches)) {

            if (isset($matches[2])) {
                $result = str_replace($matches[0], '', $sourceName);
                $result .= $cloneSuffix . '(' . ++$matches[2] . ')';
            } else {
                $result = $sourceName . '(1)';
            }

        } else {
            $result = $sourceName . $cloneSuffix;
        }

        return $result;
    }
}