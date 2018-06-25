<?php

declare(strict_types=1);

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\{
    Request, Response
};

use App\Form\GeographicPointDdDualType;
use App\Points\GeographicPointDd;
use App\Points\ValueObject\{
    LatitudeDd, LongitudeDd
};
use App\Presenter\GeographicPointDdDualPresenter;

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
        $dualForm = $this->createForm(GeographicPointDdDualType::class, $geographicPointDdDualPresenter);
        $dualForm->handleRequest($request);

        if ($dualForm->isSubmitted() && $dualForm->isValid()) {

            $latitude1 = new LatitudeDd($geographicPointDdDualPresenter->getLatitude1());
            $longitude1 = new LongitudeDd($geographicPointDdDualPresenter->getLongitude1());
            $geographicPoint1 = new GeographicPointDd($latitude1, $longitude1);

            $latitude2 = new LatitudeDd($geographicPointDdDualPresenter->getLatitude2());
            $longitude2 = new LongitudeDd($geographicPointDdDualPresenter->getLongitude2());
            $geographicPoint2 = new GeographicPointDd($latitude2, $longitude2);

            $meters = $geographicPoint1->calculateDistanceInMeters($geographicPoint2);
            $kilometers = $geographicPoint1->calculateDistanceInKilometers($geographicPoint2);

            return $this->render('geographic_point_dd/dual_form.html.twig', [
                'dualForm' => $dualForm->createView(),
                'meters' => $meters,
                'kilometers' => $kilometers,
            ]);
        }

        return $this->render('geographic_point_dd/dual_form.html.twig', [
            'dualForm' => $dualForm->createView(),
            'meters' => $meters,
            'kilometers' => $kilometers,
        ]);
    }
}
