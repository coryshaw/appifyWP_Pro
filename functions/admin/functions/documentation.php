
						<section>
							<p>The documentaion below will help you get started with AppifyWP Pro. For the full documentaion with working examples, please see the <a href="http://appifywp.com/appifywp-pro-documentation/">Full Documentation</a> that includes sections for spicing up your content with <a href="http://appifywp.com/appifywp-pro-documentation/#Icons">icons</a>, <a href="http://appifywp.com/appifywp-pro-documentation/#Buttons">Buttons</a>, <a href="http://appifywp.com/appifywp-pro-documentation/#Code-Snippets">Code Snippets</a>, and more!
						</section>
<hr />
						<section>
						<h2>AppifyWP Pro Settings</h2>
						<p>First, you should have a look at the <a href="<?php get_site_url(); ?>/wp-admin/admin.php?page=theme_setting">AppifyWP Pro Settings</a> page. This can be accessed two ways:
						</p>
						<ol>
							<li>When you're logged in as the admin, you'll see an "AppifyWP Pro" menu appear at the top of every page of your site. Hover over that to access the theme settings and other areas special to this theme.<br/>
								<img src="<?php bloginfo('template_directory');?>/img/docs/gettingstarted_settings.png" alt="Getting Started"/>
							</li>
							<li>In the wp-admin, you'll find a "AppifyWP Pro" nav item in the main left nav.<br/>
								<img src="<?php bloginfo('template_directory');?>/img/docs/gettingstarted_settings2.png" alt="Getting Started"/>
							</li>
						</ol>

						<strong>Things you can do in the AppifyWP Pro Settings:</strong>
						<ul>
							<li>Customize the appearence of your entire site. Colors, fonts, background images, textures, etc...</li>
							<li>Add your company branding &amp; site favicon</li>
							<li>Customize your footer and enable footer widgets.</li>
							<li>Change your homepage to show a single wordpress page, a single app, your blog, or all your apps.</li>
							<li>Enable/Disable the responsive mobile layout.</li>
							<li>Add your AppifyWP affiliate ID so you can earn commissions on referral sales of AppifyWP themes</li>
							<li>Add custom CSS styles to customize your site</li>
						</ul>

						</section>
<hr />
						<section>

						<h2>Adding Your Apps</h2>

						<p>AppifyWP Pro supports multiple apps as a custom post type. You can add an app by clicking the "<a href="<?php get_site_url(); ?>/wp-admin/edit.php?post_type=app"><strong>Apps</strong></a>" link in the wp-admin left column, and then click "Add New". Additionally you can hover over the "+ New" button in the admin bar and click "App".</p>

						<img src="<?php bloginfo('template_directory');?>/img/docs/add_app.png" alt="add app"/>

						<p>Each app admin screen is split into 4 main sections:
						<ol>
							<li>WYSIWYG editor</li>
							<li>App Info</li>
							<li>App Appearence</li>
							<li>Platforms</li>

						</ol>

						<h3>WYSIWYG Editor</h3>
						<p>At the top is the main WYSIWYG editor. Anything you type in here will appear below the main app showcase area.</p>

						<img src="<?php bloginfo('template_directory');?>/img/docs/wysiwyg.png" alt="WYSIWYG"/>

						<h3>App Info</h3>

						<p>Below the WYSIWYG editor are all of the custom settings for your app. The first of which is your App Info:</p>

						<img src="<?php bloginfo('template_directory');?>/img/docs/app_info.png" alt="App Info"/>

						<p>This is where you add your App Icon, primary description, and secondary description. All text entered will appear at the top of your app page. Both the priamry and secondary fieleds support HTML.</p>

						<h3>App Appearence</h3>

						<p>This is where you customize how the main app showcase looks. The showcase is the section at the top of your app page that displays your app icon, app description, devices, and screenshots.
						</p>

						<p>For each app, you can customize the appearence of the following:</p>

						<ul>
							<li>Background image (default or custom)</li>
							<li>Background color</li>
							<li>Parallax Effect (makes the background image to scroll at a different pace than the foreground)</li>
							<li>Disable/Enable the sidebar</li>
							<li>Foreground Contrast</li>
							<li>Text Color</li>
						</ul>

						<h3>Platforms</h3>

						<p>Platforms is where you specify the platforms that your app supports. Turning on each platform reveals platform specific options.
						<img src="<?php bloginfo('template_directory');?>/img/docs/app_platforms.png" alt="App Platforms"/>
						</p>
						<p>Within each platform you can customize:</p>

						<ul>
							<li>Orientation of the Device</li>
							<li>Any specific text you'd like to show for the platform</li>
							<li>Coming soon mode / Coming soon text</li>
							<li>App Store URL</li>
							<li>Price</li>
							<li>Showcase type (Images vs Video)</li>
							<li>Screenshots or a youtube/vimeo ID</li>
						</ul>

						<h3>How to show your Apps</h3>

							<p>Once you've created a few app pages, you can show your apps in a few different ways:</p>
							<ul>
								<li>Create a page called "Our Apps" and assign the "Apps" template</li>
								<li>Link to your apps page in the primary navigation</li>
								<li>In wp-admin > AppifyWP Pro Settings > Homepage, set it to "Default" and you're homepage will show a list of all your apps.</li>
							</ul>
						

						</section>
<hr />
						<section>

							<h2>Team Members</h2>

							<p>Similar to Apps, Team Members is another custom post type. You can add team members in the "Team" section of your wp-admin</p>

							<img src="<?php bloginfo('template_directory');?>/img/docs/team2.png" alt="add team member"/>

							<p>Each team member page contains the following custom fields</p>

							<ul>
								<li>WYSIWYG Field. Use this to add any detailed bio on each individual</li>
								<li>Mug Shot</li>
								<li>Title</li>
								<li>Location</li>
								<li>Short Bio (shown on Team member list pages)</li>
								<li>Contact Info</li>
								<li>Social links (Twitter/Facebook/LinkedIn)</li>
							</ul>	

							<h3>How to show your team</h3>

							<p>Once team members are created, you can show your team in a few different ways:</p>
							<ul>
								<li>Create a page called "Team" and assign the "Team Members template</li>
								<li>Link to your team page in your primary menu, or via a sidebar/footer widget</li>
							</ul>

						</section>



						<hr />
<section id="icons" data-title="Icons">
<h2>Icons and Using Font Awesome</h2>
<p>AppifyWP Pro includes <a href="http://fortawesome.github.io/Font-Awesome/" target="_blank">Font Awesome</a>, so there's TONs of great icons and code snippets you can use to further pimp out the content of your apps.</p>
<p>Here's a <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">complete list of icons you can use on your site</a>. Go find some icons you might want to use, and copy the name of that icon. For example, the download icon name is "icon-download" and it looks like this: <i class="icon-download"></i>.</p>
<p><strong>Here's how to add an icon anywhere on your site:</strong></p>
<pre>&lt;i class=&quot;icon-download&quot;&gt;&lt;/i&gt;</pre>
<p><i class="icon-download"></i></p>
<p><strong>Make it bigger by adding the icon-large css class name</strong></p>
<pre>&lt;i class=&quot;icon-download icon-large&quot;&gt;&lt;/i&gt;</pre>
<p><i class="icon-download icon-large"></i></p>
<p><strong>Make it even bigger by using the icon-2x, icon-3x, and icon-4x css classes</strong></p>
<pre>&lt;i class=&quot;icon-download icon-4x&quot;&gt;&lt;/i&gt;</pre>
<p><i class="icon-download icon-4x"></i></p>
<h3>Using Icons in a Bulleted List</h3>
<pre>&lt;ul class=&quot;icons-ul&quot;&gt;
  &lt;li&gt;&lt;i class=&quot;icon-li icon-ok&quot;&gt;&lt;/i&gt;Bulleted lists (like this one)&lt;/li&gt;
  &lt;li&gt;&lt;i class=&quot;icon-li icon-ok&quot;&gt;&lt;/i&gt;Buttons&lt;/li&gt;
  &lt;li&gt;&lt;i class=&quot;icon-li icon-ok&quot;&gt;&lt;/i&gt;Button groups&lt;/li&gt;
  &lt;li&gt;&lt;i class=&quot;icon-li icon-ok&quot;&gt;&lt;/i&gt;Navigation&lt;/li&gt;
  &lt;li&gt;&lt;i class=&quot;icon-li icon-ok&quot;&gt;&lt;/i&gt;Prepended form inputs&lt;/li&gt;
  &lt;li&gt;&lt;i class=&quot;icon-li icon-ok&quot;&gt;&lt;/i&gt;&amp;hellip;and many more with custom CSS&lt;/li&gt;
&lt;/ul&gt;</pre>
<ul class="icons-ul">
	<li><i class="icon-li icon-ok"></i>Bulleted lists (like this one)</li>
	<li><i class="icon-li icon-ok"></i>Buttons</li>
	<li><i class="icon-li icon-ok"></i>Button groups</li>
	<li><i class="icon-li icon-ok"></i>Navigation</li>
	<li><i class="icon-li icon-ok"></i>Prepended form inputs</li>
	<li><i class="icon-li icon-ok"></i>…and many more with custom CSS</li>
</ul>
<p>&nbsp;</p>
<h3>Star Rating</h3>
<pre>&lt;i class=&quot;icon-star icon-2x&quot;&gt;&lt;/i&gt;
&lt;i class=&quot;icon-star icon-2x&quot;&gt;&lt;/i&gt;
&lt;i class=&quot;icon-star icon-2x&quot;&gt;&lt;/i&gt;
&lt;i class=&quot;icon-star icon-2x&quot;&gt;&lt;/i&gt;
&lt;i class=&quot;icon-star-half-empty icon-2x&quot;&gt;&lt;/i&gt;</pre>
<p><i class="icon-star icon-2x"></i>
<i class="icon-star icon-2x"></i>
<i class="icon-star icon-2x"></i>
<i class="icon-star icon-2x"></i>
<i class="icon-star-half-empty icon-2x"></i></p>
</section>
<hr />
<section id="button" data-title="Buttons">
<h2>Buttons</h2>
<p>Make your own beautiful buttons with some short snippets of code! You can even combine button code with icon code for extra awesomeness.</p>
<h3>Small Button</h3>
<pre>&lt;a href=&quot;#&quot; class=&quot;btn&quot;&gt;I&#039;m a button!&lt;/a&gt;</pre>
<p><a class="btn" href="#">I'm a button!</a></p>
<h3>Large Button</h3>
<pre>&lt;a href=&quot;#&quot; class=&quot;btn btn-large&quot;&gt;I&#039;m a large button!&lt;/a&gt;</pre>
<p><a class="btn btn-large" href="#">I'm a large button!</a></p>
<h3>Buttons With Icons</h3>
<pre>&lt;a href=&quot;#&quot; class=&quot;btn btn-large&quot;&gt;&lt;i class=&quot;icon-apple icon-2x&quot;&gt;&lt;/i&gt; Get This App!&lt;/a&gt;</pre>
<p><a class="btn btn-large" href="#"><i class="icon-apple icon-large"></i> Get This App!</a> <a class="btn btn-large" href="#"><i class="icon-android icon-large"></i> Get This App!</a> <a class="btn btn-large" href="#"><i class="icon-download icon-large"></i> Get This App!</a></p>
<h3>Buttons with Custom Colors</h3>
<pre>&lt;a href=&quot;#&quot; class=&quot;btn btn-large&quot; style=&quot;background: red; color: white;&quot;&gt;&lt;i class=&quot;icon-apple icon-large&quot;&gt;&lt;/i&gt; Get This App!&lt;/a&gt;</pre>
<p><a class="btn btn-large" style="background: red; color: white;" href="#"><i class="icon-apple icon-large"></i> Get This App!</a> <a class="btn btn-large" style="background: pink;" href="#"><i class="icon-apple icon-large"></i> Get This App!</a> <a class="btn btn-large" style="background: purple; color: white;" href="#"><i class="icon-apple icon-large"></i> Get This App!</a> <br /><br /></p>
</section>
<hr />
<section id="snippits" data-title="Code Snippets">
<h2>Code Snippets</h2>
<h3>Labels</h3>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Labels</th>
<th>Markup</th>
</tr>
</thead>
<tbody>
<tr>
<td><span class="label">Default</span></td>
<td><code>&lt;span class="label"&gt;Default&lt;/span&gt;</code></td>
</tr>
<tr>
<td><span class="label label-success">Success</span></td>
<td><code>&lt;span class="label label-success"&gt;Success&lt;/span&gt;</code></td>
</tr>
<tr>
<td><span class="label label-warning">Warning</span></td>
<td><code>&lt;span class="label label-warning"&gt;Warning&lt;/span&gt;</code></td>
</tr>
<tr>
<td><span class="label label-important">Important</span></td>
<td><code>&lt;span class="label label-important"&gt;Important&lt;/span&gt;</code></td>
</tr>
<tr>
<td><span class="label label-info">Info</span></td>
<td><code>&lt;span class="label label-info"&gt;Info&lt;/span&gt;</code></td>
</tr>
<tr>
<td><span class="label label-inverse">Inverse</span></td>
<td><code>&lt;span class="label label-inverse"&gt;Inverse&lt;/span&gt;</code></td>
</tr>
</tbody></table>
<h3>Alerts &amp; Notices</h3>
<p><strong>Alert Default</strong></p>
<pre>&lt;div class=&quot;alert alert-block&quot;&gt;
  &lt;button type=&quot;button&quot; class=&quot;close&quot; data-dismiss=&quot;alert&quot;&gt;&amp;times;&lt;/button&gt;
  &lt;h4&gt;Warning!&lt;/h4&gt;
  Best check yo self, you&#039;re not...
&lt;/div&gt;</pre>
<div class="alert alert-block"><button class="close" type="button" data-dismiss="alert">×</button>
<h4>Warning!</h4>
<p>Best check yo self, you're not...</p>
</div>
<p>&nbsp;</p>
<p><strong>Alert Success</strong></p>
<pre>&lt;div class=&quot;alert alert-success&quot;&gt;
  Happy Message Goes Here.
&lt;/div&gt;</pre>
<div class="alert alert-success">Happy Message Goes Here.</div>
<p>&nbsp;</p>
<p><strong>Alert Error</strong></p>
<pre>&lt;div class=&quot;alert alert-error&quot;&gt;
  Sad Message Goes Here.
&lt;/div&gt;</pre>
<div class="alert alert-error">Sad Message Goes Here.</div>
<p>&nbsp;</p>
<p><strong>Alert Info</strong></p>
<pre>&lt;div class=&quot;alert alert-info&quot;&gt;
  Info Message Goes Here.
&lt;/div&gt;</pre>
<div class="alert alert-info">Info Message Goes Here.</div>
</section>
<hr/>
<section id="smartsidebar" data-title="Smart Sidebar">
<h2>Smart Sidebar</h2>
<p>The smart sidebar is this navigation that you see in the right column sidebar:</p>
<p>Every page of AppifyWP Pro can contain a smart sidebar.</p>
<pre>&lt;section id=&quot;features&quot; data-title=&quot;Awesome Features&quot;&gt;
-- Some Content goes here --
&lt;/section&gt;</pre>
<p>For each section tag that contains an id, AppifyWP Pro will automatically build a smooth scrollable navigation item that will highlight when you've scrolled over that section. If you include</p>
<pre>data-title=&quot;My Section Title&quot;</pre>
<p>, AppifyWP Pro will use that for the navigation item title.</p>
</section>
<hr />

						<section>

						<h2>Other Stuff</h2>

						<p>Now that you've gotten familliar with the theme, here's some things you can do to pimp out your site:</p>

						<ul>
							<li>Add some widgets to your sidebar and footer widget areas via wp-admin > Appearence > Widgets</li>
							<li>Enable Pre-Footer Widgets via wp-admin > AppifyWP Pro Settings > Footer, then go add widgets to them in wp-admin > Appearence > Widgets (Footer Widget area 1,2,3, and 4)</li>
							<li>Customize your primary navigation in wp-admin > Appearence > Menus</li>
						</ul>
						</section>

<hr />

						<section>

						<h2>Support</h2>

						<p>Still confused? No problem! We are here to help.</p>

						<ul>
							<li>Your best bet for support is to explore the <a href="http://appifywp.com/forums">AppifyWP Pro Forums</a>.</li>
							<li>If you're question isn't already answered there, we welcome you to create a new post and we will respond as soon as possible.</li>
							<li>If you'd like to reach out directly, you can email support@appifywp.com, but please only do so if your question/comment isn't appropiate for the forums.</li>
							
						</ul>
						</section>

					