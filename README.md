#Assetor
##Manage CSS and JS files with this Codeigniter library
by [Adrian Voicu - Avenirer](http://avenir.ro)

###Installation
Just copy the files from this package to the corresponding folder in your
application folder.  For example, copy Assetor/config/assetor.php to
application/config/assetor.php.

###Usage
In the package you will find example usage code in the Testlib controller.  The example code will show you how to use the library.

#### Set the configuration of the library

##### $config['version'] = '1';
Set version of css/js to force browser reload assets by adding "?ver=..." at the end of the file call.

##### $config['css_folder'] = 'assets/css/';
CSS folder relative to the main index.php;

##### $config['css_min_folder'] = 'assets/css/min/';
Compressed CSS folder relative to the main index.php. Leave blank if the folder is the same as $config['css_folder']

##### $config['gcc'] = FALSE;
Use Google's Closure Compiler for js compression/minify.

##### $config['gcc_level'] = 'WHITESPACE_ONLY';
If $config['gcc'] is set to TRUE, choose the level of compilation:
 * WHITESPACE_ONLY: only remove whitespaces and new lines
 * SIMPLE_OPTIMIZATIONS: do basic optimisations to the script
 * ADVANCED_OPTIMIZATIONS: do advanced optimisations
For more details go to: https://developers.google.com/closure/compiler/docs/api-ref

##### $config['js_folder'] = 'assets/js/';
JS folder relative to the main index.php

##### $config['js_min_folder'] = 'assets/css/min/';
Compressed/minified JS folder relative to the main index.php. Leave blank if the folder is the same as $config['js_folder']

#### Load the library
Now we load the library: I would rather load it in a MY_Controller if possible, but it's up to you where you load it

$this->load->library('assetor');

#### Load the assets
Then we load the assets, be it css or js.
If we only mention the files, they will all be loaded inside a "main group" of assets. We can load them like this: $this->assetor->load('test.css');

But usually we want to load some files in header and some other files in footer of a file...

$this->assetor->load('style_one.css','header');
$this->assetor->load('style_two.css','header');
$this->assetor->load('script_one.js','header');
$this->assetor->load('script_two.js','header');
$this->assetor->load('style_three.css','footer');
$this->assetor->load('style_four.css','footer');
$this->assetor->load('script_two.js','footer');

#### Set a version number 
If we are working on the styles or scripts and we want to force the browser to reload the files while we work on them we can write:
$this->assetor->version(); // only leave without parameter if you know what you're doing... Otherwise you can put a string as parameter: '2.0';

Also, if we are too lazy to work with with the assetor config file, we can set here a version, so that all browsers that will load the site again will be forced to reload the styles/scripts 
$this->assetor->version('1.2');

#### Merge the files or Merge and minify them

From here on we have two options:
We can choose to merge all the files inside groups with: $this->assetor->merge().
This will result in:
- style_one.css, style_two.css will become one file: header.css
- script_one.js, script_two.js will become one file: header.js
- style_three.css, style_four.css will become one file: footer.css
- script_two.js will become one file: footer.js
The files will have no compression applied.

We can choose to minify all the files inside groups with: $this->assetor->minify().
This will result in:
- style_one.css, style_two.css will become one compressed file: header.css
- script_one.js, script_two.js will become one compressed file: header.js
- style_three.css, style_four.css will become one compressed file: footer.css
- script_two.js will become one compressed file: footer.js
The files will be compressed (minified).

#### Generate the html code to call the resulting file(s) and pass the code to variables
After we merged/minified the files, we can generate the html code to call the files

$header_assets = $this->assetor->generate('header');
$footer_assets = $this->assetor->generate('footer');

If we loaded assets without mentioning a group (which defaults to 'main' group), we can simply call $this->assetor->generate()

#### Send parameters to the view and echo them inside the viewA
After we send $header_assets and $footer_assets to the view in there we do:

echo $header_assets;
echo $footer_assets;

#### Reset library
We can also reset the library with...
$this->assetor->clear();

###Copyright

Copyright (C) 2014 @avenirer [avenir.ro@gmail.com]
Everyone is permitted to copy and distribute verbatim or modified copies of this license document, and changing it is allowed as long as the name is changed.

DON'T BE A DICK PUBLIC LICENSE TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION

Do whatever you like with the original work, just don't be a dick.
Being a dick includes - but is not limited to - the following instances:
1a. Outright copyright infringement - Don't just copy this and change the name.
1b. Selling the unmodified original with no work done what-so-ever, that's REALLY being a dick.
1c. Modifying the original work to contain hidden harmful content. That would make you a PROPER dick.
If you become rich through modifications, related works/services, or supporting the original work, share the love. Only a dick would make loads off this work and not buy the original works creator(s) a pint.
Code is provided with no warranty. 
Using somebody else's code and bitching when it goes wrong makes you a DONKEY dick. 
Fix the problem yourself. A non-dick would submit the fix back.
License info: http://www.dbad-license.org/
