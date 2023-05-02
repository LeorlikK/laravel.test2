<?php

namespace App\Nova\Filters\Account;

use App\Models\Device;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class DeviceFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';
    public $name = 'Device';
    protected string $column;

    public function __construct(string $column)
    {
        $this->column = $column;
    }

    public function key():string
    {
        return 'device_id_'.$this->column;
    }

    /**
     * Apply the filter to the given query.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(NovaRequest $request, $query, $value): Builder
    {
        $query->where($this->column, '=', $value);
        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function options(NovaRequest $request): array
    {
        $devices = \App\Models\Device::get();
        foreach ($devices as $device) {
            $array[$device->device_name] = $device->id;
        }
        return $array;
    }
}
