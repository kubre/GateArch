@props([
    'total-questions', 'max-marks', 'total-attempted',
    'correct-answers', 'total-time', 'time-taken',
    'right-marks', 'negative-marks', 'rank',
])

<div>
    <div class="card">
        <h3 class="card-header">
            Result Data in Numbers:
        </h3>
        <div class="card-body">
            <div class='text-center'>
                <div class="row border bg-grey p-2">
                    <div class="col"><strong>Total Questions</strong></div>
                    <div class="col"><strong>Max Marks</strong></div>
                    <div class="col"><strong>Total Attempted</strong></div>
                    <div class="col"><strong>Left Questions</strong></div>
                    <div class="col"><strong>Correct Answers</strong></div>
                    <div class="col"><strong>Incorrects Answers</strong></div>
                </div>
                <div class="row bg-white p-2">
                    <div class="col">{{ $totalQuestions }}</div>
                    <div class="col">{{ $maxMarks }}</div>
                    <div class="col">{{ $totalAttempted }}</div>
                    <div class="col">{{ $totalQuestions - $totalAttempted }}</div>
                    <div class="col">{{ $correctAnswers }}</div>
                    <div class="col">{{ $totalAttempted - $correctAnswers }}</div>
                </div>
                <div class="row border mt-2 bg-grey p-2">
                    <div class="col"><strong>Total Time</strong></div>
                    <div class="col"><strong>Time Taken</strong></div>
                    <div class="col"><strong>Right Marks</strong></div>
                    <div class="col"><strong>Negative Marks</strong></div>
                    <div class="col"><strong>Total Marks</strong></div>
                    <div class="col"><strong>Percentage</strong></div>
                </div>

                <div class="row bg-white p-2">
                    <div class="col">{{ $totalTime }}</div>
                    <div class="col">{{ $timeTaken }}</div>
                    <div class="col">{{ $rightMarks }}</div>
                    <div class="col">{{ $negativeMarks }}</div>
                    <div class="col">{{ $rightMarks - $negativeMarks }}</div>
                    <div class="col">{{ round(($rightMarks - $negativeMarks) / $maxMarks * 100, 2) }}%</div>
                </div>   
            </div>
        </div>
        <div class="card-footer text-center">
            {{ $slot }}
        </div>
    </div>

    <div class="card mt-3">
        <h3 class="card-header">
            Result Data in Graphics:
        </h3>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <canvas id="marksChart"></canvas>                        
                </div>
                <div class="col">
                    <div style="font-weight: bold" class="text-center mb-3">Ranking Statistics</div>
                    <div class="bg-info rounded text-white text-center p-4">
                        <h3 style="font-weight: bold; font-size: 2.5em;">AIR</h3>
                        <h1 class='rounded bg-white text-info w-50 mx-auto' style="font-weight: bold; font-size: 4.5em;">{{ $rank }}</h1>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col">
                    <canvas id="timeChart"></canvas>                        
                </div>
                <div class='col h-100 w-100'>
                    <canvas id="statisticsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
    var marksChartCtx = document.getElementById('marksChart');
    var marksChart = new Chart(marksChartCtx, {
        type: 'horizontalBar',
        data: {
            labels: ['Max Marks', 'Right Marks', 'Negative Marks', 'Total Marks'],
            datasets: [{
                label: 'Marks Statistics',
                data: [{{ $maxMarks }}, {{ $rightMarks }}, {{ $negativeMarks }}, {{ $rightMarks - $negativeMarks }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(180, 56, 180, 0.7)',
                ]
            }],
        },
        options: {
        title: {
            display: true,
            text: 'Marks Statistics'
        }
    } 
    });

    var timeChartCtx = document.getElementById('timeChart');
    var timeChart = new Chart(timeChartCtx, {
        type: 'doughnut',
        data: {
            labels: ['Time Taken', 'Time Remaining'],
            datasets: [{
                label: 'Time Statistics',
                data: [{{ (int) $timeTaken }}, {{ $totalTime - (int) $timeTaken }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(34, 206, 86, 0.7)'
                ]
            }], 
        },
        options: {
        title: {
            display: true,
            text: 'Time Statistics'
        }
    }
    });

    var statisticsChartCtx = document.getElementById('statisticsChart');
    var statisticsChart = new Chart(statisticsChartCtx, {
        type: 'polarArea',
        data: {
            labels: ['Total Questions', 'Total Attempted', 'Left Questions', 'Correct Answers', 'Incorrect Answers'],
            datasets: [{
                label: 'Question Statistics',
                data: [{{ $totalQuestions }}, {{ $totalAttempted }}, {{ $totalQuestions - $totalAttempted }}, {{ $correctAnswers }}, {{ $totalAttempted - $correctAnswers }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(180, 56, 180, 0.7)',
                    'rgba(34, 206, 86, 0.7)'
                ]
            }],
        },
        options: {
        title: {
            display: true,
            text: 'Exam Statistics'
        }
    }
    });
</script>
@endpush