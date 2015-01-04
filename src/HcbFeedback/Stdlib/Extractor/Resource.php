<?php
namespace HcbFeedback\Stdlib\Extractor;

use Doctrine\ORM\EntityManager;
use Zf2Libs\Stdlib\Extractor\ExtractorInterface;
use Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException;
use HcfFeedback\Entity\Feedback as FeedbackEntity;

class Resource implements ExtractorInterface
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Extract values from an object
     *
     * @param  FeedbackEntity $feedbackEntity
     *
     * @throws \Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException
     * @return array
     */
    public function extract($feedbackEntity)
    {
        if (!$feedbackEntity instanceof FeedbackEntity) {
            throw new InvalidArgumentException
            ("Expected HcfFeedback\\Entity\\Feedback object, invalid object given");
        }

        return array('id'=> $feedbackEntity->getId(),
                     'phone'=>$feedbackEntity->getPhone(),
                     'message'=>$feedbackEntity->getMessage(),
                     'email'=>$feedbackEntity->getEmail(),
                     'name'=>$feedbackEntity->getName());
    }
}
