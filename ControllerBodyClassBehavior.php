<?php
class ControllerBodyClassBehavior extends CBehavior
{
	// the body class code was copied verbatim from the below url into this behavior and is due to Artifical and Nick Matthews
	// http://www.yiiframework.com/forum/index.php/topic/28849-body-classes-based-on-url/

    /**
     * @var string the classes that should be displayed in the body element of each page.
     */
    private $classes;

    /**
     * For easier styling, let's insert some classes from the URI in to our body element
     */
	public function getBodyClasses()
	{
        if (!empty(Yii::app()->baseUrl))
		{
			$uri = explode(Yii::app()->baseUrl, Yii::app()->request->requestUri);
			unset($uri[0]);
			$pattern = '/[:\/?=]/';
			$standardDelimiter = ':';
			$string = implode(Yii::app()->baseUrl, $uri);

			// replace delimiters with standard delimiter, also removing redundant delimiters
			$string = preg_replace(array($pattern, "/{$standardDelimiter}+/s"), $standardDelimiter, $string);
			$components = explode($standardDelimiter, $string);
        }
        else 
        {
			$components = explode("/", Yii::app()->request->requestUri);
        }

        foreach($components as $id => $component)
        {
			if (empty($component))
				unset($components[$id]);
        }
        ksort($components);

        $class = '';
        for($x = 1; $x <= sizeOf($components); $x++)
        {
			if ($x <> 1)
				$class .= '-';

			$class .= $components[$x];
			$classes[] = strip_tags($class);
        }

        if(isset($classes))
			$this->classes = implode(' ', $classes);

		return $this->classes;
	}
}