<?php
namespace aliwang\myanmarTools;

class NumberType{


     /**
     * 号码类型
     * @param $num
     * @return string
     */
    public function checkNumType($num): string
    {
        
        if (strlen($num)< 5) {
            return '';
        }
        return self::checkPhoneOperator($num);
    }


    
    protected static function checkPhoneOperator($phone): string
    {
        if (self::checkPhoneMptOperator($phone)) {
            return 'MPT';
        } else if (self::checkPhoneTelenorOperator($phone)) {
            return 'Telenor';
        } else if (self::checkPhoneOoredooOperator($phone)) {
            return 'Ooredoo';
        } else if (self::checkPhoneMecOperator($phone)) {
            return 'MEC';
        } else if (self::checkPhoneMytelOperator($phone)) {
            return 'MyTel';
        }
        return "号码不正确";
    }

     /**
     * 是否是Mpt的手机号
     * @param $phone
     * @return bool
     */
    protected static function checkPhoneMptOperator($phone): bool
    {
        $len9Arr = ['0920', '0921', '0922', '0923', '0924', '0950',
            '0951', '0952', '0953', '0954', '0955', '0956', '0983', '0985', '0986', '0987'];
        $len10Arr = ['0941', '0943', '0947', '0949', '0973', '0991'];
        $len11Arr = ['0925', '0926', '0940', '0942', '0944', '0945', '0948', '0988', '0989'];
        $str = substr($phone, 0, 4);
        if (in_array($str, $len9Arr)) {
            return true;
        }
        if (in_array($str, $len10Arr)) {
            return true;
        }
        if (in_array($str, $len11Arr)) {
            return true;
        }
        return false;
    }

    /**
     * 是否是Ooredoo的手机号
     * @param $phone
     * @return bool
     */
    protected static function checkPhoneOoredooOperator($phone): bool
    {
        $len11Arr = ['0994', '0995', '0996', '0997', '0998'];
        $str = substr($phone, 0, 4);
        if (in_array($str, $len11Arr)) {
            return true;
        }
        return false;
    }

    /**
     * 是否是Mec的手机号
     * @param $phone
     * @return bool
     */
    protected static function checkPhoneMecOperator($phone): bool
    {
        $len10Arr = ['0930', '0931', '0932', '0933', '0936'];
        $len11Arr = ['0934', '0935'];
        $str = substr($phone, 0, 4);
        if (in_array($str, $len10Arr)) {
            return true;
        }
        if (in_array($str, $len11Arr)) {
            return true;
        }
        return false;
    }

    /**
     * 是否是Telenor的手机号
     * @param $phone
     * @return bool
     */
    protected static function checkPhoneTelenorOperator($phone): bool
    {
        $len11Arr = ['0974', '0975', '0976', '0977', '0978', '0979'];
        $str = substr($phone, 0, 4);
        if (in_array($str, $len11Arr)) {
            return true;
        }
        return false;
    }

    /**
     * 是否是Mytel的手机号
     * @param $phone
     * @return bool
     */
    protected static function checkPhoneMytelOperator($phone): bool
    {
        $len11Arr = ['0965', '0966', '0967', '0968', '0969'];
        $str = substr($phone, 0, 4);
        if (in_array($str, $len11Arr)) {
            return true;
        }
        return false;
    }


}