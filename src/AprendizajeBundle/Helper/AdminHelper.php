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
        return $buffer_categoria;
    }

    public function verificarTituloVideo($titulo)
    {
        $repository = $this->entityManager->getRepository('AprendizajeBundle:Video');
        $query = $repository->findOneByTitulo($titulo);
        if(is_null($query))
        {
            return true; // el nombre ha sido verificado con exito
        }
        else
        {
            return false; // el nombre ya existe almacenado en la base de datos.
        }
    }

    public function verVideo($videoID = NULL)
    {
        if(is_null($videoID))
        {
            $repository = $this->entityManager->getRepository('AprendizajeBundle:Video');
            $query = $repository->createQueryBuilder('p')
            ->getQuery();
            $buffer_videos = $query->getResult();
            return $buffer_videos;
        }
        else
        {

        }
    }

    public function contarVideos($usuarioID = NULL)
    {
        $repository = $this->entityManager->getRepository('AprendizajeBundle:Video');
        $query = $repository->createQueryBuilder('p')
        ->select('count(p)')
        ->where('p.usuarioID = :usuarioID')
        ->setParameter('usuarioID', $usuarioID);
        $count = $query->getQuery()->getSingleScalarResult();
        return $count;


    }
}
