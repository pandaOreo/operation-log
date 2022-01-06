<?php
/**
 * @Author       : fanjinghua
 * @LastEditors  : fanjinghua
 * @LastEditTime : 2022/1/6 10:12
 * @Description  : 佛祖保佑,永无BUG
 */

namespace Oreo\OperationLog\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

class OperationLog extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'admin_operation_log';

    protected $fillable = ['user_id', 'path', 'method', 'ip', 'input'];

    public static $methodColors = [
        'GET' => 'primary',
        'POST' => 'success',
        'PUT' => 'blue',
        'DELETE' => 'danger',
    ];

    public static $methods = [
        'GET', 'POST', 'PUT', 'DELETE', 'OPTIONS', 'PATCH',
        'LINK', 'UNLINK', 'COPY', 'HEAD', 'PURGE',
    ];

    public function __construct(array $attributes = [])
    {
        $this->connection = config('database.connection') ? : config('database.default');

        parent::__construct($attributes);
    }

    /**
     * Log belongs to users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(config('admin.database.users_model'));
    }
}
