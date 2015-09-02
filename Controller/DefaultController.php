<?php

namespace Fit\InstagramBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * This method draws Instagram widget or any other list of user media data
     *
     * @Cache(smaxage="600", public=true)
     *
     * @param Request $request
     * @param $template
     * @param $application
     * @param int $count
     * @return Response
     */
    public function widgetAction(Request $request, $template, $application, $count=10)
    {
        $records = [];

        try {
            $manager = $this->get('fit_instagram.application.manager');
            if ($manager->has($application)) {
                $records = $manager->getMedia($application, $count);
            }
        } catch (\Exception $e) {
            return new Response('');
        }

        return $this->render(
            $template,
            array(
                'records' => $records,
                'application' => $application,
            )
        );
    }
}
