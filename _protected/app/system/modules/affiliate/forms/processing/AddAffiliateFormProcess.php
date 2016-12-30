<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2012-2017, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package        PH7 / App / System / Module / Affiliate / Form / Processing
 */
namespace PH7;
defined('PH7') or exit('Restricted access');

use
PH7\Framework\Ip\Ip,
PH7\Framework\Mvc\Router\Uri,
PH7\Framework\Url\Header;

class AddAffiliateFormProcess extends Form
{

    public function __construct()
    {
        parent::__construct();

        $sBirthDate = $this->dateTime->get($this->httpRequest->post('birth_date'))->date('Y-m-d');

        $aData = [
            'email' => $this->httpRequest->post('mail'),
            'username' => $this->httpRequest->post('username'),
            'password' => $this->httpRequest->post('password'),
            'first_name' => $this->httpRequest->post('first_name'),
            'last_name' => $this->httpRequest->post('last_name'),
            'middle_name' => $this->httpRequest->post('middle_name'),
            'sex' => $this->httpRequest->post('sex'),
            'birth_date' => $sBirthDate,
            'country' => $this->httpRequest->post('country'),
            'city' => $this->httpRequest->post('city'),
            'state' => $this->httpRequest->post('state'),
            'zip_code' => $this->httpRequest->post('zip_code'),
            'phone' => $this->httpRequest->post('phone'),
            'description' => $this->httpRequest->post('description'),
            'website' => $this->httpRequest->post('website'),
            'bank_account' => $this->httpRequest->post('bank_account'),
            'ip' => Ip::get()
        ];

        (new AffiliateModel)->add($aData);

        Header::redirect(Uri::get('affiliate', 'admin', 'browse'), t('The affiliate has been successfully added.'));
    }

}
