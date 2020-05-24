@extends('students.master')

@section('header')
<style>
    html,
    body {
        height: 100%
    }

    body {
        font-family: serif;
        background: #fff;
    }

    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto auto;
        grid-auto-rows: min-content;
        grid-gap: 5px 5%;
        height: 53vh;
        overflow-y: scroll;
    }

    .ic {
        height: 18px;
        width: 18px;
        display: inline-block;
    }

    .qc-not-visited {
        background: url('/images/not-visited.png');
        color: #000 !important;
    }

    .qc-visited {
        background: url('/images/visited.png');
    }

    .qc-answered {
        background: url('/images/answered.png');
    }

    .qc-review {
        background: url('/images/review.png');
    }

    .qc-review-answered {
        background: url('/images/review-answered.png');
    }

    .qc {
        background-repeat: no-repeat;
        font-weight: bolder;
        color: #fff;
        background-size: 100% 100%;
        height: 35px;
    }

    <blade media|%20screen%20and%20(min-width%3A%201280px)%20%7B>.qc {
        height: 40px;
    }
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
                <span
                    class="px-2 mx-2 d-inline-flex align-items-center bg-primary my-2 text-white">@{{ exam.subject }}<span
                        class="ic-instructions mx-1"></span></span>
                <a id="openCalculator" class="p-1 px-2 btn"><span class="ic ic-calculator"></span></a>
            </div>
            <div class="px-4 py-1 d-flex justify-content-between">
                <span>Sections [Attempt any 1 of the
                    @{{ sections != null ? sections.length : '#' }}]</span>
                <strong id="timer">@{{ exam.timerDisplay }}</strong>
            </div>
            <div class="pl-2 tab-container d-flex justify-content-start">
                <a href="" class="tab">&ltrif;</a>
                <a href="#" v-for="(section, i) in sections" v-on:click="loadSection(i)"
                    v-bind:class="{ tab: true, active: i == sectionIndex }">
                    @{{ section.title }}
                    <span class="ic ic-instructions ml-1"></span>
                </a>
            </div>
        </div>
        <div class="col-2 border py-1">
            <img class="border mr-2" src="/images/profile.png" height="100px">
            <span>ABCD</span>
        </div>
    </div>
    <div class="row flex-fill i-clear-inputs">
        <div class="col-10 border p-0">
            <template v-if="sections">
                <div class="w-100 border px-4 bg-grey py-1 d-flex justify-content-between m-0">
                    <strong class="mr-3">Question: @{{ question.number }}.</strong>
                    <span>
                        <strong class="mr-2 text-success">Marks: @{{ question.marks }}</strong>
                        <strong class="text-danger">Negative Marks @{{ question.negative }}</strong>
                    </span>
                </div>
                <div class="container-fluid px-4 my-3">
                    <img id='imgQuestion' class='shadow-sm rounded'
                        v-on:click='openQuestion("/storage/"+question.image)' v-bind:src="'/storage/'+question.image">
                </div>
                <div class="h-25 px-5 mt-5 container-fluid d-flex flex-column justify-content-around">
                    <template v-if="question.type == 'mcq'">
                        <div>
                            <label>
                                <input v-model="tempAnswer" type="radio" value="A">
                                <span class='ml-3'>A</span>
                            </label>
                        </div>
                        <div>
                            <label>
                                <input v-model="tempAnswer" type="radio" value="B">
                                <span class='ml-3'>B</span>
                            </label>
                        </div>
                        <div>
                            <label>
                                <input v-model="tempAnswer" type="radio" value="C">
                                <span class='ml-3'>C</span>
                            </label>
                        </div>
                        <div>
                            <label>
                                <input v-model="tempAnswer" type="radio" value="D">
                                <span class='ml-3'>D</span>
                            </label>
                        </div>
                        <input id='dummyRadio' style='display: none' v-model="tempAnswer" type="radio" value="">
                    </template>
                    <template v-else>
                        <div class="mt-5 border p-2" style="width: 270px;">
                            <div class="mb-2">
                                <input style="font: mono" v-model='tempAnswer' type="text" class="form-input w-100">
                            </div>
                            <div class="row">
                                <div class='col'>
                                    <button v-on:click="tempAnswer = tempAnswer.slice(0, -1)"
                                        class='btn btn-outline-dark btn-block'>Backspace</button>
                                </div>
                                <div class='col'>
                                    <button v-on:click="tempAnswer = ''" class='btn btn-outline-dark btn-block'>Clear
                                        All</button>
                                </div>
                            </div>
                            <hr>
                            <div class='row'>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>7</button>
                                </div>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>8</button>
                                </div>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>9</button>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>4</button>
                                </div>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>5</button>
                                </div>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>6</button>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>1</button>
                                </div>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>2</button>
                                </div>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>3</button>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>0</button>
                                </div>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>.</button>
                                </div>
                                <div class='col-4'>
                                    <button v-on:click='addInput' class='btn btn-outline-dark btn-block'>-</button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div>
        <div class="col-2">
            {{-- <div v-on:click="collapseSidebar" class="px-1 py-3 bg-dark text-white" style="border: 1px solid #111;font-size: 1.rem; position: absolute; left: -17px; top: 45%; cursor: pointer">&blacktriangleright;</div> --}}
            <template v-if="sections">
                <img src="/images/question-info.png" class="w-100">
                <h4 class="bg-info text-white text-center py-1" style="margin-left: -15px;">@{{ section.title }}</h4>
                <div class="grid-container pt-3 pr-4 pl-4">
                    <a href="#" v-for="(question, i) in section.questions"
                        v-bind:class="states_css[question.state || State.NOT_VISITED]" v-on:click="loadQuestion(i)"
                        class="btn qc">
                        @{{ question.number }}
                    </a>
                </div>
            </template>
        </div>
    </div>
    <div class="px-4 pt-2 bg-grey row" style="height: 60px;">
        <div class="col-10 d-flex justify-content-between">
            <span>
                <a href="#" v-on:click="changeState(State.REVIEW)" class="btn btn-outline-dark mr-2">Mark for review</a>
                <a href="#" v-on:click="clearResponse" class="btn btn-outline-dark">Clear response</a>
            </span>
            <span>
                <a href="#" v-on:click="saveAndNext" class="btn btn-primary active">Save &amp; Next</a>
            </span>
        </div>
        <div class="col-2 text-center">
            <a href="#" v-on:click="saveAndNext" class="btn btn-primary active">Submit</a>
        </div>
    </div>
    <x-exam.calculator />
</div>
@endsection

@push('scripts')
    <script>
        $(window).keydown(false);
        $(document).contextmenu(function (e) {
            e.preventDefault();
        });
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
                    tempAnswer: '',
                    State: Object.freeze({
                        NOT_VISITED: 0,
                        VISITED: 1,
                        REVIEW: 2,
                        SAVED: 3,
                        REVIEW_SAVED: 4,
                    }),
                    states_css: [
                        'qc-not-visited',
                        'qc-visited',
                        'qc-review',
                        'qc-answered',
                        'qc-review-answered'
                    ]
                }
            },

            computed: {
                question: function () {
                    return this.sections[this.sectionIndex].questions[this.questionIndex];
                },
                section: function () {
                    return this.sections[this.sectionIndex];
                }
            },

            mounted: function () {
                axios.get('/api/exam')
                    .then(this.getQuestions)
                    .catch(function (err) {
                        Swal.fire('Problem getting question please close window and try again!');
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

                startExam: function () {
                    this.startTimer();
                    this.loadSection(1);
                },

                endExam: function () {

                },

                loadSection: function (i) {
                    this.sectionIndex = i;
                    this.loadQuestion(3);
                },

                loadQuestion: function (i) {
                    this.questionIndex = i;
                    this.tempAnswer = this.question.userAnswer || '';
                    this.changeState(this.State.VISITED);
                },

                saveAndNext: function () {
                    if (this.question.state != this.State.SAVED && !this.tempAnswer) {
                        Swal.fire("You must answer the question to save!");
                        return;
                    }
                    this.question.userAnswer = this.tempAnswer;
                    this.changeState(this.State.SAVED);
                    if (this.section.questions.length - 1 > this.questionIndex) {
                        this.loadQuestion(this.questionIndex + 1);
                    } else {
                        Swal.fire('No more questions');
                    }
                },

                changeState: function (newState, overwrite) {
                    var a = [this.State.SAVED, this.State.REVIEW];
                    if (a.includes(newState) && a.includes(this.question.state) &&
                        newState != this.question.state) {
                        this.question.state = this.State.REVIEW_SAVED;
                    } else {
                        this.question.state = overwrite ?
                            newState :
                            Math.max(this.question.state || 0, newState);
                    }
                },

                clearResponse: function () {
                    $('.i-clear-inputs input[type="text"]').val('');
                    $('#dummyRadio').trigger('click');
                    this.question.userAnswer = '';
                    this.changeState(this.State.VISITED, true);
                },

                addInput: function (e) {
                    this.tempAnswer += e.srcElement.innerText;
                },

                openQuestion: function (img) {
                    Swal.fire({
                        imageUrl: img,
                        width: $('#imgQuestion').width() + 100,
                        imageWidth: $('#imgQuestion').width() + 100,
                    });
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

            $('#openCalculator').click(function () {
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