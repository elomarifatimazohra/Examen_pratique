<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Validator\Tests\Constraints;

use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\RangeValidator;
use Symfony\Component\Validator\Validation;

class RangeValidatorTest extends AbstractConstraintValidatorTest
{
    protected function getApiVersion()
    {
        return Validation::API_VERSION_2_5;
    }

    protected function createValidator()
    {
        return new RangeValidator();
    }

    public function testNullIsValid()
    {
        $this->validator->validate(null, new Range(array('min' => 10, 'max' => 20)));

        $this->assertNoViolation();
    }

    public function getTenToTwenty()
    {
        return array(
            array(10.00001),
            array(19.99999),
            array('10.00001'),
            array('19.99999'),
            array(10),
            array(20),
            array(10.0),
            array(20.0),
        );
    }

    public function getLessThanTen()
    {
        return array(
            array(9.99999),
            array('9.99999'),
            array(5),
            array(1.0),
        );
    }

    public function getMoreThanTwenty()
    {
        return array(
            array(20.000001),
            array('20.000001'),
            array(21),
            array(30.0),
        );
    }

    /**
     * @dataProvider getTenToTwenty
     */
    public function testValidValuesMin($value)
    {
        $constraint = new Range(array('min' => 10));
        $this->validator->validate($value, $constraint);

        $this->assertNoViolation();
    }

    /**
     * @dataProvider getTenToTwenty
     */
    public function testValidValuesMax($value)
    {
        $constraint = new Range(array('max' => 20));
        $this->validator->validate($value, $constraint);

        $this->assertNoViolation();
    }

    /**
     * @dataProvider getTenToTwenty
     */
    public function testValidValuesMinMax($value)
    {
        $constraint = new Range(array('min' => 10, 'max' => 20));
        $this->validator->validate($value, $constraint);

        $this->assertNoViolation();
    }

    /**
     * @dataProvider getLessThanTen
     */
    public function testInvalidValuesMin($value)
    {
        $constraint = new Range(array(
            'min' => 10,
            'minMessage' => 'myMessage',
        ));

        $this->validator->validate($value, $constraint);

        $this->assertViolation('myMessage', array(
            '{{ value }}' => $value,
            '{{ limit }}' => 10,
        ));
    }

    /**
     * @dataProvider getMoreThanTwenty
     */
    public function testInvalidValuesMax($value)
    {
        $constraint = new Range(array(
            'max' => 20,
            'maxMessage' => 'myMessage',
        ));

        $this->validator->validate($value, $constraint);

        $this->assertViolation('myMessage', array(
            '{{ value }}' => $value,
            '{{ limit }}' => 20,
        ));
    }

    /**
     * @dataProvider getMoreThanTwenty
     */
    public function testInvalidValuesCombinedMax($value)
    {
        $constraint = new Range(array(
            'min' => 10,
            'max' => 20,
            'minMessage' => 'myMinMessage',
            'maxMessage' => 'myMaxMessage',
        ));

        $this->validator->validate($value, $constraint);

        $this->assertViolation('myMaxMessage', array(
            '{{ value }}' => $value,
            '{{ limit }}' => 20,
        ));
    }

    /**
     * @dataProvider getLessThanTen
     */
    public function testInvalidValuesCombinedMin($value)
    {
        $constraint = new Range(array(
            'min' => 10,
            'max' => 20,
            'minMessage' => 'myMinMessage',
            'maxMessage' => 'myMaxMessage',
        ));

        $this->validator->validate($value, $constraint);

        $this->assertViolation('myMinMessage', array(
            '{{ value }}' => $value,
            '{{ limit }}' => 10,
        ));
    }

    public function getInvalidValues()
    {
        return array(
            array(9.999999),
            array(20.000001),
            array('9.999999'),
            array('20.000001'),
            array(new \stdClass()),
        );
    }

    public function testMinMessageIsSet()
    {
        $constraint = new Range(array(
            'min' => 10,
            'max' => 20,
            'minMessage' => 'myMessage',
        ));

        $this->validator->validate(9, $constraint);

        $this->assertViolation('myMessage', array(
            '{{ value }}' => 9,
            '{{ limit }}' => 10,
        ));
    }

    public function testMaxMessageIsSet()
    {
        $constraint = new Range(array(
            'min' => 10,
            'max' => 20,
            'maxMessage' => 'myMessage',
        ));

        $this->validator->validate(21, $constraint);

        $this->assertViolation('myMessage', array(
            '{{ value }}' => 21,
            '{{ limit }}' => 20,
        ));
    }

    public function testNonNumeric()
    {
        $this->validator->validate('abcd', new Range(array(
            'min' => 10,
            'max' => 20,
            'invalidMessage' => 'myMessage',
        )));

        $this->assertViolation('myMessage', array(
            '{{ value }}' => '"abcd"',
        ));
    }
}
