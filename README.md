Json
=================

Json is a simple plugin for ExpressionEngine 3 which help you in dealing with json data and json files.

Using this plugin is quite simple you just have to know what are the parameters and the variables that you can use.

This plugin has three parameters:
1. ref    (required) : use this paramter to show where the json file exist.
2. fields (required) : use this patameter to tell what the attributes or fields you need it from the json file.you will write the attribute as a list separated by space.
3. limit  (optional) : specify how many object you want  to display. limit must be a positive number.

The variable that you can use it are the fields that you write it in fields parameter.

To make it more clearly, I will give to example:

let assume that we have a json file called test, and this file is exist in your device in : C:\Users\User\Downloads\test.json
this file have the following data:

[
	{
		"title" : "Title 1",
		"image" : "http://www.muzedevelopment.com/wp-content/uploads/2013/02/ee-banner.png"
	},
	{
		"title" : "Title 2",
		"image" : "https://smhttp-ssl-22930.nexcesscdn.net/asset/img/welcome-home.png"
	}
]

First Example:
		{exp:json ref = 'C:\Users\User\Downloads\test.json' fields = "title image"}
            <div>
                <p>{title}</p>
                <img src = "{img}" , alt = "{title}">
            </div>
        {/exp:json}

   	The result will be html code:
      	<div>
                <p>Title 1</p>
                <img src = "http://www.muzedevelopment.com/wp-content/uploads/2013/02/ee-banner.png" , alt = "Title 1">
        </div>
        <div>
                <p>Title 2</p>
                <img src = "https://smhttp-ssl-22930.nexcesscdn.net/asset/img/welcome-home.png" , alt = "Title 2">
        </div>


Second Example:
		{exp:json ref = 'C:\Users\User\Downloads\test.json' fields = "title image" limit = "1"}
            <div>
                <p>{title}</p>
                <img src = "{img}" , alt = "{title}">
            </div>
        {/exp:json}

   	The result will be html code:
       	<div>
                <p>Title 1</p>
                <img src = "http://www.muzedevelopment.com/wp-content/uploads/2013/02/ee-banner.png" , alt = "Title 1">
        </div>
            
