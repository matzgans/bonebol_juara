<x-app-layout>
    <div class="bg-gray-100 py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Bagian Header -->
            <div class="mb-8 text-center">
                {{-- <h1 class="mb-4 text-5xl font-bold text-blue-800">
                    Bonebol Juara
                </h1>
                <p class="text-lg text-gray-600">
                    Ayo cek jawabanmu dan buktikan keberuntunganmu!
                </p> --}}
                <img class="mx-auto h-1/2 w-1/2" src="{{ asset('image/logo.png') }}" alt="">
            </div>
            <div class="overflow-hidden bg-white p-6 shadow-lg sm:rounded-lg">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="rounded-lg bg-white p-6 shadow-md transition-shadow duration-300 hover:shadow-xl">
                            <h3 class="mb-4 text-xl font-semibold text-gray-800">Board {{ $i }}</h3>
                            <form action="{{ route('board.checkAnswer') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700"
                                        for="answer{{ $i }}">Answer</label>
                                    <input
                                        class="mt-1 w-full rounded-lg border border-gray-300 p-3 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="answer{{ $i }}" name="answer" type="password" value=""
                                        required autocomplete="off">
                                    <input name="name" type="hidden" value="{{ 'Board' . $i }}">
                                </div>
                                <div class="flex items-center justify-between">
                                    <button
                                        class="rounded-lg bg-blue-600 px-5 py-2.5 text-white transition-colors duration-200 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300"
                                        type="submit">Check</button>
                                </div>
                            </form>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <!-- Audio Elements -->
    <audio id="success-sound" src="{{ asset('sounds/success.mp3') }}" preload="auto"></audio>
    <audio id="error-sound" src="{{ asset('sounds/error.mp3') }}" preload="auto"></audio>

    @push('after-scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if (session('success'))
                const successSound = document.getElementById('success-sound');
                successSound.play();

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif
            @if (session('error'))
                const errorSound = document.getElementById('error-sound');
                errorSound.play();

                Swal.fire({
                    icon: 'error',
                    title: 'SALAH!',
                    text: '{{ session('error') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif
        </script>
    @endpush
</x-app-layout>
