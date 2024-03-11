<?php

declare(strict_types=1);

namespace AB\OrderTypes\Block\Adminhtml;

use Magento\Backend\Block\Template\Context;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Backend\Block\Template;
use Magento\Sales\Api\OrderRepositoryInterface;

class OrderTypes extends Template
{
    /**
     * @var OrderRepositoryInterface
     */
    private OrderRepositoryInterface $orderRepository;

    /**
     * @param Context $context
     * @param OrderRepositoryInterface $orderRepository
     * @param array $data
     */
    public function __construct(Context $context, OrderRepositoryInterface $orderRepository, array $data = [])
    {
        $this->orderRepository = $orderRepository;
        parent::__construct($context, $data);
    }

    /**
     * @return bool|OrderInterface
     */
    public function getOrder(): bool|OrderInterface
    {
        $orderId = $this->getRequest()->getParam('order_id');
        return $this->orderRepository->get($orderId);
    }
}
