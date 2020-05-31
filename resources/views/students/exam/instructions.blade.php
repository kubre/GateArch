@extends('students.exam.master')

@section('header')
<style>
    body {
        font-family: serif;
        background: white;
    }
    .instruction_area span.answered {
        background: url("../images/questions-sprite.png") no-repeat scroll 0 0 transparent;
        color: #FFFFFF;
        /* cursor: pointer; */
        float: left;
        font-weight: bold;
        height: 38px;
        line-height: 42px;
        /*  margin: 3px; */
        text-align: center;
        width: 34px;
        background-position: -5px -48px;
    }

    .instruction_area span.review {
        background: url("../images/questions-sprite.png") no-repeat scroll 0 0 transparent;
        color: #FFFFFF;
        /* cursor: pointer; */
        float: left;
        font-weight: bold;
        height: 38px;
        line-height: 42px;
        /* margin: 3px; */
        text-align: center;
        width: 34px;
        background-position: -72px -48px;
    }

    .instruction_area span.review_answered {
        background: url("../images/questions-sprite.png") no-repeat scroll 0 0 transparent;
        color: #FFFFFF;
        /* cursor: pointer; */
        float: left;
        font-weight: bold;
        height: 38px;
        line-height: 42px;
        /* margin: 3px; */
        text-align: center;
        width: 34px;
        background-position: -169px -47px;
    }

    .instruction_area span.review_marked_considered {
        background: url("../images/questions-sprite.png") no-repeat scroll 0 0 transparent;
        color: #FFFFFF;
        /*  cursor: pointer; */
        float: left;
        font-weight: bold;
        height: 38px;
        /* margin: 3px !important; */
        text-align: center;
        width: 34px;
        line-height: 42px;
        background-position: -6px -81px;
    }

    .instruction_area span.review_marked {
        background: url("../images/questions-sprite.png") no-repeat scroll 0 0 transparent;
        color: #FFFFFF;
        /*  cursor: pointer ; */
        float: left;
        font-weight: bold;
        height: 38px;
        /* margin: 3px !important; */
        text-align: center;
        width: 34px;
        line-height: 42px;
        background-position: -169px -49px;
    }

    .instruction_area span.not_answered {
        background: url("../images/questions-sprite.png") no-repeat scroll 0 0 transparent;
        color: #FFFFFF;
        /* cursor: pointer; */
        float: left;
        font-weight: bold;
        height: 38px;
        line-height: 42px;
        /* margin: 3px; */
        text-align: center;
        width: 34px;
        background-position: -39px -48px;
    }

    .instruction_area span.not_visited {
        background: url("../images/questions-sprite.png") no-repeat scroll 0 0 transparent;
        color: #FFFFFF;
        /*  cursor: pointer; */
        float: left;
        font-weight: bold;
        height: 38px;
        line-height: 42px;
        /*  margin: 3px; */
        text-align: center;
        width: 34px;
        background-position: -105px -49px;
        color: #474747;
    }
</style>
@endsection

@section('content')
    <div class="w-100 bg-light border p-1 pl-3 m-0">
        <h4>Mock Exam {{ date('Y') }}</h4>
    </div>
    <div class="container-fluid border">
        <div class="row">
            <div class="col-10 border" style="overflow-y: scroll; height: 90vh;">
                <div id="first">
                    <div> <h5> </h5> <center><span style="font-size:14px;"><span style="color:#B22222;"><strong><u>These instructions are based on GATE 2019. The instructions for GATE 2020 may vary</u>.</strong></span></span><br> <br> <font size="4">Please read the instructions carefully </font></center> </div> <p><strong><u>General Instructions:</u></strong></p> <ol style="TEXT-ALIGN: left; LIST-STYLE-TYPE: decimal; PADDING-LEFT: 4%; PADDING-TOP: 3px"> <li>Total duration of examination is <span class="completeDuration">180</span> minutes.</li> <li>The clock will be set at the server. The countdown timer in the top right corner of screen will display the remaining time available for you to complete the examination. When the timer reaches zero, the examination will end by itself. You will not be required to end or submit your examination.</li> <li>The Question Palette displayed on the right side of screen will show the status of each question using one of the following symbols: <table class="instruction_area" style="FONT-SIZE: 100%"> <tbody> <tr> <td><span class="not_visited" title="Not Visited">1</span></td> <td>You have not visited the question yet.</td> </tr> <tr> <td><span class="not_answered" title="Not Answered">2</span></td> <td>You have not answered the question.</td> </tr> <tr> <td><span class="answered" title="Answered">3</span></td> <td>You have answered the question.</td> </tr> <tr> <td><span class="review" title="Marked for Review">4</span></td> <td>You have NOT answered the question, but have marked the question for review.</td> </tr> <tr> <td><span class="review_marked_considered" title="Answered &amp; Marked for Review">5</span></td> <td>The question(s) "Answered and Marked for Review" will be considered for evaluation.</td> </tr> </tbody> </table> </li> <li style="LIST-STYLE-TYPE: none">The Marked for Review status for a question simply indicates that you would like to look at that question again.</li> </ol> <ol style="TEXT-ALIGN: left; LIST-STYLE-TYPE: decimal; PADDING-LEFT: 4%; PADDING-TOP: 3px" start="4"> <li>You can click on the "&gt;" arrow which appears to the left of question palette to collapse the question palette thereby maximizing the question window. To view the question palette again, you can click on "&lt; " which appears on the right side of question window.</li> <li>You can click on your "Profile" image on top right corner of your screen to change the language during the exam for entire question paper. On clicking of Profile image you will get a drop-down to change the question content to the desired language.</li> <li>You can click on <img class="scrollBottom" id="scrollBottom" src="/images/Down.png" title="Scroll Down"> to navigate to the bottom and <img class="scrollTop" id="scrollTop" src="/images/Up.png" title="Scroll Up">to navigate to the top of the question area, without scrolling.</li> </ol> <strong><u>Navigating to a Question:</u></strong><br> <br> <ol style="TEXT-ALIGN: left; LIST-STYLE-TYPE: decimal; PADDING-LEFT: 4%; PADDING-TOP: 3px " start="7"> <li>To answer a question, do the following: <ol style="TEXT-ALIGN: left; PADDING-LEFT: 4%; PADDING-TOP: 3px " type="a"> <li>Click on the question number in the Question Palette at the right of your screen to go to that numbered question directly. Note that using this option does NOT save your answer to the current question.</li> <li>Click on <b>Save &amp; Next</b> to save your answer for the current question and then go to the next question.</li> <li>Click on <b>Mark for Review &amp; Next</b> to save your answer for the current question, mark it for review, and then go to the next question.</li> </ol> </li> </ol> <b><u>Answering a Question : </u></b><br> <br> <ol style="TEXT-ALIGN: left; LIST-STYLE-TYPE: decimal; PADDING-LEFT: 4%; PADDING-TOP: 3px " start="8"> <li>Procedure for answering a multiple choice type question: <ol style="TEXT-ALIGN: left; PADDING-LEFT: 4%; PADDING-TOP: 3px " type="a"> <li>To select your answer, click on the button of one of the options</li> <li>To deselect your chosen answer, click on the button of the chosen option again or click on the <b>Clear Response</b> button</li> <li>To change your chosen answer, click on the button of another option</li> <li>To save your answer, you MUST click on the<b> Save &amp; Next</b> button</li> <li>To mark the question for review, click on the<b> Mark for Review &amp; Next</b> button.</li> </ol><br> <br>  <ol style="PADDING-LEFT: 1px; " start="9"> <li>To change your answer to a question that has already been answered, first select that question for answering and then follow the procedure for answering that type of question.</li> </ol> </li> </ol> <p><b><u>Navigating through sections:</u></b></p> <ol style="TEXT-ALIGN: left; LIST-STYLE-TYPE: decimal; PADDING-LEFT: 4%; PADDING-TOP: 3px " start="10"> <li>Sections in this question paper are displayed on the top bar of the screen. Questions in a section can be viewed by clicking on the section name. The section you are currently viewing is highlighted.</li> <li>After clicking the Save &amp; Next button on the last question for a section, you will automatically be taken to the first question of the next section.</li> <li>You can shuffle between sections and questions anytime during the examination as per your convenience only during the time stipulated.</li> <li>Candidate can view the corresponding section summary as part of the legend that appears in every section above the question palette.</li> </ol> <b><u>Instruction for images:</u></b><br> <br> <ol style="TEXT-ALIGN: left; LIST-STYLE-TYPE: decimal; PADDING-LEFT: 4%; PADDING-TOP: 3px " start="14"> <li>To zoom the image provided in the question roll over it.</li> </ol>
                </div>
                <div id="second" style="display: none;">   
                    <center>
                        <span id="otherImpInstru" style="display: none"><b><font class="otherInstruLabel" size="4em" color="#2F72B7">Other Important Instructions</font></b></span>
                    </center>
                    <br> <span id="secondPageLangView" style="float: right; display: none; padding: 2px;"><span class="viewIn">View in :</span>&nbsp;<select id="cusInst" onchange="parent.changeSysInst(this.value,'cusInstText','sysInstText')"><option value="cusInstText1">English</option></select></span>
                        <div class="cusInstText1" style="height: 91%; width: 100%; overflow: auto;"><div style="text-align: center;"><strong><u>Paper Specific Instructions</u><br> <br> {{ $exam->topic }} </strong></div>  <br>
                    <br>
                    <p style="text-align:left;"><em>Duration</em> : <strong>{{ $exam->time }} minutes </strong><span style="float:right;"><em>Total Marks</em> : <strong>{{ $exam->marks }}</strong></span></p> Read the following instructions carefully.<br>
                    <br>
                    {!! $exam->instructions !!}
                    </div>
                </div>
                <div id="third">

                </div>
            </div>
            <div class="col-2 border">
                <img class="mt-3 ml-2" src="/images/profile.png"  height="200">
            </div>
        </div>
    </div>
    <nav class="navbar fixed-bottom bg-light mb-0 px-3 botder-top justify-content-between border-top">
        <div id="disclaimerWrapper" class="my-1" style="display: none;">
            <label>
            <span style=" vertical-align:top"><input type="checkbox" id="disclaimer" style="margin-top:1px;float:left">   </span>
            <span style="width: 98%; display: block; margin-left: 1.5em;" id="agreementMessageDef"><span style="" class="cusInstText1">I have read and understood the instructions. All computer hardware allotted to me are in proper working condition. I declare  that I am not in possession of / not wearing / not  carrying any prohibited gadget like mobile phone, bluetooth  devices  etc. /any prohibited material with me into the Examination Hall.I agree that in case of not adhering to the instructions, I shall be liable to be debarred from this Test and/or to disciplinary action, which may include ban from future Tests / Examinations</span></span><span style="width:98%;display:none;margin-left: 1.5em;" id="agreementMessageCustom"></span>
            </label>
        </div>
        <a id="previous" href="#" class="btn btn-outline-primary">
            Previous
        </a>
        <button id="next" class="btn btn-outline-primary">
            <span>Next</span> <img src="/images/Forward-25.png" height="20" width="25">
        </button>
    </nav>
@endsection

@push('scripts')
<script>
    var current = "first";
    $(function () {
        $('#disclaimer').click(function() {
            $('#next').prop('disabled', !$('#disclaimer:checked'));
        });

        $('#previous').click(function() {
            $("#first").show();
            $("#second").hide();
            $("#third").hide();
            $('#disclaimerWrapper').hide();
            $('#next span').text("Next");
            $('#next').prop('disabled', false);
            $("#disclaimer").prop('checked', false);
            current = "first";
        });

        $('#next').click(function() {
            if(current == "first") {
                $("#first").hide();
                $("#second").show();
                $("#third").hide();
                current = "second";
                $('#disclaimerWrapper').show();
                $('#next span').text("I'm ready to begin");
                $('#next').prop('disabled', true);
                $("#disclaimer").prop('checked', false);
            } else if(current == "second") {
                $("#first").hide();
                $("#second").hide();
                $("#third").show();
                window.location = '{{ route("exam.start", $exam->id) }}';
            }
        });
    });
</script>
@endpush