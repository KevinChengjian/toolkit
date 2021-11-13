<?php


namespace App\Traits;

use DateTimeInterface;

/**
 * Trait BasicModelTrait
 * @package Kevin\Basic\Traits
 */
trait BasicModelTrait
{
    /**
     * @param \DateTimeInterface $date
     * @return string
     */
    public function serializeDate(DateTimeInterface $date): string
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }

    /**
     * @param array $data
     * @param integer|null $id
     * @return mixed
     */
    public static function updateOrCreateById(array $data, $id = null)
    {
        return static::query()->updateOrCreate(['id' => $id], $data);
    }
}