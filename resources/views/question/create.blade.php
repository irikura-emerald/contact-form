<x-simple-layout>
    <h1>お問い合わせ</h1>

    <form method="post" action="{{route('question.create')}}">
        @csrf

    </form>
</x-simple-layout>