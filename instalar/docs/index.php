<?php
include('../config.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Get started - <?php echo $title ?> documentation</title>
        <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link id="data-uikit-theme" rel="stylesheet" href="../css/flame.docs.min.css">
        <link rel="stylesheet" href="../css/flame.css">
        <link rel="stylesheet" href="../css/highlight.css">
        <link rel="stylesheet" href="../css/animate.css">
        <script src="../js/jquery.js"></script>
        <script src="../js/flame.min.js"></script>
        <script src="../js/highlight.js"></script>
        <script src="../js/docs.js"></script>
    </head>

    <body>

        <nav class="tm-navbar uk-navbar uk-navbar-attached">
            <div class="uk-container uk-container-center">

                <a class="uk-navbar-brand uk-hidden-small" href="../<?php echo $baseUrl ?>"><img class="uk-margin uk-margin-remove animated hover <?php echo $animate ?>" src="../images/logos.png" width="120" data-uk-tooltip="{pos:'bottom-left'}" title="<?php echo $title ?>" alt="<?php echo $title ?>"></a>

                <ul class="uk-navbar-nav uk-hidden-small">
                    <li><a href="../<?php echo $baseUrl ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="https://github.com/FlameNET/FlameCMS"><i class="fa fa-github"></i> Github</a></li>
                    <li class="uk-active"><a href="../docs"><i class="fa fa-file-code-o"></i> Documentation</a></li>
                    <li><a href="../contact"><i class="fa fa-envelope"></i> Contact</a></li>
                </ul>

                <a href="#tm-offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>

                <div class="uk-navbar-brand uk-navbar-center uk-visible-small"><img src="../images/logos.png" width="100" height="40" title="<?php echo $title ?>" alt="<?php echo $title ?>"></div>

            </div>
        </nav>

        <div class="tm-middle">
            <div class="uk-container uk-container-center">

                <div class="uk-grid" data-uk-grid-margin>
                    <div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">

                        <ul class="tm-nav uk-nav" data-uk-nav>

                            <li class="uk-nav-header">Beginners</li>
                            <li class="uk-active"><a href="../docs">Get started</a></li>
                            <li><a href="#">How to customize</a></li>
                            <li><a href="#">Layout examples</a></li>
                            <li class="uk-nav-header">Developers</li>
                            <li><a href="#">Project structure</a></li>
                            <li><a href="#">Create a theme</a></li>
                            <li><a href="#">Create a style</a></li>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">Custom prefix</a></li>

                        </ul>

                    </div>
                    <div class="tm-main uk-width-medium-3-4">

                        <article class="uk-article">

                            <h1>Get started</h1>

                            <p class="uk-article-lead">Get familiar with the basic setup and structure of <?php echo $title ?>.</p>

                            <p>First of all you need to download <?php echo $title ?>. You can find the whole project and all source files on <a href="https://github.com/FlameNET/FlameCMS">GitHub</a>.</p>

                            <p><a class="uk-button uk-button-large uk-button-primary" href="https://github.com/FlameNET/FlameCMS/archive/master.zip">Download <?php echo $title ?></a></p>

                            <hr class="uk-article-divider">

                            <h2 id="file-structure"><a href="#file-structure" class="uk-link-reset">File Structure</a></h2>

                            <p>In the ZIP file you will find all CSS, JavaScript and font files ready to use for your project. The core framework of <?php echo $title ?> has almost no styling in order to keep it slim.

                            <div class="uk-overflow-container">
                                <table class="uk-table uk-table-striped uk-text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Folder</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><code>/assets/css</code></td>
                                            <td>Contains all <?php echo $title ?> CSS files and minified versions.</td>
                                        </tr>
                                        <tr>
                                            <td><code>/assets/images</code></td>
                                            <td>Contains images used in <?php echo $title ?>.</td>
                                        </tr>
                                        <tr>
                                            <td><code>/assets/js</code></td>
                                            <td>Contains all <?php echo $title ?> JavaScript files and minified versions.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr class="uk-article-divider">

                            <h2 id="html-page-markup"><a href="#html-page-markup" class="uk-link-reset">HTML Page Markup</a></h2>

                            <p>First off, make sure you have a solid code editor, for example <a href="http://www.sublimetext.com/">Sublime Text</a>. You need to add the compiled and preferably minified <?php echo $title ?> CSS and JavaScript to the header of your HTML5 document. <a href="http://jquery.com/">jQuery</a> is required as well. And that's it!</p>

                            <h3 class="tm-article-subtitle">Example</h3>

<pre>
	<code>
	&lt;!DOCTYPE html&gt;
	&lt;html&gt;
		&lt;head&gt;
			&lt;title&gt;FlameCMS&lt;/title&gt;
			&lt;link rel="stylesheet" type="text/css" media="all" href="assets/css/wow.css" /&gt;
			&lt;link rel="stylesheet" type="text/css" media="all" href="assets/css/cms.min.css" /&gt;
			&lt;link rel="stylesheet" type="text/css" media="all" href="assets/css/cms.css" /&gt;
			&lt;script type="text/javascript" src="assets/js/third-party.js">&lt;/script&gt;
			&lt;script type="text/javascript" src="assets/js/common-game-site.js">&lt;/script&gt;
		&lt;/head&gt;
		&lt;body&gt;
		&lt;/body&gt;
	&lt;/html&gt;
	</code>
</pre>

                            <p>Once you have finished implementing <?php echo $title ?> into your webpage, take a look at the <a href="#"><?php echo $title ?> components</a> and get an overview of what <?php echo $title ?> is offering.</p>

                        </article>

                    </div>
                </div>

            </div>
        </div>
        <div class="tm-section uk-overflow-container">
            <div class="uk-container uk-container-center uk-text-center">

				<div class="uk-overflow-container">
					<div class="uk-container uk-container-center uk-text-center">

						<ul class="uk-subnav uk-subnav-line">
							<li><a href="https://github.com/FlameNET/">GitHub</a></li>
							<li><a href="https://github.com/FlameNET/FlameCMS/issues">Issues</a></li>
							<li><a href="https://github.com/FlameNET/FlameCMS/blob/master/CHANGELOG.md">Changelog</a></li>
							<li><a href="https://twitter.com/FlameCMS">Twitter</a></li>
						</ul>

						<div class="uk-panel">
							<p>Made by <a href="http://flamenet.github.io/FlameCMS/">FlameNET</a> with love and caffeine.<br class="uk-hidden-small">Licensed under <a href="https://github.com/FlameNET/FlameCMS/blob/master/COPYING">GNU license</a>.</p>
							<a href="http://flamenet.github.io/FlameCMS/">
							</a>
						</div>

					</div>

				</div>
            </div>
        </div>

        <div id="tm-offcanvas" class="uk-offcanvas">

            <div class="uk-offcanvas-bar">

                <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="{ multiple: true }">
                    <li><a href="../<?php echo $baseUrl ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="https://github.com/FlameNET/FlameCMS"><i class="fa fa-github"></i> Github</a></li>
                    <li><a href="../docs"><i class="fa fa-file-code-o"></i> Documentation</a></li>
                    <li><a href="../contact"><i class="fa fa-envelope"></i> Contact</a></li>
                </ul>

            </div>

        </div>
    </body>
</html>
