@extends('students.master')

@section('header')
<style>
    html, body {
        height: 100%
    }

    body { 
        font-family: serif;
        background: #fff;
    }

    .ic {
        height: 18px;
        width: 18px;
        display: inline-block;
    }

    .ic-question-paper {
        background: url('/images/Icon-sprite.png') no-repeat -188px -8px;
    }

    .ic-instructions {
        background: url('/images/Icon-sprite.png') no-repeat -140px -7px;
    }

    .ic-calculator {
        height: 24px;
        background: url('../images/Icon-sprite.png') no-repeat -148px -91px;
    }

    .tab-container {
        border: 1px solid #aeaeae;
        max-height: 50px;
    }

    .tab-container .tab {
        padding: 5px 12px;
        color: #1188aa;
        text-decoration: none;
        border-right: 1px solid #aeaeae;
        font-weight: bold;
    }

    .tab-container .tab:hover {
        text-decoration: none;
    }

    .tab-container .tab.active {
        padding: 5px 7px;
        background-color: #5633ed;
        color: #FFF;
    }
</style>
@endsection

@section('content')
<div id="examApp" style="overflow-x: hidden;" class="w-100 h-100 d-flex flex-column">
    <div class="w-100 bg-light border p-1 pl-3">
        <h4>Mock Exam {{ date('Y') }}</h4>
    </div>
    <div class="w-100 bg-dark py-1 px-3 d-flex justify-content-between">
        <span class="text-warning"> @{{ exam.topic }} </span>
        <span>
            <a href="#" class="text-white d-inline-flex align-items-center mr-2">
                <span class="ic ic-question-paper mr-1"></span>
                <span>Question Paper</span>
            </a>
            <a href="#" class="text-white d-inline-flex align-items-center">
                <span class="ic ic-instructions mr-1"></span>
                <span>Instructions</span>
            </a>
        </span>
    </div>
    <div class="row">
        <div class="col-10 px-0 border h-100">
            <div class="bg-grey pl-3 d-flex justify-content-between">
                <span class="px-2 mx-2 d-inline-flex align-items-center bg-primary my-2 text-white">Subject Name<span
                        class="ic-instructions mx-1"></span></span>
                <a id="openCalculator" class="p-1 px-2 btn"><span class="ic ic-calculator"></span></a>
            </div>
            <div class="px-4 py-1 d-flex justify-content-between">
                <span>Sections [Attempt any 1 of the @{{ sections != null ? sections.length : '#' }}]</span>
                <strong id="timer">@{{ exam.timerDisplay }}</strong>
            </div>
            <div class="pl-2 tab-container d-flex justify-content-start">
                <a href="" class="tab">&ltrif;</a>
                <a  href="#"
                v-for="(section, i) in sections" 
                v-on:click="changeSection(i)" 
                v-bind:class="{ tab: true, active: i == sectionIndex }">
                    @{{ section.title }}
                    <span class="ic ic-instructions ml-1"></span>
                </a>
            </div>
        </div>
        <div class="col-2 border py-1">
            <img class="border mr-2" src="/images/profile.png" height=100px"">
            <span>ABCD</span>
        </div>
    </div>
    <div class="row flex-fill">
        <div class="col-10 border p-0">
            <template v-if="sections">
                <div class="w-100 border px-4 bg-grey py-1 d-flex justify-content-between m-0">
                    <strong class="mr-3">Q: @{{ question.number }}.</strong>
                    <span>
                        <strong class="mr-2 text-success">Marks: @{{ question.marks }}</strong>
                        <strong class="text-danger">Negative Marks @{{ question.negative }}</strong>
                    </span>
                </div>
                <div class="container-fluid px-4 mt-2">
                    <img v-bind:src="'/storage/'+question.image">
                </div>
                <div class="h-25 px-5 mt-2 container-fluid d-flex flex-column justify-content-around">
                    <div>
                        <label>
                            <input type="radio" name="answer" id="">
                            &nbsp;&nbsp;&nbsp;A
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="answer" id="">
                            &nbsp;&nbsp;&nbsp;B
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="answer" id="">
                            &nbsp;&nbsp;&nbsp;C
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="answer" id="">
                            &nbsp;&nbsp;&nbsp;D
                        </label>
                    </div>
                </div>
            </template>
        </div>
        <div class="col-2 d-flex flex-row justify-content-stretch align-items-start mt-3 pr-4">
            <template v-if="sections">
                <a href="#"
                v-for="(question, i) in section.questions"
                v-bind:class="{ active: i == questionIndex }"
                v-on:click="questionIndex = i"
                class="flex-fill btn btn-success mr-2 mb-2">
                @{{ question.number }}
            </a>
            </template>
        </div>
    </div>
    <div class="px-4 py-1 bg-grey d-flex justify-content-between" style="height: 50px;">
        <div class="py-1">
            <a href="" class="btn btn-secondary">Mark for review</a>
            <a href="" class="btn btn-secondary">Clear response</a>
        </div>
        <div class="py-1 pr-5">
            <a href="#" v-on:click="nextQuestion" class="btn btn-primary active">Save &amp; Next</a>
        </div>
    </div>
    <x-exam.calculator />
</div>
@endsection

@push('scripts')
    <script>
        var examApp = new Vue({
            'el': '#examApp',
            data: function () {
                return {
                    exam: {
                        time: '',
                        subject: '',
                        topic: '',
                        timerDisplay: ''
                    },
                    sections: null,
                    questionIndex: 0,
                    sectionIndex: 0,
                }
            },
            computed: {
                question: function() {
                    return this.sections[this.sectionIndex].questions[this.questionIndex];
                },
                section: function() {
                    return this.sections[this.sectionIndex];
                }
            },
            mounted: function () {
                axios.get('/api/exam')
                    .then(this.getQuestions)
                    .catch(function (err) {

                    });
            },
            methods: {
                getQuestions: function (result) {
                    this.exam = result.data.exam;
                    this.sections = result.data.sections;
                    // var sectionsSorted = _.map(result.data.sections, function(section) {
                    //     return _.sortBy(section.questions, 'number');
                    // });
                    // _.forEach(sectionsSorted, function(questions, i) {
                    //     examApp.sections[i].questions = questions;
                    // });
                    this.startExam();
                },
                startExam: function() {
                    this.startTimer();
                },
                nextQuestion() {
                    if (this.sections[this.sectionIndex].questions.length - 1 > this.questionIndex) {
                        this.questionIndex++;
                    } else {
                        Swal.fire('No more questions');
                    }
                },
                changeSection(i) {
                    this.sectionIndex = i;
                    this.questionIndex = 0;
                },
                startTimer: function () {
                    this.exam.time = parseInt(this.exam.time) * 60;
                    var timer = this.exam.time,
                        minutes, seconds;
                    setInterval(function () {
                        minutes = parseInt(timer / 60, 10);
                        seconds = parseInt(timer % 60, 10);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;

                        Vue.set(examApp.exam, 'timerDisplay', minutes + ":" + seconds);

                        if (--timer < 0) {
                            timer = this.exam.time;
                        }
                    }, 1000);
                }
            }
        });

        $(function () {

            $('#calculator').dialog({
                title: 'Scientfic Calulator',
                autoOpen: false,
                width: '495px',
                classes: {
                    "ui-dialog": "p-0",
                    "ui-dialog-titlebar": "bg-primary text-white"
                }
            });
            $("#openCalculator").click(function () {
                $("#calculator").dialog('open');
                $("#calculator").dialog("option", "position", {
                    my: "left top",
                    at: "left bottom",
                    of: $('#openCalculator')
                });
            });
        });
    </script>
@endpush