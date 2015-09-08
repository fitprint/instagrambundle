<?php

namespace Fit\InstagramBundle\Controller;

use Fit\SubscriptionBundle\Subscription\Exception\InvalidConfiguration;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
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
        $user = null;

        try {
            $manager = $this->get('fit_instagram.application.manager');

            if ($manager->has($application)) {
                $user = $manager->getUser($application, true);
                $records = $manager->getMedia($application, $count);
            } else {
                throw new InvalidConfigurationException(sprintf('No application with name %s found', $application));
            }
        } catch (\Exception $e) {
            return new Response('');
        }

        return $this->render(
            $template,
            array(
                'user' => $user,
                'records' => $records,
                'application' => $application,
            )
        );
    }
}
