<x-layout>
    <section class="header d-flex justify-between align-items-stretch px-3">
        <img src="/images/index/boy.png" alt="boy with laptop" class="ml-5 d-none d-md-inline-block"
            style="object-fit: scale-down; object-position: center; max-width: 300px ">
        <div class="w-100 d-flex flex-column text-center justify-content-around align-items-center py-3">
            <h2 class="text-gate" style="text-decoration: underline; text-decoration-color: orange; font-weight: bold">Study with us</h2>
            <h3 style="font-weight: bold; max-width: 990px" class="text-gate-alt px-2 mt-0 mt-md-2">Explore our Exclusive Exam analysis, Study Materials & Test Series</h3>
            {{-- Slider Large Screen --}}
            <div id="carouselExampleInterval" class="carousel slide px-5 d-none d-md-block" style="height: 170px" data-ride="carousel">
              
                <div class="carousel-inner h-100 px-md-5">
                    <div class="carousel-item active h-100">
                        <img src="/images/index/slider-1.png" class="h-100 mr-3">
                        <img src="/images/index/slider-2.png" class="h-100 mr-3">
                        <img src="/images/index/slider-3.png" class="h-100">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="/images/index/slider-2.png" class="h-100 mr-3">
                        <img src="/images/index/slider-3.png" class="h-100 mr-3">
                        <img src="/images/index/slider-4.png" class="h-100">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="/images/index/slider-3.png" class="h-100 mr-3">
                        <img src="/images/index/slider-4.png" class="h-100 mr-3">
                        <img src="/images/index/slider-5.png" class="h-100">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="/images/index/slider-4.png" class="h-100 mr-3">
                        <img src="/images/index/slider-5.png" class="h-100 mr-3">
                        <img src="/images/index/slider-1.png" class="h-100">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="/images/index/slider-5.png" class="h-100 mr-3">
                        <img src="/images/index/slider-1.png" class="h-100 mr-3">
                        <img src="/images/index/slider-2.png" class="h-100">
                    </div>
                </div>
                <a style="padding: 6px 12px 5px 10px; width: auto; height: 45px; margin: auto" class="carousel-control-prev bg-gate-alt rounded-circle d-flex" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a style="padding: 6px 10px 5px 12px; width: auto; height: 45px; margin: auto;" class="carousel-control-next bg-gate-alt rounded-circle d-flex" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            {{-- Slider Small Screen --}}
            <div id="carouselExampleInterval2" class="carousel slide px-5 d-md-none" style="height: 170px" data-ride="carousel">
                <div class="carousel-inner h-100 px-3">
                    <div class="carousel-item active h-100" data-interval="10000">
                        <img src="/images/index/slider-1.png" class="h-100">
                    </div>
                    <div class="carousel-item h-100">
                      <img src="/images/index/slider-2.png" class="h-100">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="/images/index/slider-3.png" class="h-100">
                    </div>
                    <div class="carousel-item h-100">
                      <img src="/images/index/slider-4.png" class="h-100">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="/images/index/slider-5.png" class="h-100">
                    </div>
                </div>
                <a style="padding: 6px 12px 5px 10px; width: auto; height: 45px; margin: auto" class="carousel-control-prev bg-gate-alt rounded-circle d-flex" href="#carouselExampleInterval2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a style="z-index: 0;padding: 6px 10px 5px 12px; width: auto; height: 45px; margin: auto;" class="carousel-control-next bg-gate-alt rounded-circle d-flex" href="#carouselExampleInterval2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <a href="{{ route('students.exams') }}" class="btn btn-warning rounded-pill bg-gate-alt text-uppercase mt-md-3">free demo tests</a>
        </div>
      </section>

      {{--  Recent Exam Screen --}}
      <section class="container-fluid" style="max-width: 1300px">
       <div class="mt-3 px-3 px-md-5">
          <h2 class="text-center mb-0 mt-3" style="text-decoration: underline; font-weight: bold">Exams</h2>
         <hr style="background: #ff9900; width: 80px;">
         <aside class="mt-3 grid-3">
          <div class="px-3 py-4 bg-white shadow-lg rounded text-center">
            <strong class="text-gate" style="font-weight: bold;font-size: 1.3em">
              GATE 2021
            </strong>
            <div class='mt-2'>General Aptitude Entrance Test</div>
          </div>
          <div class="px-3 py-4 bg-white shadow-lg rounded text-center">
            <strong class="text-gate" style="font-weight: bold;font-size: 1.3em">
              D.D.A. Recruitment
            </strong>
            <div class='mt-2'>Delhi Development Authority</div>
          </div>

          <div class="px-3 py-4 bg-white shadow-lg rounded text-center">
            <strong class="text-gate" style="font-weight: bold;font-size: 1.3em">
              MH-CET (Architecture)
            </strong>
            <div class='mt-2'>Maharashtra Common Entrance Test</div>
          </div>

          <div class="px-3 py-4 bg-white shadow-lg rounded text-center">
            <strong class="text-gate" style="font-weight: bold;font-size: 1.3em">
              UPSC Recruitment
            </strong>
            <div class='mt-2'>For Assistant Architect</div>
          </div>

          <div class="px-3 py-4 bg-white shadow-lg rounded text-center">
            <strong class="text-gate" style="font-weight: bold;font-size: 1.3em">
              ISRO Recruitment
            </strong>
            <div class='mt-2'>Indian Space Research Organisation</div>
          </div>

          <div class="px-3 py-4 bg-white shadow-lg rounded text-center">
            <strong class="text-gate" style="font-weight: bold;font-size: 1.3em">
              K-CET (Architecture)
            </strong>
            <div class='mt-2'>Karnataka Common Entrance Test</div>
          </div>
          <div class="px-3 py-4 bg-white shadow-lg rounded text-center">
            <strong class="text-gate" style="font-weight: bold;font-size: 1.3em">
              DMRC Recruitment
            </strong>
            <div class='mt-2'>Delhi Metro Rail Corporation</div>
          </div>
          <div class="px-3 py-4 bg-white shadow-lg rounded text-center">
            <strong class="text-gate" style="font-weight: bold;font-size: 1.3em">
              LMRC Recruitment 
            </strong>
            <div class="mt-2">Indian Space Research Organisation</div>
          </div>
          <div class="px-3 py-4 bg-white shadow-lg rounded text-center">
            <strong class="text-gate" style="font-weight: bold;font-size: 1.3em">
              NBCC Recruitment 
            </strong>
            <div class="mt-2">National Buildings Construction Corporation</div>
          </div>
         </aside>
       </div>
       <div class="mt-4 mb-5">
         <h2 class="text-center mt-3" style="text-decoration: underline; font-weight: bold">Upcoming Exams</h2>
         <hr style="background: #ff9900; width: 80px;">
        <section class="h-100 d-flex flex-column flex-md-row px-1 align-items-center">
          <aside class="w-100 h-100 mt-3 px-3 px-md-5 d-flex flex-column justify-content-between align-items-stretch">
            {{-- CARD --}}
            @forelse ($exams as $exam)
            <div class="bg-white shadow-lg rounded d-flex flex-column flex-md-row align-items-center px-4 py-4 px-md-3 mb-3">
              <div style="font-size: 1.2em; font-weight: bold" class="h-100 px-4 text-center text-gate d-flex flex-column">
                <strong class="text-gate-alt">
                  {{ $exam->created_at->format('d') }}
                </strong>
                <strong class="my-0">
                  {{ $exam->created_at->format('M') }}
                </strong>
                <strong>
                  {{ $exam->created_at->format('Y') }}
                </strong>
              </div>
              <div class="d-flex flex-column px-2 mt-4 mt-md-0 text-align">
                <div>
                  {{ $exam->created_at->format('l, h:m A') }}
                </div>
                <h3 class="mb-0">{{ $exam->subject }}</h3>
              </div>
            </div>
            @empty
             <div class="bg-white shadow-lg rounded d-flex flex-column flex-md-row align-items-center px-4 py-4 px-md-3">
              <div style="font-size: 1.2em; font-weight: bold" class="h-100 px-4 text-center text-gate d-flex flex-column">
                <strong class="text-gate-alt">00</strong>
                <strong class="my-0">###</strong>
                <strong>2020</strong>
              </div>
              <div class="d-flex flex-column px-2 mt-4 mt-md-0 text-align">
                <div>
                  Sunday 10AM
                </div>
                <h3 class="mb-0">No Exams Added</h3>
              </div>
            </div>
   
            @endforelse
            {{-- END CARD --}}
          </aside>
          <aside class="text-center px-3 px-md-5 mt-3 mt-md-0">
            <div class="bg-white shadow-lg rounded py-5 px-4">    
            <img class="w-100 h-auto px-3" style="max-width: 960px" src="/images/index/desktop.png" alt="dekstop graphic">
            </div>
          </aside>
        </section>
       </div> 
      </section>
      
      <section style="background: #f1f8fc; border-top: 7px solid #ed9800" class="d-flex flex-column flex-md-row px-3 px-md-5 py-5">
        <div class="text-center">
          <img style="max-width: 270px" src="/images/index/girl.png" alt="girl on laptop using gatearch.in graphic">
        </div> 
        <div class="ml-md-5 mt-5 mt-md-0 text-align d-flex justify-content-center align-items-center flex-column">
          <h2 style="color: #737373; font-weight: bold">Where to start?</h2>
          <strong style="font-size: 1.2em" class="text-gate font-weight-bold mt-3">Exam study require time and before that an individual require to analyse exam pattern. Gate-Arch provides you an excellent time saver exam analysis. Refer our analysis and instantly start building your exam strategies.</strong>
          <div class="text-center mt-3">
          <a href="{{ route('students.results') }}" class="btn btn-warning bg-gate-alt px-4 rounded-pill font-weight-bold">Exam Analysis</a>
          </div>
        </div>
      </section>


    <x-slot name="scripts">
        <script>
            $('.navbar-toggler').click(function () {
                $('.navbar-toggler .material-icons').text($('.navbar-toggler .material-icons').text() ==
                    'menu' ? 'close' : 'menu');
            });
        </script>
    </x-slot>
</x-layout>