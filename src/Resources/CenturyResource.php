<?php

namespace Taggers\Century\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CenturyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'allDay' => $this->all_day,
            'start' => $this->start,
            'end' => $this->end,
            $this->mergeWhen($this->options, $this->refactorOptions($this->options))
        ];
    }

    public function refactorOptions($options)
    {
        $opts = [];
        foreach ($options as $key => $value) {
            $opts = array_add($opts, $key, $value);
        }
        return $opts;
    }
}
