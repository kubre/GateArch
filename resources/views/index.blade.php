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
                    <div class="carousel-item active h-100" data-interval="10000">
                        <img src="/images/index/slider-1.png" class="h-100 mr-3">
                        <img src="/images/index/slider-2.png" class="h-100">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="/images/index/slider-3.png" class="h-100 mr-3">
                        <img src="/images/index/slider-4.png" class="h-100">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="/images/index/slider-5.png" class="h-100 mr-3">
                        <img src="/images/index/slider-1.png" class="h-100">
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
            <a href="{{ route('students.register.show') }}" class="btn btn-warning rounded-pill bg-gate-alt text-uppercase mt-md-3">free demo tests</a>
        </div>
      </section>

      {{--  Recent Exam Screen --}}
      <section class="container-fluid" style="border-bottom: 7px solid #ff9900">
       <div class="container mt-3 mb-5" style="max-width: 1600px">
         <h2 class="text-center mb-5 mt-3" style="text-decoration: underline; font-weight: bold">Recent Exams</h2>
        <section class="h-100 d-flex flex-column flex-md-row px-1 px-md-5 align-items-center">
          <aside class="w-100 h-100 px-3 px-md-5 d-flex flex-column justify-content-between align-items-stretch">
            {{-- CARD --}}
            @forelse ($exams as $exam)
            <div class="bg-white shadow-lg rounded d-flex flex-column flex-md-row align-items-center px-4 py-4 px-md-3 mb-md-3">
              <div style="font-size: 1.2em; font-weight: bold" class="h-100 px-4 text-center text-gate">
                <h3 style="margin: -10px auto" class="text-gate-alt">
                  {{ $exam->created_at->format('d') }}
                </h3>
                <h4 style="margin: -10px auto" class="my-0">
                  {{ $exam->created_at->format('M') }}
                </h4>
                <strong>
                  {{ $exam->created_at->format('Y') }}
                </strong>
              </div>
              <div class="d-flex flex-column px-2 mt-4 mt-md-0 text-align">
                <div>
                  {{ $exam->created_at->format('l, h:m A') }}
                </div>
                <h2 class="mb-0">{{ $exam->subject }}</h2>
              </div>
            </div>
            @empty
             <div class="bg-white shadow-lg rounded d-flex flex-column flex-md-row align-items-center px-4 py-4 px-md-3">
              <div style="font-size: 1.2em; font-weight: bold" class="h-100 px-4 text-center text-gate">
                <h3 style="margin: -10px auto" class="text-gate-alt">00</h3>
                <h4 style="margin: -10px auto" class="my-0">###</h4>
                <strong>2020</strong>
              </div>
              <div class="d-flex flex-column px-2 mt-4 mt-md-0 text-align">
                <div>
                  Sunday 10AM
                </div>
                <h2 class="mb-0">No Exams Added</h2>
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
      
      <section style="background: #f1f8fc; border-bottom: 7px solid #ff9900" class="d-flex flex-column flex-md-row px-3 px-md-5 py-5">
        <div class="text-center">
          <img style="max-width: 300px" src="/images/index/girl.png" alt="girl on laptop using gatearch.in graphic">
        </div> 
        <div class="ml-md-5 mt-5 mt-md-0 text-align">
          <h2 style="color: #737373; font-weight: bold">Where to start?</h2>
          <h3 class="text-gate font-weight-bold">Exam study require time and before that an individual require to analyse exam pattern. Gate-Arch provides you an excellent time saver exam analysis. Refer our analysis and instantly start building your exam strategies.</h3>
          <div class="text-center mt-4">
          <a style="font-size: 1.2em" href="{{ route('students.register.show') }}" class="btn btn-warning bg-gate-alt px-4 rounded-pill font-weight-bold">Exam Analysis</a>
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