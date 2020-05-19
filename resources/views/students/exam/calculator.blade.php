<!DOCTYPE html>

<html>

<head>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/calc.css') }}" />
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/calc.js') }}"></script>

    <!--<meta http-equiv="X-UA-Compatible" content="IE=8" />-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script>
        $('#closeButton').click(function () {

            $('#loadCalc').hide();

            $('#keyPad_UserInput').val(0);

            $('#keyPad_UserInput1').val('');

        });


        $(function () {

            // $("#loadCalc").draggable({

            //     handle: "#helptopDiv",

            //     start: function () {

            //         // $(this).css({ height: "auto", width: "463px" });

            //     },

            //     stop: function () {

            //         // $(this).css({ height: "auto", width: "463px" });

            //     }

            // });



            // $(".calc_min").live('click', function () {

            //     $('#mainContentArea').toggle();

            //     $('#keyPad_Help').hide();

            //     $('#keyPad_Helpback').hide();

            //     $('#keyPad').addClass("reduceWidth");

            //     $('#helptopDiv span').addClass("reduceHeader");

            //     //		$('#calc_min').toggleClass("reduceHeader");

            //     $(this).removeClass("calc_min").addClass('calc_max');

            // });

            // $(".calc_max").live('click', function () {

            //     $(this).removeClass("calc_max").addClass('calc_min');

            //     $('#mainContentArea').toggle();

            //     if (mockVar.showCalculator == "SCIENTIFIC")

            //         $('#keyPad_Help').show();

            //     $('#keyPad').removeClass("reduceWidth");

            //     $('#helptopDiv span').removeClass("reduceHeader");

            // });

            // $('#scientificText').html($(globalXmlvar).find('scientificText').text());

            // $('#normalText').html($(globalXmlvar).find('normalText').text());

        });

        $('#closeButton').click(function () {
            $('#loadCalc').hide();
        });

        /** new help changes **/

        // $('#keyPad_Help').live('click', function () {

        //     $(this).hide();

        //     $('#keyPad_Helpback').show();

        //     $('.text_container').hide();

        //     $('.left_sec').hide();

        //     $('#keyPad_UserInput1').hide();

        //     {
        //         $('#helpContent').show();

        //         if (mockVar.langName == "Japanese")

        //             $('#Japanese').show();

        //         else

        //             $('#English').show();

        //     }



        // });



        // $('#keyPad_Helpback').live('click', function () {

        //     $(this).hide();

        //     $('#keyPad_Help').show();

        //     $('.text_container').show();

        //     $('.left_sec').show();

        //     $('#keyPad_UserInput1').show();

        //     $('#helpContent').hide();

        //     $('#English').hide();

        //     $('#Japanese').hide();



        // });



        /** new help changes **/
    </script>

    <style type="text/css">
        *.unselectable {

            -moz-user-select: -moz-none;

            -khtml-user-select: none;

            -webkit-user-select: none;



            /*

			 Introduced in IE 10.

			 See http://ie.microsoft.com/testdrive/HTML5/msUserSelect/

		   */

            -ms-user-select: none;

            user-select: none;

        }
    </style>



</head>

<body>


</body>

</html>