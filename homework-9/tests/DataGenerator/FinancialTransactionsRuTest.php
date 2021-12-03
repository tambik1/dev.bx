<?php

class FinancialTransactionsRuTest extends \PHPUnit\Framework\TestCase
{
	public function getValidateFailSamples(): array
	{
		return [
			'empty' => [
				[],
				array_fill(0, 5, \App\DataGenerator\FinancialTransactionsRu::ERROR_CODE_MANDATORY_FIELD_IS_NOT_FILLED),
			],
			'filledEmpty' => [
				[
					'Name' => '',
					'PersonalAcc' => '',
					'BankName' => '',
					'BIC' => '',
					'CorrespAcc' => '',
				],
				array_fill(0, 5, \App\DataGenerator\FinancialTransactionsRu::ERROR_CODE_MANDATORY_FIELD_IS_NOT_FILLED),
			],
			'incorrectType' => [
				[
					'Name' => true,
					'PersonalAcc' => true,
					'BankName' => true,
					'BIC' => true,
					'CorrespAcc' => true,
				],
				array_fill(0, 5, \App\DataGenerator\FinancialTransactionsRu::ERROR_CODE_VALUE_INCORRECT_TYPE),
			],
			'tooLonger' => [
				[
					'Name' => 'gkasdjvdfsghbsdfjgbfjgbjgbsdfjgbsdfjgbsdfjgsdngsjdfgndsjfgnsdfjgndsjkgndskjgndjkgndfjkgndfkjgndjkgndjkgndsfjgndfjgndfjkgndfjgndfkjgnsdfgndgkjdsngkjsgnjkdfgndjfkngsdkjlgndsfjgndfkjgndfjkgndfjkgndfjkvbncbndfsknsdkfjgndkjgndsfkjgnsdfklgnsdflkgndsfko',
					'PersonalAcc' => '34534253453245234523523452345234655757',
					'BankName' => 'dfsgsdfggsdfgsdfgsdfgsdfgdfgsdfgsdfgsdfgsdfgsdfg',
					'BIC' => '34252345234523523523523',
					'CorrespAcc' => '3452542345234532452352',
				],
				array_fill(0, 5, \App\DataGenerator\FinancialTransactionsRu::ERROR_CODE_VALUE_IS_TOO_LONG),
			],
		];
	}

	public function getDataSamples(): array
	{
		return [
			'empty' => [
				[],
				'ST00012|Name=|PersonalAcc=|BankName=|BIC=|CorrespAcc=',
			],
			'filled' => [
				[
					'Name' => 'ТЦ Ы',
					'PersonalAcc' => '123321123321123321141',
					'BankName' => 'ООО "АЛЬФА"',
					'BIC' => '123456789',
					'CorrespAcc' => '34634634646345634654',
					'Sum' => '1020',
					'UIN' => '46546346346436436346346346',
				],
				'ST00012|Name=ТЦ Ы|PersonalAcc=123321123321123321141|BankName=ООО "АЛЬФА"|BIC=123456789|CorrespAcc=34634634646345634654|Sum=1020|UIN=46546346346436436346346346',
			],
		];
	}

	/**
	 * @dataProvider getValidateFailSamples
	 * @param array $fields
	 * @param array $expectedErrorCodes
	 */
	public function testValidateFail(array $fields, array $expectedErrorCodes): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		$result = $dataGenerator->validate();
		$errorCodes = array_map(function ($error) {
			return $error->getCode();
		}, $result->getErrors());
		static::assertFalse($result->isSuccess());
		static::assertEqualsCanonicalizing($errorCodes, $expectedErrorCodes);
	}

	/**
	 * @dataProvider getDataSamples
	 * @param array $fields
	 * @param array $expectedData
	 */
	public function testGetData(array $fields, string $expectedData): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		$data = $dataGenerator->getData();

		static::assertEquals($expectedData, $data);
	}

	public function testThatValidateSuccess(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields([
			'Name' => 'dfg sdfgsdg',
			'PersonalAcc' => '123321123321123321141',
			'BankName' => 'fgd "sgfdgs"',
			'BIC' => '123456789',
			'CorrespAcc' => '34634634646345634654',
			'Sum' => '1020',
			'UIN' => '46546346346436436346346346',
		]);

		$result = $dataGenerator->validate();

		static::assertFalse($result->isSuccess());
	}
}
