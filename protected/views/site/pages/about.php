<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h1>About</h1>

<p>
Starting from a simple idea to build our web platforms like desktop applications with support for PHP as a server side language that provides authentication and data services .

From these ideas , we started doing a lot of exploration on the web framework. After doing various kinds of tests , we finally decided to build an attractive web desktop uses javascript framework , the ExtJS Javascript Framework .

As the main engine display the desktop web , ExtJS provide powerful features that have higher levels of stability compared to other frameworks . We measure the degree of stability based on their compatibility that can run on almost all modern browsers .
PHP as a provider of data and authentication service is our choice . There are several ways in which to communicate with PHP ExtJS . Among them are
<ul>
	<li><strong>Ajax</strong> - sends requests to a server on the same domain</li>
	<li><strong>JSONP</strong> - uses JSON - P to send requests to a server on a different domain</li>
	<li><strong>Rest</strong> - uses RESTful HTTP methods ( GET / PUT / POST / DELETE ) to communicate with the server</li>
	<li><strong>Direct</strong> - Ext.direct.Manager uses to send requests</li>
</ul>
In this case , PHPExtJS using RESTful HTTP methods as a way of communicating with PHP ExtJS .

Not satisfied with all that , we also combine it with a PHP framework . Yii PHP framework is our choice .

With all the powerful features that are owned by Yii PHP framework , we believe that this platform is able to be implemented on a large-scale enterprise systems .
</p>
