<x-simple-layout script="/js/index.js">
    <h1>ホーム画面</h1>

    <p>
        <a href="{{ route('question.create') }}">お問合わせ</a>
    </p>

    <p>
    <div>
        <label for="question_id">質問ID</label>
        <input type="number" id="question_id" min="1"/>
        <select id="question_select">
            <option value="-1">--</option>
            @foreach ($myQuestionIds as $id)
                <option value="{{ $id }}">{{ $id }}</option>
            @endforeach
        </select>
    </div>
    <input id="show_button" type="button" value="回答を見る" />
    </p>
</x-simple-layout>