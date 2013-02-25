<?php


class RegloCommon
{
    /**
     * 
     * @param string $string
     * @return string
     */
    public static function sanitizedHTMLString($string)
    {
        return (strip_tags($string, "<b><i><li><ul><ol><u><p><br>"));
    }
}

?>
