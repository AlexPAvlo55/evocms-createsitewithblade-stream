<?php
namespace EvolutionCMS\Stream\Models;
use Illuminate\Database\Eloquent;
/**
 * EvolutionCMS\Nosovski\Models\ActivateSms
 *
 * @property int $id
 * @property string $code
 * @property string $hash_user
 * @property string $user_id
 *
 * @mixin \Eloquent
 */
class TestTable extends Eloquent\Model
{
    protected $table = 'test_table';
    const CREATED_AT = 'createdon';
    const UPDATED_AT = 'editedon';
    protected $dateFormat = 'U';

    protected $fillable = [
        'id',
        'text',
        'createdon',
        'editedon'
    ];
}