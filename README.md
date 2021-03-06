# FineDiv - 0.0.1
 This WP Theme is built from scratch by using Underscores and is specially customized for publishing content for web developers. FineDiv is my first theme and is build and customized to my needs, is not fancy looking on front end, doesn't have sidebar(but is included in code), so it may not be suitable to everyone.

 Theme has some nice features that you can use as reference. Feel free to use and customize any code from this theme. To be able easy use this theme in text editor I have repository with Gulp Im using for this theme on [ GitHub](https://github.com/StanSkrivanek/gulp-dev) to install all dependencies. To get an idea how is look like you can check [Webovkar.cz](https://webovkar.cz) with some dummy data. Theme is still not complete, and I'm still working on some features but basic functionality is done.

## Installing and running Gulp
1. Place folder "gulp-dev" in to Wordpress "/themes/" folder
2. To change proxy server and default browser you need to change two settings. Open Gulpfile.js and go to section "watch everything" (line 73). On line 76 is my default bowser "firefox" to set your default browser just type its name eg. "google chrome", "safari" ect. Next you need to change your proxy and port if needed. If you are an Apple Mac user using MAMP standard setting, you only need change name of website eg. localhost:8888/yourwebsitename. If you need a specific port, change port also.
3. When this setting is done, open terminal and navigate to gulp-dev folder. Easiest way is to type in terminal `cd`(change directory) and drag and drop "gulp-dev" folder into terminal
4. Once you are in gulp-dev folder type `gulp init`, it will start installing all dependencies
5. When installation of dependencies is complete stay in this folder and type `gulp`. This will start local environment, automatically open browser with your website on 192.168.1.1:8080/yourwebsitename. Any device reaching this address will be synchronized, and you will be able to check how website is looking and behaving on any mobile device (or other browser) at the same time

## Documentation is INCOMPLETE

## Features
- Custom Menus
- Custom comments
- Customizer Options
- Featured Images
- Widgets
- Featured and Sponsored checkbox (Standard Post)
- CPT (Workshop, CSS References, Messages)
- CMB2 (build in)
- Related post (based on tags)
- Prism.js (a lightweight, extensible syntax highlighter)
- SVG icons
- SVG Support
- Contact form
- Workshop Form (CMB2)
- Customizer additions
- Page templates




### Menus
This theme have, beside main menu, two custom menus. Main standard menu doesn't support multilevel menu, because I do not need it in this case. I have registered two additional menus that are placed in footer. First is standard menu with links to pages of website. Just create a new menu with any links and assign it to "Footer Last" menu from main option.

Second menu is called "Social Media" and its feature is using SVG icons for links instead of a name. All you need to create this menu is just adding link to any social network and its icon will be loaded automatically. To see what SVG icons are available check svg/svg-icons.svg.

### Custom comments
To avoid long scrolling over all comments, I have set this section to show only first two comments with button to show the rest. Above comments section is comment counter.

### Customizer Options
Extended options available from the Customizer:

1. Header image on front page
2. Header background color
3. Custom logo
4. Excerpts or full content in index and archive pages

### Featured Images
Posts and pages can have Featured Images.

### Widgetized Areas
1. Sidebar
2. Footer widgets
3. Page sidebar

### "Featured" and "Sponsored" checkbox (Standard Post)
I have add into standard post admin area two checkboxes "Featured" and "Sponsored".

### CPT
- Workshop
- CSS References
- Messages

#### Workshop
This CPT has special form to register all data for single workshop. Form it self is build with cmb2 fields and beside classic input type has eg. calendar to a pick date, google map to select venue address, predefined checkboxes or repeatable files for workshop timetable witch contain selectable time (Hour, Minutes) and description.

After you publish workshop post, post is shown on front page and workshops list page. On front page are shown only workshops that will be running in next 30 days, including current day.

There is possibility to show this form on front-end to let people (company) to register their workshop, but I have skip this step. For now.

#### CSS References
This CPT does't have any special features beside just differentiated this post as special post type and be able to show this post type list by using WP_Query on specific page.

#### Messages
CPT "messages" is saving data as email content, email address and name from Contact form I have build this form from scratch.


### CMB2

##### wks-form.php
Template to show workshop form on front-end. Just create a page and assign a template "workshop-form"/

##### CMB2 Field Type: Google Maps / plugin /
For showing maps on CMB2 forms you need to install plugin [CMB2 Map Field](https://github.com/mustardBees/cmb_field_map). Installation can be done from Wordpress plugin page or download it from repository and place into WP plugin folder. Don't forget to activate this plugin.

##### How to make maps work, after a new google map regulation rules
You need to paste your Google map API code into `cmb-field-map.php`. Open file `cmb-field-map.php` and in section Enqueue scripts and styles paste your code into wp_register_script on line 80.
```php
/**
	 * Enqueue scripts and styles
	 */
	public function setup_admin_scripts() {
		wp_register_script( 'pw-google-maps-api', '//maps.googleapis.com/maps/api/js?YOUR_GOOGLE_MAP_API_KEY&libraries=places', null, null );
		wp_enqueue_script( 'pw-google-maps', plugins_url( 'js/script.js', __FILE__ ), array( 'pw-google-maps-api' ), self::VERSION );
		wp_enqueue_style( 'pw-google-maps', plugins_url( 'css/style.css', __FILE__ ), array(), self::VERSION );
	}

```

### Related Post
I have add related post under a single article and they are:
- based on tags
- ignore Sticky
- ignore empty

### Prism
To showing code I have decided to use [Prism.js](https://prismjs.com)
Basic CSS style is in Sass/Modules/_prism.scss and is compiled into style.css
adding code into article
```
<pre><code class="language-css">p { color: red }</code></pre>
```
Included languages:
- Markup (global)
- CSS
- Javascript
- ES6
- PHP


Included plugins:
 EDIT

### SVG icons
 There is a bunch of social icons (borrowed from WP 2017 theme) that I'm using in Social Menu. I have also add some my custom SVG icons that you can find eg. in headers (time, comments) but there is a bit more. for more details check svg/svg-icons.svg.

### SVG Support
I have add standard SVG support and known cropping problem on SVG images is sorted also

### Contact form
To display contact form you need to create page called 'contact'. Contact form is created from scratch and feature bunch of radio buttons to select what is it about(also shown in admin area in CPT "Messages"). Other feature is expanding textarea (on key up) because I don't like static frame of text area. I thing is look fancy and is quiet nice :)

### Workshop Form (CMB2)

### Customizer additions

### Page templates

1. Archives - standard articles archive
Create Page and assign template "Archive"
2. Workshop-List - Workshop archive
 Create page and assign template "Workshop-List". This page will show workshops with Excerpt field description form workshop form
3. CSS Props
 Create page and assign template "CSS Props". This page will show only articles from CPT CSS Ref. To show post in under certain title you need to add props type. If you want to add article eg. under title Pseudo Class add to Props section "Pseudo Class" if under @rule add "rule". This page has very specific style.


### Licenses and External Assets
FineDiv is distributed under the terms of the GNU GPL v2

// FineDiv's code base started out as _s (http://underscores.me) as it were on November 28, 2017.# FineDiv---WP-Theme

### NOTES
Be aware that version 0.0.1 have some unused files or code that is commented out. In SASS folder are some classes that aren't used such colors variables or classes for Ninja form I was testing.
