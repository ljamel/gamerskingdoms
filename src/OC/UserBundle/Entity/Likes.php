<?php

namespace OC\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Tools\Pagination\Paginator;


class Likes
{

	
  private $user_target;
	
  private $user_source;
		
	
  public function setUser_target($user_target)
  {
    $this->user_target = $user_target;
  }


  public function getUser_target()
  {
    return $this->user_target;
  } 
	
  public function setUser_source($user_source)
  {
    $this->user_source = $user_source;
  }


  public function getUser_source()
  {
    return $this->user_source;
  }

}
