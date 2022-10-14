<?php

namespace App\Repository;

use App\Entity\MessagePublic;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @extends ServiceEntityRepository<MessagePublic>
 *
 * @method MessagePublic|null find($id, $lockMode = null, $lockVersion = null)
 * @method MessagePublic|null findOneBy(array $criteria, array $orderBy = null)
 * @method MessagePublic[]    findAll()
 * @method MessagePublic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessagePublicRepository extends ServiceEntityRepository
{

    public const PAGINATOR_PER_PAGE = 4; // Nombre limite

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessagePublic::class);
    }

    public function getMessagePaginator(int $offset): Paginator
    {
        $query = $this->createQueryBuilder('m')
            ->orderBy('m.dateCreaMessage', 'DESC')
            ->setMaxResults(self::PAGINATOR_PER_PAGE)
            ->setFirstResult($offset)
            ->getQuery()
        ;

        return new Paginator($query);
    }

    public function add(MessagePublic $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MessagePublic $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MessagePublic[] Returns an array of MessagePublic objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MessagePublic
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
