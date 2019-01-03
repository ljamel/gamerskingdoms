<?php

namespace OC\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Tools\Pagination\Paginator;


class Likes
{

  protected $likes;
	
  protected $user_target;
		
  public function setLikes($likes)
  {
    $this->likes = $likes;
  }


  public function getLikes()
  {
    return $this->likes;
  }  
	
  public function setUser_target($user_target)
  {
    $this->user_target = $user_target;
  }


  public function getUser_target()
  {
    return $this->user_target;
  }

}
