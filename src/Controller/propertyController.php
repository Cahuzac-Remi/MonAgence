<?php


namespace App\Controller;


use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class propertyController extends AbstractController
{
    /**
     * @Route("/biens", name="property.index")
     * @return Response
     */
    public function index(): Response
    {
        $property = new Property();
        $property->setTitle('Mon premier bien')
            ->setPrice(200000)
            ->setRooms(4)
            ->setBedrooms(3)
            ->setDescription('une petite description')
            ->setSurface(60)
            ->setFloor(4)
            ->setHeat(1)
            ->setCity('Montpellier')
            ->setAddress('150 avenue Gaston Berger')
            ->setPostalCode('34000');
        $em = $this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();

        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }
}