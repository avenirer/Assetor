<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Testlib extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		/**
		 * Example of use
		 */
		 
		 
		/**
		 * First we load the library: I would rather load it in a MY_Controller if possible
		 */
		$this->load->library('assetor');
		
		/**
		 * Then we load the assets, be it css or js.
		 * If we only mention the files, they will all be loaded inside a "main group" of assets.
		 * 
		 * We can load them like this: $this->assetor->load('test.css');
		 * 
		 * But usually we want to load some files in header and some other files in footer of a file...
		 * 
		 */
		
		$this->assetor->load('style_one.css','header');
		$this->assetor->load('style_two.css','header');
		$this->assetor->load('script_one.js','header');
		$this->assetor->load('script_two.js','header');
		$this->assetor->load('style_three.css','footer');
		$this->assetor->load('style_four.css','footer');
		$this->assetor->load('script_two.js','footer');
		
		/**
		 * If we are working on the styles or scripts and we want to force the browser to reload the files while we work on them we can write:
		 * 
		 * $this->assetor->version(); // only leave blank if you know what you're doing...
		 * 
		 * Also, if we are too lazy to work with with the assetor config file, we can set here a version, so that all browsers that will load the site again will be forced to reload the styles/scripts 
		 */
		$this->assetor->version('1.2');
		
		/**
		 * From here on we have two options:
		 * 
		 * 1. We can choose to merge all the files inside groups with: $this->assetor->merge().
		 * This will result in:
		 *     - style_one.css, style_two.css will become one file: header.css
		 *     - script_one.js, script_two.js will become one file: header.js
		 *     - style_three.css, style_four.css will become one file: footer.css
		 *     - script_two.js will become one file: footer.js
		 * The files will have no compression applied.
		 * 
		 * 2. We can choose to minify all the files inside groups with: $this->assetor->minify().
		 * This will result in:
		 * - style_one.css, style_two.css will become one compressed file: header.css
		 *     - script_one.js, script_two.js will become one compressed file: header.js
		 *     - style_three.css, style_four.css will become one compressed file: footer.css
		 *     - script_two.js will become one compressed file: footer.js
		 * The files will be compressed (minified).
		 */
		
		$this->assetor->minify();
		
		/**
		 * After we merged/minified the files, we can generate the html code to call the files
		 */
		$header_assets = $this->assetor->generate('header');
		$footer_assets = $this->assetor->generate('footer');
		/**
		 * If we loaded assets without mentioning a group (which defaults to 'main' group), we can simply call $this->assetor->generate()
		 */
		
		/**
		 * after that we send $header_assets and $footer_assets to the view and there we do:
		 * 
		 * echo $header_assets;
		 * echo $footer_assets;
		 */
		 
		 /**
		  * We can also reset the library with...
		  */
		  $this->assetor->clear();
	}
}
/* End of file 'Testlib' */
/* Location: ./application/controllers/Testlib.php */