<?php
namespace projet5\view;
use projet5\lib\MyException as MyException;

class View
{
	private $_file;
	private $_template;
	private $_title;

	public function __construct ($side, $template, $name)
	{
		$this->_template = 'template/template_' .$side. '/template_' .$template. '.php';
		$this->_file = 'view/views_php/' .$name. '_view.php';
	}


	public function genContent ($name) {
		$get = 'view/content_html/' .$name. '_content.html';
		$content = $this->genFile($get);
		return $content;
	}

	public function genView ($datas = NULL) {
		if($datas != NULL) {$page = $this->genFile($this->_file, $datas);}
		else {$page = $this->genFile($this->_file);}
		$view = $this->genFile($this->_template, array('title' => $this->_title, 'page' => $page));
		echo $view;
	}

	public function genTour ($datas = NULL)
	{
		if($datas != NULL) {$content = $this->genFile($this->_file, $datas);}
		else {$content = $this->genFile($this->_file);}
		$view = $this->genFile($this->_template, array('title' => $this->_title, 'page' => $content));
		echo $view;
	}

	public function genAdmin ($datas = NULL)
	{
		if($datas != NULL) {$content = $this->genFile($this->_file, $datas);}
		else {$content = $this->genFile($this->_file);}
		$view = $this->genFile($this->_template, array('title' => $this->_title, 'page' => $content));
		echo $view;
	}

	private function genFile($file, $datas = NULL)
	{
		if(file_exists($file))
		{
			if($datas != NULL) {extract($datas);}
			ob_start();
			require $file;
			return ob_get_clean();
		}
		else {
			throw new MyException('Une erreur est survenue. Veuillez réessayer plus tard.', 410);
		}
	}
}
