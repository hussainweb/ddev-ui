<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Process\Exceptions\ProcessFailedException;
use Illuminate\Support\Facades\Process;
use Sushi\Sushi;

class Project extends Model
{
    use HasFactory;
    use Sushi;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $primaryKey = 'name';

    protected $schema = [
        'name' => 'string',
        'status' => 'string',
        'status_desc' => 'string',
        'type' => 'string',
        'url' => 'string',
        'primary_url' => 'string',
        'approot' => 'string',
        'docroot' => 'string',
        'shortroot' => 'string',
        'httpurl' => 'string',
        'httpsurl' => 'string',
        'mutagen_enabled' => 'boolean',
        'mutagen_status' => 'string',
        'nodejs_version' => 'string',
        'router' => 'string',
        'router_disabled' => 'boolean',
    ];

    public function getRows()
    {
        $shell = trim(Process::run('echo $SHELL')->output());
        $res = Process::run("$shell -c 'ddev list -j'");
        if ($res->exitCode() != 0) {
            throw new ProcessFailedException($res);
        }

        $ddev_list = json_decode($res->output(), associative: true);

        return $ddev_list['raw'];
    }
}
