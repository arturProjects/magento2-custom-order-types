<?php

declare(strict_types=1);

namespace AB\OrderTypes\Plugin;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Checkout\Model\ShippingInformationManagement;

class ShippingInformationManagementPlugin
{
    /**
     * @var CartRepositoryInterface
     */
    private CartRepositoryInterface $cartRepository;

    /**
     * @param CartRepositoryInterface $cartRepository
     */
    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * @param ShippingInformationManagement $subject
     * @param $cartId
     * @param $addressInformation
     * @return array
     * @throws NoSuchEntityException
     */
    public function beforeSaveAddressInformation(ShippingInformationManagement $subject, $cartId, $addressInformation): array
    {
        $quote = $this->cartRepository->getActive($cartId);
        $myCustomAttribute = $addressInformation->getExtensionAttributes()->getCustomOrderType();
        $quote->setCustomOrderType($myCustomAttribute);
        $this->cartRepository->save($quote);
        return [$cartId, $addressInformation];
    }
}
