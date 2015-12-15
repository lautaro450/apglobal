<?php
namespace AprendizajeBundle\Helper;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;


class AdminHelper extends Controller
{
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

	public function verCategoria($parent = NULL)
	{
        if($parent === NULL)
        {
            $repository = $this->entityManager->getRepository('AprendizajeBundle:Categoria');
            $query = $repository->createQueryBuilder('p')
            ->getQuery();

        }
        else
        {
            $repository = $this->entityManager->getRepository('AprendizajeBundle:Categoria');
            $query = $repository->createQueryBuilder('p')
            ->select('p')
            ->where('p.parentId = :parent')
            ->setParameter('parent', $parent)
            ->getQuery();
        }
            
            $buffer_categoria = $query->getResult();
            $categoria = array();
            foreach($buffer_categoria as $key => $value)
            {
                $id = $value->getid();
                $nombreCategoria = $value->getNombre();
                $categoria[$id] = $nombreCategoria;
            }
        return $categoria;

	} 

    public function verSubCategoria($parentID)
    {
        $repository = $this->entityManager->getRepository('AprendizajeBundle:Categoria');
        $query = $repository->createQueryBuilder('p')
        ->select('p')
        ->where('p.parentId = :parent')
        ->setParameter('parent', $parentID)
        ->getQuery();
        $buffer_categoria = $query->getResult();
        
        return new Response($buffer_categoria);
    }
}
