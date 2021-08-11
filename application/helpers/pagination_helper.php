<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set("memory_limit","512M");
if ( ! function_exists('pagination'))
{
    function pagination($total, $pag, $path, $maxResult = 10)
    {
		$arr = array();
		$pag = intval($pag) != 0 ? intval($pag) : 1;
		$totalPages = intval(ceil($total / $maxResult));

		$pag = $pag > $totalPages ? $totalPages : $pag;
		$pag = $pag < 1 ? 1 : $pag;
		
		if ($totalPages <= 5) {
			$minPage = 1;
			$maxPage = $totalPages;
		} else {
			$minPage = $pag-2 <= 0 ? 1 : $pag - 2;
			$minPage = $pag+2 >= $totalPages ? $totalPages -4 : $minPage;
			$maxPage = $pag+2 >= $totalPages ? $totalPages : $minPage+4;
		}
		
		$i = $minPage;
		
		for ($i; $i <= $maxPage; $i++) {
			$arr['pagination'][] = array(
				'pag' => $i,
				'path' => base_url() . "$path/" . $i,
				'active' => $i == $pag ? 1 : 0
			);
		}

		if ($maxPage == 1) {
			$arr['prev'] = false;
			$arr['next'] = false;	
		} else {
			$arr['prev'] = $pag > 1 ? base_url() . "$path/" . (intval($pag) - 1) : false;
			$arr['next'] = $pag < $maxPage ? base_url() . "$path/" .  (intval($pag) + 1) : false;
		}

		return $arr;
    }   
}