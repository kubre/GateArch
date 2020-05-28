<?php

namespace Tests\Unit;

use App\Result;
use PHPUnit\Framework\TestCase;

class ResultTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function ResultCalculation()
    {
        $data = array(
            'sections' => array(
                0 =>
                array(
                    'id' => 1,
                    'title' => 'General Aptitude',
                    'number' => 1,
                    'questions' =>
                    array(
                        0 =>
                        array(
                            'number' => '1',
                            'image' => 'ga-2019/1.png',
                            'type' => 'mcq',
                            'answer' => 'C',
                            'marks' => '1',
                            'negative' => '1/3',
                            'solution' => NULL,
                            'state' => 4,
                            'userAnswer' => 'C',
                        ),
                        1 =>
                        array(
                            'number' => '2',
                            'image' => 'ga-2019/2.png',
                            'type' => 'mcq',
                            'answer' => 'C',
                            'marks' => '1',
                            'negative' => '1/3',
                            'solution' => NULL,
                            'state' => 3,
                            'userAnswer' => 'C',
                        ),
                        2 =>
                        array(
                            'number' => '3',
                            'image' => 'ga-2019/3.png',
                            'type' => 'mcq',
                            'answer' => 'C',
                            'marks' => '0',
                            'negative' => '1/3',
                            'solution' => 'Solution',
                            'state' => 3,
                            'userAnswer' => 'A',
                        ),
                        3 =>
                        array(
                            'number' => '4',
                            'image' => 'ap-2019/4.png',
                            'type' => 'mcq',
                            'answer' => 'A',
                            'marks' => '1',
                            'negative' => '2/3',
                            'solution' => 'Demo Solution',
                            'state' => 3,
                            'userAnswer' => 'A',
                        ),
                    ),
                    'exam_id' => '1',
                    'created_at' => '2020-05-13T13:54:39.000000Z',
                    'updated_at' => '2020-05-28T03:13:39.000000Z',
                ),
                1 =>
                array(
                    'id' => 2,
                    'title' => 'Architecture and Planning',
                    'number' => 2,
                    'questions' =>
                    array(
                        0 =>
                        array(
                            'number' => '1',
                            'image' => 'ap-2019/1.png',
                            'type' => 'mcq',
                            'answer' => 'A',
                            'marks' => '1',
                            'negative' => '1/3',
                            'state' => 3,
                            'userAnswer' => 'C',
                        ),
                        1 =>
                        array(
                            'number' => '2',
                            'image' => 'ap-2019/2.png',
                            'type' => 'mcq',
                            'answer' => 'C',
                            'marks' => '1',
                            'negative' => '1/3',
                            'state' => 1,
                        ),
                        2 =>
                        array(
                            'number' => '3',
                            'image' => 'ap-2019/3.png',
                            'type' => 'mcq',
                            'answer' => 'B',
                            'marks' => '1',
                            'negative' => '1/3',
                        ),
                        3 =>
                        array(
                            'number' => '4',
                            'image' => 'ap-2019/21_NAT.png',
                            'type' => 'nat',
                            'answer' => '22',
                            'marks' => '1',
                            'negative' => '1/3',
                            'state' => 3,
                            'userAnswer' => '22',
                        ),
                    ),
                    'exam_id' => '1',
                    'created_at' => '2020-05-18T03:09:15.000000Z',
                    'updated_at' => '2020-05-21T11:00:53.000000Z',
                ),
            ),
            'totalTime' => 180,
            'time' => '177:09',
        );
        $r = new Result;
        $r->calculate($data);
        $this->assertEquals($r->totalQuestions, 8);
    }

    public function testSectionConversionForStroing()
    {
        $sections = array(
            0 =>
            array(
                'id' => 1,
                'title' => 'General Aptitude',
                'number' => 1,
                'questions' =>
                array(
                    0 =>
                    array(
                        'number' => '1',
                        'image' => 'ga-2019/1.png',
                        'type' => 'mcq',
                        'answer' => 'C',
                        'marks' => '1',
                        'negative' => '1/3',
                        'solution' => NULL,
                        'state' => 3,
                        'userAnswer' => 'C',
                    ),
                    1 =>
                    array(
                        'number' => '2',
                        'image' => 'ga-2019/2.png',
                        'type' => 'mcq',
                        'answer' => 'C',
                        'marks' => '1',
                        'negative' => '1/3',
                        'solution' => NULL,
                        'state' => 3,
                        'userAnswer' => 'C',
                    ),
                    2 =>
                    array(
                        'number' => '3',
                        'image' => 'ga-2019/3.png',
                        'type' => 'mcq',
                        'answer' => 'C',
                        'marks' => '0',
                        'negative' => '1/3',
                        'solution' => 'Solution',
                        'state' => 1,
                    ),
                    3 =>
                    array(
                        'number' => '4',
                        'image' => 'ap-2019/4.png',
                        'type' => 'mcq',
                        'answer' => 'A',
                        'marks' => '1',
                        'negative' => '2/3',
                        'solution' => 'Demo Solution',
                    ),
                ),
                'exam_id' => '1',
                'created_at' => '2020-05-13T13:54:39.000000Z',
                'updated_at' => '2020-05-28T03:13:39.000000Z',
            ),
            1 =>
            array(
                'id' => 2,
                'title' => 'Architecture and Planning',
                'number' => 2,
                'questions' =>
                array(
                    0 =>
                    array(
                        'number' => '1',
                        'image' => 'ap-2019/1.png',
                        'type' => 'mcq',
                        'answer' => 'A',
                        'marks' => '1',
                        'negative' => '1/3',
                    ),
                    1 =>
                    array(
                        'number' => '2',
                        'image' => 'ap-2019/2.png',
                        'type' => 'mcq',
                        'answer' => 'C',
                        'marks' => '1',
                        'negative' => '1/3',
                    ),
                    2 =>
                    array(
                        'number' => '3',
                        'image' => 'ap-2019/3.png',
                        'type' => 'mcq',
                        'answer' => 'B',
                        'marks' => '1',
                        'negative' => '1/3',
                    ),
                    3 =>
                    array(
                        'number' => '4',
                        'image' => 'ap-2019/21_NAT.png',
                        'type' => 'nat',
                        'answer' => '22',
                        'marks' => '1',
                        'negative' => '1/3',
                    ),
                ),
                'exam_id' => '1',
                'created_at' => '2020-05-18T03:09:15.000000Z',
                'updated_at' => '2020-05-21T11:00:53.000000Z',
            ),
        );

        $expectedValue = array(
            1 =>
            array(
                1 => 'C',
                2 => 'C',
            )
        );
        $r = new Result;
        $actualValue = $r->transformSectionForStoring($sections);
        $this->assertEquals($expectedValue, $actualValue);
    }
}
