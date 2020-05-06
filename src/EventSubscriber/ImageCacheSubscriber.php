<?php

namespace App\EventSubscriber;

use App\Entity\Article;
use Symfony\Component\EventDispatcher\GenericEvent;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class ImageCacheSubscriber implements EventSubscriberInterface
{
    /**
     * @var CacheManager;
     */
    private $cacheManager;
    /**
     * @var $uploaderHelper
     */
    private $uploaderHelper;

    public function __construct(CacheManager $cacheManager, UploaderHelper $uploaderHelper)
    {
        $this->cacheManager = $cacheManager;
        $this->uploaderHelper = $uploaderHelper;
    }

    public static function getSubscribedEvents()
    {
        return [
            'easy_admin.pre_update' => ['preUpdate'],
            'easy_admin.pre_remove' => ['preRemove'],
        ];
    }

    public function preRemove(GenericEvent $event)
    {
        $entity = $event->getSubject();
        if(!$entity instanceof Article){
            return;
        }
        $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));

    }

    public function preUpdate(GenericEvent $event)
    {
        $entity = $event->getSubject();
        if(!$entity instanceof Article){
            return;
        }
        if($entity->getImageFile() instanceof UploadedFile){
            $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
        }
    }
}