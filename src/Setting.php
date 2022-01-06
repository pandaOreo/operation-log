<?php

namespace Oreo\OperationLog;

use Dcat\Admin\Extend\Setting as Form;
use Dcat\Admin\Support\Helper;
use Oreo\OperationLog\Models\OperationLog;

class Setting extends Form
{

    public function title()
    {
        return $this->trans('log.title');
    }

    protected function formatInput(array $input)
    {
        // 转化为数组,注意如果这里保存的时候是数组,name读取出来的时候也是数组
        $input['except'] = Helper::array($input['except']);
        $input['allowed_methods'] = Helper::array($input['allowed_methods']);
        return $input;
    }

    public function form()
    {
        $this->tags('except');
        $this->multipleSelect('allowed_methods')
            ->options(array_combine(OperationLog::$methods, OperationLog::$methods));
        $this->tags('secret_fields');
    }
}
