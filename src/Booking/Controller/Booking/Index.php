<?php

namespace Demo\Booking\Controller\Booking;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Demo\Booking\Model\BookingFactory as BookingFactory;
use PHPUnit\Runner\Exception;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $bookingFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        BookingFactory $bookingFactory
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->bookingFactory = $bookingFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $post = (array)$this->getRequest()->getPost();

        if (!empty($post)) {
            // Retrieve your form data
            $firstname = $post['firstname'];
            $lastname = $post['lastname'];
            $phone = $post['phone'];
            $bookingTime = $post['booking_time'];


            try {
                $error = false;

                if (!\Zend_Validate::is(trim($firstname), 'NotEmpty')) {
                    $this->messageManager->addError(
                        __('First name must not be empty')
                    );
                    $error = true;
                }
                if (!\Zend_Validate::is(trim($lastname), 'NotEmpty')) {
                    $this->messageManager->addError(
                        __('Last name must not be empty')
                    );
                }
                if (!\Zend_Validate::is(trim($phone), 'NotEmpty')) {
                    $this->messageManager->addError(
                        __('Phone must not be empty')
                    );
                    $error = true;
                }
                if (!\Zend_Validate::is(trim($bookingTime), 'NotEmpty')) {
                    $this->messageManager->addError(
                        __('Booking date must not be empty')
                    );
                    $error = true;
                }
                if (!$error) {
                    $booking = $this->bookingFactory->create();
                    $booking->addData([
                        "firstname" => $firstname,
                        "lastname" => $lastname,
                        "phone" => $phone,
                        "booking_date" => date('Y-m-d H:i:s', strtotime($bookingTime)),

                    ]);

                    $booking->save();
                    $this->messageManager->addSuccessMessage('Booking done !');
                }

            } catch (Exception $e) {
                $this->inlineTranslation->resume();
                $this->messageManager->addSuccessMessage($e->getMessage());
            }

            // Redirect to your form page (or anywhere you want...)
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/booking/booking');

            return $resultRedirect;
        }
        // 2. GET request : Render the booking page
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}