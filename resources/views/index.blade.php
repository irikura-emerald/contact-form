<x-simple-layout>
    <h1>ホーム画面</h1>

    <p>
        <a href="{{ route('question.create') }}">お問合わせ</a>
    </p>

    <p>
    <form method="post" action="{{ route('answer.show') }}">
        @csrf
        <div>
            <label for="question_id">質問ID</label>
            <input type="number" id="question_id" />
        </div>
        <input type="submit" value="回答を見る" />
    </form>
    </p>
</x-simple-layout>