<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Json{
    /*
    plugin information
    */
    public static $name         = 'Json';
    public static $version      = '1.0.3';
    public static $author       = 'Ahmmad Saleh';
    public static $author_url   = 'https://github.com/ahmmadsaleh86';
    public static $description  = 'This plugin will help you in open and read data from json file';
    public static $typography   = FALSE;

    /*
        plugin attribute
    */

    public $return_data = '';

    public $ref = '';
    public $fields = array();
    public $limit;

    //constructer which get the parameter and call read method
    public function __construct(){
        $this->ref = ee()->TMPL->fetch_param('ref');
        $this->fields = explode(" " , ee()->TMPL->fetch_param('fields'));
        $this->limit = ee()->TMPL->fetch_param('limit' , 0);

        $this->return_data = $this->read();
    }

    /*
        the read method do the following:
        1.open json file
        2.decode json data
        3.replace the variable with its data
    */
    public function read(){
        $str = file_get_contents($this->ref);
        $data = json_decode($str, true); 

        $output = "";
        $count = 0;
        
        foreach($data as $value){
            if ($this->limit != 0 && $count == $this->limit)
                break;

            $str = ee()->TMPL->tagdata;
            foreach($this->fields as $field){
                $str = str_replace("{".$field."}" , $value["".$field] , $str);
            }
            $output = $output . $str . "\n";
            $count++;
        }
        return $output;
    }

    public static function usage(){
        ob_start();  ?>

        This plugin will help you in open and read data from json file.

        you can use it easilty by sending where the json file is as a ref parameter 
        and also send the json parameter that you want to use as a string of json parameters separated by space and assign it to fields parameter. 

        To make it clear follow the example:
        imagine that we have a json file called test.json have the following data:
            [
                {
                    "title" : "Title1",
                    "img" : "../assets/img/1.png"
                },
                {
                    "title" : "Title2",
                    "img" : "../assets/img/2.png"
                }
            ]
        and this file locate in assets/json/test/json

        {exp:json ref = '../assets/json/test.json' fields = "title img"}
            <div>
                <p>{title}</p>
                <img src = "{img}" , alt = "{title}">
            </div>
        {/exp:json}

        as you can see what you write in the fields parameter , you can use it as variables inside the json tag.

        You can also use limit parameter which take positive number to specify the number of data to display.


        <?php
        $buffer = ob_get_contents();
        ob_end_clean();

        return $buffer;
    }
}


