<?php
    function logError($data): void
    {
        $console = $data;
        if (is_array($console))
        {
            $console = implode(',', $console);
        }

        echo "<script>console.error('ERROR: " . $console . "' );</script>";
    }
    function logInfo($data): void
    {
        $console = $data;
        if (is_array($console))
        {
            $console = implode(',', $console);
        }

        echo "<script>console.log('Info: " . $console . "' );</script>";
    }