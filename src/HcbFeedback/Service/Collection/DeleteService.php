<?php
namespace HcbFeedback\Service\Collection;

use HcfFeedback\Entity\Feedback as FeedbackEntity;
use HcCore\Data\Collection\Entities\ByIdsInterface;
use HcCore\Service\CommandInterface;
use Doctrine\ORM\EntityManagerInterface;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class DeleteService implements CommandInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var ByIdsInterface
     */
    protected $data;

    /**
     * @param EntityManagerInterface $entityManager
     * @param Response $response
     * @param ByIdsInterface $data
     */
    public function __construct(EntityManagerInterface $entityManager,
                                Response $response,
                                ByIdsInterface $data)
    {
        $this->entityManager = $entityManager;
        $this->response = $response;
        $this->data = $data;
    }

    /**
     * @return Response
     */
    public function execute()
    {
        return $this->delete($this->data);
    }

    /**
     * @param ByIdsInterface $feedback
     *
     * @return Response
     */
    protected function delete(ByIdsInterface $feedback)
    {
        try {
            $this->entityManager->beginTransaction();
            $feedbackEntities = $feedback->getEntities();

            /* @var $feedbackEntities FeedbackEntity[] */
            foreach ($feedbackEntities as $reviewEntity) {
                $this->entityManager->remove($reviewEntity);
            }
            $this->entityManager->flush();
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->response->error($e->getMessage())->failed();
            return $this->response;
        }

        $this->response->success();
        return $this->response;
    }
}
