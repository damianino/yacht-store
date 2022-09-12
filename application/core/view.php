<?
class View
{
	
	function generate($content_view, $template_view, $data = null, $page_name = '404')
	{	
		include ('./application/views/'.$template_view);
	}
}
