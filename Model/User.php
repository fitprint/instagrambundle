<?php
namespace Fit\InstagramBundle\Model;

class User {

    protected $id;
    protected $username;
    protected $profilePicture;
    protected $fullName;

    /**
     * @param $responseArray
     * @return User
     */
    public static function fromResponse($responseArray)
    {
        if (isset($responseArray['meta']) && isset($responseArray['meta']['code']) && $responseArray['meta']['code']==200 &&
            isset($responseArray['data']) && count($responseArray['data'])>0 &&
            ($userData=$responseArray['data'][0])) {

            $instance = new self;
            $instance->setId($userData['id']);
            $instance->setUsername($userData['username']);
            $instance->setProfilePicture($userData['profile_picture']);
            $instance->setFullName($userData['full_name']);
            return $instance;
        }
        return null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    /**
     * @param mixed $profilePicture
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }
}