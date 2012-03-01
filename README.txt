This behavior makes adding CSS body classes to your layouts quite simple

Unpack release in the protected/extensions folder.

Then add the behavior to a controller (or even better to your components/Controller.php):

public function behaviors() {
	return array(
              'ControllerBodyClassBehavior' => array(
                     'class' => 'ext.ControllerBodyClassBehavior.ControllerBodyClassBehavior'
              ),
              ...
	);
}

In your layouts/main.php view, add to your body tag:

</head>
...
<body class="<?php echo $this->getBodyClasses(); ?>">

And you're done!

Code in this credit to Artifical and Nick Matthews (see http://www.yiiframework.com/forum/index.php/topic/28849-body-classes-based-on-url/)
