<?php

class Paginate
{

	private $arr = null;

	private $arr_paginated = null;

	private $current_elements = null;

	protected $pages = 0;

	function __construct($arr = null, $per_page = 5, $current_page = 1)
	{
		if (is_array($arr) && !empty($arr))
		{
			$this->arr = $arr;
			$this->init($per_page, $current_page);
		}
	}

	protected function init($per_page = 5, $current_page = 1)
	{
		if (self::isWholeNumber($per_page))
		{
			$this->paginateElements($per_page);

			if (self::isWholeNumber($current_page))
			{
				$this->current_elements = $this->arr_paginated[intval($current_page) - 1];
			}
			else
			{
				$this->current_elements = $this->arr_paginated[0];
			}
		}
	}

	protected static final function isWholeNumber($number)
	{
		return is_numeric($number) && (intval($number) == floatval($number));
	}

	protected final function paginateElements($per_page)
	{
		$count = count($this->arr);
		$this->pages = ceil($count / $per_page);
		$this->arr_paginated = array();

		for ($i = 1; $i <= $this->pages; $i++)
		{
			if ($i != $this->pages)
			{
				$this->arr_paginated[] = array_slice($this->arr, $per_page * ($i - 1), $per_page);
			}
			else
			{
				$this->arr_paginated[] = array_slice($this->arr, $per_page * ($i - 1));
			}
		}
	}

	public final function setElements($arr, $per_page = 5, $current_page = 1)
	{
		if (is_array($arr) && !empty($arr))
		{
			$this->arr = $arr;
			$this->init($per_page, $current_page);
		}
	}

	public function getElements()
	{
		return $this->arr;
	}

	public function getArrayPaginated()
	{
		return $this->arr_paginated;
	}

	public function getPage($page)
	{
		if (self::isWholeNumber($page))
		{
			return $this->arr_paginated[intval($page) - 1];
		}
		else
		{
			return null;
		}
	}

	public function getCurrentElements()
	{
		return $this->current_elements;
	}
}