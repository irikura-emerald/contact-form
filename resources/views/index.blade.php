<x-simple-layout script="/js/index.js">
    <x-slot name="header">
        <h1 class="text-xl font-semibold">ホーム画面</h1>
    </x-slot>

    <div class="mx-auto max-w-7xl flex flex-wrap items-center justify-center">
        <div class="bg-white rounded-2xl m-1">
            <div>
                <x-primary-button class="m-9">
                    <a href="{{ route('question.create') }}">お問合わせ</a>
                </x-primary-button>
            </div>
        </div>

        <div class="bg-white rounded-2xl m-1">
            <div class="m-3">
                <div class="mb-1">
                    <input type="number" id="question_id" min="1" placeholder="質問ID"
                        class=" disabled:text-gray-500 disabled:bg-gray-300 w-[8rem]" />
                    <select id="question_select">
                        <option value="-1">--</option>
                        @foreach ($myQuestionIds as $id)
                            <option value="{{ $id }}">{{ $id }}</option>
                        @endforeach
                    </select>
                </div>
                <x-primary-button>
                    <input id="show_button" type="button" value="回答を見る" />
                </x-primary-button>
            </div>
        </div>

        <div class="bg-white rounded-2xl m-1">
            <div>
                <x-primary-button class="m-9">
                    <a href="{{ route('question.show') }}">管理画面</a>
                </x-primary-button>
            </div>
        </div>
    </div>
</x-simple-layout>