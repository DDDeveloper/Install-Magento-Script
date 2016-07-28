<?php
namespace Training1\Review\Model\Review;

use Magento\Framework\Phrase;

class Validateplugin
{

        /**
     * @param \Magento\Review\Model\Review $review
     * @param bool|string[]                $result
     *
     * @return bool|string[]
     */
    public function afterValidate(\Magento\Review\Model\Review $review, $result)
    {
        $message = [];
        if (strpos($review->getNickname(), '-') !== false) {
            $message[] = (new Phrase('Nickname cannot contain dashes (-).'))->__toString();
        }

        if (empty($message) && $result === true) {
            return true;
        }
        if (is_array($result)) {
            return array_merge($message, $result);
        }
        return $message;
    }
}
