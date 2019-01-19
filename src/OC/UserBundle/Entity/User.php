<?php

namespace OC\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @ORM\Table(name="oc_user")
 * @ORM\Entity(repositoryClass="OC\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  	
	/**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
  protected $groups;

	/**
    * @ORM\ManyToMany(targetEntity="OC\UserBundle\Entity\User", cascade={"persist"})
    * @ORM\JoinTable(name="likes")
    */
  protected $likes;
	
	
  protected $user_target;
    
  protected $points;
	
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
    
  public function setPoints($points)
  {
    $this->points = $points;
  }


  public function getPoints()
  {
    return $this->points;
  }

}
