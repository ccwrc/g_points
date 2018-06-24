<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\GeographicPointDdDualType;
use App\Points\GeographicPointDd;
use App\Points\ValueObject\LatitudeDd;
use App\Points\ValueObject\LongitudeDd;
use App\Presenter\GeographicPointDdDualPresenter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/point")
 */
class GeographicPointDdController extends Controller
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        return $this->render('geographic_point_dd/index.html.twig');
    }

    /**
     * @Route("/dualForm")
     */
    public function dualForm(Request $request): Response
    {
        $meters = null;
        $kilometers = null;

        $geographicPointDdDualPresenter = new GeographicPointDdDualPresenter();
        $dual_form = $this->createForm(GeographicPointDdDualType::class, $geographicPointDdDualPresenter);
        $dual_form->handleRequest($request);

        if ($dual_form->isSubmitted() && $dual_form->isValid()) {

            $latitude1 = new LatitudeDd($geographicPointDdDualPresenter->getLatitude1());
            $longitude1 = new LongitudeDd($geographicPointDdDualPresenter->getLongitude1());
            $geographicPoint1 = new GeographicPointDd($latitude1, $longitude1);

            $latitude2 = new LatitudeDd($geographicPointDdDualPresenter->getLatitude2());
            $longitude2 = new LongitudeDd($geographicPointDdDualPresenter->getLongitude2());
            $geographicPoint2 = new GeographicPointDd($latitude2, $longitude2);

            $meters = $geographicPoint1->calculateDistanceInMeters($geographicPoint2);
            $kilometers = $geographicPoint1->calculateDistanceInKilometers($geographicPoint2);

            return $this->render('geographic_point_dd/dual_form.html.twig', [
                'dual_form' => $dual_form->createView(),
                'meters' => $meters,
                'kilometers' => $kilometers,
            ]);
        }

        return $this->render('geographic_point_dd/dual_form.html.twig', [
            'dual_form' => $dual_form->createView(),
            'meters' => $meters,
            'kilometers' => $kilometers,
        ]);
    }
}
