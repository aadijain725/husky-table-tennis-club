<?php
namespace httc\template;
require_once PHP_ROOT . '/httc/Setup.php';
use common\template\component\TemplateField;
use common\template\Content;


/**
 * Class EmptyStaticPage
 */
class StaticPage extends Content{
	const FIELD_BODY = "body";
	const FIELD_TITLE = "title";

	public static function getTemplateRenderContents(array $fields): string {
		return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HTTC {$fields[self::FIELD_TITLE]}</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="shortcut icon" href="https://s3-us-west-1.amazonaws.com/fm-httc/favicon.ico" />
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:400'>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!--<link rel="stylesheet" href="/styles/cache/raleway.css" />-->
	<!--<link rel="stylesheet" href="/styles/cache/fa/font-awesome.css" />-->
	<link rel="stylesheet" href="/styles/global.css" />
</head>
<body>

<nav id="global-nav">
	<a href="/" id="nav-title-container">
		<div class="container">
			<i class="fa fa-chevron-left"></i><span id="nav-title">{$fields[self::FIELD_TITLE]}</span>
		</div> 
	</a>
</nav>
<div id="desktop-nav">
	<div id="desktop-nav-brand">
		<div class="brand">Husky Table Tennis Club</div>
		<div class="social-media">
			<a href="https://www.facebook.com/groups/905310902883752/" target="_blank"><i class="fa fa-facebook-official"></i></a>
			<a href="https://www.youtube.com/channel/UCkTNmEuEjjfCAkJsrKQaGlg" target="_blank"><i class="fa fa-youtube-square"></i></a>
		</div>
	</div>
	<a href="/">Home</a>
	<a href="/about" data-title="About">About</a>
	<a href="/join" data-title="Join">Join</a>
	<a href="/rules" data-title="Rules">Rules</a>
	<a href="/team" data-title="Our Team">Our Team</a>
	<a href="/sign-in" data-title="Sign In">Sign In</a>
</div>

<div id="desktop-content">
	<div id="global-nav-push"></div>
	<div id="static-logo">
		<div class="container">
			<img src="https://s3-us-west-1.amazonaws.com/fm-httc/web-logo2.gif" />
			<div class="name">Husky Table Tennis Club</div>
		</div>
	</div>
	
	<div id="global-content">
		<div>{$fields[self::FIELD_BODY]}</div>
	</div>
	<div class="controller">
		<div id="global-error" class="container">
			<p>Uh oh! Something went wrong. <a href="/" class="link">Click here</a> to go back home.</p>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="/js/jq_easing.js"></script>
<script src="/js/PageManager.js"></script>
<script src="/js/global.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75691817-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
HTML;
	}

	public static function getTemplateFields_Internal(): array {
		return [
				TemplateField::newBuilder()->called(self::FIELD_BODY)->asRequired()->build(),
				TemplateField::newBuilder()->called(self::FIELD_TITLE)->asRequired()->build()
		];
	}
}
