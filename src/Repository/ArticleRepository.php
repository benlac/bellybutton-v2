<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * Fetch all articles by tag
     */
    public function findByTag($tag)
    {
        return $this->createQueryBuilder('a')
            ->join('a.tags', 't')
            ->andWhere('t = :tags')
            ->setParameter('tags', $tag)
            ->orderBy('a.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
}
