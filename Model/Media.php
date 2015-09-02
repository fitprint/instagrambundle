<?php
namespace Fit\InstagramBundle\Model;

class Media {

    protected $id;
    protected $attribution;
    protected $tags;
    protected $location;
    protected $comments;
    protected $filter;
    protected $createdTime;
    protected $link;
    protected $likes;
    protected $images;
    protected $usersInPhoto;
    protected $caption;
    protected $type;
    protected $user;

    /**
     * @param $responseArray
     * @return Media[]
     */
    public static function fromResponse($responseArray)
    {
        if (isset($responseArray['meta']) && isset($responseArray['meta']['code']) && $responseArray['meta']['code']==200 &&
            isset($responseArray['data']) && count($responseArray['data'])>0 && $mediaData=$responseArray['data']) {

            $result = [];
            foreach($mediaData as $_md) {
                $instance = new self;
                $instance->setId($_md['id']);
                $instance->setAttribution($_md['attribution']);
                $instance->setCaption($_md['caption']);
                $instance->setComments($_md['comments']);
                $instance->setCreatedTime($_md['created_time']);
                $instance->setLink($_md['link']);
                $instance->setLikes($_md['likes']);
                $instance->setImages($_md['images']);
                $instance->setUsersInPhoto($_md['users_in_photo']);
                $instance->setType($_md['type']);
                $instance->setTags($_md['tags']);
                $instance->setUser($_md['user']);
                $instance->setLocation($_md['location']);

                $result[] = $instance;
            }
            return $result;
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
    public function getAttribution()
    {
        return $this->attribution;
    }

    /**
     * @param mixed $attribution
     */
    public function setAttribution($attribution)
    {
        $this->attribution = $attribution;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param mixed $filter
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return mixed
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * @param mixed $createdTime
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param mixed $likes
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return mixed
     */
    public function getUsersInPhoto()
    {
        return $this->usersInPhoto;
    }

    /**
     * @param mixed $users_in_photo
     */
    public function setUsersInPhoto($users_in_photo)
    {
        $this->usersInPhoto = $users_in_photo;
    }

    /**
     * @return mixed
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param mixed $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}