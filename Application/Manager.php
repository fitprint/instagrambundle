<?php
namespace Fit\InstagramBundle\Application;


use Fit\InstagramBundle\Model\Media;
use Fit\InstagramBundle\Model\User;
use GuzzleHttp\ClientInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class Manager
{
    /**
     * @var array
     */
    protected $applications;

    protected $url_user = 'https://api.instagram.com/v1/users/search?q=%s&client_id=%s';
    protected $url_media = 'https://api.instagram.com/v1/users/%s/media/recent/?client_id=%s&count=%d';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;
    protected $users = [];

    /**
     * @param array $config Configuration array
     * @param ClientInterface $client
     */
    public function __construct(array $config, ClientInterface $client)
    {
        $this->config = $config;
        $this->client = $client;

    }

    /**
     * Check if application exists in configuration under 'applications' node
     *
     * @param string $application Application name
     *
     * @return bool
     */
    public function has($application) {
        return isset($this->config['applications'][$application]);
    }


    /**
     * @param $application
     * @return User
     */
    public function getUser($application)
    {
        // from cache
        if (isset($this->users[$application])) {
            return $this->users[$application];
        }

        $response = $this->client->get(sprintf($this->url_user,  $application, $this->getClientId($application)));

        if ($response->getStatusCode()==200) {
            $user = User::fromResponse($response->json());
            if ($user->getUsername() == $application) {
                $this->users[$application] = $user;
                return $this->users[$application];
            }
        }
        return null;
    }


    /**
     * @param $application
     * @param int $count
     * @return Media[]
     */
    public function getMedia($application, $count = 10)
    {
        if ($user = $this->getUser($application)) {

            $response = $this->client->get(sprintf($this->url_media, $user->getId(), $this->getClientId($application), $count));
            return Media::fromResponse($response->json());
        }
    }

    /**
     * @param $application
     * @return string
     */
    protected function getClientId($application)
    {
        return $this->config['applications'][$application]['client_id'];
    }
}