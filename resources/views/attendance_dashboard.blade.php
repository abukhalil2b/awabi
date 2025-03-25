<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>مسابقة المثقف الأول</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none;
        }

        .min-h-screen {
            min-height: calc(100vh - 61px);
            /* Adjusts for the margin */
        }
    </style>

</head>

<body>
    <div class="min-h-screen bg-gray-100">
        <!-- Header -->
        <div class="py-3 px-5 bg-white flex justify-between items-center">
            <div>{{ Auth::user()->name }}</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-600">تسجيل الخروج</button>
            </form>
        </div>

        <!-- Main Content -->
        @if (isset($question))
            <!-- Display the Question -->
            <div class="bg-blue-900 text-white w-full p-3 font-bold text-center">
                {{ $question->content }}
            </div>

            @if (isset($answer))
                <!-- If the user has already answered -->
                <div class="bg-white mt-3 p-3 w-full font-bold border">
                    <div>إجابتك:</div>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                        <div class="text-lg text-gray-700">{{ $answer->ans }}</div>
                        <div class="text-lg text-gray-700">{{ $question->{$answer->ans} ?? '' }}</div>
                    </div>
                </div>
                <div class="w-full fixed bottom-0">
                    <button class="w-full bg-blue-900 text-white h-20 rounded-none" onclick="location.reload()">
                        اذهب للسؤال
                    </button>
                </div>
            @else
                <!-- Answer Options using Alpine.js -->
                <div x-data="sendAnswer()" x-init="fetchQuestion()" x-cloak class="p-3">
                    <!-- Loading Indicator -->
                    <div x-show="loading" class="w-full">
                        <div class="flex justify-center items-center h-[200px]">
                            <div class="loader"></div>
                        </div>
                    </div>


                    <!-- Show Error/Info Message -->
                    <div x-show="message" class="bg-red-100 text-red-600 p-3 rounded text-center">
                        <span x-text="message"></span>
                    </div>

                    <!-- Answer Options -->
                    <div x-show="!loading" class="space-y-8">
                        <template x-for="option in options" :key="option.key">
                            <div @click="submitAnswer(option.key)"
                                class="px-2 py-6 w-full bg-blue-50 text-blue-900 border border-blue-900 rounded cursor-pointer hover:bg-blue-100">
                                <span x-text="option.text"></span>
                            </div>
                        </template>
                    </div>
                </div>
            @endif
        @else
            <div class="w-full fixed bottom-0">
                <button class="w-full bg-blue-900 text-white h-20 rounded-none" onclick="location.reload()">
                    اذهب للسؤال
                </button>
            </div>
        @endif
    </div>

    <!-- Alpine.js Component Script -->

    <script>
        function sendAnswer() {
    return {
        loading: true,
        question: null,
        options: [],
        message: null,

        fetchQuestion() {
            fetch('/api/getOpenQuestion')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.question = data.question;
                        this.options = [
                            { key: 'A', text: data.question.A || '' },
                            { key: 'B', text: data.question.B || '' },
                            { key: 'C', text: data.question.C || '' },
                            { key: 'D', text: data.question.D || '' }
                        ];
                    } else {
                        this.message = data.message;
                    }
                })
                .catch(() => {
                    this.message = 'حدث خطأ أثناء تحميل السؤال.';
                })
                .finally(() => {
                    this.loading = false;
                });
        },

        submitAnswer(selectedOption) {
            this.loading = true;

            const data = {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                question_id: this.question?.id,
                user_id: "{{ auth()->id() }}",
                roundplay_id: "{{ $roundplay->id }}",
                ans: selectedOption
            };

            fetch("{{ route('attendance.sendAnswer') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(() => location.reload())
            .catch(() => {
                this.message = 'حدث خطأ أثناء إرسال الإجابة.';
            })
            .finally(() => {
                this.loading = false;
            });
        }
    }
}
    </script>


</body>

</html>
