<x-simple-layout>
    <div class="bg-white my-3 p-3 mx-auto max-w-7xl rounded-2xl text-center">
        <div>送信しました。</div>
        <div>以下の質問IDをお控えください。</div>
        <div>「{{ session('questionId') }}」</div>
        <x-primary-button>
            <a href="/">戻る</a>
        </x-primary-button>
    </div>
</x-simple-layout>