<?php

declare(strict_types=1);

namespace AB\OrderTypes\Observer\Sales;

use Magento\Framework\DataObject\Copy;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SaveOrderBeforeSalesModelQuoteObserver implements ObserverInterface
{
    /**
     * @var Copy
     */
    private Copy $objectCopyService;

    /**
     * @param Copy $objectCopyService
     */
    public function __construct(Copy $objectCopyService)
    {
        $this->objectCopyService = $objectCopyService;
    }

    /**
     * @param Observer $observer
     * @return SaveOrderBeforeSalesModelQuoteObserver
     */
    public function execute(Observer $observer): SaveOrderBeforeSalesModelQuoteObserver
    {
        $this->objectCopyService->copyFieldsetToTarget(
            'sales_convert_quote',
            'to_order',
            $observer->getEvent()->getQuote(),
            $observer->getEvent()->getOrder()
        );

        return $this;
    }
}
