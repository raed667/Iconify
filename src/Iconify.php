<?php

namespace Iconify;

/**
 * Description of Iconify
 *
 * @author Raed CHAMMAM
 */
class Iconify {

    const NUMERIC_ICON = "glyphicon-stop";
    const CHAR_COLOR = "black";

    /*
     * Buffer with the corresponding icons and colors
     * Each element of the buffer is an array with 2 keys "color" and "icon"
     */

    private $buffer = array();

    public function __construct() {
        
    }

    /*
     * Transforms a hash into a set of icons and colors
     * @input: string $hash
     * @output: array $buffer 
     */

    public function doIt($hash) {
        /*
         * Init the buffer 
         */
        $this->buffer = array();

        /*
         * Buffer to check the number of consecutive number.
         * @TODO : rename => numberBuffer
         */
        $col = 0;
        /*
         * Hash the input with SHA1, in order to have constant 
         * length with all the hashes idependetly from the user's input.
         * 
         * Then, put it into an array "$broken"
         */
        $broken = str_split(sha1($hash));


        /**
         * Loop all the characters in the array
         */
        for ($index = 0; $index < count($broken); $index++) {
            /*
             * Check if the current char is a number
             */
            if (is_numeric($broken[$index])) {
                $color = $this->colorify($broken[$index]);
                $col++;
                /*
                 * If this is a number coming after another number 
                 * Dispay them with the plain number icon
                 * and reset the counter
                 */
                if ($col == 2) {
                    $icon = self::NUMERIC_ICON;
                    $col = 0;
                }
                /*
                 * If this is the last charachter 
                 * Display the plain number icon
                 */
                if ($index == (count($broken) - 1)) {
                    $icon = self::NUMERIC_ICON;
                }
            } else {
                /*
                 * If not a number (a letter) 
                 *
                 * Get the appropirate Icon for the current charx
                 */
                $icon = $this->iconify($broken[$index]);
            }
            /*
             * If letter dosn't have a number after it 
             * We put the default color
             */
            if (isset($icon) && $icon != NULL) {
                if (!isset($color) || $color == -1) {
                    $color = self::CHAR_COLOR;
                }
            }
            /*
             * If we have a valid color and valid icon 
             * We add the current values to the buffer
             */
            if (isset($icon) && $color != NULL) {
                $unitBuffer = array();
                $unitBuffer["color"] = $color;
                //$unitBuffer["icon"] = 'glyphicon ' . $icon;
                $unitBuffer["icon"] = $icon;
                array_push($this->buffer, $unitBuffer);
            }
            /*
             * Finally reset color and icon for the next iteration
             */
            $color = NULL;
            $icon = NULL;
            $unitBuffer = NULL;
        }
        /*
         * Returns the buffer
         */
        return $this->buffer;
    }

    private function iconify($char) {
        if (strlen($char) != 1) {
            return -1;
        }
        if (!ctype_alpha($char)) {
            return -1;
        }
        $upper = strtoupper($char);
        switch ($upper) {
            case 'A':
                return "glyphicon-cloud";
            case 'B':
                return "glyphicon-envelope";
            case 'C':
                return "glyphicon-pencil";
            case 'D':
                return "glyphicon-heart";
            case 'E':
                return "glyphicon-star";
            case 'F':
                return "glyphicon-trash";
            case 'G':
                return "glyphicon-home";
            case 'H':
                return "glyphicon-road";
            case 'I':
                return "glyphicon-lock";
            case 'J':
                return "glyphicon-flag";
            case 'K':
                return "glyphicon-headphones";
            case 'L':
                return "glyphicon-camera";
            case 'M':
                return "glyphicon-gift";
            case 'N':
                return "glyphicon-fire";
            case 'O':
                return "glyphicon-eye-open";
            case 'P':
                return "glyphicon-plane";
            case 'Q':
                return "glyphicon-magnet";
            case 'R':
                return "glyphicon-bell";
            case 'S':
                return "glyphicon-globe";
            case 'T':
                return "glyphicon-phone-alt";
            case 'U':
                return "glyphicon-scissors";
            case 'V':
                return "glyphicon-sunglasses";
            case 'W':
                return "glyphicon--tree-deciduous";
            case 'X':
                return "glyphicon-remove";
            case 'Y':
                return "glyphicon-wrench";
            case 'Z':
                return "glyphicon-user";
        }
    }

    private function colorify($char) {
        if (strlen($char) != 1) {
            return -1;
        }
        if (!is_numeric($char)) {
            return -1;
        }
        $upper = strtoupper($char);
        switch ($upper) {
            case '0':
                return "#ff0000";
            case '1':
                return "#ff9100";
            case '2':
                return "#ddff00";
            case '3':
                return "#4cff00";
            case '4':
                return "#00ffd4";
            case '5':
                return "#0099ff";
            case '6':
                return "#0008ff";
            case '7':
                return "#ff00e5";
            case '8':
                return "#ff0055";
            case '9':
                return "#448700";
        }
    }

}
