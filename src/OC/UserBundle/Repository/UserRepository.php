<?php

namespace OC\UserBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\DBAL\DriverManager;
use \PDO;

class UserRepository extends \Doctrine\ORM\EntityRepository
{
	 
  // pour la pagination
  public function getUsers($page, $nbPerPage)
  {
	if(is_numeric($page)) {
		$query = $this->createQueryBuilder('c')
		  ->orderBy('c.id', 'DESC')
		  ->getQuery()
		;

		$query
		  // On définit l'annonce à partir de laquelle commencer la liste
		  ->setFirstResult(($page-1) * $nbPerPage)
		  // Ainsi que le nombre d'annonce à afficher sur une page
		  ->setMaxResults($nbPerPage)
		;

		// Enfin, on retourne l'objet Paginator correspondant à la requête construite
		// (n'oubliez pas le use correspondant en début de fichier)
		return new Paginator($query, true);
	}
  }
    
  public function getAddLike($user, $id)
  {
      
    // link with user and usertarget i use manytomany in my entitie name table "likes"
    try{
            $PDO = new PDO('mysql:host=gamerskigf1896.mysql.db;dbname=gamerskigf1896','gamerskigf1896','Blackperl1896');
            $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo 'Connexion impossible';
    }
       
    $stmt = $PDO->prepare("INSERT INTO likes (user_source, user_target) VALUES (:name, :value)");
    $stmt->bindValue(':name', $id);
    $stmt->bindValue(':value', $user);
    $stmt->execute();

      
  }

}
