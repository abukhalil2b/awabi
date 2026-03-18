@extends('layouts.attendance')

@section('content')
    <div class="text-white font-bold flex items-center justify-center text-2xl p-5">
        <div>{{ $roundplay->title }}</div>
    </div>

 

    <div 
        x-data="roundplayTable({
            updateUrl: '{{ route('attendance.roundplay.update_mark') }}',
            roundplayId: {{ $roundplay->id }}
        })"
        class="p-4"
    >

        <div class="text-lg font-bold mb-4">
            نتائج الجولة الحالية
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">

            <table class="w-full text-sm text-center border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">#</th>
                        <th class="p-2 border">الفريق</th>
                        <th class="p-2 border">الدرجة</th>
                        <th class="p-2 border">الحالة</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roundplayUsers as $index => $user)
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 border">
                                <span x-text="getRank({{ $index }})"></span>
                            </td>

                            <td class="p-2 border">
                                {{ $user->name }}
                            </td>

                            <td class="p-2 border">
                                <input 
                                    type="number"
                                    min="0"
                                    value="{{ $user->pivot->mark }}"
                                    class="w-24 text-center border rounded px-2 py-1"
                                    @input.debounce.600ms="updateMark({{ $user->id }}, $event.target.value)"
                                >
                            </td>

                            <td class="p-2 border">
                                <span 
                                    x-show="loading[{{ $user->id }}]" 
                                    class="text-blue-500 text-xs"
                                >
                                    جاري الحفظ...
                                </span>

                                <span 
                                    x-show="success[{{ $user->id }}]" 
                                    class="text-green-600 text-xs"
                                >
                                    ✓
                                </span>

                                <span 
                                    x-show="error[{{ $user->id }}]" 
                                    class="text-red-600 text-xs"
                                >
                                    خطأ
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

    <script>
        function roundplayTable(config) {
            return {
                updateUrl: config.updateUrl,
                roundplayId: config.roundplayId,

                loading: {},
                success: {},
                error: {},

                async updateMark(userId, mark) {

                    this.loading[userId] = true;
                    this.success[userId] = false;
                    this.error[userId] = false;

                    try {
                        let res = await fetch(this.updateUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                roundplay_id: this.roundplayId,
                                user_id: userId,
                                mark: mark
                            })
                        });

                        let data = await res.json();

                        if (!res.ok || !data.status) {
                            throw new Error();
                        }

                        this.success[userId] = true;

                        setTimeout(() => {
                            this.success[userId] = false;
                        }, 1500);

                    } catch (e) {
                        this.error[userId] = true;
                    } finally {
                        this.loading[userId] = false;
                    }
                },

                getRank(index) {
                    // Optional: add medals
                    if (index === 0) return '🥇';
                    if (index === 1) return '🥈';
                    if (index === 2) return '🥉';
                    return index + 1;
                }
            }
        }
    </script>

@endsection
