<?php
namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;

class FirstlastPagination extends LengthAwarePaginator {

  public function render($view = null, $data = []) {
    if ($this->currentPage == 1) {
      $content = $this->getPageRange(1, $this->currentPage + 2); 
    } else if ($this->currentPage >= $this->lastPage) {
        $content = $this->getPageRange($this->currentPage - 2, $this->lastPage); 
      } else {
        	$content = $this->getPageRange($this->currentPage - 1, $this->currentPage + 1); 
        }

    return $this->getFirst().$this->getPrevious('&lsaquo;').$content.$this->getNext('&rsaquo;').$this->getLast();
  }

  public function getFirst($text = '&laquo;') {
    if ($this->currentPage <= 1) {
      return $this->getDisabledTextWrapper($text);
    } else {
        $url = $this->paginator->getUrl(1);
        return $this->getPageLinkWrapper($url, $text);
      }
    }

  public function getLast($text = '&raquo;') {
    if ($this->currentPage >= $this->lastPage) {
      return $this->getDisabledTextWrapper($text);
    } else {
        $url = $this->paginator->getUrl($this->lastPage);

        return $this->getPageLinkWrapper($url, $text);
  		}
  }
}