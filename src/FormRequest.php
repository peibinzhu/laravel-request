<?php

declare(strict_types=1);

namespace PeibinLaravel\Request;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;
use Illuminate\Support\ValidatedInput;
use Illuminate\Validation\ValidationException;
use PeibinLaravel\Context\Context;

class FormRequest extends BaseFormRequest
{
    /**
     * Indicates whether validation should stop after the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    /**
     * Whether to automatically validate data.
     *
     * @var bool
     */
    protected bool $autoValidate = true;

    /**
     * The scenes defined by developer.
     *
     * @var array
     */
    protected array $scenes = [];

    /**
     * Get the validator instance for the request.
     *
     * @return Validator
     */
    protected function getValidatorInstance()
    {
        return Context::getOrSet($this->getContextValidatorKey(Validator::class), function () {
            $factory = $this->container->make(ValidationFactory::class);

            if (method_exists($this, 'validator')) {
                $validator = $this->container->call([$this, 'validator'], compact('factory'));
            } else {
                $validator = $this->createDefaultValidator($factory);
            }

            if (method_exists($this, 'withValidator')) {
                $this->withValidator($validator);
            }

            return $validator;
        });
    }

    /**
     * Get a validated input container for the validated input.
     *
     * @param array|null $keys
     * @return ValidatedInput|array
     */
    public function safe(array $keys = null)
    {
        return is_array($keys)
            ? $this->getValidatorInstance()->safe()->only($keys)
            : $this->getValidatorInstance()->safe();
    }

    /**
     * Get the validated data from the request.
     *
     * @param string|null $key
     * @param mixed       $default
     * @return mixed
     */
    public function validated($key = null, $default = null)
    {
        return data_get($this->getValidatorInstance()->validated(), $key, $default);
    }

    /**
     * Set up verification scene.
     *
     * @param string $scene
     * @return $this
     */
    public function scene(string $scene): static
    {
        if (method_exists($this, 'autoValidate')) {
            $this->autoValidate = $this->container->call([$this, 'autoValidate']);
        }

        Context::set($this->getContextValidatorKey('scene'), $scene);
        return $this;
    }

    /**
     * Get the verification scene.
     *
     * @return string|null
     */
    public function getScene(): ?string
    {
        return Context::get($this->getContextValidatorKey('scene'));
    }

    /**
     * Determine whether the request is automatically verified.
     *
     * @return bool
     */
    public function autoValidate(): bool
    {
        return false;
    }

    /**
     * Validate the class instance.
     *
     * @return void
     * @throws ValidationException
     */
    public function validateResolved(): void
    {
        if (!$this->autoValidate) {
            parent::validateResolved();
        }
    }

    /**
     * Create the default validator instance.
     *
     * @param ValidationFactory $factory
     * @return Validator
     */
    protected function createDefaultValidator(ValidationFactory $factory): Validator
    {
        return $factory->make(
            $this->validationData(),
            $this->getRules(),
            $this->messages(),
            $this->attributes()
        )->stopOnFirstFailure($this->stopOnFirstFailure);
    }

    /**
     * Get context validator key.
     */
    protected function getContextValidatorKey(string $key): string
    {
        return sprintf('%s:%s', spl_object_hash($this), $key);
    }

    /**
     * Get validation rules.
     *
     * @return array
     */
    protected function getRules(): array
    {
        $scene = $this->getScene();
        $rules = call_user_func_array([$this, 'rules'], []);

        $makeRules = function ($sceneRules) use ($rules) {
            $newRules = [];
            foreach ($sceneRules as $key => $field) {
                $newRule = null;
                $isNewRule = !is_numeric($key);
                if ($isNewRule) {
                    $newRule = $field;
                    $field = $key;
                }

                if (array_key_exists($field, $rules)) {
                    $newRules[$field] = $isNewRule ? $newRule : $rules[$field];
                }
            }
            return $newRules;
        };

        if ($scene) {
            $scenes = $this->scenes;
            if (method_exists($this, 'scenes')) {
                $scenes = $this->scenes();
            }

            $newRules = null;
            if (isset($scenes[$scene]) && is_array($scenes[$scene])) {
                $newRules = $scenes[$scene];
            }

            if ($newRules) {
                $rules = $makeRules($newRules);
            }
        }

        return $rules;
    }
}
