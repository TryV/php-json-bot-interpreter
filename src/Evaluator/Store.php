<?php

namespace Tryv\PhpJsonBotInterpreter\Evaluator;

use Tryv\PhpJsonBotInterpreter\Interface\EvaluatorInterface;
use Tryv\PhpJsonBotInterpreter\Interface\StoreInterface;
use Tryv\PhpJsonBotInterpreter\Interface\ValueInterface;
use Tryv\PhpJsonBotInterpreter\Prototype;

class Store extends Prototype implements EvaluatorInterface
{
	protected string|ValueInterface $key;

	public function getValue()
	{
		/** @var StoreInterface $store */
		$store = $this->getContextValue('store');

		return $store->get($this->key instanceof ValueInterface ? $this->key->getValue() : $this->key);
	}

	protected static function getRequiredFieldNames(): array {
		return ['key'];
	}

	protected static function isExpectedFieldName(string $name): bool
	{
		return false;
	}

	protected static function isFieldArray(string $name, ?\Closure &$type_checker = null): bool
	{
		return false;
	}
}
