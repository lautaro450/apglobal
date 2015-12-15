<?php
namespace AprendizajeBundle\Core;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Helper extends Controller
{
	public function verCategoria($parent = NULL)
	{
         $repository = $this->getDoctrine()->getRepository('AprendizajeBundle:Categoria');
            $query = $repository->createQueryBuilder('p')
            ->select('p')
            ->where('p.parentId = :parent')
            ->setParameter('parent', $parent)
            ->getQuery();
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
}
